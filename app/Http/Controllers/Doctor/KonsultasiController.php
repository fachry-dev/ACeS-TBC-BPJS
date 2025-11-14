<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Kita butuh 'Request' untuk 'simpanKonsultasi'

class KonsultasiController extends Controller
{
    /**
     * Menampilkan halaman 'Konsultasi AI Baru' (Fitur 1)
     */
    public function konsultasiBaru()
    {
        // Mengarahkan ke file view:
        // resources/views/doctor/konsultasi_baru.blade.php
        return view('doctor.konsultasi_baru');
    }

    /**
     * Menerima dan memproses data dari Form SOAP (Fitur 4)
     */
    public function simpanKonsultasi(Request $request)
    {
        // Ini adalah langkah terakhir: Menerima data yang sudah diedit dokter.
        $validatedData = $request->all();

        // Untuk sekarang, kita 'dump and die'
        // Ini akan menampilkan semua data yang dikirim dari form SOAP
        // untuk membuktikan bahwa data yang diedit dokter berhasil disimpan.
        
        // dd = Dump and Die
        dd($validatedData); 

        // Di aplikasi nyata, Anda akan menyimpan ini ke database:
        // Konsultasi::create($validatedData);
        // return redirect()->route('doctor.dashboard')->with('success', 'Rekam medis berhasil disimpan.');
    }
}