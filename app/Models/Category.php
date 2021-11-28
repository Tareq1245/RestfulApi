<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Seller;
use App\Models\Transaction;
use App\Models\Category;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    public function products()
    {
      return $this->status == Product::AVAILABLE_PRODUCT;
    }

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'name',
      'description',
    ];
}
