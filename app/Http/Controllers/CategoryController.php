<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('category.allcategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('category.addcategory');
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
            'name' => 'required|max:25|min:1|unique:categories'
        ]);
        $slug = Str::of($request->name)->slug('-'); //The slug method generates a URL friendly "slug" from the given string:
        // Create a new instance of Category model
        $insert_category = new Category;
        $insert_category->name = $request->name;
        $insert_category->slug = $slug;
        $insert_category->user_id = Auth::id();

        $insert_category->save();

        // If success then return with $notification message
        if ($insert_category) {
            $notification = [
                'message'    => 'Successfully Category Inserted',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message'    => 'Error Occurred!',
                'alert-type' => 'error'
            ];
        }

        // Return to previews page
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function show(Category $category)
    {
        return view('category.viewcategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('category.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:1|unique:categories,name' . $category->id,
            'slug' => 'required|max:25|min:1|unique:categories,slug' . $category->id
        ]);

        $update = $category;
        $update->name = $request->name;
        $update->slug = $request->slug;
        $update->user_id = Auth::id();

        $update->save();

        // If success then return with $notification message
        if ($update) {
            $notification = [
                'message'    => 'Successfully Category Updated',
                'alert-type' => 'success'
            ];

            return redirect()->to('/category')->with($notification);
        } else {
            $notification = [
                'message'    => 'Error Occurred!',
                'alert-type' => 'error'
            ];

            // Return to previews page
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        if ($category) {
            $notification = [
                'message'    => 'Successfully Category Deleted',
                'alert-type' => 'success'
            ];
        }

        return redirect()->back()->with($notification);
    }
}
