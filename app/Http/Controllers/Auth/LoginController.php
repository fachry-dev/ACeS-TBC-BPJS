<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib untuk proses login

class LoginController extends Controller
{
    /**
     * Menangani percobaan login.
     * Pastikan nama method-nya PERSIS seperti ini: 'authenticate'
     */

    public function index(){
        return view('Auth.login')->with('success','berhasil login');
    }
    public function authenticate(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah kredensial yang diberikan cocok
        if (Auth::attempt($credentials)) {
            // Jika login berhasil, regenerasi session ID
            $request->session()->regenerate();

            // Ambil data user yang login
            $user = Auth::user();

            // Cek role user dan arahkan ke halaman yang sesuai
            if ($user->role == 'pasien') {
                return redirect()->intended(route('patient.dashboard')); 
            } elseif ($user->role == 'dokter') {
                return redirect()->intended(route('doctor.dashboard'));
            }

            // Redirect default jika role tidak ditemukan
            return redirect()->intended('/');
        }

        // Jika login gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}