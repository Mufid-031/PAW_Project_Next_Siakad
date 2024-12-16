<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
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
    Route::get('/course/create/course', [AdminController::class, 'createCourse']);
    Route::get('/schedule', [AdminController::class, 'schedule']);
    Route::get('/schedule/create/schedule', [AdminController::class, 'createSchedule']);
    Route::get('/teacher', [AdminController::class, 'teacher']);
    Route::get('/service', [AdminController::class, 'service']);
    Route::get(('/service/beasiswa'), [AdminController::class, 'beasiswa']);
    Route::get(('/service/beasiswa/create'), [AdminController::class, 'beasiswaAdd']);
    Route::get(('/service/beasiswa/update'), [AdminController::class, 'beasiswaEdit']);
    Route::get('/report', [AdminController::class, 'report']);
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
    Route::get('/eval-dosen/{scheduleId}', [StudentController::class, 'evalDosen']);
    Route::get('/cuti-req', [StudentController::class, 'cutiReq']);
    Route::get('/absen/{scheduleId}', [StudentController::class, 'absen']);
    Route::get('/profile', [StudentController::class, 'profile']);
    Route::get('/khs', [StudentController::class, 'khs']);
    Route::get('/payment', [StudentController::class, 'pembayaran']);
    Route::post('/payment/process', [StudentController::class, 'process'])->name('payment.process');
    Route::get('/payment/status', [StudentController::class, 'statusPembayaran']);
    Route::get('/profile', [StudentController::class, 'profile']);
    Route::get('/profile/update', [StudentController::class, 'editProfile']);
});

Route::prefix('dosen')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dosen.dashboard');
    Route::get('/profile', [TeacherController::class, 'profile'])->name('dosen.profile');
    Route::get('/edit-profile', [TeacherController::class, 'profileUpdate'])->name('dosen.edit-profile');
    Route::get('/input-nilai', [TeacherController::class, 'grade'])->name('dosen.input-nilai');
    Route::get('/jadwal', [TeacherController::class, 'schedule'])->name('dosen.jadwal');
    Route::get('/sivitas', [TeacherController::class, 'sivitas'])->name('dosen.sivitas');
    Route::get('/absen/{scheduleId}', [TeacherController::class, 'absen'])->name('dosen.absen');
    Route::get('/eval-dosen/{scheduleId}', [TeacherController::class, 'evalDosen'])->name('dosen.eval-dosen');
    Route::get('/riwayat-absen', [TeacherController::class, 'historyAbsen'])->name('dosen.riwayat-absen');
    Route::get('/perwalian', [TeacherController::class, 'perwalian'])->name('dosen.perwalian');
    Route::get('/validasi', [TeacherController::class, 'validation'])->name('dosen.validasi');
    Route::get('/detail-validasi', [TeacherController::class, 'detailValidasi'])->name('dosen.detail-validasi');
    Route::get('/cuti-req', [TeacherController::class, 'cutiReq'])->name('dosen.cuti-req');
    Route::prefix('materi')->group(function () {
        Route::get('/', [TeacherController::class, 'materi']);
        Route::get('/tambah', [TeacherController::class, 'materiAdd'])->name('dosen.materi.tambah');
        Route::get('/edit', [TeacherController::class, 'materiUpdate'])->name('dosen.materi.edit');
        Route::get('/hapus', [TeacherController::class, 'materiDelete'])->name('dosen.materi.hapus');
        Route::get('/detail', [TeacherController::class, 'materiDetail'])->name('dosen.materi.detail');
    });
});

Route::prefix('token')->group(function () {
    Route::post('/save-token', [TokenController::class, 'store']);
    Route::post('/get-token', [TokenController::class, 'get']);
    Route::post('/destroy-token', [TokenController::class, 'destroyToken']);
});
