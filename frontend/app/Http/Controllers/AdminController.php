<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public $token;
    public $admin;
    public $users;
    public $courses;
    public $teachers;
    public $students;
    public $logs;
    public $schedules;
    public function __construct()
    {
        $this->token = TokenController::get();
        $this->admin = AdminController::getAdminDetail();
        $this->users = AdminController::getUsers();
        $this->courses = CourseController::getCourses();
        $this->teachers = AdminController::getTeachers();
        $this->students = AdminController::getStudents();
        $this->logs = AdminController::getLogs();
        $this->schedules = ScheduleController::getSchedules();
    }

    public function getUsers()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/admin/users');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getStudentBySearch($name)
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/admin/students?name=' . $name);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getTeacherBySearch($name)
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/admin/teachers?name=' . $name);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getStudents()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/student');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getStudent($id)
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/admin/students/' . $id);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getTeachers()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/teacher');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getTeacher($id)
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/admin/teachers/' . $id);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getAdminDetail()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/admin');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getLogs()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/log');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    // views
    public function dashboard()
    {
        return view('admin.dashboard', ['admin' => $this->admin, 'students' => $this->students, 'teachers' => $this->teachers, 'logs' => $this->logs, 'courses' => $this->courses, 'schedules' => $this->schedules]);
    }

    public function users()
    {
        return view('admin.users.index', ['users' => $this->users, 'admin' => $this->admin]);
    }

    public function createAdmin()
    {
        return view('admin.users.create.admin', ['admin' => $this->admin]);
    }

    public function createTeacher()
    {
        return view('admin.users.create.teacher', ['admin' => $this->admin]);
    }

    public function createStudent()
    {
        return view('admin.users.create.student', ['admin' => $this->admin, 'teachers' => $this->teachers]);
    }

    public function course()
    {
        return view('admin.course.index', ['courses' => $this->courses, 'admin' => $this->admin]);
    }

    public function createCourse()
    {
        return view('admin.course.create.course', ['admin' => $this->admin, 'teachers' => $this->teachers]);
    }

    public function schedule()
    {
        return view('admin.schedule.index', ['admin' => $this->admin, 'courses' => $this->courses, 'teachers' => $this->teachers, 'schedules' => $this->schedules]);
    }

    public function createSchedule()
    {
        return view('admin.schedule.create.schedule', ['admin' => $this->admin, 'courses' => $this->courses, 'teachers' => $this->teachers]);
    }

    public function teacher()
    {
        return view('admin.teacher', ['teachers' => $this->teachers, 'admin' => $this->admin]);
    }

    public function service()
    {
        return view('admin.service', ['admin' => $this->admin]);
    }

    public function report()
    {
        return view('admin.report', ['admin' => $this->admin]);
    }

    public function ukt()
    {
        return view('admin.pembayaran.ukt', ['admin' => $this->admin]);
    }

    public function uktUpdate()
    {
        return view('admin.pembayaran.ukt-edit', ['admin' => $this->admin]);
    }

    public function laporan()
    {
        return view('admin.laporan', ['admin' => $this->admin]);
    }

    public function beasiswa()
    {
        return view('admin.beasiswa.read', ['admin' => $this->admin]);
    }

    public function beasiswaAdd()
    {
        return view('admin.beasiswa.add', ['admin' => $this->admin]);
    }

    public function beasiswaEdit()
    {
        return view('admin.beasiswa.edit', ['admin' => $this->admin]);
    }
}
