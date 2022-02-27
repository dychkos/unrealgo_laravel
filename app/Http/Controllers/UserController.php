<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request) {
        return view('user.user-profile');
    }

    public function liked(Request $request) {
        return view('user.liked');
    }

    public function orderHistory(Request $request) {
        return view('user.order-history');
    }

    public function basket(Request $request) {
        return view('user.basket');
    }
}
