<?php

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

Route::get('auth/login', function () {
    return view('login');
});