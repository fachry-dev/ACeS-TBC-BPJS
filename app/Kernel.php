protected $routeMiddleware = [
    // ... (middleware Anda yang lain)
    'auth' => \App\Http\Middleware\Authenticate::class,
    'role' => \App\Http\Middleware\CheckRole::class, // <-- TAMBAHKAN INI
];