<?php

namespace App\Services;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ProductResource;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\SearchRepository;
use Illuminate\Validation\ValidationException;

class MainService
{
    protected SearchRepository $searchRepository;

    public function __construct(
        SearchRepository $searchRepository,
    )
    {
        $this->searchRepository = $searchRepository;
    }

    public array $activeModels = [
        'articles' => 'Статі',
        'orders' => 'Замовлення',
        'products' => 'Товари',
        'comments' => 'Коментарі',
        'pages' => 'Сторінки',
        'users' => 'Користувачі',
    ];

    /**
     * @throws ValidationException
     */
    public function doSearch($search): array
    {
        if (empty($search)) {
            throw ValidationException::withMessages(["message" => "Введіть слово для пошуку"]);
        }

        $result = $this->searchRepository->doSearch($search);

        return [
            "articles" => ArticleResource::collection($result[0]),
            "products" => config('app.env') != 'production' ? ProductResource::collection($result[1]) : []
        ];
    }

    public function doSearchByModelName($modelName, $search) {
        $model = $this->getModelQueryByName($modelName);
        return $this->searchRepository->doSearchByModel($model, $search);
    }

    public function getModelQueryByName($modelName): \Illuminate\Database\Eloquent\Builder
    {
        return match ($modelName) {
            'articles' => Article::query(),
            'users' => User::query(),
            'orders' => Order::query(),
            'products' => Product::query(),
            'comments', 'pages' => Comment::query(),
        };
    }

    public function getStatistics() {
        return array(
            'articles-count' => Article::all()->count(),
            'user-count' => User::all()->count(),
            'order-count' => Order::all()->count(),
        );
    }



}
