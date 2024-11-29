<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public static function getCourses()
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/course');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public static function getCourse($code)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/course/detail/' . $code);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public static function createCourse($name, $code, $teacherId, $sks, $semester, $programStudi)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeader([
                'X-API-TOKEN' => $token
            ])->post('http://localhost:3000/api/course/create', [
                'name' => $name,
                'code' => $code,
                'teacherId' => $teacherId,
                'sks' => $sks,
                'semester' => $semester,
                'programStudi' => $programStudi
            ]);

            return $response->json();
        }
    }

    public static function updateCourse($code, $name, $teacherId, $sks, $semester, $programStudi)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeader([
                'X-API-TOKEN' => $token
            ])->patch('http://localhost:3000/api/course', [
                'code' => $code,
                'name' => $name,
                'teacherId' => $teacherId,
                'sks' => $sks,
                'semester' => $semester,
                'programStudi' => $programStudi
            ]);

            return $response->json();
        }
    }

    public static function deleteCourse($code)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeader([
                'X-API-TOKEN' => $token
            ])->delete('http://localhost:3000/api/course/' . $code);

            return $response->json();
        }
    }

    public static function getCourseBySearch($name) {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeader([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/course?name=' . $name);

            return $response->json();
        }
    }
}
