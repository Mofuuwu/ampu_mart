<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\LoginRedirect;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->middleware('auth');
// Route::get('/jelajahi-produk', [PublicController::class, 'explore_products'])->middleware('auth');
Route::get('/keranjang', [PublicController::class, 'cart'])->middleware('auth');
Route::get('/checkout', [PublicController::class, 'checkout'])->middleware('auth');
Route::get('/profile', [PublicController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/login', [PublicController::class, 'login'])->name('login')->middleware('guest');;
Route::get('/register', [PublicController::class, 'register'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'doRegist'])->middleware('guest');
Route::post('/login', [AuthController::class, 'doLogin'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'doLogout'])->middleware('auth');

Route::get('/jelajahi-produk/{id}', [PublicController::class, 'detail'])->name('detail')->middleware('auth');
Route::get('/jelajahi-produk', [ActionController::class, 'search_products'])->name('search.product')->middleware('auth');

Route::post('/add-to-cart', [ActionController::class, 'add_to_cart'])->name('add_to_cart')->middleware('auth');
Route::post('/cart/add-quantity', [ActionController::class, 'cart_add_quantity'])->name('cart.add_quantity')->middleware('auth');
Route::post('/cart/del-quantity', [ActionController::class, 'cart_del_quantity'])->name('cart.del_quantity')->middleware('auth');
Route::post('/cart/del-product', [ActionController::class, 'cart_del_product'])->name('cart.del_product')->middleware('auth');
Route::post('/profile/change_password', [AuthController::class, 'change_password'])->name('change.password')->middleware('auth');
Route::post('/profile/add_address', [AuthController::class, 'add_address'])->name('add.address')->middleware('auth');
Route::get('/profile/del_address/{id}', [AuthController::class, 'del_address'])->name('del.address')->middleware('auth');

Route::post('/checkout', [TransactionController::class, 'do_checkout'])->middleware('auth');
Route::get('/profile/invoice/detail/{id}', [TransactionController::class, 'invoice_detail'])->middleware('auth');

Route::post('/helper/check-voucher', [ActionController::class, 'check_voucher'])->middleware('auth')->name('check.voucher');
Route::post('/helper/check-stock', [ActionController::class, 'check_stock'])->middleware('auth')->name('check.stock');

//Invoice
Route::get('/profile/invoice/{id}', [TransactionController::class, 'view_invoice'])->middleware('auth')->name('view.invoice');
Route::post('/profile/invoice/cancel_transaction', [TransactionController::class, 'cancel_transaction'])->middleware('auth')->name('cancel.transaction');
Route::post('/profile/add_balance', [AuthController::class, 'add_balance'])->middleware('auth')->name('add.balance');