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
    public function admin()
    {
        if ($this->token != '') {
            redirect('/admin/dashboard');
        }

        echo "<script>console.log('$this->token')</script>";
        return view('auth.admin-login');
    }

    public function student()
    {
        if ($this->token !== '') {
            redirect('/student/dashboard');
        }
        return view('auth.student-login');
    }

    public function teacher()
    {
        if ($this->token) {
            redirect('/teacher/dashboard');
        }
        return view('auth.teacher-login');
    }
}
