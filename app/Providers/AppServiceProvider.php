<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

      // The default length is 191 for String in Laravel
      // Because it is 2^8 - 2^6 = 191
      // we need to set this default value to avoid length error
        Schema::defaultStringLength(191);
    }
}
