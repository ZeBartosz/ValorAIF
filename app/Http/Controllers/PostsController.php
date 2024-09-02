<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepostsRequest;
use App\Http\Requests\UpdatepostsRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Post;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::latest()->paginate(6);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validation
        $request->validate([
            'title' => ['required', 'max:55'],
            'body' => ['required', 'max:500',],
            'banner' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        // dd($request);

        // Store avatar if exists
        $pathBanner = null;
        if ($request->hasFile('banner')) {
            $pathBanner = Storage::disk('public')->put('posts_banner', $request->banner);
        } else {
            $pathBanner = 'account_images/banner/default_banner.jpg';
        }



        // Create a post
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'postsBanner' => $pathBanner
        ]);


        // Redirect
        return back()->with('success', 'your post was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {

        // Authorising the action
        // Gate::authorize('modify', $posts);
        // Delete post image if exists
        $default = "account_images/banner/default_banner.jpg";
        $userBanner = $post->postsBanner;
        if (!Str::contains($userBanner, $default)) {
            Storage::disk('public')->delete($post->postsBanner);
        }

        // Delete post
        $post->delete();

        // Redirect to daashboard
        return back()->with('delete', 'Your post has been deleted!');
    }
}
