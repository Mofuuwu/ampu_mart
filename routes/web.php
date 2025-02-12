<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index']);
Route::get('/jelajahi-produk', [PublicController::class, 'explore_products']);
Route::get('/keranjang', [PublicController::class, 'cart']);
Route::get('/checkout', [PublicController::class, 'checkout']);
Route::get('/jelajahi-produk/detail', [PublicController::class, 'detail']);
Route::get('/profile', [PublicController::class, 'profile']);
Route::get('/login', [PublicController::class, 'login']);
Route::get('/register', [PublicController::class, 'register']);