<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Services\MainService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }
    public function index($modelName = 'articles'): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $paginateCount = 5;
        $models = match ($modelName) {
            'articles' => Article::paginate($paginateCount),
            'users' => User::paginate($paginateCount),
            'products' => Product::paginate($paginateCount),
            'comments', 'pages' => Comment::paginate($paginateCount),
        };

        $activeModels = $this->mainService->activeModels;

        return view("admin.index", compact('models', 'modelName', 'activeModels'));
    }


}
