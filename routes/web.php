<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/shopping-cart', [App\Http\Controllers\ShoppingCartController::class, 'shoppingCart'] )->name('shoppingCart');

//Route::post('/api/cart/add', [ShoppingCartController::class, 'addProduct'])->name('add');
//Route::post('/api/cart/update', [ShoppingCartController::class, 'updateProduct'])->name('update');
//Route::post('/api/cart/remove/{productId}', [ShoppingCartController::class, 'removeProduct'])->name('remove');
//Route::post('/api/cart/clear', [ShoppingCartController::class, 'clear'])->name('clear');
//Route::post('/api/cart/confirm', [ShoppingCartController::class, 'confirmPurchase'])->name('confirm');
