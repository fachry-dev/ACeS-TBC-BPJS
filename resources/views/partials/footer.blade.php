<footer class="bg-brand-gray py-20">
    <div class="container mx-auto px-4 lg:px-6 grid lg:grid-cols-2 gap-12">
        <div data-aos="fade-right">
            <h2 class="text-3xl font-bold text-brand-green mb-4">Tanya Dokter</h2>
            <p class="text-gray-600 mb-8">
                Hubungi kami untuk pertanyaan apa pun melalui formulir ini. 
                Jika Anda memerlukan kunjungan langsung, lokasi kami dapat dilihat pada peta di samping untuk panduan rute
            </p>
            <form action="#" method="POST" class="space-y-4">
                @csrf 
                <div>
                    <input type="text" name="nama" placeholder="Nama Anda" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green">
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email Anda" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green">
                </div>
                <div>
                    <input type="tel" name="telepon" placeholder="Nomor Telepon" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green">
                </div>
                <div>
                    <textarea name="pesan" rows="4" placeholder="Pesan Anda" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-green"></textarea>
                </div>
                <button type="submit" class="w-full bg-brand-green text-white px-6 py-3 rounded-lg font-medium text-lg hover:bg-brand-green-dark transition duration-300">
                    Kirim
                </button>
            </form>
        </div>

        {{-- 
          ===============================================================
          BAGIAN YANG DIPERBAIKI (Di bawah ini)
          ===============================================================
        --}}
        <div class="rounded-lg overflow-hidden shadow-lg" data-aos="fade-left">
            
            {{-- 
              Perbaikan:
              1. Mengganti URL 'src' agar tidak menampilkan panel info (kotak putih).
              2. Menghapus 'width' dan 'height' dan menggantinya dengan class 'w-full h-full' 
                 agar peta mengisi seluruh kotak (menghilangkan jarak/spasi).
            --}}
           <iframe 
                src="https://www.google.com/maps?q=BPJS+Kesehatan+Cabang+Bekasi&output=embed" 
                class="w-full h-full" 
                style="border:0; min-height: 450px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
           </iframe>

        </div>
        {{-- =============================================================== --}}

    </div>
</footer>

<footer class="bg-brand-green text-white pt-16 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">

            <div class="md:col-span-4">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('assets/logo_footer.png') }}" alt="Logo RS Relawan" class="h-10 mr-3" />
                    <span class="text-3xl font-bold tracking-wider">RELAWAN</span>
                </div>
                <p class="text-sm text-brand-green-light max-w-sm">
                    RS Relawan adalah salah satu unit kesehatan dari persatuan relawan Indonesia, yang baru berdiri tahun 2020 dan memiliki pengalaman luas di dalam bidang kesehatan.
                </p>
            </div>

            <div class="md:col-span-4">
                <div class="grid grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <h5 class="font-semibold text-lg">Menu</h5>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-sm text-brand-green-light hover:text-white transition-colors">Cari Dokter</a></li>
                            <li><a href="#" class="text-sm text-brand-green-light hover:text-white transition-colors">Booking Konsultasi</a></li>
                            <li><a href="#" class="text-sm text-brand-green-light hover:text-white transition-colors">Tentang Kami</a></li>
                        </ul>
                    </div>
                    <div class="space-y-4">
                        <h5 class="font-semibold text-lg">Lainnya</h5>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-sm text-brand-green-light hover:text-white transition-colors">Layanan</a></li>
                            <li><a href="#" class="text-sm text-brand-green-light hover:text-white transition-colors">Informasi</a></li>
                            <li><a href="#" class="text-sm text-brand-green-light hover:text-white transition-colors">Artikel</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="md:col-span-4">
                <h5 class="font-semibold text-lg mb-4">Konsultasi kepada Dokter ahli kami!</h5>
                <form action="#" method="POST" class="flex items-center space-x-2 mb-6">
                    <input type="email" 
                           placeholder="masukan email anda" 
                           class="w-full px-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-brand-green-dark" />
                    <button type="submit" 
                            class="bg-brand-green-dark text-white font-semibold py-2 px-6 rounded-lg hover:bg-white hover:text-brand-green-dark transition-colors border-2 border-transparent hover:border-brand-green-dark">
                        Kirim
                    </button>
                </form>

                <h5 class="font-semibold text-lg mb-4">Ikuti sosial media kami</h5>
                <div class="flex space-x-4">
                    <a href="#" class="text-brand-green-light hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.053 1.97.22 2.62.476.65.257 1.217.634 1.77 1.188.555.556.93 1.12 1.188 1.77.255.65.423 1.45.476 2.62.058 1.265.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.053 1.17-.22 1.97-.476 2.62-.257.65-.634 1.217-1.188 1.77-.556.555-1.12.93-1.77 1.188-.65.255-1.45.423-2.62.476-1.265.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.053-1.97-.22-2.62-.476-.65-.257-1.217-.634-1.77-1.188-.555-.556-.93-1.12-1.188-1.77-.255-.65-.423-1.45-.476-2.62C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.053-1.17.22-1.97.476-2.62.257-.65.634-1.217 1.188-1.77.556-.555 1.12-.93 1.77-1.188.65-.255 1.45-.423 2.62-.476C8.416 2.175 8.796 2.163 12 2.163m0-1.646c-3.259 0-3.667.014-4.947.072-1.28.058-2.16.23-2.93.52-1.54.58-2.69 1.73-3.27 3.27-.29 1.05-.47 2.06-.52 3.32-.058 1.28-.072 1.688-.072 4.947s.014 3.667.072 4.947c.05 1.26.23 2.27.52 3.32.58 1.54 1.73 2.69 3.27 3.27 1.05.29 2.06.47 3.32.52 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.26-.05 2.27-.23 3.32-.52 1.54-.58 2.69-1.73 3.27-3.27.29-1.05.47-2.06.52-3.32.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.05-1.26-.23-2.27-.52-3.32-.58-1.54-1.73-2.69-3.27-3.27-.77-.29-1.65-.46-2.93-.52C15.667.527 15.259.513 12 .513zM12 6.84c-2.83 0-5.13 2.3-5.13 5.13s2.3 5.13 5.13 5.13 5.13-2.3 5.13-5.13S14.83 6.84 12 6.84zm0 8.64c-1.933 0-3.5-1.567-3.5-3.5s1.567-3.5 3.5-3.5 3.5 1.567 3.5 3.5-1.567 3.5-3.5 3.5zM19.38 6.36c-.6 0-1.09.49-1.09 1.09s.49 1.09 1.09 1.09 1.09-.49 1.09-1.09-.49-1.09-1.09-1.09z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-brand-green-light hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.81C10.44 7.31 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C18.34 21.21 22 17.06 22 12.06C22 6.53 17.5 2.04 12 2.04Z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-brand-green-light hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.58 7.19c-.23-.86-.9-1.52-1.76-1.75C18.26 5 12 5 12 5s-6.26 0-7.82.44c-.86.23-1.52.89-1.76 1.75C2 8.05 2 12 2 12s0 3.95.42 4.81c.23.86.9 1.52 1.76 1.75C5.74 19 12 19 12 19s6.26 0 7.82-.44c.86-.23 1.52-.89 1.76-1.75C22 15.95 22 12 22 12s0-3.95-.42-4.81zM9.55 15.5V8.5L15.27 12 9.55 15.5z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-brand-green-dark mt-12 pt-6 
                    flex flex-col md:flex-row justify-between 
                    text-sm text-brand-green-light">
            
            <p class="mb-4 md:mb-0">Hak Cipta RS Relawan 2025. Semua Hak Dilindungi.</p>
            
            <p class="mb-4 md:mb-0">©Copyright RSRELAWAN</p>
            
            <div class="flex space-x-4">
                <a href="#" class="hover:text-white">Syarat dan Ketentuan</a>
                <span>|</span>
                <a href="#" class="hover:text-white">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>