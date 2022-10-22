<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Article::query();
        $activeCategory = null;
        $allowSorts = Article::getSorts();

        if ($categorySlug = $request->route('category_slug')) {
            $activeCategory = Category::where('slug', $categorySlug)->first();
            $query = $query->where('category_id', $activeCategory->id);
        }

        if ($request->filled("order")){
            $orderBy = $request->input("order");
            $query = $this->setupSort($orderBy, $query);
        }
        $query = $this->setupSort('date-new', $query);
        $articles = $query->paginate(4)->appends(request()->query());

        return view('articles.index', compact("categories", "articles", "activeCategory", "allowSorts"));
    }


    public function show($category_slug, $article_slug)
    {
        $article = Article::where("slug", $article_slug)->first();
        $stock = Product::orderBy("price")->limit(2)->get();

        $this->articleService->incrementViews($article->id);

        $categories = Category::all();

        return $this->withUser('articles.show', array(
            "article" => $article,
            "stock" => $stock,
            "categories" => $categories
        ));
    }


    private function setupSort($orderBy, $query)
    {
        switch ($orderBy) {
            case "popular":
                $query->orderByDesc("views");
                break;
            case "date-old":
                $query->orderBy("created_at");
                break;
            default:
                $query->orderByDesc("created_at");
                break;
        }
        return $query;
    }
}
