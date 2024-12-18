<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    //
    public $token;
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->token = TokenController::get();
    }

    // views
    public function index()
    {
        // if ($this->token != "") {
        //     return back()->withInput();
        // }
        return view('auth.user-login');
    }
}