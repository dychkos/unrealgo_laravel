<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Helpers\Helper;
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

    public function clearLiked(UserService $userService, Request $request)
    {
        $user = Auth::user();
        $userService->clearLiked(["user_id" => $user->id]);

        return redirect()->back();
    }

    public function orderHistory(Request $request)
    {
        return view('user.order-history');
    }

    public function basket(Request $request)
    {
        return view('user.basket');
    }

    public function update(UserService $userService, Request $request)
    {
        $image_url = [];

        if($file = $request->file('image')) {
            $image_url = Helper::upload_image(array($file));
        }

        $processed = ControllerHelper::addOnlyExists($request->all());

        $processed['notification'] = array_key_exists("notification", $processed);

        $updatedUser = array_merge($processed,array(
            'id' => Auth::user()->id,
            'image' => $image_url,
        ));

        $userService->update($updatedUser);

        return redirect()->back()->with('message', 'Личные данные успешно изменены!');
    }

    public function delete(UserService $userService, $request) {
        $userID = $request->input('id');

        $userService->delete($userID);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


}
