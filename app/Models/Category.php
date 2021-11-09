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

    public function seller()
    {
      return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
      return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class);
    }

    protected $fillable = [
      'name',
      'description',
    ];
}
