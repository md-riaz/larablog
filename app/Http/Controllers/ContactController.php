<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{


    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMessage()
    {

    }
}
