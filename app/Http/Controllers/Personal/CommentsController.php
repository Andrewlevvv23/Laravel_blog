<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        return view('personal.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        return view('personal.comments.create');
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
//        return view('personal.comments.show');
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
    public function edit(Comment $comment)
    {
        return view('personal.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index');
    }
}
