<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Test;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

// Route::get('/', function () {
//     $posts = Post::latest()->with('category','author')->get();
//     $postCard = $posts->first();
//     $normalPosts = $posts->filter(function($post) use($postCard){
//         return $post->id != $postCard->id;
//     });
//     return view('posts.list',[
//         "postCard" => $postCard,
//         "normalPosts" => $normalPosts
//     ]);
// });

Route::get('/', [PostController::class,'index']);
Route::get('/posts/{post:slug}', [PostController::class,'show']);

Route::post('/posts/{post:slug}/comment',[PostCommentsController::class,'store']);

Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');

Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');

Route::post('/admin/posts/{post}/likes',[LikeController::class, 'store']);
Route::delete('/admin/posts/{post}/likes',[LikeController::class, 'destroy']);
Route::post('/admin/posts/{post}/unlikes',[LikeController::class, 'unlike']);


//administrator
Route::get('/admin/posts',[AdminPostController::class,'index'])->middleware('admin');
Route::post('/admin/posts', [AdminPostController::class,'store'])->middleware('admin');
Route::get('/admin/posts/create', [AdminPostController::class,'create'])->middleware('admin');
Route::get('/admin/posts/{post}/edit', [AdminPostController::class,'edit'])->middleware('admin');
Route::patch('/admin/posts/{post}', [AdminPostController::class,'update'])->middleware('admin');
Route::delete('/admin/posts/{post}', [AdminPostController::class,'destroy'])->middleware('admin');