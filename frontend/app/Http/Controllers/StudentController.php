<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{

    public $token;
    public $student;
    public $courses;
    public $enrollments;
    public $schedules;
    public function __construct()
    {
        $this->token = TokenController::get();
        $this->student = StudentController::getStudentDetail();
        $this->courses = CourseController::getCourses();
        $this->enrollments = StudentController::getEnrollment();
        $this->schedules = ScheduleController::getSchedules();
    }

    public static function getStudents()
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/student');

            if ($response->status() === 200) {
                return view('students.index', [
                    'students' => $response->json()
                ]);
            }
        } else {
            redirect('/auth/login/admin');
        }
    }

    public static function getStudent($id)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/students/' . $id);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public function getStudentDetail()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/student/detail');

            return $response->json();
        } else {
            redirect('/auth/login/student');
        }
    }

    public function getEnrollment()
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/enrollment');

            return $response->json();
        } else {
            redirect('/auth/login/student');
        }
    }

   

    // views
    public function dashboard()
    {
        return view('student.student-dashboard', ['student' => $this->student]);
    }

    public function krs()
    {
        return view('student.student-krs', ['student' => $this->student, 'enrollments' => $this->enrollments, 'schedules' => $this->schedules]);
    }

    public function krsAdd()
    {
        return view('student.student-tambah-krs', ['student' => $this->student, 'courses' => $this->courses]);
    }

    public function schedule()
    {
        return view('student.student-jadwal', ['student' => $this->student, 'enrollments' => $this->enrollments, 'schedules' => $this->schedules]);
    }

    public function grade()
    {
        return view('student.student-transkip-nilai', ['student' => $this->student, 'enrollments' => $this->enrollments]);
    }

    public function profile()
    {
        return view('student.profile.student-profile', ['student' => $this->student]);
    }

    public function sivitas()
    {
        return view('student.student-sivitas', ['student' => $this->student, 'enrollments' => $this->enrollments]);
    }

    public function beasiswa()
    {
        return view('student.student-beasiswa', ['student' => $this->student]);
    }

    public function evalDosen($scheduleId)
    {
        if ($this->token) {
            $enrollment = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/enrollment/' . $scheduleId)->json();
            $evaluation = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/evaluation/' . $enrollment['data']['id'])->json();
            return view('student.student-eval-dosen', [
                'student' => $this->student,
                'enrollment' => $enrollment,
                'evaluation' => $evaluation['status'] === 200 ? $evaluation : null
            ]);
        }
    }

    public function absen($scheduleId)
    {
        if ($this->token) {
            // dd($scheduleId, $this->student);
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/enrollment/' . $scheduleId);
            $schedule = $response->json();
            $absences = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/absensi/student/' . $scheduleId)->json();
            return view('student.student-absen', [
                'student' => $this->student,
                'schedule' => $schedule,
                'absences' => $absences['status'] === 200 ? $absences : null
            ]);
        }
    }

    public function pembayaran()
    {
        return view('student.keuangan.student-pay', ['student' => $this->student]);
    }

    public function statusPembayaran()
    {
        return view('student.keuangan.student-status-pay', ['student' => $this->student]);
    }

    public function khs()
    {
        return view('student.student-khs', ['student' => $this->student, 'enrollments' => $this->enrollments]);
    }
}
