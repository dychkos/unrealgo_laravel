<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function store(CommentService $commentService, Request $request)
    {

        $processed = ControllerHelper::addOnlyExists($request->all());

        $processed['user_id'] = Auth::user()->id;

        $commentService->store($processed);

        return redirect()->back();

    }

    public function like(CommentService $commentService, Request $request)
    {
        $data = $request->all();
        $user_id = ['user_id' => Auth::user()->id];

        $data = array_merge($data, $user_id);

        try {
            $likesCount = $commentService->like($data);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message, $exception->errors(), $exception->status);
        }

        return $this->sendResponse(['likes' => $likesCount],"Success");
    }

}
