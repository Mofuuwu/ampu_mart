<?php

namespace App\Http\Controllers;

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

class TransactionController extends Controller
{
    public function do_checkout(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        // dd($request); 

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
        $voucher_code = $request->voucher_code;
        $discount_value = 0;
        $order_id = 

        $final_price = 0;

        if ($voucher_code != null) {
            $voucher = Voucher::where('code', $voucher_code)
                ->where('valid_from', '<=', $now)
                ->where('valid_until', '>=', $now)
                ->where('remaining', '>', 0)
                ->first();

            if($delivery_method === 'delivery') {
                if ($voucher->type === 'percentage') {
                    $discount_value = ( $starting_price + $delivery_fee ) * ( $voucher->value / 100 );
                    $final_price = $starting_price + $delivery_fee - $discount_value;
                } else if ($voucher->type === 'fixed') {
                    $discount_value = $voucher->value;
                    $final_price = $starting_price + $delivery_fee - $discount_value;
                }
            } else if ($delivery_method === 'pickup') {
                if ($voucher->type === 'percentage') {
                    $discount_value = $starting_price * ( $voucher->value / 100 );
                    $final_price = $starting_price - $discount_value;
                } else if ($voucher->type === 'fixed') {
                    $discount_value = $voucher->value;
                    $final_price = $starting_price - $discount_value;
                }
            }
        } else {
            if ($delivery_method === 'delivery') {
                $final_price = $starting_price + $delivery_fee;
            }
            else if ($delivery_method === 'pickup') {
                $final_price = $starting_price;
            } 
        }

        $order_result = Order::create([
            'order_id' => $newOrderId,
            'user_id' => $user_id,
            'price' => $starting_price,
            'final_price' => $final_price,
            'delivery_method' => $delivery_method,
            'address_id' => $address_id,
            'order_date' => $now,
        ]);

        foreach ($products as $product) {
            OrderItem::create([
                'product_id' => $product->product_id,
                'order_id' => $newOrderId,
                'amount' => $product->quantity,
                'total_price' => $product->total_price
            ]);
        }
        
        if ($voucher_code != null) {
            VoucherUsage::create([
                'user_id' => $user_id,
                'voucher_code' => $voucher_code,
                'order_id' => $order_result->id,
                'usage_date' => $now
            ]);
            $voucher = Voucher::where('code', $voucher_code)
                ->where('valid_from', '<=', $now)
                ->where('valid_until', '>=', $now)
                ->where('remaining', '>', 0)
                ->first();

            $voucher->remaining -= 1;
            $voucher->save();
        }

    }

    public function invoice_detail($id) {
        $order_id = Order::findOrFail($id);
        return view('public.after-checkout', ['order_id' => $order_id]);
    }
}
