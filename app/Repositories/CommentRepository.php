<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Product;

class CommentRepository
{
    private Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($commentData)
    {
        return match (true) {
            isset($commentData['article_id']) => Article::find($commentData['article_id'])->comments()->create($commentData),
            isset($commentData['product_id']) => Product::find($commentData['product_id'])->comments()->create($commentData),
            default => null,
        };

    }

    public function delete($commentID): int
    {
        $comment = $this->comment;

        return $comment->destroy($commentID);
    }

    public function like($data)
    {
        $data['like_id'] = intval($data['model']);

        $model = Comment::find($data['like_id']);

        if($model->likes()->where('user_id', $data['user_id'])->first() == null) {
            $model->likes()->create($data);
        }else{
            $model->likes()->where('user_id', $data['user_id'])->delete();
        }

        return $model->likes()->get()->count();

    }

}
