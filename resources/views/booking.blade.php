@extends('layouts.app')

@section('title', 'Booking Konsultasi')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-brand-green">Formulir Booking Konsultasi</h1>
            <p class="text-lg text-gray-600 mt-2">
                Silakan lengkapi detail di bawah ini untuk menjadwalkan janji temu Anda.
            </p>
        </div>

        <div class="bg-white shadow-xl rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Pilihan Dokter -->
                <div>
                    <label for="dokter" class="block text-sm font-medium text-gray-700 mb-1">Pilih Dokter</label>
                    <select id="dokter" name="dokter" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green">
                        <option value="Dr. Mike William (Umum)">Dr. Mike William (Umum)</option>
                        <option value="Dr. Aisyah (Spesialis TBC)">Dr. Aisyah (Spesialis TBC)</option>
                        <option value="Dr. Chandra (Spesialis Paru)">Dr. Chandra (Spesialis Paru)</option>
                    </select>
                </div>

                <!-- Grid: Tanggal & Jam -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Pilih Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green">
                    </div>
                    <div>
                        <label for="jam" class="block text-sm font-medium text-gray-700 mb-1">Pilih Jam</label>
                        <select id="jam" name="jam" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green">
                            <option value="09:00 - 10:00">09:00 - 10:00</option>
                            <option value="10:00 - 11:00">10:00 - 11:00</option>
                            <option value="13:00 - 14:00">13:00 - 14:00</option>
                            <option value="14:00 - 15:00">14:00 - 15:00</option>
                        </select>
                    </div>
                </div>

                <!-- Keluhan -->
                <div>
                    <label for="keluhan" class="block text-sm font-medium text-gray-700 mb-1">Keluhan Singkat</label>
                    <textarea id="keluhan" name="keluhan" rows="4" 
                              placeholder="Contoh: Saya mengalami batuk selama 1 minggu..."
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green"></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-brand-green text-white px-8 py-3 rounded-lg font-medium text-lg hover:bg-brand-green-dark transition duration-300">
                        Konfirmasi Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputTanggal = document.getElementById('tanggal');
        if (inputTanggal) {
            const today = new Date().toISOString().split('T')[0];
            
            inputTanggal.setAttribute('min', today);
        }
    });
</script>
@endpush

@endsection