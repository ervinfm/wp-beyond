<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('reports')->truncate();

        $reports = [
            [
                'title' => 'Tren Adopsi AI di Industri Keuangan Indonesia 2025',
                'summary' => 'Laporan mendalam mengenai bagaimana kecerdasan buatan (AI) mentransformasi sektor perbankan, asuransi, dan fintech di Indonesia. Menganalisis peluang, tantangan, dan proyeksi pertumbuhan.',
                'cover_image' => 'https://i.pravatar.cc/300?u=report1',
                'file_path' => 'reports/tren-adopsi-ai-keuangan-2025.pdf',
                'published_at' => Carbon::create(2025, 5, 20),
                'is_active' => true,
            ],
            [
                'title' => 'Prospek Ekonomi Digital Pasca-Pemilu di Asia Tenggara',
                'summary' => 'Analisis komparatif dampak hasil pemilu di beberapa negara Asia Tenggara terhadap iklim investasi dan regulasi di sektor ekonomi digital, termasuk e-commerce dan ride-hailing.',
                'cover_image' => 'https://i.pravatar.cc/300?u=report2',
                'file_path' => 'reports/prospek-ekonomi-digital-sea.pdf',
                'published_at' => Carbon::create(2025, 3, 15),
                'is_active' => true,
            ],
            [
                'title' => 'Masa Depan Pekerjaan: Otomatisasi dan Kebutuhan Skill Baru',
                'summary' => 'Riset tentang pergeseran lanskap pekerjaan akibat otomatisasi. Mengidentifikasi peran-peran yang rentan dan skill set yang paling dibutuhkan oleh industri dalam lima tahun ke depan.',
                'cover_image' => 'https://i.pravatar.cc/300?u=report3',
                'file_path' => 'reports/masa-depan-pekerjaan-otomatisasi.pdf',
                'published_at' => Carbon::create(2024, 11, 1),
                'is_active' => true,
            ],
            [
                'title' => 'Analisis Keamanan Siber pada Infrastruktur Cloud Hybrid',
                'summary' => 'Panduan dan analisis mengenai ancaman keamanan siber yang spesifik pada lingkungan cloud hybrid. Memberikan rekomendasi praktik terbaik untuk mitigasi risiko.',
                'cover_image' => 'https://i.pravatar.cc/300?u=report4',
                'file_path' => 'reports/analisis-keamanan-siber-cloud.pdf',
                'published_at' => Carbon::create(2024, 9, 22),
                'is_active' => false, // Contoh laporan yang tidak aktif
            ],
            [
                'title' => 'Peta Jalan Menuju Green Technology di Sektor Manufaktur',
                'summary' => 'Laporan ini menguraikan strategi dan implementasi teknologi hijau (green tech) yang dapat diadopsi oleh sektor manufaktur untuk mencapai target keberlanjutan (sustainability).',
                'cover_image' => 'https://i.pravatar.cc/300?u=report5',
                'file_path' => 'reports/peta-jalan-green-technology.pdf',
                'published_at' => Carbon::now()->subDays(10),
                'is_active' => true,
            ],
        ];

        foreach ($reports as $report) {
            DB::table('reports')->insert([
                'title' => $report['title'],
                'slug' => Str::slug($report['title']),
                'author' => 'Tim Riset Beyond Digital',
                'summary' => $report['summary'],
                'cover_image' => $report['cover_image'],
                'file_path' => $report['file_path'],
                'published_at' => $report['published_at'],
                'is_active' => $report['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}