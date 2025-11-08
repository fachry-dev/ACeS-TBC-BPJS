<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib untuk proses login

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // ...
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role == 'pasien') {
                return redirect()->intended(route('patient.dashboard'));
            } else if ($user->role == 'dokter') {
                // Arahkan ke dashboard dokter
                return redirect()->intended(route('doctor.dashboard'));
            }

            // Default redirect
            return redirect()->intended('/');
        }
        // ...
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
