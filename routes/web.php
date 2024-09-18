<?php

use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard/students', function () {


    $token = session('token');

    if ($token) {

        $response = Http::withHeaders([
            'X-API-TOKEN' => $token,
        ])->get('http://localhost:3000/api/students');
    
        $students = $response->json();
    
        if ($students) {
            
            return view('student-data', [
                'students' => $students,
                'title' => 'Student Data',
            ]); 
        };

    }

    return view('student-data', [
        'students' => [],
        'title' => 'Student Data',
    ]);

});

Route::get('auth/login', function () {


    return view('login');
});

Route::post('/save-token', [TokenController::class, 'store']);
