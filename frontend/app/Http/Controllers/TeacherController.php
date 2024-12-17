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
        return view('dosen.dosen-dashboard', [
            'teacher' => $this->teacher
        ]);
    }

    public function pengumuman()
    {
        return view('dosen.dosen-pengumuman', [
            'teacher' => $this->teacher,
            'announcements' => $this->announcements['status'] == 200 ? $this->announcements : null
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

    public function detailGrade()
    {
        return view('dosen.dosen.input-nilai');
    }


    public function inputNilai(Request $request, $scheduleId)
    {
        if ($this->token) {
            // Melakukan validasi untuk nilai tugas, UTS, dan UAS
            $validated = $request->validate([
                'nilai_tugas.*' => 'required|numeric|min:0|max:100',
                'nilai_uts.*' => 'required|numeric|min:0|max:100',
                'nilai_uas.*' => 'required|numeric|min:0|max:100',
            ]);
    
            // Proses untuk setiap mahasiswa
            foreach ($request->nilai_tugas as $studentId => $nilaiTugas) {
                // Kirim request API untuk menyimpan nilai tugas, UTS, dan UAS
                $response = Http::withHeaders([
                    'X-API-TOKEN' => $this->token
                ])->post('http://localhost:3000/api/input-nilai', [
                    'schedule_id' => $scheduleId,
                    'student_id' => $studentId,
                    'nilai_tugas' => $nilaiTugas,
                    'nilai_uts' => $request->nilai_uts[$studentId] ?? 0,
                    'nilai_uas' => $request->nilai_uas[$studentId] ?? 0,
                ]);
    
                // Mengecek apakah response sukses
                if ($response->failed()) {
                    return back()->with('error', 'Gagal menyimpan nilai untuk mahasiswa dengan ID: ' . $studentId);
                }
            }
    
            return redirect()->route('dosen.absen', $scheduleId)->with('success', 'Nilai berhasil disimpan!');
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
        // Mengambil data jadwal berdasarkan scheduleId
        $response = Http::withHeaders([
            'X-API-TOKEN' => $this->token
        ])->get('http://localhost:3000/api/schedule/' . $scheduleId);
        $schedule = $response->json();

        // Mengambil data absensi untuk jadwal tersebut
        $absences = Http::withHeaders([
            'X-API-TOKEN' => $this->token
        ])->get('http://localhost:3000/api/absensi/' . $scheduleId)->json();

        // Mengambil data mahasiswa yang terdaftar pada mata kuliah
        $students = Http::withHeaders([
            'X-API-TOKEN' => $this->token
        ])->get('http://localhost:3000/api/students/' . $scheduleId)->json();

        // Mengembalikan view dengan data yang diperlukan
        return view('dosen.dosen-absen', [
            'teacher' => $this->teacher,
            'schedule' => $schedule,
            'absences' => $absences['status'] === 200 ? $absences : null,
            'students' => $students['data'] ?? []
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
            ])->get('http://localhost:3000/api/evaluation/teacher/' . $scheduleId)->json();
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

    public function validation()
    {
        return view('dosen.dosen-validasi-krs', [
            'teacher' => $this->teacher
        ]);
    }

    public function validate()
    {
        return view('dosen.dosen-validasi-krs');
    }


    public function detailValidasi()
    {
        return view('dosen.dosen-detail-validasi-krs', [
            'teacher' => $this->teacher
        ]);
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
