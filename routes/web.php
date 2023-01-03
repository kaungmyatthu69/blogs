<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

Route::get('/',[BlogController::class,'index']);



Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);

// ->where('blog','[A-z\d\-_]+')





Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/commments',[CommentController::class,'store']);

Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscription']);

//Admin Routes
Route::group(['prefix'=>'/admin/blogs','middleware'=>'can:admin','controller'=> AdminBlogController::class],function(){
        Route::get('/create','create');
        Route::post('/create','store');
        Route::get('','index');
        Route::delete('/{blog:slug}/delete','destory');
        Route::get('/{blog:slug}/edit','edit');
        Route::patch('/{blog:slug}/update','update');
});

// Route::prefix('/admin/blogs')->middleware('can:admin')->controller(AdminBlogController::class)->group(function(){
//             Route::get('/create','create');
//             Route::post('/create','store');
//             Route::get('','index');
//             Route::delete('/{blog:slug}/delete','destory');
//             Route::get('/{blog:slug}/edit','edit');
//             Route::patch('/{blog:slug}/update','update');
// });
