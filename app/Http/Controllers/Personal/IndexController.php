<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $postsCount = Post::all()->count();
        $commentsCount = Comment::all()->count();
        return view('personal.main.index', compact('postsCount', 'commentsCount'));
    }
}
