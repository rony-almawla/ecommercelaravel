<?php

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

Route::post('/insert_product', [ProductsController::class, 'insert_product']);
Route::post('/update_product', [ProductsController::class, 'update_product']);
Route::get('/products', [ProductsController::class, 'get_products']);
route::delete('/products/{productid}', [ProductsController::class, 'delete_product']);
Route::get('/users', [UsersController::class, 'login']);
Route::get('/users', [UsersController::class, 'register']);
Route::post('/transactions', [TransactionsController::class, 'insert_transaction']);
Route::get('/transactions', [TransactionsController::class, 'get_transaction']);
Route::get('/shoppingcarts', [shoppingcarts::class, 'addToCart']);
