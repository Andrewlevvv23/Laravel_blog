<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('home');
Route::get('/admin', App\Http\Controllers\Admin\IndexController::class)->middleware(['auth', 'admin'])->name('admin');
Route::get('/personal', App\Http\Controllers\Personal\IndexController::class)->middleware(['auth'])->name('personal');

Route::prefix('posts')->group(function (){
    Route::resource('/{post}/comment', App\Http\Controllers\Post\CommentController::class)->withTrashed();
    Route::get('/', App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/{post}', App\Http\Controllers\Post\ShowController::class)->name('post.show');
    Route::post('/{post}/likes', App\Http\Controllers\Post\StoreController::class)->name('post.like.store');
});

Route::prefix('admin')->group(function (){
    Route::resource('categories',  App\Http\Controllers\Admin\CategoriesController::class)->withTrashed();
    Route::resource('tags',  App\Http\Controllers\Admin\TagsController::class)->withTrashed();
    Route::resource('posts',  App\Http\Controllers\Admin\PostsController::class)->withTrashed();
    Route::resource('users',  App\Http\Controllers\Admin\UsersController::class);
});

Route::prefix('personal')->group(function (){
    Route::resource('liked',  App\Http\Controllers\Personal\LikedController::class)->withTrashed();
    Route::resource('comments',  App\Http\Controllers\Personal\CommentsController::class)->withTrashed();
});

Route::prefix('categories')->group(function (){
Route::get('/',  App\Http\Controllers\Category\IndexController::class)->name('category.index');
Route::get('/{category}/posts',  App\Http\Controllers\Category\Post\IndexController::class)->name('category.post.index');
});


Auth::routes();




//Route::get('/posts', App\Http\Controllers\Post\IndexController::class)->name('post.index');
//Route::get('/posts/{post}', App\Http\Controllers\Post\ShowController::class)->name('post.show');
//Route::post('/posts', App\Http\Controllers\Post\StoreController::class)->name('post.like.store');








































