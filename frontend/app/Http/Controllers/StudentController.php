<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{

    public $token;
    public $student;
    public function __construct()
    {
        $this->token = TokenController::get();
        $this->student = StudentController::getStudentDetail();
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

    // views
    public function dashboard()
    {
        return view('student.student-dashboard', ['student' => $this->student]);
    }

    public function krs()
    {
        return view('student.student-krs', ['student' => $this->student]);
    }

    public function krsAdd()
    {
        return view('student.tambah-krs', ['student' => $this->student]);
    }

    public function schedule()
    {
        return view('student.student-jadwal', ['student' => $this->student]);
    }

    public function grade()
    {
        return view('student.student-transkip-nilai', ['student' => $this->student]);
    }

    public function profile()
    {
        return view('student.profile.student-profile', ['student' => $this->student]);
    }

    public function editProfile()
    {
        return view('student.profile.student-edit-profile', ['student' => $this->student]);
    }

    public function sivitas()
    {
        return view('student.student-sivitas', ['student' => $this->student]);
    }

    public function beasiswa()
    {
        return view('student.student-beasiswa', ['student' => $this->student]);
    }

    public function evalDosen()
    {
        return view('student.student-eval-dosen', ['student' => $this->student]);
    }

    public function cutiReq()
    {
        return view('student.student-cuti-req', ['student' => $this->student]);
    }

    public function absen()
    {
        return view('student.student-absen', ['student' => $this->student]);
    }

    public function materi()
    {
        return view('student.student-materi', ['student' => $this->student]);
    }

    public function pembayaran()
    {
        return view('student.keuangan.student-pay', ['student' => $this->student]);
    }

    public function statusPembayaran()
    {
        return view('student.keuangan.student-status-pay', ['student' => $this->student]);
    }
}
