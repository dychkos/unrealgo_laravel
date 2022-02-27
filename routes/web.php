<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/articles',[ArticleController::class,'index'])->name("articles.index");
Route::get('/articles/{id}',[ArticleController::class,'show'])->name("articles.show");

Route::get('/store',[StoreController::class,'index'])->name("store.index");
Route::get('/store/{id}',[StoreController::class,'show'])->name("store.show");

Route::redirect('/user','/user/profile');
Route::get('/user/profile',[UserController::class,'profile'])->name("user.profile");
Route::get('/user/liked',[UserController::class,'liked'])->name("user.liked");
Route::get('/user/order-history',[UserController::class,'liked'])->name("user.order-history");
Route::get('/user/basket',[UserController::class,'basket'])->name("user.basket");

Route::get('/login',[LoginController::class,'index'])->name("login.index");
Route::get('/register',[RegisterController::class,'index'])->name("register.index");
