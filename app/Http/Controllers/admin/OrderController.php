<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Services\MainService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class OrderController extends AdminController
{
    private ProductService $productService;

    public function __construct(ProductService $productService, MainService $mainService)
    {
        parent::__construct($mainService);
        $this->modelName = "orders";
        $this->productService = $productService;
    }

    public function editOrder($order_id)
    {
        $order = Order::find($order_id);
        $statuses = OrderStatus::all();

        return $this->proccessView('admin.orders.index', array(
                "order" => $order,
                "statuses" => $statuses,
                )
        );
    }

    public function updateOrder(Request $request, $order_id)
    {
        $status_id = $request->input('status_id');
        $updatedData = ['order_id' => $order_id, 'status_id' => $status_id];
        $this->productService->changeOrderStatus($updatedData);

        return redirect()->route("user.admin.index", "orders")
            ->with("message", "Зміни збереженні");
    }

    public function cancelOrder($id)
    {
        $this->productService->cancelOrder($id);
        return redirect()->back();
    }
}
