<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function like($data)
    {
        $product = Product::find($data['product_id']);


        if($product->likedBy()->where("user_id", $data['user_id'])->exists()) {
            return $product->likedBy()->detach($data["user_id"]);
        }

        return $product->likedBy()->attach($data["user_id"]);
    }


}
