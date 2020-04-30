<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('post.all', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.write', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:5|unique:posts,title',
            'category_id' => 'required|min:1',
            'slug' => 'required|max:100|min:5|alpha_dash|unique:posts,slug',
            'post_img' => 'required | image |max:1000',
            'details' => 'required|min:100',

        ]);

        // Create a new instance of Post model
        $insert_post = new Post;
        $insert_post->title = $request->title;
        $insert_post->slug = $request->slug;
        $insert_post->category_id = $request->category_id;
        $insert_post->details = Purifier::clean($request->details);
        $insert_post->user_id = Auth::user()->id;
        $image = $request->file('post_img');

        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $img_full_name = $image_name . '.' . $ext;
            $upload_path = 'uploads/post_img/';
            $img_url = $upload_path . $img_full_name;
            $success = $image->move($upload_path, $img_full_name);
            if ($success) {
                $insert_post->post_img = $img_url;
            }
        }
        $insert_post->save();

        // If success then return with $notification message
        if ($insert_post) {
            $notification = [
                'message' => 'Successfully Posted',
                'alert-type' => 'success'
            ];

            return redirect()->to('post')->with($notification);
        } else {
            $notification = [
                'message' => 'Error Occurred!',
                'alert-type' => 'error'
            ];
            // Return to previews page
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        $previous = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        return view('post.show', compact('post','previous','next'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:5|unique:posts,title,' . $post->id,
            'slug' => 'required|max:100|min:5|alpha_dash|unique:posts,slug,' . $post->id,
            'category_id' => 'required|min:1',
            'post_img' => 'image|max:1000',
            'details' => 'required |min:100',
        ]);


        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->details = Purifier::clean($request->details);
        $post->user_id = Auth::user()->id;
        $image = $request->file('post_img');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $img_full_name = $image_name . '.' . $ext;
            $upload_path = 'uploads/post_img/';
            $img_url = $upload_path . $img_full_name;
            $success = $image->move($upload_path, $img_full_name);
            unlink($request->old_img);
            if ($success) {
                $post->post_img = $img_url;
            }
        } else {
            $post->post_img = $request->old_img;
        }
        $post->save();

        // If success then return with $notification message
        if ($post) {
            $notification = [
                'message' => 'Successfully Posted',
                'alert-type' => 'success'
            ];

            return redirect()->to('post')->with($notification);
        } else {
            $notification = [
                'message' => 'Error Occurred!',
                'alert-type' => 'error'
            ];
            // Return to previews page
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        unlink($post->post_img);

        $notification = [
            'message' => 'Successfully Post Deleted',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
