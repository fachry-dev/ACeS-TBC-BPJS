@extends('layouts.guest')

@section('title', 'Login & Register - ACeS TBC')

@section('content')
    <div class="flex items-center justify-center min-h-screen p-4">
        
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Selamat Datang di <span class="text-brand-green">AceS TBC</span>
                </h1>
                <p class="text-gray-400 mt-2">Silakan masuk atau daftar untuk melanjutkan</p>
            </div>

            <div class="bg-brand-gray shadow-xl rounded-2xl p-8">
                
                <div class="flex rounded-lg bg-brand-dark p-1 mb-6">
                    <button id="tab-login" class="flex-1 py-2 px-4 rounded-lg font-semibold transition-colors bg-brand-green text-white">
                        Login
                    </button>
                    <button id="tab-register" class="flex-1 py-2 px-4 rounded-lg font-semibold transition-colors text-gray-400">
                        Register
                    </button>
                </div>

                <form id="form-login" action="{{ route('login.authenticate') }}" method="POST">
                    @csrf 
                    
                    {{-- Tampilkan error login umum (jika email/pass salah) --}}
                    @error('email')
                        <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded-lg relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="space-y-4">
                        <div>
                            <label for="login-email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                            <input type="email" id="login-email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-2 bg-brand-dark border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-brand-green">
                        </div>
                        <div>
                            <label for="login-password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                            <input type="password" id="login-password" name="password" required
                                class="w-full px-4 py-2 bg-brand-dark border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-brand-green">
                        </div>
                        <div class="text-right">
                            <a href="#" class="text-sm text-brand-green hover:underline">Lupa Password?</a>
                        </div>
                        <div>
                            <button type="submit"
                                    class="w-full bg-brand-green text-white py-2 px-4 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                                Masuk
                            </button>
                        </div>
                    </div>
                </form>

                <form id="form-register" action="{{ route('register.store') }}" method="POST" class="hidden">
                    @csrf 
                    <div class="space-y-4">
                        <div>
                            <label for="register-name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                            <input type="text" id="register-name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-2 bg-brand-dark border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-brand-green">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="register-email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                            <input type="email" id="register-email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-2 bg-brand-dark border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-brand-green">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    
<div>
    <label for="register-confirm-password" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
    <input type="password" id="register-confirm-password" name="password_confirmation" required
        class="w-full px-4 py-2 bg-brand-dark border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-brand-green">
</div>

<div>
    <label for="role" class="block text-sm font-medium text-gray-300 mb-1">
        Daftar sebagai
    </label>
    <select id="role" name="role" required
            class="w-full px-4 py-2 bg-brand-dark border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-brand-green">
        <option value="pasien" selected>Pasien</option>
        <option value="dokter">Dokter</option>
    </select>
    @error('role')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div>
    <button type="submit"
            class="w-full bg-brand-green text-white py-2 px-4 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
        Daftar Akun
    </button>
</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/auth-tabs.js') }}" defer></script>
@endpush