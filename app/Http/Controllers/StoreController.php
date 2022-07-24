<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use App\Services\ApiNovaPoshtaService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    private ProductService $productService;

    public function __construct(
        ProductService $productService,
    ) {
        $this->productService = $productService;
    }

    public function index(Request $request) {

        $new = [];
        $popular = [];
        $activeType = null;

        $allowSorts = Product::getSorts();
        $types = Type::all();
        $query = Product::query();

        if($typeSlug = $request->route('type_slug')){
            $activeType = Type::where('slug', $typeSlug)->first();
            $query = $query->where('type_id', $activeType->id);
        }

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

        if (
            $query->paginate()->currentPage() == 1
            && !isset($activeType)
            && !$request->filled("order")
        ) {
            $new = Product::orderBy("created_at")->limit(10)->get();
            $popular = Product::orderBy("created_at")->limit(10)->get();
        }

        $products = $query->paginate(3)->appends(request()->query());

        return $this->withUser("store.index", array(
            "new" => $new,
            "popular" => $popular,
            "products" => $products,
            "activeType" => $activeType,
            "types" => $types,
            "allowSorts" => $allowSorts
        ));


    }

    public function show (Request $request, $product_slug, $product_id) {
        $product = Product::find($product_id);
        $cart = Session::get('cart');
        $inCart = $this->productService->checkInCart($cart, $product->id);

        return $this->withUser("store.show", array(
            'product' => $product,
            'inCart' => $inCart
        ));
    }

    public function basket(Request $request)
    {
        $cart = Session::get("cart");
        $totalPrice = 0;
        $cart && $totalPrice = $this->productService->getTotalProductPrice($cart);
        return view('user.basket', compact("cart", "totalPrice"));
    }

    public function like(Request $request)
    {

        $user_id = ['user_id' => Auth::user()->id];
        $product_id = ['product_id' => intval($request->input("product_id"))];

        $data = array_merge($product_id, $user_id);

        try {
            $this->productService->like($data);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse(['changed' => "true"],"Success");
    }

    public function addToCart(Request $request): \Illuminate\Http\JsonResponse
    {
        $cartData = array_merge($request->all(), ["count" => 1]);

        try {
            $result = $this->productService->addToCart($cartData);
        } catch (ValidationException $exception) {
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse(json_decode($result),"Created successful");

    }

    public function editCount(Request $request) {
        try {
            $result = $this->productService->editCount($request->all());
        } catch (ValidationException $exception){
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

    public function makeOrder(Request $request) {

        $data = $request->all();
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $data = array_merge($data, ["user_id" => $user_id]);
        }

        try {
            $order = $this->productService->makeOrder($data);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse($order,"Success");

    }

    public function cancelOrder(Request $request, $order_id) {

        $this->productService->cancelOrder($order_id);

        return redirect()->back();
    }

}
