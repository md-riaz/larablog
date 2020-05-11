<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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
     * @return Renderable
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

        return view('index', [
            'posts' => $this->paginate($posts) // Custom pagination with collection help from paginate() function
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function UserPosts(User $id)
    {

        $posts = $id->posts;

        return view('index', compact('posts'));
    }


}

