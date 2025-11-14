// public/js/konsultasi-ai.js

// 1. DATA JSON DUMMY (Sesuai yang Anda berikan)
// Di aplikasi nyata, ini adalah hasil 'fetch' dari model AI Anda.
const dummyJsonResponse = {
    "kasus_id": "TBC-181",
    "skenario_klinis": "Aturan TBC-1, Pria 55 tahun, Pensiunan. Batuk 6 minggu, BB turun 5 kg, demam sumeng. Riwayat perokok berat.",
    "transkrip_percakapan": "Dokter: Selamat pagi, Pak Agus. Ada keluhan apa?\nPasien: Pagi, Dok. Ee... gini, saya batuk, Dok. Udah 6 mingguan, nggak hilang-hilang. Batuknya berdahak. Saya kurang yakin, Dok. Badan saya lemes banget, Dok. Nggreges gitu.\nDokter: 6 minggu batuk. Ada demam atau keringat malam berlebihan, Pak?\nPasien: Kalo demam sih sumeng-sumeng aja. Tapi kalo malam, Dok, keringetnya banyak banget. Berat badan juga turun 5 kilo, Dok. Saya kan perokok berat, Dok. Kan.\nDokter: Faktor risiko rokok berat dan usia, ditambah batuk kronis, keringat malam, dan penurunan BB. Ini sudah masuk kriteria 'Suspek TBC'. Saya periksa dulu ya. ... Ada ronkhi di paru kiri.\nPasien: Aduh, TBC ya, Dok?\nDokter: Kita harus pastikan segera. Saya buatkan pengantar BTA SPS 3 kali dan rujukan Foto Thorax. Ini demi pengobatan yang tepat, Pak.\nPasien: Iya, Dok. Saya siap. Terima kasih banyak.",
    "soap_output_json": {
        "S_Subjective": {
            "keluhan_utama": "Batuk berdahak sejak 6 minggu yang lalu.",
            "keluhan_tambahan": [
                "Malaise (lemas)",
                "Demam ringan (sumeng/nggreges)",
                "Keringat malam yang signifikan",
                "Penurunan berat badan 5 kg."
            ],
            "riwayat_penyakit_dahulu": "Tidak ada.",
            "riwayat_pengobatan": "Obat batuk bebas, tidak mempan.",
            "riwayat_keluarga_dan_sosial": {
                "kontak_tbc": "Tidak ada.",
                "merokok": "Perokok berat."
            }
        },
        "O_Objective": {
            "keadaan_umum": "Tampak lemas, sakit ringan.",
            "kesadaran": "Compos Mentis",
            "tanda_vital": {
                "tekanan_darah_mmhg": "130/80",
                "nadi_x_menit": 88,
                "pernapasan_x_menit": 20,
                "suhu_celsius": 37.6,
                "berat_badan_kg": 65,
                "tinggi_badan_cm": 168
            },
            "pemeriksaan_fisik_fokus": {
                "kepala": "Tidak ada kelainan.",
                "thorax_paru": "Auskultasi: Suara dasar vesikuler, Ronkhi basah halus di apeks paru kiri, Wheezing -/-."
            }
        },
        "A_Assessment": {
            "diagnosis_kerja_utama": {
                "nama": "Suspek Tuberkulosis Paru (TB Paru)",
                "kode_icd10": "A15.0",
                "kode_snomed": "171400006"
            },
            "diagnosis_banding": [
                "Bronkitis Kronis"
            ],
            "dasar_penilaian": "Batuk > 14 hari, Keringat malam, Penurunan BB, dan faktor risiko rokok berat."
        },
        "P_Plan": {
            "rencana_diagnostik": [
                "Pemeriksaan Sputum BTA SPS (SPS)",
                "Rujukan Foto Thorax PA"
            ],
            "rencana_terapi": [
                "Vitamin dan KIE nutrisi."
            ],
            "rencana_edukasi": [
                "Edukasi TBC dan konseling berhenti merokok."
            ]
        }
    }
};

// 2. FUNGSI UTAMA
document.addEventListener('DOMContentLoaded', () => {
    
    // Ambil semua elemen penting
    const btnRekam = document.getElementById('btn-rekam');
    const btnEkspor = document.getElementById('btn-ekspor');
    const transkripPlaceholder = document.getElementById('transkrip-placeholder');
    const transkripOutput = document.getElementById('transkrip-output');
    const diagnosisHighlight = document.getElementById('diagnosis-highlight');
    const diagnosisOutput = document.getElementById('diagnosis-output');
    const planChecklist = document.getElementById('plan-checklist');
    const soapForm = document.getElementById('soap-form');

    let isRecording = false;

    // Fitur 1: Tombol Rekam & Analisis
    btnRekam.addEventListener('click', () => {
        if (!isRecording) {
            // == MULAI REKAM ==
            btnRekam.innerHTML = 'Merekam... 🎙️';
            btnRekam.classList.add('bg-red-600', 'hover:bg-red-700');
            btnRekam.classList.remove('bg-brand-green', 'hover:bg-brand-green-dark');
            
            // Bersihkan form & transkrip lama
            transkripPlaceholder.classList.remove('hidden');
            transkripOutput.innerHTML = '';
            soapForm.reset();
            diagnosisHighlight.classList.add('hidden');
            planChecklist.innerHTML = '<span class="text-gray-400">Akan terisi oleh AI...</span>';
            
            isRecording = true;
            
            // Di aplikasi nyata, di sinilah API Speech-to-Text (Langkah 1) diaktifkan.
            
        } else {
            // == SELESAI & ANALISIS ==
            btnRekam.innerHTML = 'Menganalisis... 🧠';
            btnRekam.disabled = true;
            transkripPlaceholder.classList.add('hidden');
            
            // Simulasi AI sedang berpikir (Langkah 2)
            setTimeout(() => {
                // Panggil fungsi untuk mengisi form dengan data JSON
                fillFormWithAiData(dummyJsonResponse);

                // Reset tombol
                btnRekam.innerHTML = '🎙️ Mulai Rekam';
                btnRekam.classList.remove('bg-red-600', 'hover:bg-red-700');
                btnRekam.classList.add('bg-brand-green', 'hover:bg-brand-green-dark');
                btnRekam.disabled = false;
                isRecording = false;
                
            }, 2000); // Simulasi 2 detik
        }
    });

    // Fitur 4: Tombol Ekspor
    btnEkspor.addEventListener('click', () => {
        // Panggil fungsi untuk membaca data form dan ekspor
        exportFormDataAsJson();
    });
});

// Fitur 3: Fungsi untuk mengisi form SOAP Cerdas
function fillFormWithAiData(data) {
    const soap = data.soap_output_json;

    // Fitur 2: Isi Transkrip
    document.getElementById('transkrip-output').innerText = data.transkrip_percakapan;

    // Fitur 3 (S): Subjective
    document.getElementById('S_keluhan_utama').value = soap.S_Subjective.keluhan_utama || '';
    // Menggabungkan array dengan baris baru
    document.getElementById('S_keluhan_tambahan').value = (soap.S_Subjective.keluhan_tambahan || []).join('\n');
    document.getElementById('S_riwayat_sosial').value = `Kontak TBC: ${soap.S_Subjective.riwayat_keluarga_dan_sosial.kontak_tbc}\nMerokok: ${soap.S_Subjective.riwayat_keluarga_dan_sosial.merokok}`;

    // Fitur 3 (O): Objective
    // (AI mengisi apa yang dia tahu, dokter melengkapi sisanya)
    document.getElementById('O_td').value = soap.O_Objective.tanda_vital.tekanan_darah_mmhg || '';
    document.getElementById('O_nadi').value = soap.O_Objective.tanda_vital.nadi_x_menit || '';
    document.getElementById('O_rr').value = soap.O_Objective.tanda_vital.pernapasan_x_menit || '';
    document.getElementById('O_suhu').value = soap.O_Objective.tanda_vital.suhu_celsius || '';
    // AI mengisi temuan dari transkrip, dokter bisa menambah/edit
    document.getElementById('O_pemeriksaan_fisik').value = soap.O_Objective.pemeriksaan_fisik_fokus.thorax_paru || '';

    // Fitur 3 (A): Assessment
    // Tampilkan Kartu Peringatan
    document.getElementById('diagnosis-output').innerText = soap.A_Assessment.diagnosis_kerja_utama.nama || 'Tidak ada suspek';
    document.getElementById('diagnosis-highlight').classList.remove('hidden');
    // Isi form
    document.getElementById('A_diagnosis_kerja').value = soap.A_Assessment.diagnosis_kerja_utama.nama || '';
    document.getElementById('A_diagnosis_banding').value = (soap.A_Assessment.diagnosis_banding || []).join(', ');

    // Fitur 3 (P): Plan (Checklist)
    const planChecklist = document.getElementById('plan-checklist');
    planChecklist.innerHTML = ''; // Kosongkan
    
    const plans = soap.P_Plan.rencana_diagnostik || [];
    if (plans.length > 0) {
        plans.forEach(item => {
            const checklistItem = `
                <label class="flex items-center space-x-2 text-gray-700">
                    <input type="checkbox" name="P_rencana_diagnostik[]" value="${item}" checked 
                           class="rounded text-brand-green focus:ring-brand-green">
                    <span>${item}</span>
                </label>
            `;
            planChecklist.innerHTML += checklistItem;
        });
    } else {
        planChecklist.innerHTML = '<span class="text-gray-400">Tidak ada rencana diagnostik dari AI.</span>';
    }
    
    // Isi Rencana Terapi
    document.getElementById('P_rencana_terapi').value = (soap.P_Plan.rencana_terapi || []).join('\n');
}

// Fitur 4: Fungsi untuk Ekspor JSON
function exportFormDataAsJson() {
    // 1. Buat struktur JSON baru
    let finalJson = {
        "S_Subjective": {},
        "O_Objective": { "tanda_vital": {}, "pemeriksaan_fisik_fokus": {} },
        "A_Assessment": {},
        "P_Plan": { "rencana_diagnostik": [], "rencana_terapi": [] }
    };

    // 2. Baca data dari form (data yang SUDAH DIEDIT dokter)
    // S
    finalJson.S_Subjective.keluhan_utama = document.getElementById('S_keluhan_utama').value;
    finalJson.S_Subjective.keluhan_tambahan = document.getElementById('S_keluhan_tambahan').value.split('\n').filter(Boolean); // split by newline
    finalJson.S_Subjective.riwayat_sosial = document.getElementById('S_riwayat_sosial').value;
    
    // O
    finalJson.O_Objective.tanda_vital.tekanan_darah_mmhg = document.getElementById('O_td').value;
    finalJson.O_Objective.tanda_vital.nadi_x_menit = document.getElementById('O_nadi').value;
    finalJson.O_Objective.tanda_vital.pernapasan_x_menit = document.getElementById('O_rr').value;
    finalJson.O_Objective.tanda_vital.suhu_celsius = document.getElementById('O_suhu').value;
    finalJson.O_Objective.pemeriksaan_fisik_fokus.thorax_paru = document.getElementById('O_pemeriksaan_fisik').value;
    
    // A
    finalJson.A_Assessment.diagnosis_kerja_utama = { "nama": document.getElementById('A_diagnosis_kerja').value };
    finalJson.A_Assessment.diagnosis_banding = document.getElementById('A_diagnosis_banding').value.split(',').map(s => s.trim()).filter(Boolean); // split by comma
    
    // P
    document.querySelectorAll('input[name="P_rencana_diagnostik[]"]:checked').forEach(cb => {
        finalJson.P_Plan.rencana_diagnostik.push(cb.value);
    });
    finalJson.P_Plan.rencana_terapi = document.getElementById('P_rencana_terapi').value.split('\n').filter(Boolean);

    // 3. Panggil helper untuk men-download file
    downloadJson(finalJson, `SOAP_Output_${Date.now()}.json`);
}

// Helper untuk men-download file JSON
function downloadJson(data, filename) {
    const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}