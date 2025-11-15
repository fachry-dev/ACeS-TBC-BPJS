<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    /**
     * Izin agar kolom ini bisa diisi
     */
    protected $fillable = [
        'user_id',
        'soap_data',
        // 'pasien_id',
    ];

    /**
     * PENTING: Otomatis ubah kolom 'soap_data'
     * dari JSON (teks) -> menjadi array PHP (dan sebaliknya)
     * saat disimpan atau diambil.
     */
    protected $casts = [
        'soap_data' => 'array',
    ];

    /**
     * Relasi: Satu konsultasi dimiliki oleh satu User (Dokter)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}