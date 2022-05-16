<?php

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


Route::get('/store',[StoreController::class,'index'])->name("store.index");
Route::get('/store/{id}',[StoreController::class,'show'])->name("store.show");

//Store
Route::post('/store/add-to-cart', [StoreController::class, "addToCart"])->name("store.toCart");
Route::get('/store/clear-cart/{id}', [StoreController::class, "removeFromCart"])->name("basket.remove");
Route::get('/basket', [StoreController::class,'basket'])->name("basket");
Route::post('/basket/count', [StoreController::class, "editCount"])->name("basket.count");


Route::redirect('/user','/user/profile');

Route::get('/user/profile',[UserController::class,'profile'])->name("user.profile");
Route::post('/user/profile',[UserController::class,'update'])->name("user.update");
Route::get('/user/liked',[UserController::class,'liked'])->name("user.liked");
Route::get('/user/order-history',[UserController::class,'orderHistory'])->name("user.order-history");


//NEED TO ADD MIDDLEWARE




Route::middleware("guest")->group(function(){
    Route::get('/logout', [LoginController::class,'logout'])->withoutMiddleware("guest")->name("logout");
    Route::get('/login',[LoginController::class,'index'])->name("login.index");
    Route::post('/login',[LoginController::class,'login'])->name("login.login");
    Route::get('/register',[RegisterController::class,'index'])->name("register.index");
    Route::post('/register',[RegisterController::class,'register'])->name("register.register");
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


Route::get("/admin", [AdminController::class,"index"])->name("index");

/* ADMIN ROLE  */
//Route::name('user.')->prefix('user')->middleware('auth')->group(function(){
//    Route::name('admin.')->prefix('admin-panel')->middleware('admin_role')->group(function(){
//        Route::get("", [AdminController::class,"index"])->name("index");
//        Route::get("users", [AdminController::class,"usersShow"])->name("users");
//        Route::get("houses", [AdminController::class,"housesShow"])->name("houses");
//        Route::get("orders", [AdminController::class,"ordersShow"])->name("orders");
//
//        Route::post("features", [AdminController::class,"storeFeatures"])->name("features.store");
//        Route::post("houses", [AdminController::class,"updateHouses"])->name("houses.update");
//        Route::post("users", [AdminController::class,"updateUsers"])->name("users.update");
//
//        Route::delete("features", [AdminController::class,"deleteFeatures"])->name("features.delete");
//        Route::delete("comments", [AdminController::class,"deleteComments"])->name("comments.delete");
//    });
//});
