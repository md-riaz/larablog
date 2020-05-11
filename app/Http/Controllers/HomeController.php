<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        } else {
            $posts = Post::with('category')->latest('updated_at')->paginate(7);
        }

        return view('index', compact('posts'));
    }


    public function CategoryPosts(Category $slug)
    {
        $posts = $slug->posts;

        return view('index', compact('posts'));
    }

    public function UserPosts(User $id)
    {

        $posts = $id->posts;

        return view('index', compact('posts'));
    }
}
