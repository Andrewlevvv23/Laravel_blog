<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('post.index');
    }
}




//public function __invoke()
//{
//    $posts = Post::paginate(6);
//    $randomPosts = Post::get()->random(4);                                                                           //created random collection
//    $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);               //display of popular posts, get() takes collections posts
//    return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));
//}
