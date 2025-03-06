<?php

namespace App\Http\Controllers;

use App\Models\BalanceHistory;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use App\Models\VoucherUsage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    

    public function do_checkout(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);
    
        $now = now();
        $currentDate = now()->format('YmdHis');
        $lastOrder = Order::where('order_id', 'like', $currentDate . '%')
            ->orderBy('order_id', 'desc')
            ->first();
        $lastIdNumber = $lastOrder ? (int) substr($lastOrder->order_id, 14) : 0;
        $newOrderId = $currentDate . str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
    
        $user_id = Auth::User()->id;
        $user_email = $validatedData['email'];
        $products = json_decode($request->products);
        $starting_price = $request->starting_price;
        $delivery_method = $request->delivery_method;
        $delivery_fee = 20000;
        $address_id = $request->alamat;
        $note = $request->note;
        $payment_option = $request->payment_option;
        $voucher_code = $request->voucher_code;
        $discount_value = 0;
        $final_price = 0;
    
        DB::beginTransaction();
        try {
            // Validasi dan perhitungan diskon
            if ($voucher_code != null) {
                $voucher = Voucher::where('code', $voucher_code)
                    ->where('valid_from', '<=', $now)
                    ->where('valid_until', '>=', $now)
                    ->where('remaining', '>', 0)
                    ->firstOrFail();
    
                if ($delivery_method === 'delivery') {
                    if ($voucher->type === 'percentage') {
                        $discount_value = ($starting_price + $delivery_fee) * ($voucher->value / 100);
                        $final_price = $starting_price + $delivery_fee - $discount_value;
                    } else if ($voucher->type === 'fixed') {
                        $discount_value = $voucher->value;
                        $final_price = $starting_price + $delivery_fee - $discount_value;
                    }
                } else if ($delivery_method === 'pickup') {
                    if ($voucher->type === 'percentage') {
                        $discount_value = $starting_price * ($voucher->value / 100);
                        $final_price = $starting_price - $discount_value;
                    } else if ($voucher->type === 'fixed') {
                        $discount_value = $voucher->value;
                        $final_price = $starting_price - $discount_value;
                    }
                }
            } else {
                if ($delivery_method === 'delivery') {
                    $final_price = $starting_price + $delivery_fee;
                } else if ($delivery_method === 'pickup') {
                    $final_price = $starting_price;
                }
            }
    
            // Jika menggunakan balance, update balance dan catat transaksi
            $billing_status = 'belum dibayar';
            if ($payment_option === 'use_balance') {
                $user = Auth::user();
    
                if ($user->balance < $final_price) {
                    throw new \Exception('Saldo tidak cukup untuk melakukan pembayaran.');
                }
    
                BalanceHistory::create([
                    'user_id' => $user_id,
                    'desc' => 'order',
                    'type' => 'decrease',
                    'order_id' => $newOrderId,
                    'amount' => $final_price,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
    
                $billing_status = 'dibayar';
                $user->balance -= $final_price;
                $user->save();
            }
    
            // Buat order baru
            $order_result = Order::create([
                'order_id' => $newOrderId,
                'user_id' => $user_id,
                'email' => $user_email,
                'price' => $starting_price,
                'voucher_code' => $voucher_code,
                'voucher_discount' => $discount_value,
                'final_price' => $final_price,
                'delivery_method' => $delivery_method,
                'payment_option' => $payment_option,
                'status' => 'diproses',
                'billing' => $billing_status,
                'note' => $note,
                'address_id' => $address_id,
                'order_date' => $now,
            ]);
    
            if (!$order_result) {
                throw new \Exception('Gagal membuat pesanan.');
            }
    
            // Simpan produk dalam order
            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $newOrderId,
                    'product_id' => $product->product_id,
                    'product_name' => $product->product->name,
                    'product_price' => $product->product->price,
                    'amount' => $product->quantity,
                    'total_price' => $product->total_price
                ]);
    
                $productData = Product::findOrFail($product->product_id);
                if ($productData->stock < $product->quantity) {
                    throw new \Exception("Stok produk {$productData->name} tidak mencukupi.");
                }
    
                $productData->stock -= $product->quantity;
                $productData->save();
            }
    
            // Hapus cart setelah checkout
            Cart::where('user_id', $user_id)->delete();
    
            // Kurangi jumlah voucher yang tersedia
            if ($voucher_code != null) {
                VoucherUsage::create([
                    'user_id' => $user_id,
                    'voucher_code' => $voucher_code,
                    'order_id' => $newOrderId,
                    'usage_date' => $now
                ]);
    
                $voucher->remaining -= 1;
                $voucher->save();
            }
    
            // Commit transaksi jika semua berhasil
            DB::commit();
    
            return redirect()->route('view.invoice', $newOrderId)->with('success', 'Berhasil Menambahkan Pesanan');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
    
            return back()->with('error', 'Gagal melakukan checkout: ' . $e->getMessage());
        }
    }
    

    public function view_invoice($id) {
        $invoice = Order::where('user_id', Auth::user()->id)->where('order_id', $id)->first();
        return view('public.invoice', ['invoice' => $invoice]);
    }

    public function cancel_transaction (Request $request) {
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);
        $order->status = 'dibatalkan';
        $order->save();
        return back()->with('success', 'Pesanan Berhasil Dibatalkan');
    }


}
