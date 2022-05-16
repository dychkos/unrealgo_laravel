<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Size;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    private ProductRepository $productRepository;
    private OrderRepository $orderRepository;

    public function __construct(ProductRepository $productRepository, OrderRepository $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function like($data)
    {
        $validated = Validator::make($data, [
          "user_id" => ['required', 'integer'],
          "product_id" => ['required', 'integer']
        ])->validate();

        return $this->productRepository->like($validated);
    }

    public function addToCart($data): bool
    {
        $validated = Validator::make($data, [
            "product_id" => ["required", "integer"],
            "size_id" => ["required", "integer"],
            "count" => ["required", "integer"]
        ])->validate();

        $cart = Session::get("cart");
        $index = $this->findInCart($validated);

        if($index != -1) {
            $cart[$index] = array(
                "product_id" => $validated["product_id"],
                "size_id" => $validated["size_id"],
                "product" => $cart[$index]["product"],
                "count" => $cart[$index]["count"] + 1
            );

            Session::put("cart", $cart);

            return true;
        }

        Session::push("cart", array_merge($validated, ["product" => Product::find($validated["product_id"])]));

        return true;
    }

    public function makeOrder($data)
    {
        $validated = Validator::make($data, [
            "data_name" => ["required", "string"],
            "email" => ["required", "string"],
            "phone" => ["required", "string"],
            "city" => ["required", "string"],
            "departament" => ["required", "string"],
            "user_id" => ["sometimes", "integer"]
        ])->validate();

        $basketItems = Session::get("cart");

        return $this->orderRepository->makeOrder(array_merge($validated, ["products" => $basketItems]));
    }

    public function editCount($data) {
        $validated = Validator::make($data, [
            "index" => ["required", "string"],
            "decrement" => ["required", "string"],
        ])->validate();

        $index = $validated["index"];
        $cart = Session::get("cart");

        if (Helper::stringToBool($validated["decrement"])) {
            if($cart[$index]["count"] - 1 > 0) {
                $cart[$index]["count"] -= 1;
            }
        } else {
            $cart[$index]["count"] += 1;
        }

        Session::put("cart", $cart);

        $newCount = $cart[$index]["count"];
        $newPrice = $cart[$index]["product"]->currentPrice() * $cart[$index]["count"];

        return [
            "count" => $newCount,
            "price" => $newPrice
        ];

    }

    public function checkInCart($cart, $product_id): bool
    {
        if(empty($cart)){
            return false;
        }


        foreach ($cart as $key => $item)
        {
           if ($item['product_id'] == $product_id) {
               return true;
           }
        }

        return false;

    }

    public function findInCart($product): int|string
    {
        $cart = Session::get("cart");

        if(empty($cart)){
            return -1;
        }

        foreach ($cart as $key => $item)
        {
//            dump($item['product_id'] === $product["product_id"] && $item['size_id'] === $product["size_id"]);
//            dump($product);
//            dd($cart);

            if ($item['product_id'] == $product["product_id"] && $item['size_id'] == $product["size_id"])  {
                return $key;
            }
        }

        return -1;
    }

    public function getBasketProducts($cart) {
        $products = [];
        foreach ($cart as $key => $item)
        {
            $product = Product::find($item["product_id"]);
            $size = Size::find($item["size_id"]);
            $product["size"] = $size->value();
            $product["count"] = 3;
            array_push($products, $product);
        }

        return $products;
    }



}
