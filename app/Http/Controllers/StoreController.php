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
        $products = Product::paginate(8);

        $user = null;
        if(Auth::check()){
            $user = Auth::user();
        }


//        return $this->withUser("store.index", array(
//            "new" => $new,
//            "popular" => $popular,
//            "products" => $products
//        ));

        return view("store.index", compact("new", "popular", "products", "user"));
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
