<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use App\Services\ApiNovaPoshtaService;
use App\Services\MailService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    private ProductService $productService;
    private MailService $mailService;

    public function __construct(
        ProductService $productService,
        MailService $mailService
    ) {
        $this->productService = $productService;
        $this->mailService = $mailService;
    }

    public function home(Request $request): View
    {
        $query = Product::query();
        $new = [];
        $popular = [];

        $products = $query->paginate(3)->appends(request()->query());

        if ($query->paginate()->currentPage() === 1) {
            $new = Product::orderBy("created_at")->limit(10)->get();
            $popular = Product::orderBy("created_at")->limit(10)->get();
        }

        return $this->withUser("store.index", array(
            "new" => $new,
            "popular" => $popular,
            "products" => $products,
            "activeType" => null,
            "types" => Type::all(),
            "allowSorts" =>  Product::getSorts()
        ));

    }

    public function index(Request $request, $typeSlug = ''): View|RedirectResponse
    {
        if (!$typeSlug && !$request->filled("order")) {
            return redirect()->route('home');
        }

        $activeType = Type::where('slug', $typeSlug)->first();
        $query = $this->productService->applyFilterAndSort($activeType, $request->input('order'));
        $products = $query->paginate(3)->appends(request()->query());

        return $this->withUser("store.index", array(
            "new" => [],
            "popular" => [],
            "products" => $products,
            "activeType" => $activeType,
            "types" => Type::all(),
            "allowSorts" => Product::getSorts()
        ));


    }

    public function show(Request $request, $product_slug, $product_id)
    {
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
        } catch (ValidationException $exception){
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

    public function editCount(Request $request)
    {
        try {
            $result = $this->productService->editCount($request->all());
        } catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse($result,"Success");
    }

    public function removeFromCart(Request $request, $basketItemId): RedirectResponse
    {

        $cart = Session::get("cart");
        array_splice($cart, $basketItemId,1);
        Session::put("cart", $cart);

        return redirect()->back();

    }

    public function makeOrder(Request $request)
    {
        $data = $request->all();
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $data = array_merge($data, ["user_id" => $user_id]);
        }

        try {
            $order = $this->productService->makeOrder($data);
            $this->mailService->makeOrder($order);
        } catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse($order,"Success");

    }

    public function cancelOrder(Request $request, $order_id)
    {
        $canceled = $this->productService->cancelOrder($order_id);
        if ($canceled) {
            $this->mailService->cancelOrder($canceled);
        }

        return redirect()->back();
    }

}
