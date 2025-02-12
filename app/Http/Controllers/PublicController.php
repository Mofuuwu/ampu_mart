<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    //PUBLIC - GENERAL
    public function index() {
        return view('index');
    }
    public function explore_products() {
        return view('public.jelajahi-produk');
    }
    public function cart() {
        return view('public.keranjang');
    }
    public function checkout() {
        return view('public.checkout');
    }
    public function detail() {
        return view('public.detail-page');
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
