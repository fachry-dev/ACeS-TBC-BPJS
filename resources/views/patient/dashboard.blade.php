{{-- PENTING: Gunakan layout 'patient', bukan 'app' --}}
@extends('layouts.patient')

@section('title', 'Dashboard')

@section('content')
    
    @php $user = Auth::user(); @endphp

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Selamat Datang, <span class="text-brand-green">{{ $user->name }}!</span>
            </h1>
            <p class="text-lg text-gray-600 mt-1">
                Siap untuk memulai konsultasi pertama Anda?
            </p>
        </div>
        
        <button id="btn-mulai-konsultasi" 
                class="mt-4 md:mt-0 w-full md:w-auto
                       bg-brand-green text-white font-semibold py-3 px-6 
                       rounded-lg shadow-lg hover:bg-brand-green-dark 
                       transition-all duration-300 transform hover:-translate-y-0.5">
            Mulai Konsultasi Baru
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Riwayat Konsultasi Anda</h2>
            <div class="bg-white shadow-xl rounded-2xl p-8 text-center border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Belum Ada Riwayat</h3>
                <p class="text-gray-500 mt-2 mb-6">
                    Semua riwayat konsultasi, resep, dan hasil lab Anda akan muncul di sini.
                </p>
                <button id="btn-mulai-konsultasi-empty" 
                        class="bg-brand-green-light text-brand-green font-semibold py-2 px-5 
                               rounded-full hover:bg-brand-green hover:text-white 
                               transition-all duration-300">
                    Mulai Konsultasi Pertama Anda
                </button>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-8">
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Profil Saya</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Nama:</span>
                        <span class="font-semibold text-gray-800" id="profile-card-name">{{ $user->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Email:</span>
                        <span class="font-semibold text-gray-800">{{ $user->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Tinggi:</span>
                        <span class="font-semibold text-gray-800" id="profile-card-tinggi">{{ $user->tinggi_badan ? $user->tinggi_badan . ' cm' : '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Berat:</span>
                        <span class="font-semibold text-gray-800" id="profile-card-berat">{{ $user->berat_badan ? $user->berat_badan . ' kg' : '-' }}</span>
                    </div>
                </div>
                <a href="{{ route('profile.index') }}" class="block w-full text-center mt-6 bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg hover:bg-gray-200 transition-all">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>

    {{-- MODAL KONSULTASI (Kode Anda yang lama, tidak diubah) --}}
    <div id="modal-konsultasi" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-60 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg transform transition-all scale-95 opacity-0" id="modal-content-wrapper">
            <div class="flex justify-between items-center p-5 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800" id="modal-title">Mulai Konsultasi</h2>
                <button id="btn-close-modal" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modal-body" class="p-6 md:p-8">
                {{-- Diisi oleh JS --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- JANGAN LUPA: Ganti nama file JS Anda jika sebelumnya 'dashboard-pasien.js' --}}
    <script src="{{ asset('js/dashboard-pasien.js') }}" defer></script>
@endpush