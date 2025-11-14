<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ... (kode Anda yang lain)
    
    /**
     * The application's route middleware aliases.
     *
     * Aliases may be used to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // ... (middleware Anda yang lain seperti 'auth', 'guest', dll.)
        
        // 'auth' => \App\Http\Middleware\CheckRole::class,
        // 'doctor' => \App\Http\Middleware\CheckRole::class,
        // 'CheckRole' => \App\Http\Middleware\CheckRole::class,
        'CheckRole' => \App\Http\Middleware\CheckRole::class,


        // ... (mungkin ada yang lain)


        // ==========================================================
        // == ⬇️ PASTI ANDA MELEWATKAN BARIS INI ⬇️ ==
        // ==========================================================
        
        'role' => \App\Http\Middleware\CheckRole::class,

        // ==========================================================
        // == ⬆️ TAMBAHKAN BARIS DI ATAS INI ⬆️ ==
        // ==========================================================
    ];

    // ... (sisa file)
}

// protected $routeMiddleware = [
//     // ... (middleware Anda yang lain)
//     'auth' => \App\Http\Middleware\Authenticate::class,
//     'role' => \App\Http\Middleware\CheckRole::class, // <-- TAMBAHKAN INI
// ];