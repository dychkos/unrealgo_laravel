<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\Article;
use App\Models\Comment;

class CommentRepository
{
    private Comment $comment;
    private Answer $answer;

    public function __construct(Comment $comment, Answer $answer)
    {
        $this->comment = $comment;
        $this->answer = $answer;
    }

    public function store($commentData)
    {

        if(array_key_exists('answer_for',$commentData))
        {
            $commentData['comment_id'] = $commentData['answer_for'];
            return $this->answer->create($commentData);
        }
        else
        {
            return Article::find($commentData['article_id'])->comments()->create($commentData);
        }

    }

    public function delete($commentID)
    {
        $comment = $this->comment;

        return $comment->destroy($commentID);
    }

    public function like($data)
    {
        $data['like_id'] = intval($data['model']);

        if(isset($data['isAnswer'])) {
            $model = Answer::find($data['like_id']);
        }else{
            $model = Comment::find($data['like_id']);

        }

        if($model->likes()->where('user_id', $data['user_id'])->first() == null) {
            $model->likes()->create($data);
        }else{
            $model->likes()->where('user_id', $data['user_id'])->delete();
        }

        return $model->likes()->get()->count();

    }

}
