<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tags.store',[
            'tags' => Tag::all()
        ]);

}
    public function store()
    {
        Tag::create(\request()->validate([
            'name' => 'required | string | max:20 | unique:tags'
        ]));
        $notification = [
            'message' => 'Congrats! New Tag added.',
            'alert-type' => 'success'
        ];
        // Return to previews page
        return redirect()->back()->with($notification);
    }
}
