@extends('layouts.patient')

@section('title', 'Edit Profil')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil Saya</h1>

    <!-- Kontainer Pesan (untuk JS) -->
    <div id="message-container" class="mb-4"></div>

    <!-- Navigasi Tab -->
    <div class="mb-6">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button id="tab-profil" class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-brand-green border-brand-green">
                    Edit Profil
                </button>
                <button id="tab-password" class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300">
                    Ganti Password
                </button>
            </nav>
        </div>
    </div>

    <!-- Konten Tab -->
    <div>
        <!-- Form Edit Profil -->
        <div id="content-profil" class="tab-content">
            <form id="form-profile-update" class="bg-white shadow-xl rounded-2xl p-8 max-w-lg">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                    </div>
                    
                    <h3 class="text-lg font-medium text-gray-900 pt-4 border-t">Data Diri</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="tinggi_badan" class="block text-sm font-medium text-gray-700">Tinggi Badan (cm)</label>
                            <input type="number" name="tinggi_badan" id="tinggi_badan" value="{{ $user->tinggi_badan }}" 
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                        </div>
                        <div>
                            <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan (kg)</label>
                            <input type="number" name="berat_badan" id="berat_badan" value="{{ $user->berat_badan }}" 
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                        </div>
                    </div>

                    <div class="pt-4 text-right">
                        <button type="submit" id="btn-submit-profile"
                                class="bg-brand-green text-white font-semibold py-2 px-6 rounded-lg shadow-lg hover:bg-brand-green-dark transition-all">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Form Ganti Password (Hidden by default) -->
        <div id="content-password" class="tab-content hidden">
            <form id="form-password-update" class="bg-white shadow-xl rounded-2xl p-8 max-w-lg">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" id="password" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                    </div>

                    <div class="pt-4 text-right">
                        <button type="submit" id="btn-submit-password"
                                class="bg-brand-green text-white font-semibold py-2 px-6 rounded-lg shadow-lg hover:bg-brand-green-dark transition-all">
                            Ganti Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // SALIN SEMUA KODE DARI 'public/js/profile.js' KE SINI
        document.addEventListener('DOMContentLoaded', () => {
            // ... (logika tab) ...
            document.addEventListener('DOMContentLoaded', (event) => {
    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');

    if (tabRegister && tabLogin && formLogin && formRegister) {
        
        
        tabRegister.addEventListener('click', () => {
            formRegister.classList.remove('hidden'); 
            formLogin.classList.add('hidden'); 

           
            tabRegister.classList.add('bg-brand-green', 'text-white');
            tabRegister.classList.remove('text-gray-400');
            
            
            tabLogin.classList.remove('bg-brand-green', 'text-white');
            tabLogin.classList.add('text-gray-400');
        });

        
        tabLogin.addEventListener('click', () => {
            formLogin.classList.remove('hidden'); // Tampilkan form login
            formRegister.classList.add('hidden'); // Sembunyikan form register

            // Atur style tab aktif (Login)
            tabLogin.classList.add('bg-brand-green', 'text-white');
            tabLogin.classList.remove('text-gray-400');

            // Atur style tab non-aktif (Register)
            tabRegister.classList.remove('bg-brand-green', 'text-white');
            tabRegister.classList.add('text-gray-400');
        });
    }
});
            // --- LOGIKA SUBMIT FORM (INTERAKTIF) ---
            const formProfile = document.getElementById('form-profile-update');
            // ... (sisa kode JS) ...

            // 1. Submit Form Profil
            if (formProfile && btnSubmitProfile) {
                formProfile.addEventListener('submit', async (e) => {
                    // ...
                    try {
                        // INI AKAN BEKERJA KARENA ADA DI BLADE
                        const response = await fetch("{{ route('profile.update') }}", { 
                            // ...
                        });
                        // ...
                    } 
                    // ...
                });
            }

            // 2. Submit Form Password
            if (formPassword && btnSubmitPassword) {
                formPassword.addEventListener('submit', async (e) => {
                    // ...
                    try {
                        // INI AKAN BEKERJA KARENA ADA DI BLADE
                        const response = await fetch("{{ route('profile.updatePassword') }}", { 
                            // ...
                        });
                        // ...
                    } 
                    // ...
                });
            }
        });
    </script>
@endpush