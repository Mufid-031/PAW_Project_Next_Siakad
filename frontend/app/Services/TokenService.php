<?php

namespace App\Services;

class TokenService
{
    public function getToken()
    {
        return session('token', null);
    }

    public function setToken($newToken)
    {
        if (!$this->getToken()) {
            session(['token' => $newToken]);
            return true;
        }
        return false;
    }
}