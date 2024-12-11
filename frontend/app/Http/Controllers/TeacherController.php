<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{

    public $token;

    public function __construct()
    {
        $this->token = TokenController::get();
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

    // views
    public function dashboard()
    {
        return view('dosen.dosen-dashboard');
    }

    public function profile()
    {
        return view('dosen.dosen-profile');
    }

    public function profileUpdate()
    {
        return view('dosen.dosen-edit-profile');
    }

    public function grade()
    {
        return view('dosen.dosen-daftar-matkul');
    }

    public function detailGrade()
    {
        return view('dosen.dosen-input-nilai');
    }

    public function schedule()
    {
        return view('dosen.dosen-jadwal');
    }

    public function absen()
    {
        return view('dosen.dosen-absen');
    }

    public function cetakNilai()
        {
            return view('dosen.dosen-cetak-nilai');
        }

    public function historyAbsen()
    {
        return view('dosen.dosen-riwayat-absen');
    }

    public function perwalian()
    {
        return view('dosen.dosen-wali');
    }

    public function validation()
    {
        return view('dosen.dosen-validasi-krs');
    }

    public function validationDetail()
    {
        return view('dosen.dosen-detail-validasi-krs');
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
    public function mataKuliahAsuh()
    {
        return view('dosen.dosen-daftar-matkul');
    }
    
}
