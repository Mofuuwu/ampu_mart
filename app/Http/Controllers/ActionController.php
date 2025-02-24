<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
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
        $tags = Category::withCount('products')->get();
        $keyword = $request->get('keyword');
        $category = $request->get('category');
        $query = Product::query();
        $is_null = false;

        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }

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
}
