<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{

    public $token;
    public $student;
    public $teacher;
    public $announcements;

    public function __construct()
    {
        $this->token = TokenController::get();
        $this->teacher = TeacherController::getTeacherDetail();
        $this->announcements = PengumumanController::getAllAnnouncements();
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
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-dashboard', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
    }

    public function pengumuman()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-pengumuman', [
                'teacher' => $this->teacher,
                'announcements' => $this->announcements['status'] == 200 ? $this->announcements : null
            ]);
        }
        return back()->withInput();
    }

    public function profile()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-profile', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
    }

    public function profileUpdate()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-edit-profile', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
    }

    public function grade($scheduleId)
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            $schedule = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/schedule/' . $scheduleId)->json();
            return view('dosen.dosen-input-nilai', [
                'teacher' => $this->teacher,
                'schedule' => $schedule,
            ]);
        }
        return back()->withInput();
}

    public function schedule()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-jadwal', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
    }

    public function sivitas()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-sivitas', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
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
            if ($this->teacher['data']['role'] === "TEACHER") {
                return view('dosen.dosen-absen', [
                    'teacher' => $this->teacher,
                    'schedule' => $schedule,
                    'scheduleId' => $scheduleId,
                    'absences' => $absences['status'] === 200 ? $absences : null
                ]);
            }
            return back()->withInput();
        }
        return back()->withInput();
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
            ])->get('http://localhost:3000/api/evaluation/teacher/' . $scheduleId)->json();
            if ($this->teacher['data']['role'] === "TEACHER") {
                return view('dosen.dosen-eval', [
                    'teacher' => $this->teacher,
                    'schedule' => $schedule,
                    'evaluations' => $evaluations['status'] === 200 ? $evaluations : null
                ]);
            }
            return back()->withInput();
        }
        return back()->withInput();
    }

    public function historyAbsen(Request $request)
    {
        if ($this->token) {
            if ($this->teacher['data']['role'] === "TEACHER") {
                $absences = Http::withHeaders([
                    'X-API-TOKEN' => $this->token
                ])->post('http://localhost:3000/api/absensi/pertemuan/detail', [
                    'scheduleId' => $request->scheduleId,
                    'pertemuan' => $request->pertemuan,
                ])->json();

                return view('dosen.dosen-riwayat-absen', [
                    'teacher' => $this->teacher,
                    'absences' => $absences
                ]);
            }
            return back()->withInput();
        }
        return back()->withInput();
    }

    public function perwalian()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-perwalian', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
    }

    public function validation()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-validasi-krs', [
                'teacher' => $this->teacher
            ]);
        }
        return back()->withInput();
    }

    public function validate($studentId)
    {
        if ($this->token) {
            $enrollments = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get('http://localhost:3000/api/enrollment/student/' . $studentId)->json();

            if ($this->teacher['data']['role'] === "TEACHER") {
                return view('dosen.dosen-detail-validasi-krs', [
                    'teacher' => $this->teacher,
                    'enrollments' => $enrollments
                ]);
            }

            return back()->withInput();
        }
        return back()->withInput();
    }

    public function cutiReq()
    {
        if ($this->teacher['data']['role'] === "TEACHER") {
            return view('dosen.dosen-cuti-req');
        }
        return back()->withInput();
    }
}