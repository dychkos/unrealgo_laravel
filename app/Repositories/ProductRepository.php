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

    public function store($data)
    {
        $product = $this->product::create([
            'title' => $data['title'],
            'price' => $data['price'],
            'offer' => $data['offer'] ?? '',
            'slug' => $data['slug'],
            'description' => $data['description'],
            'type_id' => $data['type_id']
        ]);

        if(!empty($data["images"])){
            $product->images()->createMany($data['images']);
        }

        if(!empty($data["sizes"])){
            $product->sizes()->sync($data['sizes']);
        }

        $product->fresh();

        return $product;
    }

    public function update($data)
    {
        $product = $this->product::find($data['id']);

        if(!empty($data["images"])){
            $product->images()->delete();
            $product->images()->createMany($data['images']);
        }

        if(!empty($data["sizes"])){
            $product->sizes()->sync($data['sizes']);
        }

        $product->update([
            'title' => $data['title'],
            'price' => $data['price'],
            'offer' => $data['offer'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'type_id' => $data['type_id']
        ]);

        return $product;
    }

    public function delete($product_id): int
    {
        return $this->product->destroy($product_id);
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
