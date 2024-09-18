<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    protected $tokenService;

    // Inject TokenService ke dalam controller
    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    // Method untuk menyimpan token
    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $token = $request->input('token');

        // Simpan token menggunakan TokenService
        if ($this->tokenService->setToken($token)) {
            return response()->json(['status' => 'success', 'message' => 'Token saved successfully']);
        } else {
            return response()->json(['status' => 'success', 'message' => 'Token already exists']);
        }
    }
}
