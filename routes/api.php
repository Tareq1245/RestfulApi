<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Buyers Route

Route::resource('buyers','App\Http\Controllers\Buyer\BuyerController');

//Categories

Route::resource('categories','App\Http\Controllers\Category\CategoryController');

//Products

Route::resource('products','App\Http\Controllers\Product\ProductController');

//Seller

Route::resource('sellers','App\Http\Controllers\Seller\SellerController');

//Transaction

Route::resource('transactions','App\Http\Controllers\Transaction\TransactionController');

//Users

Route::resource('users','App\Http\Controllers\User\UserController',['except' => ['create','edit']]);
