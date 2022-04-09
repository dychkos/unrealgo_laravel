<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request) {

        $new = Product::orderBy("created_at")->limit(10)->get();
        $popular = Product::orderBy("created_at")->limit(10)->get();
        $products = Product::paginate(8);

        return view('store.index', compact("new", "popular", "products"));
    }

    public function show(Request $request) {
        return view('store.show');
    }
}
