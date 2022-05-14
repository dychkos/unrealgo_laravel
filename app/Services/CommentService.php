<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Validator;

class CommentService
{

    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store($data)
    {
        $validated = Validator::make($data,[
            "user_id"=>["required","integer"],
            "article_id"=>["sometimes", "string"],
            "product_id"=>["sometimes" ,"string"],
            "body"=>["required","string","max:255","min:8"],
            "answered_to"=>["sometimes","required","string"]
        ])->validate();
        return $this->commentRepository->store($validated);
    }

    public function like($data)
    {
        $validated = Validator::make($data, [
            "user_id"=>["required","integer"],
            "model"=>["required", "integer"],
            "isAnswer"=>["sometimes", "required"],
        ])->validate();

        return $this->commentRepository->like($validated);
    }

}
