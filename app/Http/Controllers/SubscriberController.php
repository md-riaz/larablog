<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store()
    {
        Subscriber::create(\request()->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]));
        $notification = [
            'message' => 'You are subscribed to our newshelter',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }
}
