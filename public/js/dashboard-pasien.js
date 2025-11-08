// public/js/dashboard-pasien.js

document.addEventListener('DOMContentLoaded', () => {

    // --- Ambil Elemen Modal ---
    const modal = document.getElementById('modal-konsultasi');
    const modalContentWrapper = document.getElementById('modal-content-wrapper');
    const modalTitle = document.getElementById('modal-title');
    const modalBody = document.getElementById('modal-body');

    // --- Ambil Elemen Tombol ---
    const btnCloseModal = document.getElementById('btn-close-modal');
    const btnMulaiKonsultasi = document.getElementById('btn-mulai-konsultasi');
    const btnMulaiKonsultasiEmpty = document.getElementById('btn-mulai-konsultasi-empty');

    // --- Fungsi Helper untuk Buka/Tutup Modal ---
    const openModal = () => {
        // Muat step 1 saat modal dibuka
        loadStep1_Pilihan(); 
        
        modal.classList.remove('hidden');
        // Efek animasi
        setTimeout(() => {
            modalContentWrapper.classList.remove('scale-95', 'opacity-0');
            modalContentWrapper.classList.add('scale-100', 'opacity-100');
        }, 10);
    };

    const closeModal = () => {
        modalContentWrapper.classList.add('scale-95', 'opacity-0');
        modalContentWrapper.classList.remove('scale-100', 'opacity-100');
        // Tunggu animasi selesai sebelum disembunyikan
        setTimeout(() => modal.classList.add('hidden'), 200);
    };

    // --- Event Listener Tombol ---
    btnMulaiKonsultasi.addEventListener('click', openModal);
    btnMulaiKonsultasiEmpty.addEventListener('click', openModal);
    btnCloseModal.addEventListener('click', closeModal);
    // Tutup modal jika klik di luar area konten
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // --- KONTEN MODAL DINAMIS (INTI LOGIKA) ---

    // STEP 1: Pilihan Online / Offline (Sesuai Flowchart)
    const loadStep1_Pilihan = () => {
        modalTitle.innerText = 'Pilih Metode Konsultasi';
        modalBody.innerHTML = `
            <p class="text-gray-600 text-center mb-6">
                Pilih metode konsultasi yang paling sesuai untuk Anda.
            </p>
            <div class="flex flex-col md:flex-row gap-4">
                <button id="btn-pilih-online" class="flex-1 p-6 border-2 border-brand-green rounded-xl text-left hover:bg-brand-green-light transition-all">
                    <h3 class="text-lg font-semibold text-brand-green">Konsultasi Online</h3>
                    <p class="text-gray-600 text-sm">Bicarakan keluhan Anda melalui chat dengan dokter kami.</p>
                </button>
                <button id="btn-pilih-offline" class="flex-1 p-6 border-2 border-gray-300 rounded-xl text-left hover:border-brand-green hover:bg-brand-green-light transition-all">
                    <h3 class="text-lg font-semibold text-gray-700">Konsultasi Offline</h3>
                    <p class="text-gray-600 text-sm">Buat janji temu dan datang langsung ke klinik.</p>
                </button>
            </div>
        `;

        // Tambah event listener untuk tombol baru di modal
        document.getElementById('btn-pilih-online').addEventListener('click', loadStep2_Online);
        document.getElementById('btn-pilih-offline').addEventListener('click', loadStep2_Offline);
    };

    // STEP 2 - Opsi A: Online (Sesuai Flowchart: Memberi Informasi Keluhan)
    const loadStep2_Online = () => {
        modalTitle.innerText = 'Konsultasi Online';
        modalBody.innerHTML = `
            <p class="text-gray-600 mb-4">
                Silakan tuliskan keluhan utama yang Anda rasakan. Dokter akan segera merespon chat Anda.
            </p>
            <form id="form-keluhan">
                <div class="space-y-4">
                    <div>
                        <label for="keluhan" class="block text-sm font-medium text-gray-700">Keluhan Anda</label>
                        <textarea id="keluhan" name="keluhan" rows="5" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50" placeholder="Contoh: Saya mengalami batuk kering selama 2 minggu..."></textarea>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" id="btn-kembali-step1" class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Kembali</button>
                        <button type="submit" class="py-2 px-4 bg-brand-green text-white rounded-lg hover:bg-brand-green-dark">Kirim Keluhan</button>
                    </div>
                </div>
            </form>
        `;

        // Tambah event listener
        document.getElementById('btn-kembali-step1').addEventListener('click', loadStep1_Pilihan);
        document.getElementById('form-keluhan').addEventListener('submit', (e) => {
            e.preventDefault();
            // Di aplikasi nyata, Anda akan mengirim data ini ke server
            // Di sini kita simulasi "Menunggu Dokter"
            loadStep3_Success('Online');
        });
    };

    // STEP 2 - Opsi B: Offline (Sesuai Flowchart: Janjian Dgn Dokter)
    const loadStep2_Offline = () => {
        modalTitle.innerText = 'Buat Janji Temu (Offline)';
        modalBody.innerHTML = `
            <p class="text-gray-600 mb-4">
                Silakan pilih dokter dan jadwal yang tersedia untuk konsultasi tatap muka.
            </p>
            <form id="form-janji-temu">
                <div class="space-y-4">
                    <div>
                        <label for="dokter" class="block text-sm font-medium text-gray-700">Pilih Dokter</label>
                        <select id="dokter" name="dokter" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                            <option>Dr. Budi Santoso (Umum)</option>
                            <option>Dr. Aisyah (Spesialis TBC)</option>
                            <option>Dr. Chandra (Spesialis Paru)</option>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Pilih Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-green focus:ring focus:ring-brand-green focus:ring-opacity-50">
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" id="btn-kembali-step1" class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Kembali</button>
                        <button type="submit" class="py-2 px-4 bg-brand-green text-white rounded-lg hover:bg-brand-green-dark">Buat Janji Temu</button>
                    </div>
                </div>
            </form>
        `;

        // Tambah event listener
        document.getElementById('btn-kembali-step1').addEventListener('click', loadStep1_Pilihan);
        document.getElementById('form-janji-temu').addEventListener('submit', (e) => {
            e.preventDefault();
            // Di aplikasi nyata, Anda akan mengirim data ini ke server
            loadStep3_Success('Offline');
        });
    };

    // STEP 3: Halaman Sukses (Menunggu Resep / Menunggu Janji)
    const loadStep3_Success = (type) => {
        let title, message;
        if (type === 'Online') {
            title = 'Keluhan Terkirim';
            message = 'Dokter kami akan segera merespon keluhan Anda melalui chat. Anda akan menerima notifikasi jika ada balasan atau resep baru.';
        } else { // Offline
            title = 'Janji Temu Dibuat';
            message = 'Janji temu Anda telah berhasil dijadwalkan. Silakan datang 15 menit lebih awal. Cek email Anda untuk detail konfirmasi.';
        }

        modalTitle.innerText = title;
        modalBody.innerHTML = `
            <div class="text-center">
                <svg class="w-16 h-16 text-brand-green mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-gray-600">${message}</p>
                <button id="btn-tutup-sukses" class="mt-6 py-2 px-6 bg-brand-green text-white rounded-lg hover:bg-brand-green-dark">Selesai</button>
            </div>
        `;
        
        document.getElementById('btn-tutup-sukses').addEventListener('click', closeModal);
    };

});