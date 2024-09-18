<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyToken
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil token dari session
        $token = session('token');

        // Cek apakah token ada di session dan valid
        if (!$token) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized, token missing'], 401);
        }

        return $next($request);
    }
}
