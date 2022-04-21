<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $popular = Article::find(4);
        $randomArticles = Article::inRandomOrder()->limit(2)->get();
        $popularProducts = Product::orderBy("created_at")->limit(10)->get();

        return $this->withUser('home.index', array(
            "popular" => $popular,
            "randomArticles" => $randomArticles,
            "popularProducts" => $popularProducts,
        ));
    }
}
