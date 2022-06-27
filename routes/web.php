<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name("home");

//Route::get('/articles',[ArticleController::class,'index'])->name("articles.index");
Route::get('/articles/{category_slug}/{article_slug}',[ArticleController::class,'show'])->name("articles.show");
Route::get('/articles/{category_slug?}',[ArticleController::class,'index'])->name("articles.index");
Route::post('/articles/{id}/comment',[CommentController::class,'store'])->name("comment.store");

//Search
Route::post("/search", [HomeController::class, 'search'])->name("search");

//Route::get('/store',[StoreController::class,'index'])->name("store.index");
Route::get('/store/{type_slug?}',[StoreController::class,'index'])->name("store.index");
Route::get('/store/{type_slug}/{id}',[StoreController::class,'show'])->name("store.show");

//Store
Route::post('/store/add-to-cart', [StoreController::class, "addToCart"])->name("store.toCart");
Route::get('/store/clear-cart/{id}', [StoreController::class, "removeFromCart"])->name("basket.remove");
Route::get('/basket', [StoreController::class,'basket'])->name("basket");
Route::post('/basket/count', [StoreController::class, "editCount"])->name("basket.count");
Route::post('/make-order', [StoreController::class, "makeOrder"])->name("store.order");
Route::get('/cancel-order/{id}', [StoreController::class, "cancelOrder"])->name("store.cancel-order");


Route::redirect('/user','/user/profile');

Route::get('/user/profile',[UserController::class,'profile'])->name("user.profile");
Route::post('/user/profile',[UserController::class,'update'])->name("user.update");
Route::get('/user/liked',[UserController::class,'liked'])->name("user.liked");
Route::get('/user/order-history',[UserController::class,'orderHistory'])->name("user.order-history");


/* API */
Route::post('/get-cities', [ApiController::class, 'getCitites'])->name("api.cities");
Route::post('/get-warehouses', [ApiController::class, 'getWarehouses'])->name("api.warehouses");




Route::middleware("guest")->group(function(){
    Route::get('/logout', [LoginController::class,'logout'])->withoutMiddleware("guest")->name("logout");
    Route::get('/login',[LoginController::class,'index'])->name("login.index");
    Route::post('/login',[LoginController::class,'login'])->name("login.login");
    Route::get('/register',[RegisterController::class,'index'])->name("register.index");
    Route::post('/register',[RegisterController::class,'register'])->name("register.register");

    Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name("google_auth");
    Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name("google_callback");

    Route::get('/auth/facebook', [LoginController::class, 'redirectToFacebook'])->name("facebook_auth");
    Route::get('/auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name("facebook_callback");
});

Route::name("user.")->prefix("user")->middleware("auth")->group(function(){
    Route::get('profile',[UserController::class,'profile'])->name("profile");
    Route::post('profile',[UserController::class,'update'])->name("update");
    Route::delete('delete/{id}',[UserController::class,'delete'])->name("delete");

    Route::get('liked',[UserController::class,'liked'])->name("liked");
    Route::get('order-history',[UserController::class,'orderHistory'])->name("order-history");
    Route::get('basket',[UserController::class,'basket'])->name("basket");

    Route::post('comment/like', [CommentController::class,'like'])->name('comment.like');
    Route::post('product/like',[StoreController::class, 'like'])->name("product.like");
    Route::get('liked/clear', [UserController::class,'clearLiked'])->name("liked.clear");



});


/* ADMIN ROLE  */
Route::name('user.')->prefix('user')->middleware('auth')->group(function(){
    Route::name('admin.')->prefix('admin')->middleware('admin_role')->group(function(){
        Route::get("", [AdminController::class,"index"])->name("index");
        Route::get("{modelName?}", [AdminController::class,"index"])->name("index");
        Route::get("search/{modelName}", [AdminController::class, "search"])->name("search");

        /* Articles */
        Route::get("article/create", [AdminController::class, "createArticle"])->name("articles.create");
        Route::get("article/edit/{id}", [AdminController::class, "editArticle"])->name("articles.edit");
        Route::get("remove/article/{id}", [AdminController::class, "deleteArticle"])->name("articles.remove");
        Route::post("article", [AdminController::class,"storeArticle"])->name("articles.store");
        Route::post("article/{id}", [AdminController::class,"updateArticle"])->name("articles.update");

        /* Products */
        Route::get("product/create", [AdminController::class, "createProduct"])->name("products.create");
        Route::get("product/edit/{id}", [AdminController::class, "editProduct"])->name("products.edit");
        Route::get("remove/product/{id}", [AdminController::class, "deleteProduct"])->name("products.remove");
        Route::post("product", [AdminController::class,"storeProduct"])->name("products.store");
        Route::post("product/{id}", [AdminController::class,"updateProduct"])->name("products.update");

        /* Orders */
        Route::get("orders/edit/{id}", [AdminController::class, "editOrder"])->name("orders.edit");
        Route::post("orders/{id}", [AdminController::class, "updateOrder"])->name("orders.update");

        /* Users */
        Route::get("users/edit/{id}", [AdminController::class, "editUser"])->name("users.edit");
        Route::post("users/{id}", [AdminController::class, "updateUser"])->name("users.update");
        Route::get("users/{id}/toggle-status", [AdminController::class, "toggleUserStatus"])->name("users.toggle");

        /* Comments */
        Route::get("comments/edit/{id}", [AdminController::class, "editComment"])->name("comments.edit");
        Route::post("comments/{id}", [AdminController::class, "updateComment"])->name("comments.update");
        Route::get("comments/{id}/toggle-status", [AdminController::class, "toggleCommentStatus"])->name("comments.toggle");
        Route::get("remove/comment/{id}", [AdminController::class,"deleteComment"])->name("comments.remove");

        Route::get("remove/user/{id}", [AdminController::class,"deleteUser"])->name("user.remove");
        Route::get("remove/order/{id}", [AdminController::class,"cancelOrder"])->name("order.cancel");


        Route::post("features", [AdminController::class,"storeFeatures"])->name("features.store");
        Route::post("houses", [AdminController::class,"updateHouses"])->name("houses.update");

        Route::delete("features", [AdminController::class,"deleteFeatures"])->name("features.delete");
        Route::delete("comments", [AdminController::class,"deleteComments"])->name("comments.delete");
    });
});

