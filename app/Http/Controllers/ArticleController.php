<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Article::query();
        $activeCategory = null;
        $allowSorts = Article::getSorts();

        if($categorySlug = $request->route('category_slug')){
            $activeCategory = Category::where('slug', $categorySlug)->first();
            $query = $query->where('category_id', $activeCategory->id);
        }

        if($request->filled("order")){
            $orderBy = $request->input("order");
            $query = $this->setupSort($orderBy, $query);
        }

        $articles = $query->paginate(2)->appends(request()->query());


        return view('articles.index', compact("categories", "articles", "activeCategory", "allowSorts"));
    }


    public function show($category_slug, $article_slug)
    {
        $article = Article::where("slug", $article_slug)->first();
        $stock = Product::orderBy("price")->limit(2)->get();

        $categories = Category::all();

        return $this->withUser('articles.show', array(
            "article" => $article,
            "stock" => $stock,
            "categories" => $categories
        ));
    }

    public function showByCategory($categorySlug, Request $request)
    {
        $activeCategory = Category::where('slug', $categorySlug)->first();

        $query = Article::query();

        if($request->filled("order")){
            $orderBy = $request->input("order");
            $query = $this->setupSort($orderBy, $query);
        }

        $articles = $query->where('category_id', $activeCategory->id)->paginate(3)->withPath("?".$request->getQueryString());
        $categories = Category::all()->except($activeCategory->id);

        return view('articles.index', compact("articles","categories", "activeCategory"));

    }

    private function setupSort($orderBy, $query)
    {
        switch ($orderBy) {
            case "popular":
                $query->orderByDesc("views");
                break;
            case "date":
                $query->orderBy("created_at");
                break;
            default:
                break;
        }

        return $query;
    }
}
