<?php

use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Student routes
Route::get('auth/register/student', function () {
    return view('student-register');
});

Route::get('auth/login/student', function () {
    return view('student-login');
});


// Teacher routes
Route::get('auth/register/teacher', function () {
   return view('teacher-register'); 
});

Route::get('auth/login/teacher', function () {
    return view('teacher-login');
});


// Admin routes
Route::get('auth/login/admin', function () {
   return view('admin-login'); 
});

Route::get('auth/register/admin', function () {
   return view('admin-register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard/students', function () {

    $token = TokenController::get();

    if ($token) {

        $students = TokenController::getStudents($token);
        
        if ($students) {
            
            return view('student-data', [
                'students' => $students,
                'token' => $token
            ]); 
        };

    } else {
        redirect()->route("auth/login/admin");
    }

    return view('student-data', [
        'students' => [],
        'title' => 'Student Data',
    ]);

});


// Token routes
Route::post('/save-token', [TokenController::class, 'store']);
Route::post('/get-token', [TokenController::class, 'get']);
Route::post('/destroy-token', [TokenController::class, 'destroyToken']);
