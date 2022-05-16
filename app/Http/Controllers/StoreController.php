<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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


    public function show(Request $request, $product_id, ProductService $productService) {
        $product = Product::find($product_id);

        //Session::forget("cart");
        $cart = Session::get('cart');
        $inCart = $productService->checkInCart($cart, $product->id);

        return $this->withUser("store.show", array(
            'product' => $product,
            'inCart' => $inCart
        ));
    }

    public function basket(ProductService $productService, Request $request)
    {
        $cart = Session::get("cart");

        return view('user.basket', compact("cart"));
    }

    public function like(ProductService $productService, Request $request)
    {

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

    public function addToCart(Request $request, ProductService $productService): \Illuminate\Http\JsonResponse
    {
        $cartData = array_merge($request->all(), ["count" => 1]);

        try {
            $result = $productService->addToCart($cartData);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse(json_decode($result),"Created successful");

    }

    public function editCount(ProductService $productService, Request $request) {
        try {
            $result = $productService->editCount($request->all());
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse($result,"Success");
    }

    public function removeFromCart(Request $request, $basketItemId): \Illuminate\Http\RedirectResponse
    {

        $cart = Session::get("cart");
        array_splice($cart, $basketItemId,1);
        Session::put("cart", $cart);

        return redirect()->back();

    }

    public function makeOrder(Request $request, ProductService $productService) {
        $order = $productService->makeOrder($request->all());

        return redirect()->back()->with('message', 'Ваше замовлення успішно сформоване');
    }




}
