<?php

namespace App\Services;

use App\Enums\OrdersStatusesEnum;
use App\Enums\OrderStatuses;
use App\Helpers\Helper;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    private ProductRepository $productRepository;
    private OrderRepository $orderRepository;
    private MailService $mailService;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        MailService $mailService
    )
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->mailService = $mailService;
    }

    public function store($data)
    {
        $validated = Validator::make($data, [
            'images' => ['required', 'array'],
            'sizes' => ['required', 'array'],
            'type_id' => ['required', 'int'],
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

    public function applyFilterAndSort(Type $filterType = null, string $orderBy = null) {
        $productsQuery = Product::query();

        if ($filterType) {
            $productsQuery = $productsQuery->where('type_id', $filterType->id);
        }

        if ($orderBy) {
            switch ($orderBy) {
                case "price-high-low" : {
                    $productsQuery->orderByDesc("price");
                    break;
                }
                case "price-low-high" : {
                    $productsQuery->orderBy("price");
                    break;
                }
                default:
                    break;
            }
        }

        return $productsQuery;
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

        if (intval($validated["size_id"]) === -1) {
            $validated['size_id'] = Size::where("value", "NO_SIZE")->first()->id;
        }

        $cart = Session::get("cart");
        $index = $this->findInCart($validated);
        $sizeId = intval($validated["size_id"]) === -1
            ? Size::where("value", "NO_SIZE")->first()->id
            : $validated["size_id"];

        if($index != -1) {
            $cart[$index] = array(
                "product_id" => $validated["product_id"],
                "size_id" => $sizeId,
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

    public function cancelOrder($order_id): Order | bool
    {
        if (isset($order_id)) {
            return $this->orderRepository->cancelOrder($order_id);
        }
        return false;
    }

    public function changeOrderStatus($data)
    {
        $validated = Validator::make($data, [
            "order_id"     => ["required", "integer"],
            "status_id"    => ["required", "integer"],
            "invoice_code" => ["sometimes", "sometimes"]
        ])->validate();

        $updated = $this->orderRepository->changeStatus($validated);
        if ($updated->order_status_id == OrdersStatusesEnum::SENT) {
            $this->mailService->sentOrder($updated);
        }
        return $updated;
    }

    public function editCount($data) {
        $validated = Validator::make($data, [
            "index"     => ["required", "string"],
            "decrement" => ["required", "string"],
        ])->validate();

        $index = $validated["index"];
        $cart = Session::get("cart");

        if (Helper::stringToBool($validated["decrement"])) {
            if ($cart[$index]["count"] - 1 > 0) {
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
        if(empty($cart) || !$product_id){
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
