<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\User;
use App\Models\posts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $comment = $request->validate([
            'body' => ['required', 'max:500',],
        ]);

        // Create a post
        $user_id = Auth::User()->id;
        $post = Posts::find($request->posts);
        $comment['user_id'] = $user_id;
        $comment['parent_id'] = $request->comments;
        $post->comments()->create($comment);


        // Redirect
        return back()->with('success', 'Reply was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        $comment->delete();

        return back()->with('delete', 'Your reply has been deleted!');
    }
}
