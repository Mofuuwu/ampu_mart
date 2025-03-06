<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\BalanceHistory;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //PUBLIC - GENERAL
    public function index()
    {
        $users = User::count();
        $orders = Order::count();
        $products = Product::count();
        $best_products = Product::whereNot('stock', 0)->withSum('order_items', 'amount')
            ->orderBy('order_items_sum_amount', 'desc')
            ->limit(6)
            ->get();

        $products_in_cart = Cart::where('user_id', Auth::user()->id)->get();
        $newest_products = Product::orderBy('created_at', 'desc')->limit(6)->get();
        return view('index', ['best_products' => $best_products, 'newest_products' => $newest_products, 'products_in_cart' => $products_in_cart, 'users' => $users, 'orders' => $orders, 'products' => $products]);
    }
    // public function explore_products()
    // {
    //     $tags = Category::withCount('products')->get();
    //     $products = Product::paginate(20);
    //     return view('public.jelajahi-produk', ['tags' => $tags, 'products' => $products]);
    // }
    public function cart()
    {
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            if ($cart->product->stock == 0) {
                $cart->delete();
            }
        }
        $products_in_cart = Cart::where('user_id', $user_id)->get();
        return view('public.keranjang', [
            'products_in_cart' => $products_in_cart,
            'addresses' => $addresses
        ]);
    }
    public function checkout()
    {
        $balance = Auth::user()->balance;
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        $products_in_cart = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($products_in_cart as $product) {
            $productStock = $product->product->stock;
            if ($product->quantity > $productStock) {
                $product->quantity = $productStock;
                $product->save();
            }
        }
        return view('public.checkout', [
            'products_in_cart' => $products_in_cart,
            'addresses' => $addresses,
            'balance' => $balance,
        ]);
    }
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($related_products->count() < 8) {
            $remaining_count = 8 - $related_products->count();
            $other_products = Product::where('id', '!=', $product->id)
                ->where('category_id', '!=', $product->category_id)
                ->orderBy('created_at', 'desc')
                ->take($remaining_count)
                ->get();

            $related_products = $related_products->merge($other_products);
        }

        $tags = Category::withCount('products')->get();

        return view('public.detail-page', [
            'product' => $product,
            'related_products' => $related_products,
            'tags' => $tags
        ]);
    }



    //PROFILE
    public function profile()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $balance_histories = BalanceHistory::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $addresses = Address::where('user_id', Auth::user()->id)->get();
        $orders_history = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('auth.profile', ['addresses' => $addresses, 'orders_history' => $orders_history, 'balance_histories' => $balance_histories]);
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
}
