<?php

use App\Http\Controllers\ShoppingCartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cart/add', [ShoppingCartController::class, 'addProduct'])->name('add')->middleware('api');
Route::put('/cart/update/{productId}', [ShoppingCartController::class, 'updateProduct'])->name('update');
Route::delete('/cart/remove/{productId}', [ShoppingCartController::class, 'removeProduct'])->name('remove');
Route::post('/cart/confirm', [ShoppingCartController::class, 'confirmPurchase'])->name('confirm');
Route::get('/cart', [ShoppingCartController::class, 'shoppingCart'])->name('shoppingCart');
