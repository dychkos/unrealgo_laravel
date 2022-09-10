<?php

namespace App\Repositories;

use App\Enums\OrdersStatusesEnum;
use App\Enums\OrderStatuses;
use App\Models\BasketItem;
use App\Models\Order;
use App\Models\OrderStatus;
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
            "department" => $data["department"]

        ]);


        if(!empty($data["user_id"])) {
            $order->user_id = $data["user_id"];
        }

        if(!empty($data["products"])) {
            $order->items()->createMany($data['products']);
            $order->total_price = $data['total_price'];
            $this->updateProductsCount($data["products"]);
        }
        Session::forget("cart");
        $order->save();
        Session::put("order", $order);

        return $order;
    }

    public function changeStatus($data) {
        $order = Order::find($data['order_id']);
        $order->order_status_id = $data['status_id'];

        switch ($order->order_status_id) {
            case OrdersStatusesEnum::CANCELED: {
                $this->updateProductsCount($this->order->items, true);
                break;
            }
            case OrdersStatusesEnum::SENT: {
                $order = $this->setInvoiceCode($data['invoice_code'], $order);
                break;
            }
            default:
                break;
        }

        $order->save();
        return $order;
    }

    public function cancelOrder($order_id) {
        $order = Order::find($order_id);
        $order->order_status_id = OrderStatus::where("value", "canceled")->get()->first()->id;
        $this->updateProductsCount($order->items, true);
        $order->save();

        return $order;
    }

    private function updateProductsCount($orderProducts, $increase = false) {
        foreach ($orderProducts as $item) {
            $product = Product::find($item['product_id']);
            $size = $product->sizes()->find($item['size_id']);
            $currentCount = $size->pivot->count;
            $product->sizes()->updateExistingPivot($size, ['count'=> $increase
                ? $currentCount + $item['count']
                : $currentCount - $item['count']
            ]);
        }
    }

    private function setInvoiceCode($invoice, $order)
    {
       $order->invoice_code = $invoice;
       $order->save();

       return $order;
    }



}
