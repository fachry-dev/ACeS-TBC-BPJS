<?php

namespace App\Http;

use App\Http\Middleware\CheckRole;

// IMPORT MIDDLEWARE
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class Kernel extends HttpKernel
{
    /**
     * Route Middleware Aliases (Laravel 11/12)
     */
    protected $middlewareAliases = [
        'auth'  => Authenticate::class,
        'guest' => RedirectIfAuthenticated::class,
        'role'  => CheckRole::class,
    ];
}
