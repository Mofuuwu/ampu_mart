<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //PUBLIC - GENERAL
    public function index() {
        $best_products = Product::limit(6)->get();
        $newest_products = Product::orderBy('created_at', 'desc')->limit(6)->get();
        return view('index', ['best_products' => $best_products, 'newest_products' => $newest_products]);
    }
    public function explore_products() {
        $tags = Category::all();
        $products = Product::paginate(20);
        return view('public.jelajahi-produk', ['tags' => $tags, 'products' => $products]);
    }
    public function cart() {
        return view('public.keranjang');
    }
    public function checkout() {
        return view('public.checkout');
    }
    public function detail($id) {
        $product = Product::findOrFail($id);
        $tags = Category::all();
        return view('public.detail-page', ['product' => $product, 'tags' => $tags ]);
    }


    
    //PROFILE
    public function profile() {
        return view('auth.profile');
    }
    public function login() {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }
}
