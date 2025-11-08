document.addEventListener('DOMContentLoaded', () => {

    // --- LOGIKA TAB ---
    const tabs = document.querySelectorAll('.tab-button');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Ambil target dari id (misal tab-high -> content-high)
            const targetId = tab.id.replace('tab-', 'content-');
            const targetContent = document.getElementById(targetId);

            // Sembunyikan semua konten
            contents.forEach(content => {
                content.classList.add('hidden');
            });

            // Reset style semua tab
            tabs.forEach(t => {
                t.classList.remove('text-brand-green', 'border-brand-green'); // Reset tab Pasien
                t.classList.remove('text-red-600', 'border-red-600'); // Reset tab Dokter (High)
                t.classList.add('text-gray-500', 'border-transparent', 'hover:text-gray-700', 'hover:border-gray-300');
            });

            // Tampilkan konten yang ditarget
            if (targetContent) {
                targetContent.classList.remove('hidden');
            }

            // Atur style tab yang aktif
            // Cek prioritas untuk warna
            if (tab.id === 'tab-high') {
                tab.classList.add('text-red-600', 'border-red-600');
            } else if (tab.id === 'tab-medium') {
                tab.classList.add('text-yellow-600', 'border-yellow-600');
            } else if (tab.id === 'tab-low') {
                tab.classList.add('text-gray-600', 'border-gray-600');
            }
            tab.classList.remove('text-gray-500', 'border-transparent', 'hover:text-gray-700', 'hover:border-gray-300');
        });
    });


    // --- LOGIKA MODAL ---
    const modal = document.getElementById('modal-tinjau');
    const modalContentWrapper = document.getElementById('modal-content-wrapper');
    const btnCloseModal = document.getElementById('btn-close-modal');
    const btnsTinjau = document.querySelectorAll('.btn-tinjau');

    // Elemen di dalam modal
    const modalPasienName = document.getElementById('modal-pasien-name');
    const modalPesanAsli = document.getElementById('modal-pesan-asli');
    const modalAiSummary = document.getElementById('modal-ai-summary');
    const modalAiDraft = document.getElementById('modal-ai-draft');

    const openModal = (data) => {
        // 1. Isi data ke modal
        modalPasienName.innerText = data.pasien;
        modalPesanAsli.innerText = data.pesan;
        modalAiSummary.innerText = data.summary;
        modalAiDraft.value = data.draft; // 'value' untuk textarea

        // 2. Tampilkan modal
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContentWrapper.classList.remove('scale-95', 'opacity-0');
            modalContentWrapper.classList.add('scale-100', 'opacity-100');
        }, 10);
    };

    const closeModal = () => {
        modalContentWrapper.classList.add('scale-95', 'opacity-0');
        modalContentWrapper.classList.remove('scale-100', 'opacity-100');
        setTimeout(() => modal.classList.add('hidden'), 200);
    };

    // Tambah listener ke semua tombol "Tinjau Kasus"
    btnsTinjau.forEach(btn => {
        btn.addEventListener('click', () => {
            // Ambil data dari atribut data-*
            const data = {
                pasien: btn.dataset.pasien,
                pesan: btn.dataset.pesan,
                summary: btn.dataset.summary,
                draft: btn.dataset.draft
            };
            openModal(data);
        });
    });

    // Listener untuk tombol tutup modal
    btnCloseModal.addEventListener('click', closeModal);
    // Listener untuk klik di luar modal
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

});