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

    public function store($data)
    {
        $validated = Validator::make($data, [
            'images' => ['required', 'array'],
            'sizes' => ['required', 'array'],
            'type_id' => ['required', 'int'],
            'slug' => ['required', 'string'],
            'price' => ['required', 'int'],
            'offer' => ['sometimes', 'int'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
        ])->validate();

        return $this->productRepository->store($validated);
    }

    public function update($data)
    {
        $validated = Validator::make($data, [
            'product_id' => ['required', 'int'],
            'price' => ['required', 'int'],
            'offer' => ['sometimes', 'int'],
            'type_id' => ['required', 'int'],
            'images' => ['sometimes', 'array'],
            'sizes' => ['sometimes', 'array'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ])->validate();

        return $this->productRepository->update($validated);
    }

    public function delete($data): int
    {
        return $this->productRepository->delete($data);
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
            "department" => ["required", "string"],
            "user_id" => ["sometimes", "integer"]
        ])->validate();

        $basketItems = Session::get("cart");
        $totalPrice = $this->getTotalProductPrice($basketItems);

        return $this->orderRepository->makeOrder(array_merge($validated,
            [
                "products" => $basketItems,
                "total_price" => $totalPrice
            ]
        ));
    }

    public function cancelOrder($order_id): bool
    {
        if(isset($order_id)) {
            $this->orderRepository->cancelOrder($order_id);
            return true;
        }

        return false;

    }

    public function changeOrderStatus($data)
    {
        $validated = Validator::make($data, [
            "order_id" => ["required", "integer"],
            "status_id" => ["required", "integer"],
        ])->validate();

        return $this->orderRepository->changeStatus($validated);
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
        $totalPrice = $this->getTotalProductPrice($cart);

        return [
            "count" => $newCount,
            "price" => $newPrice,
            "total_price" => $totalPrice
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
            if ($item['product_id'] == $product["product_id"] && $item['size_id'] == $product["size_id"])  {
                return $key;
            }
        }

        return -1;
    }

    public function getTotalProductPrice($products): float|int
    {
        $totalPrice = 0;
        $deliveryCost = 70;

        foreach ($products as $product){
            $totalPrice += $product["product"]->currentPrice() * $product["count"];
        }

        return $totalPrice + $deliveryCost;
    }






}
