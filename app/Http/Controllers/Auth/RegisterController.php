<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:pasien,dokter',
        ]);
        if ($validation) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]);
        }

        // Auth::login($user);

        if ($user->role == 'dokter') {
            return redirect()->route('doctor.dashboard')->with('success', 'Registrasi berhasil! Selamat datang, Dokter ' . $user->name . '.');
        }

        return redirect()->route('patient.dashboard');
    }
}
