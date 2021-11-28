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

Route::get('/', function () {
    return view('welcome');
});

//Buyers Route

// Route::resource('buyers','App\Http\Controllers\Buyer\BuyerController');
//
// //Categories
//
// Route::resource('categories','App\Http\Controllers\Category\CategoryController');
//
// //Products
//
// Route::resource('products','App\Http\Controllers\Product\ProductController');
//
// //Seller
//
// Route::resource('sellers','App\Http\Controllers\Seller\SellerController');
//
// //Transaction
//
// Route::resource('transactions','App\Http\Controllers\Transaction\TransactionController');
//
// //Users
//
// Route::resource('users','App\Http\Controllers\User\UserController',['except' => ['create','edit']]);
