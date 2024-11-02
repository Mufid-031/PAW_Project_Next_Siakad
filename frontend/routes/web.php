<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function() {
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
        $token = TokenController::get();
        if ($token) {
            return redirect('/dashboard/students');
        }
       return view('auth/admin/admin-login'); 
    });
});

Route::prefix('dashboard')->group(function() {
    Route::get('/', function () {
        return view('dashboard/index');
    });
    Route::get('/students', function () {
        $students = StudentController::getStudents();
        if ($students) {
            
            return view('dashboard/students/index', [
                'students' => $students,
            ]); 
        };
    });
    Route::get(('/students/{id}'), function ($id) {
        $students = StudentController::getStudent($id);
        if ($students) {
            return view('dashboard/students/student', [
                'student' => $students,
            ]);
        };
    });
    Route::get('/teachers', function () {
        $teachers = TeacherController::getTeachers();
        if ($teachers) {
            return view('dashboard/teachers/index', [
                'teachers' => $teachers,
            ]);
        }
    });
    Route::get('/teachers/{id}', function ($id) {
        $teachers = TeacherController::getTeacher($id);
        if ($teachers) {
            return view('dashboard/teachers/teacher', [
                'teacher' => $teachers,
            ]);
        }
    });
    Route::get('/courses', function () {        
        $courses = CourseController::getCourses();
        if ($courses) {
            return view('dashboard/courses/index', [
                'courses' => $courses,
            ]);
        }
    });
    Route::get('/courses/{id}', function ($id) {
        $courses = CourseController::getCourse($id);
        if ($courses) {
            return view('dashboard/courses/course', [
                'course' => $courses,
            ]);
        }
    });
});

Route::prefix('token')->group(function() {
    Route::post('/save-token', [TokenController::class, 'store']);
    Route::post('/get-token', [TokenController::class, 'get']);
    Route::post('/destroy-token', [TokenController::class, 'destroyToken']);
});