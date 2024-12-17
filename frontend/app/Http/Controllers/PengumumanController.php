<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengumumanController extends Controller
{
    //
    public static function getAllAnnouncements()
    {
        $token = TokenController::get();
        if ($token) {
            $response = Http::withHeaders([
                'X-API-TOKEN' => $token
            ])->get('http://localhost:3000/api/announcements');

            return $response->json();
        }
    }
}
