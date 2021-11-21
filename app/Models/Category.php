<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Seller;
use App\Models\Transaction;
use App\Models\Category;


class Category extends Model
{
    use HasFactory;

    public function products()
    {
      return $this->status == Product::AVAILABLE_PRODUCT;
    }



    protected $fillable = [
      'name',
      'description',
    ];
}
