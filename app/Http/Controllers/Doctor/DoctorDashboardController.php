<?php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorDashboardController extends Controller
{   
    public function index()
    {
         // Data dummy untuk 'Dashboard Antrian' (kode Anda yang lama)
        $prioritasTinggi = [ /* ... data dummy Anda ... */ ];
        $prioritasSedang = [ /* ... data dummy Anda ... */ ];
        $prioritasRendah = [ /* ... data dummy Anda ... */ ];

        return view('doctor.dashboard', compact(
            'prioritasTinggi',
            'prioritasSedang',
            'prioritasRendah'
        ));
        // 1. SIMULASI DATA DARI AI
        // (Di aplikasi nyata, ini adalah query dari tabel konsultasi)

        $prioritasTinggi = [
            (object)[
                'id' => 1,
                'pasien' => 'Budi Santoso',
                'pesan_asli' => 'Dok, saya ini sudah batuk lebih dari 1 bulan tidak sembuh-sembuh. Awalnya batuk kering, sekarang jadi ada dahak kuning. Berat badan saya juga turun 5kg padahal tidak diet. Malam-malam suka keringat dingin padahal tidak panas. Mohon bantuannya.',
                'ai_summary' => 'Pasien melaporkan batuk kronis (>1 bulan), penurunan berat badan (5kg), dan keringat malam. Suspek TBC kuat.',
                'ai_draft' => 'Selamat pagi, Pak Budi. Terima kasih atas informasinya. Mengingat keluhan batuk Anda sudah berlangsung lama disertai gejala lain, kami sangat menyarankan Bapak untuk melakukan kunjungan langsung ke Faskes kami besok untuk pemeriksaan dahak. Apakah Bapak bersedia?'
            ],
            (object)[
                'id' => 2,
                'pasien' => 'Rina Wati',
                'pesan_asli' => 'batuk darah... tolong...',
                'ai_summary' => 'Pasien melaporkan BATUK DARAH (Hemoptysis).',
                'ai_draft' => 'Ibu Rina, harap tenang. Segera kunjungi UGD/Faskes terdekat untuk penanganan langsung. Ini adalah kondisi darurat. Kami akan siapkan rujukan.'
            ],
        ];

        $prioritasSedang = [
            (object)[
                'id' => 3,
                'pasien' => 'Siti Aminah',
                'pesan_asli' => 'Pagi dok, saya batuk pilek sudah 3 hari, demam juga. Tenggorokan sakit buat menelan. Kira-kira obatnya apa ya?',
                'ai_summary' => 'Pasien melaporkan gejala ISPA akut (batuk, pilek, demam, sakit tenggorokan) selama 3 hari.',
                'ai_draft' => 'Selamat pagi, Bu Siti. Gejala Anda mengarah ke infeksi saluran napas akut (ISPA), kemungkinan flu biasa. Silakan perbanyak istirahat, minum air hangat, dan Anda bisa konsumsi Paracetamol untuk demam. Jika tidak membaik dalam 2 hari, silakan hubungi kami lagi.'
            ],
        ];

        $prioritasRendah = [
            (object)[
                'id' => 4,
                'pasien' => 'Agus Wijaya',
                'pesan_asli' => 'Dok, obat darah tinggi saya habis. Boleh minta resep lagi?',
                'ai_summary' => 'Pasien meminta resep ulang (repeat prescription) untuk obat hipertensi.',
                'ai_draft' => 'Baik, Pak Agus. Resep untuk obat hipertensi Anda sudah kami siapkan dan kirimkan secara digital. Silakan dicek.'
            ],
        ];

        return view('doctor.dashboard', compact(
            'prioritasTinggi',
            'prioritasSedang',
            'prioritasRendah'
        ));
    }

    public function konsultasiBaru()
    {
        // Mengarahkan ke file view:
        // resources/views/doctor/konsultasi_baru.blade.php
        return view('doctor.konsultasi_baru');
    }

    /**
     * Menerima dan memproses data dari Form SOAP (Fitur 4)
     */
    public function simpanKonsultasi(Request $request)
    {
        // Ini adalah langkah terakhir: Menerima data yang sudah diedit dokter.
        // Kita tidak memvalidasi terlalu ketat karena dokter yang menginput.
        
        $validatedData = $request->all();

        // Untuk sekarang, kita 'dump and die'
        // Ini akan menampilkan semua data yang dikirim dari form SOAP
        // untuk membuktikan bahwa data yang diedit dokter berhasil disimpan.
        
        // dd = Dump and Die
        dd($validatedData); 

        // Di aplikasi nyata, Anda akan menyimpan ini ke database:
        // Konsultasi::create($validatedData);
        // return redirect()->route('doctor.dashboard')->with('success', 'Rekam medis berhasil disimpan.');
    }
}
