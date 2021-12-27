<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\User;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      Product::updated(function($product){
        if ($product->quantity == 0 && $product->isAvailable()) {
          $product->status = Product::UNAVAILABLE_PRODUCT;
          $product->save();
        }
      });

      User::created(function($user){
        Mail::to($user)->send(new UserCreated($user));
      });

//        User::updated(function($user){
//            if($user->isDirty('email')){
//                Mail::to($user->email)->send(new UserCreated($user));
//            }
//
//        });

      // The default length is 191 for String in Laravel
      // Because it is 2^8 - 2^6 = 191
      // we need to set this default value to avoid length error
        Schema::defaultStringLength(191);
    }
}
