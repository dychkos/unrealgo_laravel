<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ControllerHelper;
use App\Helpers\Helper;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use App\Services\MainService;
use Illuminate\Http\Request;

/*
 * Describes actions for Article in Admin Panel
 * */
class ArticleController extends AdminController
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService, MainService $mainService)
    {
        parent::__construct($mainService);
        $this->modelName = "articles";
        $this->articleService = $articleService;
    }

    public function createArticle()
    {
        $categories = Category::all();

        return $this->proccessView('admin.articles.create', array(
            "allowSorts" => $categories
        ));
    }

    public function editArticle($article_id)
    {
        $article = Article::find($article_id);
        $categories = Category::all();

        return $this->proccessView('admin.articles.edit', array(
            "article" => $article,
            "categories" => $categories
        ));
    }

    public function storeArticle(Request $request)
    {
        $image_url = [];

        if($file = $request->file('image'))
        {
            $image_url = Helper::upload_image(array($file));
        }
        $processed = ControllerHelper::addOnlyExists($request->all());

        $newArticle = array_merge(
            $processed,
            ['image' => $image_url],
            ['slug' => Helper::createSlug($request->input('slug')) ?? '']
        );

        $this->articleService->store($newArticle);

        return redirect()->route("user.admin.index", "articles")
            ->with("message", "Нова публікація створена");
    }

    public function updateArticle(Request $request, $article_id)
    {
        $image_url = [];

        if($file = $request->file('image')) {
            $image_url = Helper::upload_image(array($file), Article::find($article_id));
        }

        $processed = ControllerHelper::addOnlyExists($request->all());

        $updatedArticle = array_merge($processed,
            [
                'image' => $image_url,
                'article_id' => $article_id,
                'slug' => Helper::createSlug($request->input('slug')) ?? ''
            ]
        );

        $this->articleService->update($updatedArticle);

        return redirect()->route("user.admin.index", "articles")
            ->with("message", "Зміни збереженні");
    }

    public function deleteArticle($id)
    {
        $this->articleService->delete($id);

        return redirect()->back()
            ->with("message", "Публікацію видалено");
    }

}
