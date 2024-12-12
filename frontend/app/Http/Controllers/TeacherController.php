<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{

    public $token;
    public $teacher;

    public function __construct()
    {
        $this->token = TokenController::get();
        $this->teacher = TeacherController::getTeacherDetail();
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

    public static function getTeacher($id)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/teachers/' . $id);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public static function getTeacherDetail()
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/teacher/detail');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    // views
    public function dashboard()
    {
        return view('dosen.dosen-dashboard', [
            'teacher' => $this->teacher
        ]);
    }

    public function profile()
    {
        return view('dosen.dosen-profile', [
            'teacher' => $this->teacher
        ]);
    }

    public function profileUpdate()
    {
        return view('dosen.dosen-edit-profile', [
            'teacher' => $this->teacher
        ]);
    }

    public function grade()
    {
        return view('dosen.dosen-input-nilai', [
            'teacher' => $this->teacher
        ]);
    }

    public function schedule()
    {
        return view('dosen.dosen-jadwal', [
            'teacher' => $this->teacher
        ]);
    }

    public function sivitas()
    {
        return view('dosen.dosen-sivitas', [
            'teacher' => $this->teacher
        ]);
    }

    public function absen($scheduleId)
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/schedule/' . $scheduleId);
            $schedule = $response->json();
            $absences = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/absensi/' . $scheduleId)->json();
            return view('dosen.dosen-absen', [
                'teacher' => $this->teacher,
                'schedule' => $schedule,
                'absences' => $absences['status'] === 200 ? $absences : null
            ]);
        }
    }

    public function evalDosen($scheduleId)
    {
        if ($this->token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/schedule/' . $scheduleId);
            $schedule = $response->json();
            $evaluations = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/evaluation/' . $scheduleId)->json();
            return view('dosen.dosen-eval', [
                'teacher' => $this->teacher,
                'schedule' => $schedule,
                'evaluations' => $evaluations['status'] === 200 ? $evaluations : null
            ]);
        }
    }

    public function historyAbsen()
    {
        return view('dosen.dosen-riwayat-absen', [
            'teacher' => $this->teacher
        ]);
    }

    public function perwalian()
    {
        return view('dosen.dosen-perwalian', [
            'teacher' => $this->teacher
        ]);
    }

    public function validation()
    {
        return view('dosen.dosen-validasi-krs', [
            'teacher' => $this->teacher
        ]);
    }

    public function validationDetail()
    {
        return view('dosen.dosen-validasi-krs-detail');
    }

    public function cutiReq()
    {
        return view('dosen.dosen-cuti-req');
    }

    public function materi()
    {
        return view('dosen.dosen-materi');
    }

    public function materiAdd()
    {
        return view('dosen.dosen-tambah-materi');
    }

    public function materiUpdate()
    {
        return view('dosen.dosen-edit-materi');
    }

    public function materiDelete()
    {
        return view('dosen.dosen-hapus-materi');
    }

    public function materiDetail()
    {
        return view('dosen.dosen-materi-detail');
    }
}
