<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $popular = Article::find(4);
        $randomArticles = Article::inRandomOrder()->limit(2)->get();

        return view('home.index', compact('popular', 'randomArticles'));
    }
}
