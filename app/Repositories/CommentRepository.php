<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Comment;

class CommentRepository
{
    private Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($commentData)
    {
        return Article::find($commentData['article_id'])->comments()->create($commentData);
    }

    public function delete($commentID)
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
