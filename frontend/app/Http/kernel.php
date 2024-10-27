<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use \App\Http\Middleware\VerifyToken;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'verifyToken' => [VerifyToken::class, 'handle'],
    ];
}