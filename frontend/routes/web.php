<?php

use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/register/student', function () {
        return view('auth/student/student-register');
    });
    Route::get('/login/student', function () {
        return view('auth/student/student-login');
    });
    Route::get('/register/teacher', function () {
        return view('auth/teacher/teacher-register');
    });

    Route::get('/login/teacher', function () {
        return view('auth/teacher/teacher-login');
    });
    Route::get('/register/admin', function () {
        return view('auth/admin/admin-register');
    });
    Route::get('/login/admin', function () {
        // $token = TokenController::get();
        // if ($token) {
        //     return redirect('/dashboard/students');
        // }
        return view('auth/admin/admin-login');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('/users', function () {
        return view('admin/users');
    });
    Route::get('/course', function () {
        return view('admin/course');
    });
    Route::get('/schedule', function () {
        return view('admin/schedule');
    });
    Route::get('/teacher', function () {
        return view('admin/teacher');
    });
    Route::get('/grade', function () {
        return view('admin/grade');
    });
});

Route::prefix('token')->group(function () {
    Route::post('/save-token', [TokenController::class, 'store']);
    Route::post('/get-token', [TokenController::class, 'get']);
    Route::post('/destroy-token', [TokenController::class, 'destroyToken']);
});
