<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request) {
        return view('store.index');
    }

    public function show(Request $request) {
        return view('store.show');
    }
}
