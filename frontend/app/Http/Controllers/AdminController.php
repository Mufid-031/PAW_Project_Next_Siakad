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
    public $scholarships;
    public $announcements;
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
        $this->scholarships = BeasiswaController::getAllBeasiswa();
        $this->announcements = PengumumanController::getAllAnnouncements();
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
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.dashboard', ['admin' => $this->admin, 'students' => $this->students, 'teachers' => $this->teachers, 'logs' => $this->logs, 'courses' => $this->courses, 'schedules' => $this->schedules]);
        }
        return back()->withInput();
    }

    public function users()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.users.index', ['users' => $this->users, 'admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function createAdmin()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.users.create.admin', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function createTeacher()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.users.create.teacher', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function createStudent()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.users.create.student', ['admin' => $this->admin, 'teachers' => $this->teachers]);
        }
        return back()->withInput();
    }

    public function course()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.course.index', ['courses' => $this->courses, 'admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function createCourse()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.course.create.course', ['admin' => $this->admin, 'teachers' => $this->teachers]);
        }
        return back()->withInput();
    }

    public function schedule()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.schedule.index', ['admin' => $this->admin, 'courses' => $this->courses, 'teachers' => $this->teachers, 'schedules' => $this->schedules]);
        }
        return back()->withInput();
    }

    public function createSchedule()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.schedule.create.schedule', ['admin' => $this->admin, 'courses' => $this->courses, 'teachers' => $this->teachers]);
        }
        return back()->withInput();
    }

    public function openClass()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.schedule.open-class', ['admin' => $this->admin, 'courses' => $this->courses, 'teachers' => $this->teachers]);
        }
        return back()->withInput();
    }

    public function teacher()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.teacher', ['teachers' => $this->teachers, 'admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function service()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.service', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function report()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.report', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function ukt()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.pembayaran.ukt', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function uktUpdate()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.pembayaran.ukt-edit', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function laporan()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.laporan', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function beasiswa()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.beasiswa.index', ['admin' => $this->admin, 'scholarships' => $this->scholarships['status'] == 200 ? $this->scholarships : null]);
        }
        return back()->withInput();
    }

    public function beasiswaAdd()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.beasiswa.add', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function beasiswaEdit()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.beasiswa.edit', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }

    public function pengumuman()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.pengumuman.index', ['admin' => $this->admin, 'announcements' => $this->announcements['status'] == 200 ? $this->announcements : null]);
        }
        return back()->withInput();
    }

    public function pengumumanAdd()
    {
        if ($this->admin['data']['role'] === "ADMIN") {
            return view('admin.pengumuman.add', ['admin' => $this->admin]);
        }
        return back()->withInput();
    }
}
