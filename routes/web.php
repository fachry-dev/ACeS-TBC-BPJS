<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Patient\PatientDashboardController;
use App\Http\Controllers\Patient\ProfileController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\BookingController; // <-- TAMBAHKAN INI

/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', function () {
        return view('auth.login'); 
    })->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Rute Pasien
    Route::get('/dashboard', [PatientDashboardController::class, 'index'])
         ->name('patient.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])
         ->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])
         ->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])
         ->name('profile.updatePassword');

    Route::get('/booking', [BookingController::class, 'index'])
         ->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])
         ->name('booking.store');

});


Route::middleware(['auth', 'role:dokter'])
     ->prefix('doctor')
     ->name('doctor.')
     ->group(function () {
    
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])
         ->name('dashboard');
});