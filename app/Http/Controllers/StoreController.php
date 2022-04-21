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

        $new = Product::orderBy("created_at")->limit(10)->get();
        $popular = Product::orderBy("created_at")->limit(10)->get();

        $query = Product::query();

        if($request->filled("order")){
            $new = [];
            $popular = [];

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

        $products = $query->paginate(3)->withPath("?".$request->getQueryString());


        return $this->withUser("store.index", array(
            "new" => $new,
            "popular" => $popular,
            "products" => $products
        ));


    }


    public function show(Request $request) {
        return view('store.show');
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


}
