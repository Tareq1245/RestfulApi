<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'quantity',
      'buyer_id',
      'product_id',
    ];

    protected $dates = ['deleted_at'];

    public function buyers()
    {
      return $this->belongsTo(Buyer::class);
    }

    public function products()
    {
      return $this->belongsTo(Product::class);
    }
}
