<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\MainService;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    protected string $modelName;
    protected MainService $mainService;

    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    public function index($modelName = "articles")
    {
        $paginateCount = 5;
        $this->modelName = $modelName;

        $models = $this->mainService
            ->getModelQueryByName($modelName)
            ->orderByDesc("created_at")
            ->paginate($paginateCount);

        return $this->proccessView("admin.index", array("models" => $models));
    }

    public function search(Request $request, $modelName) {
        $searchValue = $request->input('search');
        $this->modelName = $modelName;

        $models = $this->mainService->doSearchByModelName($modelName, $searchValue);
        return $this->proccessView("admin.index",
            array("models" => $models),
            'Результати для: ' . $searchValue
        );
    }

    protected function proccessView($viewName, $data, $message = "") {
        $ready = array_merge($data, [
            "modelName" => $this->modelName,
            "activeModels" => $this->mainService->activeModels
        ]);

        if ($message) return view($viewName, $ready)->with("message", $message);

        return view($viewName, $ready);
    }

}
