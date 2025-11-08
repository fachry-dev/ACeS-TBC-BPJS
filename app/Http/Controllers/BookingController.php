<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan halaman formulir booking.
     */
    public function index()
    {
        return view('booking');
    }

    /**
     * Menyimpan data booking baru.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'dokter' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'keluhan' => 'nullable|string|max:1000',
        ]);

        //     Booking::create([
        //        'user_id' => auth()->id(),
        //       'dokter' => $request->dokter,
        //        'tanggal' => $request->tanggal,
        //        'jam' => $request->jam,
        //        'keluhan' => $request->keluhan,
        //    ]);

        // 3. Arahkan kembali ke dashboard pasien dengan pesan sukses
        //    (Kita akan buat rute 'patient.dashboard' nanti, untuk saat ini
        //     kita arahkan ke rute '/' )
        
        // Ganti '/' dengan 'patient.dashboard' jika sudah ada
        return redirect()->to('/dashboard') 
                         ->with('success', 'Booking Anda telah terkonfirmasi! Silakan cek email Anda.');
    }
}