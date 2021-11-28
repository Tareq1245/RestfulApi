<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {

        $categories = $transaction->with('product.categories')
        ->get()
        ->pluck('product.categories')
        ->unique('id')
        ->values();
        return $this->showAll($categories);
    }
}
