<?php

namespace App\Scopes;

use Illuminate\Database\Element\Model;
use Illuminate\Database\Element\Scope;
use Illuminate\Database\Element\Builder;


class SellerScope implements Scope

{
  public function apply(Builder $builder, Model $model)
  {
    $builder->has('products');
  }
}
