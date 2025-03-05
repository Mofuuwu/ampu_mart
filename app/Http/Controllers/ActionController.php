<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Voucher;
use App\Models\VoucherUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function add_to_cart(Request $request)
    {
        Log::info($request->all());

        $user_id = $request->input('id');
        $product_id = $request->input('product');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        $cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->total_price += $price;
            $cart->save();

            return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
        } else {
            $cart = Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'quantity' => $quantity,
                'total_price' => $price,
            ]);

            return response()->json(['success' => true, 'message' => 'Data added to cart successfully']);
        }
    }

    public function cart_add_quantity(Request $request)
    {
        Log::info($request->all());
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($cart) {
            $cart->quantity = $quantity;
            $cart->total_price = $cart->quantity * $cart->product->price;
            $cart->save();
            return response()->json(['success' => true, 'message' => 'Berhasil Menambahkan Kuantitas Produk']);
        } else {
            return response()->json(['gagal' => true, 'message' => 'Data Produk Tidak Ditemukan']);
        }
    }
    public function cart_del_quantity(Request $request)
    {
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($cart) {
            $cart->quantity = $quantity;
            $cart->total_price = $cart->quantity * $cart->product->price;
            $cart->save();
            return response()->json(['success' => true, 'message' => 'Berhasil Mengurangi Kuantitas Produk']);
        } else {
            return response()->json(['gagal' => true, 'message' => 'Data Produk Tidak Ditemukan']);
        }
    }
    public function cart_del_product(Request $request)
    {
        Log::info($request->all());
        $user_id = Auth::id();
        $product_id = $request->input('product_id');

        $cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($cart) {
            $cart->delete();
            return response()->json(['success' => true, 'message' => 'Berhasil Menghapus Produk']);
        } else {
            return response()->json(['gagal' => true, 'message' => 'Data Produk Tidak Ditemukan']);
        }
    }

    public function search_products(Request $request)
    {
        // Hanya menghitung produk dengan stok lebih dari 0
        $tags = Category::withCount(['products' => function ($query) {
            $query->where('stock', '>', 0);
        }])->get();
    
        $keyword = $request->get('keyword');
        $category = $request->get('category');
    
        // Query produk hanya yang stoknya lebih dari 0
        $query = Product::query()->where('stock', '>', 0);
    
        // Filter berdasarkan keyword
        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }
    
        // Filter berdasarkan kategori
        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', 'like', "%{$category}%");
            });
        }
    
        $products = $query->paginate(10);
    
        return view('public.jelajahi-produk', [
            'products' => $products,
            'tags' => $tags,
        ]);
    }
    

    public function check_voucher(Request $request)
    {
        $voucher_code = $request->input('voucher_code');
        $now = now();

        $result = Voucher::where('code', $voucher_code)
            ->where('valid_from', '<=', $now)
            ->where('valid_until', '>=', $now)
            ->where('remaining', '>', 0)
            ->first();

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Voucher tidak valid atau sudah habis']);
        }

        $has_usaged = VoucherUsage::where('voucher_code', $result->code)
            ->where('user_id', Auth::user()->id)->exists(); 

        if ($has_usaged) {
            return response()->json(['success' => false, 'message' => 'Kode Voucher Telah Digunakan Sebelumnya']);
        }

        return response()->json([
            'success' => true,
            'voucher_value' => $result->value,
            'voucher_type' => $result->type
        ]);
    }
    public function check_stock(Request $request) {
        $products = $request->input('products');
    
        foreach ($products as $product) {
            $dbProduct = Product::find($product['product_id']);
            if (!$dbProduct) {
                return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan']);
            }

            Log::info('Quantity: ' . $product['quantity']);
            Log::info('Stock (Updated from DB): ' . $dbProduct->stock);
            
            if ((int)$product['quantity'] > (int)$dbProduct->stock) {
                Log::info('Condition triggered: Quantity exceeds stock');
                return response()->json(['success' => false]);
            }
        }
    
        return response()->json(['success' => true]);
    }
    
}
