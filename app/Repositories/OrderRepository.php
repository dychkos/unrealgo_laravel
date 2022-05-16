<?php

namespace App\Repositories;

use App\Models\BasketItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OrderRepository
{
    protected Order $order;
    protected Product $product;
    protected BasketItem $basketItem;

    public function __construct(Product $product, Order $order, BasketItem $basketItem) {
        $this->product = $product;
        $this->order = $order;
        $this->basketItem = $basketItem;
    }


    public function makeOrder($data) {

        $order = $this->order::create([
            "data_name" => $data["data_name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "city" => $data["city"],
            "departament" => $data["departament"]

        ]);

        if(!empty($data["user_id"])) {
            $order->user_id = $data["user_id"];
        }

        if(!empty($data["products"])){
            $order->items()->createMany($data['products']);
        }

        Session::forget("cart");


        return $order;
    }





}
