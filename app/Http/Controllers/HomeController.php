<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

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
            $posts = $this->paginate($posts);
        } else {
            $posts = Post::with('category')->latest('updated_at')->paginate(7);
        }

        return view('index', compact('posts'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 7, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * @param Category $slug
     * @return Application|Factory|View
     */
    public function CategoryPosts(Category $slug)
    {
        $posts = $slug->posts;

        return view('index', [
            'posts' => $this->paginate($posts) // Custom pagination with collection help from paginate() function
        ]);
    }

    /**
     * @param User $id
     * @return Application|Factory|View
     */
    public function UserPosts(User $id)
    {
        $posts = $id->posts;

        return view('index', [
            'posts' => $this->paginate($posts) // Custom pagination with collection help from paginate() function
        ]);
    }

    public function searchItem()
    {
        $query = request('search');
        $posts = Post::where('title', 'like', "%{$query}%")->get();
        // dd($posts);
       
        foreach ($posts as $key => $value) {
            $result =
                '<a href="' . url('post/' . $value->slug) . '">' . $value->title . '</a>';
        }

        return response($result);

    }

}

