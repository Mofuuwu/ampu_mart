<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/jelajahi-produk', function () {
    return view('public/jelajahi-produk');
});

Route::get('/keranjang', function () {
    return view('public/keranjang');
});

Route::get('/checkout', function () {
    return view('public/checkout');
});


Route::get('/jelajahi-produk/detail', function () {
    return view('public/detail-page');
});


Route::get('/profile', function () {
    return view('auth/profile');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});