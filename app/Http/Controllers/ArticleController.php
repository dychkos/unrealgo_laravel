<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request, $sortBy = "")
    {
        $categories = Category::all();

        $articles = Article::paginate(2);

        return view('articles.index', compact("categories", "articles"));
    }


    public function show($category_slug, $article_slug)
    {
        $article = Article::where("slug", $article_slug)->first();
        $categories = Category::all();

        return view('articles.show', compact('article', 'categories'));
    }

    public function showByCategory($categorySlug)
    {

        $activeCategory = Category::where('slug', $categorySlug)->first();

        $articles = Article::where('category_id', $activeCategory->id)->get();

        $categories = Category::all();

        return view('articles.index', compact("articles","categories", "activeCategory"));

    }

    public function sort($sort = "date")
    {
        $articles = match ($sort) {
            "popular" => Article::all()->sortByDesc("views"),
            default => Article::all(),
        };



    }
}
