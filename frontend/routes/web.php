<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login/admin', [AuthController::class, 'admin']);
    Route::get('/login/teacher', [AuthController::class, 'teacher']);
    Route::get('/login/student', [AuthController::class, 'student']);
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/users/create/admin', [AdminController::class, 'createAdmin']);
    Route::get('/users/create/teacher', [AdminController::class, 'createTeacher']);
    Route::get('/users/create/student', [AdminController::class, 'createStudent']);
    Route::get('/users/create/course', [AdminController::class, 'createCourse']);
    Route::get('/course', [AdminController::class, 'course']);
    Route::get('/schedule', [AdminController::class, 'schedule']);
    Route::get('/teacher', [AdminController::class, 'teacher']);
    Route::get('/service', [AdminController::class, 'service']);
    Route::get('/grade', [AdminController::class, 'grade']);
    Route::get('/ukt', [AdminController::class, 'ukt']);
    Route::get('/ukt/update', [AdminController::class, 'uktUpdate']);
    Route::get('/laporan', [AdminController::class, 'laporan']);
    Route::get('/beasiswa', [AdminController::class, 'beasiswa']);
    Route::get('/beasiswa/add', [AdminController::class, 'beasiswaAdd']);
    Route::get('/beasiswa/update', [AdminController::class, 'beasiswaEdit']);
});

Route::prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard']);
    Route::get('/krs', [StudentController::class, 'krs']);
    Route::get('/krs/add', [StudentController::class, 'krsAdd']);
    Route::get('/jadwal', [StudentController::class, 'schedule']);
    Route::get('/grade', [StudentController::class, 'grade']);
    Route::get('/sivitas', [StudentController::class, 'sivitas']);
    Route::get('/beasiswa', [StudentController::class, 'beasiswa']);
    Route::get('/eval-dosen', [StudentController::class, 'evalDosen']);
    Route::get('/cuti-req', [StudentController::class, 'cutiReq']);
    Route::get('/absen', [StudentController::class, 'absen']);
    Route::get('/materi', [StudentController::class, 'materi']);
    Route::get('/payment', [StudentController::class, 'pembayaran']);
    Route::get('/payment/status', [StudentController::class, 'statusPembayaran']);
    Route::get('/profile', [StudentController::class, 'profile']);
    Route::get('/profile/update', [StudentController::class, 'editProfile']);
});


Route::prefix('token')->group(function () {
    Route::post('/save-token', [TokenController::class, 'store']);
    Route::post('/get-token', [TokenController::class, 'get']);
    Route::post('/destroy-token', [TokenController::class, 'destroyToken']);
});
