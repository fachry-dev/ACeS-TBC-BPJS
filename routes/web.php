<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Patient\ProfileController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Patient\PatientDashboardController;




Route::get('/', [DashboardController::class, 'index']); // Homepage utama Anda

// Grup Rute Tamu (Hanya untuk yang BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [LoginController::class, 'index'])
        ->name('login');


    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Rute Terproteksi (Hanya untuk yang SUDAH login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/dashboard', [PatientDashboardController::class, 'index'])
        ->name('patient.dashboard');


    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index'); // <-- PASTIKAN INI ADA


    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');


    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.updatePassword');
});

Route::middleware(['auth', 'CheckRole:dokter'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {

    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])
        ->name('dashboard');

});

// Route::middleware(['auth', 'CheckRole:dokter'])
//      ->prefix('doctor') // URL akan jadi /doctor/...
//      ->name('doctor.') // Nama rute akan jadi doctor....
//      ->group(function () {

//     Route::get('/dashboard', [DoctorDashboardController::class, 'index'])
//          ->name('dashboard');

    

// });