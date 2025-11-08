@extends('layouts.app')

@section('title', 'Dashboard ACeS-TBC')

@section('content')

<section class="container mx-auto px-4 lg:px-6 py-12 md:py-16">
    <div class="grid lg:grid-cols-2 gap-8 md:gap-12 items-center">
        <div data-aos="fade-right">
            <div class="inline-flex items-center bg-white border border-gray-200 rounded-full px-4 py-2 text-sm font-medium text-gray-700 mb-4">
                <svg class="h-5 w-5 text-brand-green mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Monitor adopsi ACeS-TBC, laju temuan kasus TBC secara real-time
            </div>

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4">
                Deteksi <span class="text-brand-green">TBC</span> lebih dini, dan selesaikan <br>
                <span class="text-brand-green">Rekam medis</span> dalam hitungan detik
            </h1>
            
            <p class="text-gray-600 mb-8">
                Mulai konsultasi online, buat janji temu, dan kelola resep obat Anda 
                dengan mudah dan cepat 
            </p>
            
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center sm:space-x-4 space-y-4 sm:space-y-0">
                <a href="#" class="inline-flex items-center justify-center w-full sm:w-auto bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-medium text-lg hover:bg-gray-200 transition duration-300">
                    <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    Tanya Dokter
                </a>
                <a href="#" class="inline-flex items-center justify-center w-full sm:w-auto bg-brand-green text-white px-6 py-3 rounded-lg font-medium text-lg hover:bg-brand-green-dark transition duration-300">
                    <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                    Video Kesehatan
                </a>
            </div>
        </div>
        
        <div class="hidden lg:block relative" data-aos="fade-left">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-brand-green rounded-full blur-3xl opacity-40 z-0"></div>
            <img src="assets/image_first_dokter.png" alt="Dokter" class="rounded-lg w-full h-auto object-cover z-10 relative">
        </div>
    </div>
</section>

<section class="container mx-auto px-4 lg:px-6 -mt-16 relative z-10" data-aos="fade-up" data-aos-delay="200">
    <div class="bg-white shadow-xl rounded-lg p-4 sm:p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 items-center">
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Nama</label>
                <p class="text-lg font-semibold text-gray-800">Dr. Mike William</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">No Telepon</label>
                <p class="text-lg font-semibold text-gray-800">+99 888 0898 7726</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Jadwal Dokter</label>
                <p class="text-lg font-semibold text-gray-800">30 10 2025</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Jam Praktek</label>
                <p class="text-lg font-semibold text-gray-800">15.30 – 20.30</p>
            </div>
            
            <a href="{{ route('booking.index') }}" 
               class="w-full lg:w-auto text-center bg-brand-green text-white px-6 py-3 rounded-lg font-medium text-lg hover:bg-brand-green-dark transition duration-300 md:col-span-3 lg:col-span-1">
                Booking Sekarang
            </a>

        </div>
    </div>
</section>

<section class="py-12 md:py-20 bg-brand-gray">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-xl font-medium text-gray-500 mb-1">Cek kesehatan bersama</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-brand-green">Dokter Spesialis</h3>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Paru -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gray-100 h-72 flex items-end justify-center">
                    <img src="assets/doctor_mike_spesialis.png" alt="Dr. Mike William" class="max-h-full h-full object-contain">
                </div>
                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-gray-800">Dr. Mike William</h4>
                    <p class="text-gray-500">Spesialis Paru (Pulmonolog)</p>
                </div>
            </div>

            <!-- Card 2: Penyakit Dalam -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-teal-100 h-72 flex items-end justify-center">
                    <img src="assets/doctor_mike_spesialis.png" alt="Dr. Mike William" class="max-h-full h-full object-contain">
                </div>
                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-gray-800">Dr. Mike William</h4>
                    <p class="text-gray-500">Spesialis Penyakit Dalam (Internis)</p>
                </div>
            </div>

            <!-- Card 3: Anak -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-indigo-100 h-72 flex items-end justify-center">
                    <img src="assets/doctor_mike_spesialis.png" alt="Dr. Mike William" class="max-h-full h-full object-contain">
                </div>
                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-gray-800">Dr. Mike William</h4>
                    <p class="text-gray-500">Spesialis Anak</p>
                </div>
            </div>

            <!-- Card 4: Saraf-->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-blue-100 h-72 flex items-end justify-center">
                    <img src="assets/doctor_mike_spesialis.png" alt="Dr. Mike William" class="max-h-full h-full object-contain">
                </div>
                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-gray-800">Dr. Mike William</h4>
                    <p class="text-gray-500">Spesialis Saraf</p>
                </div>
            </div>
        
        </div>
    </div>
</section>

<section class="py-12 md:py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="text-center mb-12 max-w-2xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-brand-green mb-4">Layanan Kesehatan</h2>
            <p class="text-gray-500">Dari Spesialisasi Medis Hingga Fasilitas Kesehatan Terkini, Kami Siap Melayani Setiap Kebutuhan Kesehatan Anda</p>
        </div>
        <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-3 sm:space-y-0 mb-12" data-aos="fade-up" data-aos-delay="100">
            <button id="tab-umum-btn" 
                    class="tab-btn bg-brand-green text-white px-8 py-3 rounded-full font-medium text-lg hover:bg-brand-green-dark transition duration-300">
                Layanan Umum
            </button>
            <button id="tab-spesialis-btn" 
                    class="tab-btn bg-white text-gray-700 border border-gray-300 px-8 py-3 rounded-full font-medium text-lg hover:bg-gray-100 transition duration-300">
                Spesialis
            </button>
        </div>

        <div>
            <div id="tab-umum-content" class="tab-panel">
                <div class="swiper" id="layanan-umum-slider">
                    <div class="swiper-wrapper">
                        
                        <div class="swiper-slide p-2">
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                                <img src="https://d3uhejzrzvtlac.cloudfront.net/compro/articleDesktop/197_19_ketahui-seputar-manfaat-dan-persiapan-medical-check-up.jpg" alt="Medical Check Up" class="w-full h-56 object-cover">
                                <div class="p-6 text-center">
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Medical Check Up (MCU)</h4>
                                    <p class="text-gray-500 text-sm mb-4">Menyediakan berbagai paket pemeriksaan kesehatan lengkap untuk individu, karyawan perusahaan, atau kebutuhan khusus</p>
                                    <a href="#" class="text-brand-green font-medium border border-brand-green px-5 py-2 rounded-full hover:bg-brand-green-light transition duration-300">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="swiper-slide p-2">
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                                <img src="https://i.pinimg.com/1200x/84/d6/11/84d61110c0dea2adfb22dcde82897e85.jpg" alt="Program Bayi Tabung" class="w-full h-56 object-cover">
                                <div class="p-6 text-center">
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Program Bayi Tabung</h4>
                                    <p class="text-gray-500 text-sm mb-4">Layanan kesuburan canggih untuk membantu kehamilan melalui proses pembuahan sel telur oleh sperma di laboratorium</p>
                                    <a href="#" class="text-brand-green font-medium border border-brand-green px-5 py-2 rounded-full hover:bg-brand-green-light transition duration-300">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="swiper-slide p-2">
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                                <img src="https://rsmitramasyarakat.com/wp-content/uploads/2019/10/Kelas-VIP-Kelas-1.jpg" alt="Rawat Inap" class="w-full h-56 object-cover">
                                <div class="p-6 text-center">
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Rawat Inap</h4>
                                    <p class="text-gray-500 text-sm mb-4">Fasilitas kamar perawatan yang nyaman dan modern (VIP, Kelas 1, 2, 3) didukung tim medis profesional</p>
                                    <a href="#" class="text-brand-green font-medium border border-brand-green px-5 py-2 rounded-full hover:bg-brand-green-light transition duration-300">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide p-2">
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Emergency_Department_in_the_Wagga_Wagga_Rural_Referral_Hospital.jpg" alt="UGD 24 Jam" class="w-full h-56 object-cover">
                                <div class="p-6 text-center">
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Unit Gawat Darurat (UGD) 24 Jam</h4>
                                    <p class="text-gray-500 text-sm mb-4">"Pelayanan darurat cepat dan responsif yang siap melayani 24 jam penuh untuk kondisi kritis</p>
                                    <a href="#" class="text-brand-green font-medium border border-brand-green px-5 py-2 rounded-full hover:bg-brand-green-light transition duration-300">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination mt-8"></div>
                </div>
            </div>

            <div id="tab-spesialis-content" class="tab-panel hidden">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-32 h-32 lg:w-40 lg:h-40 bg-gray-200 rounded-full mx-auto mb-4
                                    flex items-center justify-center
                                    hover:bg-brand-green-light transition-all duration-300 group cursor-pointer">
                            <span class="text-4xl text-gray-400 group-hover:text-brand-green">🫁</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800">Penyakit Paru</h4>
                    </div>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-32 h-32 lg:w-40 lg:h-40 bg-gray-200 rounded-full mx-auto mb-4
                                    flex items-center justify-center
                                    hover:bg-brand-green-light transition-all duration-300 group cursor-pointer">
                            <span class="text-4xl text-gray-400 group-hover:text-brand-green">❤️</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800">Kardiologi</h4>
                    </div>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-32 h-32 lg:w-40 lg:h-40 bg-gray-200 rounded-full mx-auto mb-4
                                    flex items-center justify-center
                                    hover:bg-brand-green-light transition-all duration-300 group cursor-pointer">
                            <span class="text-4xl text-gray-400 group-hover:text-brand-green">🧠</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800">Neurologi</h4>
                    </div>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="w-32 h-32 lg:w-40 lg:h-40 bg-gray-200 rounded-full mx-auto mb-4
                                    flex items-center justify-center
                                    hover:bg-brand-green-light transition-all duration-300 group cursor-pointer">
                            <span class="text-4xl text-gray-400 group-hover:text-brand-green">👁️</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800">Mata</h4>
                    </div>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="500">
                        <div class="w-32 h-32 lg:w-40 lg:h-40 bg-gray-200 rounded-full mx-auto mb-4
                                    flex items-center justify-center
                                    hover:bg-brand-green-light transition-all duration-300 group cursor-pointer">
                            <span class="text-4xl text-gray-400 group-hover:text-brand-green">👶</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800">Anak</h4>
                    </div>
                </div>
                <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="600">
                    <a href="#" class="text-brand-green font-medium border border-brand-green px-8 py-3 rounded-full hover:bg-brand-green-light transition duration-300">
                        Lihat Semua
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-brand-green-light py-12 md:py-16">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="bg-brand-green rounded-lg p-6 md:p-8 lg:p-12 grid lg:grid-cols-2 gap-8 items-center" data-aos="zoom-in">
            
            <div>
                <img src="assets/image_tim_dokter.png" alt="Tim Dokter" class="rounded-lg w-full h-auto object-cover">
            </div>
            
            <div class="text-white">
                <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-6">
                    Ambil langkah pertama untuk kesehatan yang lebih baik
                </h2>
                <p class="mb-6 text-sm text-gray-200">
                    Tim dokter berpengalaman kami siap membantu Anda dengan berbagai layanan kesehatan berkualitas tinggi. 
                    Jadwalkan konsultasi hari ini dan mulailah perjalanan Anda menuju kesehatan optimal.
                </p>
                <div class="relative">
                    <div class="bg-white rounded-full flex items-center p-2 shadow-lg">
                        <svg class="h-6 w-6 text-gray-400 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" 
                               placeholder="Cari dokter spesialis" 
                               class="w-full py-3 text-gray-700 bg-white focus:outline-none">
                        <button class="bg-brand-green text-white p-3 rounded-full hover:bg-brand-green-dark transition duration-300 flex-shrink-0">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection