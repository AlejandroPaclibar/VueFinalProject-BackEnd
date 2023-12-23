<?php

// use App\Http\Controllers\Api\Ord

use App\Http\Controllers\PaymentTransactionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderDetailController;
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


Route::post('/customers', [CustomerController::class, 'store']);
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{customer}', [CustomerController::class, 'show']);
Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}',[CustomerController::class, 'destroy']);


Route::post('/menu_items', [MenuItemController::class, 'store']);
Route::get('/menu_items', [MenuItemController::class, 'index']);
Route::get('/menu_items/{menu_item}', [MenuItemController::class, 'show']);
Route::patch('/menu_items/{menu_item}', [MenuItemController::class, 'update']);
Route::delete('/menu_items/{menu_item}',[MenuItemController::class, 'destroy']);


Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{order}', [OrderController::class, 'show']);
Route::patch('/orders/{order}', [OrderController::class, 'update']);
Route::delete('/orders/{order}',[OrderController::class, 'destroy']);


Route::post('/order_details', [OrderDetailController::class, 'store']);
Route::get('/order_details', [OrderDetailController::class, 'index']);
Route::get('/order_details/{order_detail}', [OrderDetailController::class, 'show']);
Route::patch('/order_details/{order_detail}', [OrderDetailController::class, 'update']);
Route::delete('/order_details/{order_detail}',[OrderDetailController::class, 'destroy']);


Route::post('/payment_transactions', [PaymentTransactionController::class, 'store']);
Route::get('/payment_transactions', [PaymentTransactionController::class, 'index']);
Route::get('/payment_transactions/{payment_transaction}', [PaymentTransactionController::class, 'show']);
Route::patch('/payment_transactions/{payment_transaction}', [PaymentTransactionController::class, 'update']);
Route::delete('/payment_transactions/{payment_transaction}',[PaymentTransactionController::class, 'destroy']);