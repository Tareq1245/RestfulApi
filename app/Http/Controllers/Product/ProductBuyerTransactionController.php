<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductBuyerTransactionController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, User $seller)
    {
      $rules = [
        'quantity' => 'required|integer|min:1'
      ];
      $this->validate($request,$rules);

        if($buyer->id == $product->seller_id) {
          return $this->errorResponse('The Buyer must be in different from the seller', 409);
        }
        if (!$buyer->isVerified()) {
          return $this->errorResponse('The Buyer must be a Verified User', 409);
        }
        if (!$product->seller->isVerified()) {
          return $this->errorResponse('The Seller must be a Verified User', 409);
        }
        if (!$product->isAvailable()) {
          return $this->errorResponse('The Product is not Available', 409);
        }
        if ($product->quantity < $request->quantity) {
          return $this->errorResponse('The product does not have enough units for transaction ', 409);
        }

        return DB::transaction(function() use ($request, $product, $buyer) {
          $product->quantity -= $request->quantity;
          $product->save();

          $transaction = Transaction::create([
            'quantity' => $request->quantity,
            'buyer_id' => $buyer->id,
            'product_id' => $product->id,
          ]);

          return $this->showOne($transaction, 201);

        )};

    }


}
