<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
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
}
