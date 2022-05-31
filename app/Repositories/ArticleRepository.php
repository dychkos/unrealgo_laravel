<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    protected Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function store($data)
    {
        $article = $this->article::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'body' => $data['body'],
            'category_id' => $data['category_id']
        ]);

        if(!empty($data["image"])){
            if($article->image()->get()->isNotEmpty()){
                $article->image()->delete();
            }
            $article->image()->create($data['image'][0]);
        }

        return $article;
    }

    public function update($data)
    {
        $article = $this->article->find($data['article_id']);

        if(!empty($data["image"])){
            $article->image()->delete();
            $article->image()->create($data['image'][0]);
        }

        $article->update($data);
        return $article->fresh();
    }

    public function delete($article_id): int
    {
        return $this->article->destroy($article_id);
    }

    public function incrementViews($article_id)
    {
        $article = $this->article->find($article_id);
        $article->views += 1;

        return $article->save();
    }



}
