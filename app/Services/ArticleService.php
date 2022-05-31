<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Validator;

class ArticleService
{
    protected ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function store($data)
    {
        $validated = Validator::make($data, [
            'image' => ['required', 'array'],
            'category_id' => ['required', 'int'],
            'slug' => ['required', 'string'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string','max:255'],
            'body' => ['required', 'string'],
        ])->validate();

        return $this->articleRepository->store($validated);
    }

    public function update($data)
    {
        $validated = Validator::make($data, [
            'category_id' => ['required', 'int'],
            'article_id' => ['required', 'int'],
            'image' => ['sometimes', 'array'],
            'slug' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'body' => ['required', 'string'],
        ])->validate();

        return $this->articleRepository->update($validated);
    }

    public function delete($data): int
    {
        return $this->articleRepository->delete($data);
    }

    public function incrementViews($article_id): bool
    {
        if($article_id){
            return $this->articleRepository->incrementViews($article_id);
        }

        return false;

    }
}
