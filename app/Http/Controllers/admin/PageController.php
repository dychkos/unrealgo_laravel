<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use App\Models\Page;
use App\Services\CommentService;
use App\Services\MainService;
use Illuminate\Http\Request;

class PageController extends AdminController
{
    protected PageService $pageService;

    public function __construct(MainService $mainService, PageService $pageService)
    {
        parent::__construct($mainService);
        $this->modelName = "comments";
        $this->pageService = $mainService;
    }

    public function editPage($page_id)
    {
        $page = Page::find($page_id);

        return $this->proccessView('admin.pages.index', array(
            "page" => $page
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
