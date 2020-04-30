<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
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
        $posts = Post::with('category')->latest('updated_at')->paginate(7);
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
