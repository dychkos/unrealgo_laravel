<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Helpers\Helper;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Role;
use App\Models\Size;
use App\Models\Type;
use App\Models\User;
use App\Services\ArticleService;
use App\Services\CommentService;
use App\Services\MainService;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected MainService $mainService;
    protected CommentService $commentService;
    protected ProductService $productService;
    protected UserService $userService;
    protected ArticleService $articleService;

    public function __construct (
        MainService $mainService,
        CommentService $commentService,
        ProductService $productService,
        ArticleService $articleService,
        UserService $userService
    )
    {
        $this->mainService = $mainService;
        $this->commentService = $commentService;
        $this->productService = $productService;
        $this->userService = $userService;
        $this->articleService = $articleService;
    }

    public function index($modelName = 'articles')
    {
        $paginateCount = 5;

        $models = $this->mainService->getModelQueryByName($modelName)->orderByDesc("created_at")->paginate($paginateCount);
        $activeModels = $this->mainService->activeModels;

        return view("admin.index", compact('models', 'modelName', 'activeModels'));
    }

    public function search(Request $request, $modelName) {
        $searchValue = $request->input('search');

        $models = $this->mainService->doSearchByModelName($modelName, $searchValue);
        $activeModels = $this->mainService->activeModels;

        return view(
            "admin.index",
            compact('models', 'modelName', 'activeModels')
        )->with("message", 'Результати для: ' . $searchValue);
    }

    /* Articles */
    public function createArticle(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $activeModels = $this->mainService->activeModels;
        $modelName = 'articles';

        return view('admin.articles.create', compact('categories', 'activeModels', 'modelName'));
    }

    public function editArticle($article_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $article = Article::find($article_id);
        $categories = Category::all();
        $activeModels = $this->mainService->activeModels;
        $modelName = 'articles';

        return view('admin.articles.edit', compact('categories', 'activeModels', 'modelName', 'article'));
    }

    public function storeArticle(Request $request): \Illuminate\Http\RedirectResponse
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

        return redirect()->route("user.admin.index", "articles")->with("message", "Нова публікація створена");
    }

    public function updateArticle(Request $request, $article_id): \Illuminate\Http\RedirectResponse
    {
        $image_url = [];

        if($file = $request->file('image')) {
            $image_url = Helper::upload_image(array($file));
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

        return redirect()->route("user.admin.index", "articles")->with("message", "Зміни збереженні");
    }

    public function deleteArticle($id): \Illuminate\Http\RedirectResponse
    {
        $this->articleService->delete($id);
        return redirect()->back()->with("message", "Публікацію видалено");
    }

    /* Products */
    public function createProduct(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();
        $sizes = Size::all();
        $activeModels = $this->mainService->activeModels;
        $modelName = 'products';

        return view('admin.products.create', compact('types', 'sizes', 'activeModels', 'modelName'));
    }

    public function editProduct($product_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::find($product_id);
        $types = Type::all();
        $sizes = Size::all();
        $activeModels = $this->mainService->activeModels;
        $modelName = 'products';

        return view('admin.products.edit', compact(
            'product',
            'types',
            'sizes',
            'activeModels',
            'modelName')
        );
    }

    public function storeProduct(Request $request): \Illuminate\Http\RedirectResponse
    {
        $images = [];

        if($files = $request->file('image'))
        {
            $images = Helper::upload_image($files);
        }

        $processed = ControllerHelper::addOnlyExists($request->all());

        $newProduct = array_merge(
            $processed,
            ['images' => $images],
            ['slug' => Helper::createSlug($request->input('slug')) ?? '']
        );

        $this->productService->store($newProduct);

        return redirect()->route("user.admin.index", "products")->with("message", "Новий товар створено");
    }

    public function updateProduct(Request $request, $article_id): \Illuminate\Http\RedirectResponse
    {
        $images = [];

        if($files = $request->file('image'))
        {
            $images = Helper::upload_image($files);
        }

        $processed = ControllerHelper::addOnlyExists($request->all());
        $updatedProduct = array_merge($processed,
            [
                'images' => $images,
                'product_id' => $article_id,
            ]
        );

        $this->productService->update($updatedProduct);

        return redirect()->route("user.admin.index", "products")->with("message", "Зміни збереженні");
    }

    public function deleteProduct($id): \Illuminate\Http\RedirectResponse
    {
        $this->productService->delete($id);
        return redirect()->back()->with("message", "Товар видалено");
    }

    /* Orders */
    public function editOrder($order_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::find($order_id);
        $statuses = OrderStatus::all();
        $modelName = 'orders';
        $activeModels = $this->mainService->activeModels;

        return view('admin.orders.index', compact(
                'order',
                'statuses',
                'activeModels',
                'modelName')
        );
    }

    public function updateOrder(Request $request, $order_id): \Illuminate\Http\RedirectResponse
    {
        $status_id = $request->input('status_id');
        $updatedData = ['order_id' => $order_id, 'status_id' => $status_id];
        $this->productService->changeOrderStatus($updatedData);

        return redirect()->route("user.admin.index", "orders")->with("message", "Зміни збереженні");
    }

    public function cancelOrder($id): \Illuminate\Http\RedirectResponse
    {
        $this->productService->cancelOrder($id);
        return redirect()->back();
    }

    /* Users */
    public function editUser($user_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($user_id);
        $roles = Role::all();
        $modelName = 'users';
        $activeModels = $this->mainService->activeModels;

        return view('admin.users.index', compact(
                'user',
                'roles',
                'activeModels',
                'modelName')
        );
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateUser(Request $request, $user_id): \Illuminate\Http\RedirectResponse
    {
        $role_id = $request->input('role_id');

        $updatedData = ['user_id' => $user_id, 'role_id' => $role_id];
        $this->userService->changeRole($updatedData);

        return redirect()->route("user.admin.index", "users")->with("message", "Зміни збереженні");
    }

    public function toggleUserStatus($id): \Illuminate\Http\RedirectResponse
    {
        $status = $this->userService->toggleStatus($id);
        $message = $status ? "Розблоковано" : "Заблоковано";

        return redirect()->back()->with("message", $message);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function deleteUser($id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->delete($id);
        return redirect()->back();
    }

    /* Comments */
    public function editComment($comment_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $comment = Comment::find($comment_id);
        $modelName = 'comments';
        $activeModels = $this->mainService->activeModels;

        return view('admin.comments.index', compact(
                'comment',
                'activeModels',
                'modelName')
        );
    }

    public function updateComment(Request $request, $comment_id): \Illuminate\Http\RedirectResponse
    {
        $updatedData = array_merge($request->all(), ['id' => $comment_id]);
        $this->commentService->update($updatedData);

        return redirect()->route("user.admin.index", "comments")->with("message", "Зміни збереженні");
    }

    public function deleteComment($id): \Illuminate\Http\RedirectResponse
    {
        $this->commentService->delete($id);
        return redirect()->back()->with("message", "Коментар видалено");
    }

    public function toggleCommentStatus($id): \Illuminate\Http\RedirectResponse
    {
        $status = $this->commentService->toggleStatus($id);
        $message = $status ? "Опубліковано" : "Сховано";

        return redirect()->back()->with("message", $message);
    }








}
