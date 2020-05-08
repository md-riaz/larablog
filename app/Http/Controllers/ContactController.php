<?php

namespace App\Http\Controllers;


use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;
use function request;

class ContactController extends Controller {

    public function index()
    {
        return view('contact.index');
    }

    public function getMessage()
    {
        request()->validate([
            'name'    => 'required',
            'email'   => 'required | email',
            'message' => 'required'
        ]);
        Mail::to(request('email'))->send(new ContactMe(request('name'), request('message')));

        return response()->json(['success' => 'Your message is successfully sent']);
    }
}
