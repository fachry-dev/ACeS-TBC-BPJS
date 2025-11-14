@extends('layouts.doctor')

@section('title', 'Konsultasi AI Baru')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Konsultasi AI (Rekam Medis Cerdas)</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- KOLOM KIRI: Kontrol & Transkrip -->
        <div class="lg:col-span-1 space-y-6">

            <!-- Fitur 1: Tombol Rekam & Analisis -->
            <div class="bg-white p-6 rounded-2xl shadow-xl">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Kontrol Perekaman</h2>
                <button id="btn-rekam" 
                        class="w-full text-center py-3 px-6 rounded-lg font-medium text-lg
                               bg-brand-green text-white
                               hover:bg-brand-green-dark transition-all duration-300">
                    🎙️ Mulai Rekam
                </button>
                <p class="text-xs text-gray-500 mt-3 text-center">
                    Klik untuk mulai merekam percakapan. Klik lagi untuk selesai & analisis.
                </p>
            </div>

            <!-- Fitur 2: Tampilan Transkrip -->
            <div class="bg-white p-6 rounded-2xl shadow-xl">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Transkrip Percakapan</h2>
                <div id="transkrip-container" 
                     class="h-96 bg-gray-100 rounded-lg p-4 border border-gray-200 
                            overflow-y-auto text-sm text-gray-600 font-mono">
                    <span id="transkrip-placeholder" class="text-gray-400">Tekan "Mulai Rekam" untuk memulai...</span>
                    <div id="transkrip-output" class="whitespace-pre-wrap"></div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN: Editor SOAP Cerdas (Formulir) -->
        <div class="lg:col-span-2">
            <!-- Fitur 3: Editor SOAP -->
            <form id="soap-form" action="{{ route('doctor.konsultasi.simpan') }}" method="POST">
                @csrf
                <div class="bg-white p-6 rounded-2xl shadow-xl space-y-6">

                    <!-- Fitur 3 (A): Kartu Peringatan (Hidden by default) -->
                    <div id="diagnosis-highlight" 
                         class="hidden p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                        <p class="font-bold">Suspek AI (Assessment)</p>
                        <p id="diagnosis-output">Suspek Tuberkulosis Paru (TB Paru)</p>
                    </div>

                    <!-- BAGIAN S (Subjective) -->
                    <div>
                        <h3 class="text-xl font-bold text-brand-green mb-3">S (Subjective)</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="S_keluhan_utama" class="block text-sm font-medium text-gray-700">Keluhan Utama</label>
                                <textarea id="S_keluhan_utama" name="S_keluhan_utama" rows="2" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green"></textarea>
                            </div>
                            <div>
                                <label for="S_keluhan_tambahan" class="block text-sm font-medium text-gray-700">Keluhan Tambahan (Pisahkan dengan baris baru)</label>
                                <textarea id="S_keluhan_tambahan" name="S_keluhan_tambahan" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green"></textarea>
                            </div>
                             <div>
                                <label for="S_riwayat_sosial" class="block text-sm font-medium text-gray-700">Riwayat Sosial & Lainnya</label>
                                <textarea id="S_riwayat_sosial" name="S_riwayat_sosial" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- BAGIAN O (Objective) -->
                    <div>
                        <h3 class="text-xl font-bold text-brand-green mb-3">O (Objective)</h3>
                        <p class="text-sm text-gray-500 mb-3 -mt-3">
                            AI akan mengisi data yang terdengar. Dokter wajib mengisi/mengoreksi data pemeriksaan fisik.
                        </p>
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Tanda Vital</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div>
                                    <label for="O_td" class="block text-xs font-medium text-gray-500">TD (mmHg)</label>
                                    <input type="text" id="O_td" name="O_td" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green">
                                </div>
                                <div>
                                    <label for="O_nadi" class="block text-xs font-medium text-gray-500">Nadi (x/mnt)</label>
                                    <input type="text" id="O_nadi" name="O_nadi" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green">
                                </div>
                                <div>
                                    <label for="O_rr" class="block text-xs font-medium text-gray-500">Napas (x/mnt)</label>
                                    <input type="text" id="O_rr" name="O_rr" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green">
                                </div>
                                 <div>
                                    <label for="O_suhu" class="block text-xs font-medium text-gray-500">Suhu (°C)</label>
                                    <input type="text" id="O_suhu" name="O_suhu" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green">
                                </div>
                            </div>
                            <div>
                                <label for="O_pemeriksaan_fisik" class="block text-sm font-medium text-gray-700">Pemeriksaan Fisik (Fokus)</label>
                                <textarea id="O_pemeriksaan_fisik" name="O_pemeriksaan_fisik" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green" placeholder="Dokter mengisi temuan fisik (e.g., Ronkhi di paru kiri, Wheezing -/-, ...)."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- BAGIAN A (Assessment) -->
                    <div>
                        <h3 class="text-xl font-bold text-brand-green mb-3">A (Assessment)</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="A_diagnosis_kerja" class="block text-sm font-medium text-gray-700">Diagnosis Kerja Utama</label>
                                <input type="text" id="A_diagnosis_kerja" name="A_diagnosis_kerja" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green bg-gray-50" placeholder="Akan terisi oleh AI...">
                            </div>
                            <div>
                                <label for="A_diagnosis_banding" class="block text-sm font-medium text-gray-700">Diagnosis Banding (Pisahkan dengan koma)</label>
                                <input type="text" id="A_diagnosis_banding" name="A_diagnosis_banding" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green">
                            </div>
                        </div>
                    </div>

                    <!-- BAGIAN P (Plan) -->
                    <div>
                        <h3 class="text-xl font-bold text-brand-green mb-3">P (Plan)</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Rencana Diagnostik (Checklist)</label>
                                <div id="plan-checklist" class="mt-2 space-y-2 text-sm">
                                    <span class="text-gray-400">Akan terisi oleh AI...</span>
                                </div>
                            </div>
                             <div>
                                <label for="P_rencana_terapi" class="block text-sm font-medium text-gray-700">Rencana Terapi</label>
                                <textarea id="P_rencana_terapi" name="P_rencana_terapi" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring-brand-green"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Fitur 4: Tombol Simpan & Ekspor -->
                    <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-4">
                        <button type="submit" 
                                id="btn-simpan"
                                class="w-full sm:w-1/2 text-center py-3 px-6 rounded-lg font-medium text-lg
                                       bg-brand-green text-white
                                       hover:bg-brand-green-dark transition-all duration-300">
                            Simpan ke Rekam Medis
                        </button>
                        <button type="button" 
                                id="btn-ekspor"
                                class="w-full sm:w-1/2 text-center py-3 px-6 rounded-lg font-medium text-lg
                                       bg-gray-700 text-white
                                       hover:bg-gray-900 transition-all duration-300">
                            Ekspor JSON (FHIR-Ready)
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- Memuat file JS baru untuk logika AI --}}
    <script src="{{ asset('js/konsultasi-ai.js') }}" defer></script>
@endpush