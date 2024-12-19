<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{
    //
    public static function getSchedules()
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/schedule');

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }

    public static function getSchedule($id)
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/schedule/' . $id);

            return $response->json();
        } else {
            redirect('/auth/login/admin');
        }
    }
    
}
