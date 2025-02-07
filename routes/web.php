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
