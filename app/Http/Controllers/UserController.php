<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('user.user-profile',compact('user'));
    }

    public function liked(Request $request)
    {
        return view('user.liked');
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

        $processed = $this->addOnlyExists($request->all());

        $updatedUser = array_merge($processed,array(
            'id' => Auth::user()->id,
            'image' => $image_url,
        ));

        $result = $userService->update($updatedUser);

        return redirect()->back()->with('message', 'Личные данные успешно изменены!');
    }

    private function addOnlyExists($requestData){
        $processed = [];
        foreach ($requestData as $key => $value){
            if($value){
                $processed = $this->array_push_assoc($processed,$key,$value);
            }
        }
        return $processed;

    }

    private function array_push_assoc($array, $key, $value) {
        $array[$key] = $value;
        return $array;
    }

}
