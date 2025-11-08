@extends('layouts.doctor')

@section('title', 'Dashboard Dokter')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Selamat Datang, Dr. {{ Auth::user()->name }}!</h1>

    <div class="bg-white shadow-xl rounded-2xl p-6 md:p-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-5">Antrian Konsultasi Cerdas</h2>

        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button id="tab-high" 
                        class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm
                               text-red-600 border-red-600">
                    Prioritas Tinggi (‼️)
                    <span class="ml-1 bg-red-600 text-white rounded-full px-2 py-0.5 text-xs">{{ count($prioritasTinggi) }}</span>
                </button>
                <button id="tab-medium" 
                        class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm
                               text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300">
                    Prioritas Sedang (🟡)
                    <span class="ml-1 bg-yellow-500 text-white rounded-full px-2 py-0.5 text-xs">{{ count($prioritasSedang) }}</span>
                </button>
                <button id="tab-low" 
                        class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm
                               text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300">
                    Prioritas Rendah (⚪️)
                    <span class="ml-1 bg-gray-400 text-white rounded-full px-2 py-0.5 text-xs">{{ count($prioritasRendah) }}</span>
                </button>
            </nav>
        </div>

        <div>
            <div id="content-high" class="tab-content space-y-4">
                @forelse ($prioritasTinggi as $konsultasi)
                    <div class="border border-red-200 bg-red-50 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-red-800">{{ $konsultasi->pasien }}</h3>
                            <p class="text-sm text-red-700 mt-1">
                                <span class="font-semibold">Ringkasan AI:</span> {{ $konsultasi->ai_summary }}
                            </p>
                        </div>
                        <button class="btn-tinjau mt-4 md:mt-0 md:ml-4 flex-shrink-0
                                       bg-red-600 text-white font-semibold py-2 px-4 
                                       rounded-lg hover:bg-red-700 transition-all"
                                {{-- Data ini akan diambil oleh JavaScript --}}
                                data-id="{{ $konsultasi->id }}"
                                data-pasien="{{ $konsultasi->pasien }}"
                                data-pesan="{{ $konsultasi->pesan_asli }}"
                                data-summary="{{ $konsultasi->ai_summary }}"
                                data-draft="{{ $konsultasi->ai_draft }}">
                            Tinjau Kasus
                        </button>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada kasus prioritas tinggi saat ini.</p>
                @endforelse
            </div>

            <div id="content-medium" class="tab-content hidden space-y-4">
                @forelse ($prioritasSedang as $konsultasi)
                    <div class="border border-yellow-200 bg-yellow-50 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-yellow-800">{{ $konsultasi->pasien }}</h3>
                            <p class="text-sm text-yellow-700 mt-1">
                                <span class="font-semibold">Ringkasan AI:</span> {{ $konsultasi->ai_summary }}
                            </p>
                        </div>
                        <button class="btn-tinjau mt-4 md:mt-0 md:ml-4 flex-shrink-0
                                       bg-yellow-500 text-white font-semibold py-2 px-4 
                                       rounded-lg hover:bg-yellow-600 transition-all"
                                data-id="{{ $konsultasi->id }}"
                                data-pasien="{{ $konsultasi->pasien }}"
                                data-pesan="{{ $konsultasi->pesan_asli }}"
                                data-summary="{{ $konsultasi->ai_summary }}"
                                data-draft="{{ $konsultasi->ai_draft }}">
                            Tinjau Kasus
                        </button>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada kasus prioritas sedang.</p>
                @endforelse
            </div>

            <div id="content-low" class="tab-content hidden space-y-4">
                @forelse ($prioritasRendah as $konsultasi)
                    <div class="border border-gray-200 bg-gray-50 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $konsultasi->pasien }}</h3>
                            <p class="text-sm text-gray-700 mt-1">
                                <span class="font-semibold">Ringkasan AI:</span> {{ $konsultasi->ai_summary }}
                            </p>
                        </div>
                        <button class="btn-tinjau mt-4 md:mt-0 md:ml-4 flex-shrink-0
                                       bg-gray-600 text-white font-semibold py-2 px-4 
                                       rounded-lg hover:bg-gray-700 transition-all"
                                data-id="{{ $konsultasi->id }}"
                                data-pasien="{{ $konsultasi->pasien }}"
                                data-pesan="{{ $konsultasi->pesan_asli }}"
                                data-summary="{{ $konsultasi->ai_summary }}"
                                data-draft="{{ $konsultasi->ai_draft }}">
                            Tinjau Kasus
                        </button>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada kasus prioritas rendah.</p>
                @endforelse
            </div>
        </div>
    </div>


    <div id="modal-tinjau" class="hidden fixed inset-0 z-50 overflow-auto 
                                  bg-black bg-opacity-60 
                                  flex items-center justify-center p-4">
        
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl 
                    transform transition-all scale-95 opacity-0" 
             id="modal-content-wrapper">
            
            <div class="flex justify-between items-center p-5 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800" id="modal-title">Tinjau Kasus: <span id="modal-pasien-name" class="text-brand-green"></span></h2>
                <button id="btn-close-modal" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div id="modal-body" class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-6 max-h-[70vh] overflow-y-auto">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Pesan Asli Pasien</label>
                        <div id="modal-pesan-asli" class="mt-1 p-3 h-40 w-full rounded-lg border border-gray-300 bg-gray-50 overflow-y-auto text-sm text-gray-800">
                            {{-- Diisi oleh JS --}}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-red-700">Ringkasan AI</label>
                        <div id="modal-ai-summary" class="mt-1 p-3 w-full rounded-lg border border-red-200 bg-red-50 text-sm text-red-900">
                            {{-- Diisi oleh JS --}}
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label for="modal-ai-draft" class="block text-sm font-semibold text-gray-700">Draf Balasan (Disarankan AI)</label>
                        <textarea id="modal-ai-draft" rows="7" class="mt-1 p-3 w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50 text-sm">
                            {{-- Diisi oleh JS --}}
                        </textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button class="flex-1 bg-brand-green text-white font-semibold py-2 px-4 rounded-lg hover:bg-brand-green-dark transition-all">
                            Kirim Balasan
                        </button>
                        <button class="flex-1 bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg hover:bg-gray-200 transition-all">
                            Minta Pemeriksaan Lanjutan
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/doctor-dashboard.js') }}" defer></script>
@endpush