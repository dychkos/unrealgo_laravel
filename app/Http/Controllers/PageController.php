<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Services\MainService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PageController extends Controller
{
    protected MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    public function home(Request $request){

        $popular = Article::orderByDesc("views")->first();
        $randomArticles = Article::inRandomOrder()->limit(2)->get();
        $popularProducts = Product::orderBy("created_at")->limit(10)->get();

        return $this->withUser('home.index', array(
            "popular" => $popular,
            "randomArticles" => $randomArticles,
            "popularProducts" => $popularProducts,
        ));
    }

    public function about(Request $request)
    {
        $statistics = $this->mainService->getStatistics();

        return view('about.index', ["statistics" => $statistics]);
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $search = $request->input("search_text");

        try {
            $result = $this->mainService->doSearch($search);
        } catch (ValidationException $exception) {
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse($result,"Found successful");

    }
}
