<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    public function index(Request $request) {

        $new = [];
        $popular = [];

        $allowSorts = Product::getSorts();
        $query = Product::query();

        if($request->filled("order")){

            $orderBy = $request->input("order");

            switch ($orderBy) {
                case "price-high-low" : {
                    $query->orderByDesc("price");
                    break;
                }
                case "price-low-high" : {
                    $query->orderBy("price");
                    break;
                }
                default:
                    break;
            }
        }

        if($query->paginate()->currentPage() == 1) {
            $new = Product::orderBy("created_at")->limit(10)->get();
            $popular = Product::orderBy("created_at")->limit(10)->get();
        }

        $products = $query->paginate(3)->appends(request()->query());


        return $this->withUser("store.index", array(
            "new" => $new,
            "popular" => $popular,
            "products" => $products,
            "allowSorts" => $allowSorts
        ));


    }


    public function show(Request $request, $product_id) {
        $product = Product::find($product_id);

        return $this->withUser("store.show", array(
            'product' => $product
        ));
    }

    public function like(ProductService $productService, Request $request)
    {

        $data = $request->all();
        $user_id = ['user_id' => Auth::user()->id];
        $product_id = ['product_id' => intval($request->input("product_id"))];

        $data = array_merge($product_id, $user_id);

        try {
            $productService->like($data);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse(['changed' => "true"],"Success");
    }

    public function addToBasket(Request $request)
    {

    }


}
