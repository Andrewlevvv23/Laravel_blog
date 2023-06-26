<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->likedPosts;                                //display liked posts of a certain user
        return view('personal.liked.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        return view('personal.likes.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store()
//    {
//
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show( )
//    {
//        return view('personal.likes.show');
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit()
//    {
//        return view('personal.likes.edit');
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update()
//    {
//
//    }
//
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Auth::user()->likedPosts()->detach($post->id);
        return redirect()->route('liked.index');
    }
}

