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
Route::resource('buyers.transactions','App\Http\Controllers\Buyer\BuyerTransactionController');
Route::resource('buyers.products','App\Http\Controllers\Buyer\BuyerProductController');
Route::resource('buyers.sellers','App\Http\Controllers\Buyer\BuyerSellerController');
Route::resource('buyers.categories','App\Http\Controllers\Buyer\BuyerCategoryController');

//Categories

Route::resource('categories','App\Http\Controllers\Category\CategoryController');
Route::resource('categories.products','App\Http\Controllers\Category\CategoryProductController');
Route::resource('categories.sellers','App\Http\Controllers\Category\CategorySellerController');
Route::resource('categories.transactions','App\Http\Controllers\Category\CategoryTransactionController');
Route::resource('categories.buyers','App\Http\Controllers\Category\CategoryBuyerController');
//Products

Route::resource('products','App\Http\Controllers\Product\ProductController');
Route::resource('products.transactions','App\Http\Controllers\Product\ProductTransactionController');
Route::resource('products.buyers','App\Http\Controllers\Product\ProductBuyerController');
Route::resource('products.categories','App\Http\Controllers\Product\ProductCategoryController');
Route::resource('products.buyers.transactions','App\Http\Controllers\Product\ProductBuyerTransactionController');


//Seller

Route::resource('sellers','App\Http\Controllers\Seller\SellerController');
Route::resource('sellers.transactions','App\Http\Controllers\Seller\SellerTransactionController');
Route::resource('sellers.categories','App\Http\Controllers\Seller\SellerCategoryController');
Route::resource('sellers.buyers','App\Http\Controllers\Seller\SellerBuyerController');
Route::resource('sellers.products','App\Http\Controllers\Seller\SellerProductController');

//Transaction

Route::resource('transactions','App\Http\Controllers\Transaction\TransactionController');
Route::resource("transactions.categories","App\Http\Controllers\Transaction\TransactionCategoryController",["only"=>["index"]]);

//Users

Route::resource('users','App\Http\Controllers\User\UserController',['except' => ['create','edit']]);
Route::name('verify')->get('users/verify/{token}',['App\Http\Controllers\User\UserController','verify']);
