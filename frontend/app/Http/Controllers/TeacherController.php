<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{

    public $token;
    public $student;
    public $teacher;
    public $courses;
    public $enrollments;
    public $schedules;

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
        return view('dosen.dosen-daftar-matkul', [
            'teacher' => $this->teacher
        ]);
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

    public function detailGrade($scheduleId)
    {
        if ($this->token) {
            $scheduleResponse = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get("http://localhost:3000/api/schedule/{$scheduleId}");
            
            if ($scheduleResponse->status() !== 200) {
                return redirect()->back()->with('error', 'Gagal memuat data jadwal');
            }

            $schedule = $scheduleResponse->json();
            $enrollments = $this->getEnrollmentsByScheduleId($scheduleId);

            return view('dosen.dosen-input-nilai', [
                'teacher' => $this->teacher,
                'schedule' => $schedule,
                'enrollments' => $enrollments
            ]);
        }
    }

    public function getEnrollmentsByScheduleId($scheduleId)
    {
        if ($this->token) {
            $enrollmentsResponse = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->get("http://localhost:3000/api/enrollments/{$scheduleId}");
            
            if ($enrollmentsResponse->status() !== 200) {
                return [];
            }

            return $enrollmentsResponse->json();
        }
    }

    public function storeNilai(Request $request, $scheduleId)
    {
        if ($this->token) {
            $validated = $request->validate([
                'grades.*.numeric' => 'required|numeric|min:0|max:100',
                'grades.*.letter' => 'required|in:A,B,C,D,E',
            ]);

            $response = Http::withHeaders([
                'X-API-TOKEN' => $this->token
            ])->post('http://localhost:3000/api/enrollments/grades', [
                'schedule_id' => $scheduleId,
                'grades' => $request->grades,
            ]);

            if ($response->status() === 200) {
                return redirect()->route('nilai.input', $scheduleId)->with('success', 'Nilai berhasil disimpan');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan nilai');
            }
        }
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

    public function perwalian($id)
{
    try {
        // Ambil data dosen berdasarkan ID
        $teacherResponse = Http::get("http://localhost:3000/api/teachers/" .$id);

        if ($teacherResponse->failed()) {
            throw new \Exception('Gagal mengambil data dosen.');
        }

        $teacher = $teacherResponse->json();

        // Ambil data mahasiswa bimbingan
        $studentResponse = Http::get("http://localhost:3000/api/teacher/{$id}/students");

        if ($studentResponse->failed()) {
            throw new \Exception('Gagal mengambil data mahasiswa bimbingan.');
        }

        $students = $studentResponse->json('students') ?? [];

        // Kirim data ke view
        return view('dosen.dosen.perwalian', [
            'teacher' => $teacher,
            'students' => $students,
        ]);

    } catch (\Exception $e) {
        // Tangani error dengan pesan yang lebih informatif
        return back()->with('error', $e->getMessage());
    }
}


    public function validation($scheduleId = null)
{
    if (is_null($scheduleId)) {
        // Fetch the first available schedule as default
        $response = Http::withHeaders([
            'X-API-TOKEN' => $this->token
        ])->get('http://localhost:3000/api/schedules');

        $schedules = $response->json();
        if (!empty($schedules['data'])) {
            $scheduleId = $schedules['data'][0]['id']; // Ambil schedule pertama
        } else {
            return redirect()->back()->with('error', 'Tidak ada jadwal tersedia.');
        }
    }

    // Lakukan validasi untuk scheduleId
    $scheduleResponse = Http::withHeaders([
        'X-API-TOKEN' => $this->token
    ])->get("http://localhost:3000/api/schedule/{$scheduleId}");

    $schedule = $scheduleResponse->json();

    if (!$schedule || $scheduleResponse->failed()) {
        return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
    }

    $enrollments = Http::withHeaders([
        'X-API-TOKEN' => $this->token
    ])->get("http://localhost:3000/api/enrollments/{$scheduleId}")->json();

    if ($enrollments['status'] !== 200) {
        return redirect()->back()->with('error', 'Data KRS mahasiswa tidak ditemukan.');
    }

    return view('dosen.dosen-validasi-krs', [
        'teacher' => $this->teacher,
        'schedule' => $schedule,
        'enrollments' => $enrollments['data'] ?? [],
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
