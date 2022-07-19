<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use App\Services\CommentService;
use App\Services\MainService;
use Illuminate\Http\Request;

class CommentController extends AdminController
{
    protected CommentService $commentService;

    public function __construct(MainService $mainService, CommentService $commentService)
    {
        parent::__construct($mainService);
        $this->commentService = $commentService;
    }

    public function editComment($comment_id)
    {
        $comment = Comment::find($comment_id);

        return view('admin.comments.index', array(
                "comment" => $comment
        ));
    }

    public function updateComment(Request $request, $comment_id)
    {
        $updatedData = array_merge($request->all(), ['id' => $comment_id]);
        $this->commentService->update($updatedData);

        return redirect()->route("user.admin.index", "comments")
            ->with("message", "Зміни збереженні");
    }

    public function deleteComment($id)
    {
        $this->commentService->delete($id);
        return redirect()->back()
            ->with("message", "Коментар видалено");
    }

    public function toggleCommentStatus($id)
    {
        $status = $this->commentService->toggleStatus($id);
        $message = $status ? "Опубліковано" : "Сховано";

        return redirect()->back()
            ->with("message", $message);
    }

}
