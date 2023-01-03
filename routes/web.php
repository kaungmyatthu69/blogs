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


//Blogs

Route::controller(BlogController::class)->group(function(){
    Route::get('/','index');
    Route::get('/blogs/{blog:slug}','show');
    Route::post('/blogs/{blog:slug}/subscription','subscription');
});


//Auth

Route::middleware('guest')->controller(AuthController::class)->group(function(){
    Route::prefix('/register')->group(function(){
        Route::get('','create');
        Route::post('','store');
    });
    Route::prefix('/login')->group(function(){
        Route::get('','login');
        Route::post('','post_login');
    });
});


//comment & logout

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::post('/blogs/{blog:slug}/commments',[CommentController::class,'store']);




//Admin Routes

Route::prefix('/admin/blogs')->middleware('can:admin')->controller(AdminBlogController::class)->group(function(){
            Route::get('/create','create');
            Route::post('/create','store');
            Route::get('','index');
            Route::delete('/{blog:slug}/delete','destory');
            Route::get('/{blog:slug}/edit','edit');
            Route::patch('/{blog:slug}/update','update');
});
