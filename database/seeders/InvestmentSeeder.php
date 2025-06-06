<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Investment;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Investment::truncate();
        $investments = [
            [
                'title' => 'Pendanaan Seri A untuk Platform EduTech "PintarSekali"',
                'category' => 'Teknologi',
                'short_description' => 'Ekspansi platform pembelajaran adaptif berbasis AI untuk menjangkau 1 juta siswa di seluruh Indonesia.',
                'target_amount' => 7500000000, // 7.5 Miliar
                'current_amount' => 3250000000, // 3.25 Miliar
                'status' => 'open',
                'end_date' => Carbon::now()->addMonths(3), // Berakhir 3 bulan dari sekarang
            ],
            [
                'title' => 'Pembangunan Villa & Resort Ramah Lingkungan di Labuan Bajo',
                'category' => 'Properti',
                'short_description' => 'Investasi pada proyek properti premium di destinasi wisata super-prioritas dengan konsep berkelanjutan.',
                'target_amount' => 15000000000, // 15 Miliar
                'current_amount' => 15000000000, // 15 Miliar
                'status' => 'fully_funded',
                'end_date' => Carbon::now()->subMonth(), // Sudah berakhir 1 bulan lalu
            ],
            [
                'title' => 'Pengembangan Rantai Pasok Kopi Gayo Organik untuk Pasar Ekspor',
                'category' => 'Agribisnis',
                'short_description' => 'Meningkatkan kapasitas produksi dan sertifikasi organik untuk menembus pasar Eropa dan Amerika Utara.',
                'target_amount' => 4000000000, // 4 Miliar
                'current_amount' => 1100000000, // 1.1 Miliar
                'status' => 'open',
                'end_date' => Carbon::now()->addDays(45), // Berakhir 45 hari dari sekarang
            ],
            [
                'title' => 'Pabrik Daur Ulang Sampah Plastik menjadi Bahan Bakar Alternatif',
                'category' => 'Energi Terbarukan',
                'short_description' => 'Proyek inovatif untuk mengatasi masalah sampah plastik sekaligus menghasilkan sumber energi bersih.',
                'target_amount' => 11500000000, // 11.5 Miliar
                'current_amount' => 3500000000, // 3.5 Miliar
                'status' => 'closed',
                'end_date' => Carbon::now()->subMonths(2), // Sudah ditutup 2 bulan lalu
            ],
        ];

        foreach ($investments as $data) {
            Investment::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'category' => $data['category'],
                'short_description' => $data['short_description'],
                'full_content' => $this->generateFullContent($data['title']), // Konten detail dibuat otomatis
                'target_amount' => $data['target_amount'],
                'current_amount' => $data['current_amount'],
                'cover_image' => 'https://picsum.photos/seed/' . Str::slug($data['title']) . '/1280/720', // Gambar placeholder unik
                'status' => $data['status'],
                'end_date' => $data['end_date'],
            ]);
        }
    }

    private function generateFullContent(string $title): string
    {
        return "<h2>Tentang Proyek: {$title}</h2>"
            . "<p>Proyek ini merupakan peluang investasi yang menjanjikan di sektornya. Kami telah melakukan riset pasar yang mendalam dan mengidentifikasi potensi pertumbuhan yang signifikan. Visi kami adalah menjadi pemimpin pasar dengan memberikan solusi inovatif dan berkelanjutan.</p>"
            . "<h3>Rencana Penggunaan Dana</h3>"
            . "<p>Dana yang terkumpul akan dialokasikan secara strategis untuk beberapa area kunci, termasuk:</p>"
            . "<ul>"
            . "<li><strong>Pengembangan Teknologi & Infrastruktur:</strong> 40%</li>"
            . "<li><strong>Pemasaran & Akuisisi Pengguna:</strong> 30%</li>"
            . "<li><strong>Ekspansi Tim & Operasional:</strong> 20%</li>"
            . "<li><strong>Modal Kerja:</strong> 10%</li>"
            . "</ul>"
            . "<h3>Proyeksi Keuntungan</h3>"
            . "<p>Berdasarkan model bisnis kami, kami memproyeksikan ROI (Return on Investment) yang kompetitif bagi para investor dalam jangka waktu 3-5 tahun. Laporan keuangan dan proyeksi detail dapat diakses melalui portal investor setelah menandatangani NDA.</p>";
    }
}
