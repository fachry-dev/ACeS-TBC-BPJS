<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // Tambahkan ...$roles
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek jika user tidak login ATAU rolenya tidak ada di daftar
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            // Jika tidak sesuai, lempar ke halaman 403 (Forbidden)
            abort(403, 'ANDA TIDAK PUNYA AKSES.');
        }
        return $next($request);
    }
}