<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Article;
use App\Models\Page;
use App\Models\Product;
use App\Services\MainService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $newArticles = Article::orderByDesc("created_at")->limit(2)->get();
        $popularProducts = Product::orderBy("created_at")->limit(10)->get();

        return $this->withUser('home.index', array(
            "popular" => $popular,
            "newArticles" => $newArticles,
            "popularProducts" => $popularProducts,
        ));
    }

    public function email() {
        Mail::to("dychkosergey@gmail.com")->send(new TestEmail());
        return view('emails.ordered');
        //return response()->json("ok");
    }

    public function about(Request $request)
    {
        $statistics = $this->mainService->getStatistics();

        return view('about.index', ["statistics" => $statistics]);
    }

    public function policy(Request $request)
    {
        $page = Page::where("slug", "policy")->first();
        $content = $page->content ?? "";
        return view('policy.index', compact('content'));
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
