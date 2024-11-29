<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public static function getUsers()
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/admin/users');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public static function getStudentBySearch($name)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/admin/students?name=' . $name);

            return $response->json();
        }
    }

    public static function getTeacherBySearch($name)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/admin/teachers?name=' . $name);

            return $response->json();
        }
    }

    public static function getStudent($id)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/admin/students/' . $id);

            return $response->json();
        }
    }

    public static function getTeacher($id)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/admin/teachers/' . $id);

            return $response->json();
        }
    }

    public static function register($name, $email, $password)
    {
        $response = Http::withBody([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ])->post('http://localhost:3000/api/admin/register');

        return $response->json();
    }

    public static function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        dd($validated['email']);
        // $response = Http::withBody([
        //     'email' => $email,
        //     'password' => $password
        // ])->post('http://localhost:3000/api/admin/login');

        // echo "<script>
        //     console.log($response);
        // </script>";

        // return $response->json();
    }
}
