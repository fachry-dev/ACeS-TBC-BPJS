// public/js/profile.js

document.addEventListener('DOMContentLoaded', () => {

    // --- LOGIKA TAB ---
    const tabProfil = document.getElementById('tab-profil');
    const tabPassword = document.getElementById('tab-password');
    const contentProfil = document.getElementById('content-profil');
    const contentPassword = document.getElementById('content-password');

    // Cek jika elemen ada
    if (tabProfil && tabPassword && contentProfil && contentPassword) {
        tabProfil.addEventListener('click', () => {
            // Tampilkan konten profil
            contentProfil.classList.remove('hidden');
            contentPassword.classList.add('hidden');
            // Atur style tab profil
            tabProfil.classList.add('text-brand-green', 'border-brand-green');
            tabProfil.classList.remove('text-gray-500', 'border-transparent', 'hover:text-gray-700', 'hover:border-gray-300');
            // Atur style tab password
            tabPassword.classList.add('text-gray-500', 'border-transparent', 'hover:text-gray-700', 'hover:border-gray-300');
            tabPassword.classList.remove('text-brand-green', 'border-brand-green');
        });

        tabPassword.addEventListener('click', () => {
            // Tampilkan konten password
            contentPassword.classList.remove('hidden');
            contentProfil.classList.add('hidden');
            // Atur style tab password
            tabPassword.classList.add('text-brand-green', 'border-brand-green');
            tabPassword.classList.remove('text-gray-500', 'border-transparent', 'hover:text-gray-700', 'hover:border-gray-300');
            // Atur style tab profil
            tabProfil.classList.add('text-gray-500', 'border-transparent', 'hover:text-gray-700', 'hover:border-gray-300');
            tabProfil.classList.remove('text-brand-green', 'border-brand-green');
        });
    }

    // --- LOGIKA SUBMIT FORM (INTERAKTIF) ---
    const formProfile = document.getElementById('form-profile-update');
    const formPassword = document.getElementById('form-password-update');
    const messageContainer = document.getElementById('message-container');
    const btnSubmitProfile = document.getElementById('btn-submit-profile');
    const btnSubmitPassword = document.getElementById('btn-submit-password');
    
    // Ambil token CSRF dari tag meta (jika ada) atau dari form
    const csrfToken = document.querySelector('input[name="_token"]').value;

    // Helper untuk menampilkan pesan
    const showMessage = (message, type = 'success') => {
        const bgColor = type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700';
        messageContainer.innerHTML = `
            <div class="${bgColor} border px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">${message}</span>
            </div>
        `;
        // Hapus pesan setelah 5 detik
        setTimeout(() => { messageContainer.innerHTML = ''; }, 5000);
    };

    // 1. Submit Form Profil
    if (formProfile && btnSubmitProfile) {
        formProfile.addEventListener('submit', async (e) => {
            e.preventDefault();
            btnSubmitProfile.disabled = true;
            btnSubmitProfile.innerText = 'Menyimpan...';

            const formData = new FormData(formProfile);

            try {
                const response = await fetch("{{ route('profile.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(result.message, 'success');
                    // Update nama di dashboard (jika ada)
                    const nameCard = document.getElementById('profile-card-name');
                    const tinggiCard = document.getElementById('profile-card-tinggi');
                    const beratCard = document.getElementById('profile-card-berat');
                    if (nameCard) nameCard.innerText = result.user.name;
                    if (tinggiCard) tinggiCard.innerText = result.user.tinggi_badan ? result.user.tinggi_badan + ' cm' : '-';
                    if (beratCard) beratCard.innerText = result.user.berat_badan ? result.user.berat_badan + ' kg' : '-';

                } else {
                    // Tangani error validasi
                    let errorMsg = result.message || 'Terjadi kesalahan.';
                    if (result.errors) {
                        errorMsg = Object.values(result.errors).flat().join('<br>');
                    }
                    showMessage(errorMsg, 'error');
                }

            } catch (error) {
                showMessage('Tidak dapat terhubung ke server.', 'error');
            } finally {
                btnSubmitProfile.disabled = false;
                btnSubmitProfile.innerText = 'Simpan Perubahan';
            }
        });
    }

    // 2. Submit Form Password
    if (formPassword && btnSubmitPassword) {
        formPassword.addEventListener('submit', async (e) => {
            e.preventDefault();
            btnSubmitPassword.disabled = true;
            btnSubmitPassword.innerText = 'Mengganti...';

            const formData = new FormData(formPassword);

            try {
                const response = await fetch("{{ route('profile.updatePassword') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(result.message, 'success');
                    formPassword.reset(); // Kosongkan form password
                } else {
                    let errorMsg = result.message || 'Terjadi kesalahan.';
                    if (result.errors) {
                        errorMsg = Object.values(result.errors).flat().join('<br>');
                    }
                    showMessage(errorMsg, 'error');
                }

            } catch (error) {
                showMessage('Tidak dapat terhubung ke server.', 'error');
            } finally {
                btnSubmitPassword.disabled = false;
                btnSubmitPassword.innerText = 'Ganti Password';
            }
        });
    }

});