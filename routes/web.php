<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\LoginRedirect;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->middleware('auth');
Route::get('/jelajahi-produk', [PublicController::class, 'explore_products'])->middleware('auth');
Route::get('/keranjang', [PublicController::class, 'cart'])->middleware('auth');
Route::get('/checkout', [PublicController::class, 'checkout'])->middleware('auth');
Route::get('/jelajahi-produk/detail', [PublicController::class, 'detail'])->middleware('auth');
Route::get('/profile', [PublicController::class, 'profile'])->middleware('auth');
Route::get('/login', [PublicController::class, 'login'])->name('login')->middleware('guest');;
Route::get('/register', [PublicController::class, 'register'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'doRegist']);
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'doLogout']);

Route::post('/update-data', [AuthController::class, 'updateData'])->name('update.data');
Route::get('/jelajahi-produk/{id}', [PublicController::class, 'detail']);