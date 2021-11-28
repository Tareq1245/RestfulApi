<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use App\Scopes\BuyerScope;
class Buyer extends User
{
    use HasFactory;

    // After Laravel 5 we have to use the boot method like this
    // Boot method with the name of the reason for using boot
    // protected static function bootBuyerScope()
    // {
    //   //parent::booted();
    //   static::addGlobalScope(new BuyerScope);
    // }

    public function transactions()
    {
      return $this->hasMany(Transaction::class);
    }
}
