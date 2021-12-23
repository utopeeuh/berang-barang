<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);
Route::get('/order', [App\Http\Controllers\PagesController::class, 'order']);
Route::get('/my-transactions', [App\Http\Controllers\TransactionController::class, 'my_trans']);
Route::get('/transaction/{transaction_id}', [App\Http\Controllers\TransactionController::class, 'transaction_detail']);

Route::post('/order-store', [App\Http\Controllers\TransactionController::class, 'store']);
Route::post('/checkout-store/{transaction_id}', [App\Http\Controllers\TransactionController::class, 'checkout_store']);

Route::get('/checkout/{transaction_id}', [App\Http\Controllers\TransactionController::class, 'checkout_view']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
