<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Scopes\BuyerScope;
class Seller extends User
{
    use HasFactory;

    // After Laravel 5 we have to use the boot method like this
    // Boot method with the name of the reason for using boot
    // protected static function bootSellerScope()
    // {
    //   //parent::booted();
    //   static::addGlobalScope(new SellerScope);
    // }

    public function products()
    {
      return $this->hasMany(Product::class);
    }
}
