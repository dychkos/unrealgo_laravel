<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function like($data)
    {
        $validated = Validator::make($data, [
          "user_id" => ['required', 'integer'],
          "product_id" => ['required', 'integer']
        ])->validate();

        return $this->productRepository->like($validated);
    }


}
