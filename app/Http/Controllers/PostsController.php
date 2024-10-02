<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller implements HasMiddleware
{

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categoryColors = [
            'other',
            'general',
            'pro',
            'gameplay',
            'lft',
            'memes',
        ];

        // Start with the base query
        $query = Posts::orderBy('created_at', 'DESC');
        $search = request()->get('search', ''); 

        if (request()->has('search')) {
            $searchLower = Str::lower($search);
            // Apply search filter
            if(in_array($searchLower, $categoryColors)){
                $query->where('catagory', 'like', '%' . $search . '%');
            } else {
                $query->where('title', 'like', '%' . $search . '%');
            }
        }


        // Paginate the results after the condition (search or not)
        $posts = $query->paginate(6);

        // Persist the search query in the pagination links
        if (request()->has('search')) {
            $posts->appends(['search' => $search]);
        }

        return view('posts.index', ['posts' => $posts, 'search' => $search]);

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
            'catagory' => 'required|in:General,Pro,Gameplay,LFT,Memes,Other',
            'banner' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);


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
            'catagory' => $request->catagory,
            'postsBanner' => $pathBanner
        ]);


        // Redirect
        return back()->with('success', 'The post has been created');
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
    public function edit(posts $post)
    {
        Gate::authorize('modify', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $post)
    {

        Gate::authorize('modify', $post);

        // validation
        $request->validate([
            'title' => ['required', 'max:55'],
            'body' => ['required', 'max:500',],
            'catagory' => 'required|in:General,Pro,Gameplay,LFT,Memes,Other',
            'banner' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        // Store avatar if exists
        $default = "account_images/banner/default_banner.jpg";
        $pathBanner = $request->postsBanner && null;
        if ($request->hasFile('postsBanner')) {
            if (!Str::contains($pathBanner, $default)) {
                if (!Str::contains($post->postsBanner, $default)) {
                    Storage::disk('public')->delete($post->postsBanner);
                }
                $pathBanner = Storage::disk('public')->put('posts_banner', $request->postsBanner);
            }
        } else {
            $pathBanner = 'account_images/banner/default_banner.jpg';
        }


        // Create a post
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'catagory' => $request->catagory,
            'postsBanner' => $pathBanner
        ]);


        // Redirect
        return redirect()->route('profile')->with('success', 'Your post was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {

        // Authorising the action
        Gate::authorize('modify', $post);
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
