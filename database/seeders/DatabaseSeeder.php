<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'pasien',
            'email' => 'pasien@example.com',
            'password' => Hash::make('12345678'), // Pastikan menggunakan enkripsi password
            'role' => 'pasien',
            'tinggi_badan' => 170,  // Contoh tinggi badan
            'berat_badan' => 70,    // Contoh berat badan
        ]);
        User::create([
            'name' => 'dokter',
            'email' => 'dokter@example.com',
            'password' => Hash::make('password'), // Pastikan menggunakan enkripsi password
            'role' => 'dokter',
        ]);
    }
}
