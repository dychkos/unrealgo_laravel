<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request) {
        return view('articles.index');
    }

    public function show(Request $request) {
        return view('articles.show');
    }
}
