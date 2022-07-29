<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Helpers\Helper;
use App\Models\Order;
use App\Models\Product;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('user.user-profile', compact('user'));
    }

    public function liked(Request $request)
    {
        $liked = Auth::user()->likedProducts;
        $recommended = Product::whereNotIn("id", Auth::user()->likedProducts()->pluck("product_id")->toArray())->get();

        $summa = 0;

        $user = null;
        if(Auth::check()){
            $user = Auth::user();
        }

        foreach ($liked as $product){
            $summa += $product->currentPrice();
        }

        return view('user.liked', compact("liked", "summa", "user", "recommended"));
    }

    public function orderHistory(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where("user_id", $user->id)->orderByDesc("created_at")->get();

        $waiting =  Order::where("user_id", $user->id)
            ->where("order_status_id", [1, 2, 3])
            ->orderByDesc("created_at")
            ->get();

        $ready =  Order::where("user_id", $user->id)
            ->where("order_status_id", [4])
            ->orderByDesc("created_at")
            ->get();

        $canceled =  Order::where("user_id", $user->id)
            ->where("order_status_id", [5])
            ->orderByDesc("created_at")
            ->get();


        return view('user.order-history', compact("orders","waiting", "ready", "canceled"));
    }

    public function clearLiked(UserService $userService, Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $userService->clearLiked($user->id);

        return redirect()->back();
    }


    public function update(UserService $userService, Request $request)
    {
        $image_url = [];

        if($file = $request->file('image')) {
            $image_url = Helper::upload_image(array($file), Auth::user());
        }

        $processed = ControllerHelper::addOnlyExists($request->all());

        $processed['notification'] = array_key_exists("notification", $processed);

        $updatedUser = array_merge($processed,array(
            'id' => Auth::user()->id,
            'image' => $image_url,
        ));

        $userService->update($updatedUser);

        return redirect()->back()->with('message', 'Особисті дані оновленні!');
    }

    public function delete(UserService $userService, Request $request, $userId) {
        if(Auth::user()->id == $userId) {
            $userService->delete($userId);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $this->sendResponse(["success" => true], 'Successful removed');
    }


}
