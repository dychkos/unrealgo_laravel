<?php

namespace App\Repositories;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ProductResource;
use App\Models\Article;
use App\Models\Product;

class SearchRepository
{
    protected Product $product;
    protected Article $article;

    public function __construct(Product $product, Article $article) {
        $this->product = $product;
        $this->article = $article;
    }

    public function doSearch($search): array {

        $articles = $this->article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();

        $products = $this->product::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        return [
          "articles" => ArticleResource::collection($articles),
          "products" => ProductResource::collection($products)
        ];
    }
}
