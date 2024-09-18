<?php

namespace App\Http;

class Middleware
{

    protected $routeMiddleware = [
        // middleware lainnya
        'verify.token' => \App\Http\Middleware\VerifyToken::class,
    ];

}