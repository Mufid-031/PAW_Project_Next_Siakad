<?php

namespace App\Services;

class TokenService
{
    // Mendapatkan token dari session
    public function getToken()
    {
        return session('token', null); // Mengambil token dari session
    }

    // Menyimpan token ke session jika belum ada
    public function setToken($newToken)
    {
        if (!$this->getToken()) {
            session(['token' => $newToken]);
            return true; // Token berhasil disimpan
        }
        return false; // Token sudah ada
    }
}