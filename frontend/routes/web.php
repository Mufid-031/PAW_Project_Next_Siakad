<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
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
        $users = AdminController::getUsers();
        if ($users) {
            return view('admin/users', [
                'users' => $users
            ]);
        }
    });
    Route::get('/course', function () {
        $courses = CourseController::getCourses();
        if ($courses) {
            return view('admin/course', [
                'courses' => $courses,
            ]);
        }
    });
    Route::get('/schedule', function () {
        return view('admin/schedule');
    });
    Route::get('/teacher', function () {
        $teachers = TeacherController::getTeachers();
        if ($teachers) {
            return view('admin/teacher', [
                'teachers' => $teachers
            ]);
        }
    });
    Route::get('/grade', function () {
        return view('admin/grade');
    });
});

Route::prefix('student')->group(function () {
    Route::get('/dashboard', function () {
        return view('student/student-dashboard');
    });
    Route::get('/krs', function () {
        return view('student/student-krs');
    });
    Route::get('/tambah-krs', function () {
        return view('student/student-tambah-krs');
    });
    Route::get('/jadwal', function () {
        return view('student/student-jadwal');
    });
    Route::get('/transkip-nilai', function () {
        return view('student/student-transkip-nilai');
    });
    Route::get('/profile', function () {
        return view('student/student-profile');
    });
    Route::get('/edit-profile', function () {
        return view('student/student-edit-profile');
    });
    Route::get('/sivitas', function () {
        return view('student/student-sivitas');
    });
    Route::get('/cuti-req', function () {
        return view('student/student-cuti-req');
    });
    Route::get('/absensi', function () {
        return view('student/student-absen');
    });
    Route::get('/eval-dosen', function () {
        return view('student/student-eval-dosen');
    });
    Route::get('/materi', function () {
        return view('student/student-materi');
    });
    Route::get('/pembayaran', function () {
        return view('student/student-pay');
    });
    Route::get('/status-pembayaran', function () {
        return view('student/student-status-pay');
    });
    Route::get('/beasiswa', function () {
        return view('student/student-beasiswa');
    });
    Route::get('/login', function () {
        return view('auth/student/student-login');
    });
});

//admin pembayaran
Route::get('/UKT', function () {
    return view('dashboard/adminpembayaran/data');
});

Route::get('/UKT-edit', function () {
    return view('dashboard/adminpembayaran/data-edit');
});

Route::get('/laporan', function () {
    return view('dashboard/adminpembayaran/laporan');
});

Route::get('/tambahukt', function () {
    return view('dashboard/adminpembayaran/ukt');
});

// admin beasiswa
Route::get('/beasiswa', function () {
    return view('dashboard/adminbeasiswa/read');
});
Route::get('/beasiswa-tambah', function () {
    return view('dashboard/adminbeasiswa/add');
});
Route::get('/beasiswa-edit', function () {
    return view('dashboard/adminbeasiswa/edit');
});


Route::prefix('token')->group(function () {
    Route::post('/save-token', [TokenController::class, 'store']);
    Route::post('/get-token', [TokenController::class, 'get']);
    Route::post('/destroy-token', [TokenController::class, 'destroyToken']);
});
