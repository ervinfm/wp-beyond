<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Service; // Pastikan model Service ada dan terimport

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolios = [
            [
                'title' => 'Website E-commerce Modern XYZ Store',
                'description' => 'Pengembangan website e-commerce responsif dengan fitur keranjang belanja, pembayaran online, dan manajemen produk yang lengkap. Dirancang untuk pengalaman belanja yang intuitif dan menarik.',
                'client_name' => 'XYZ Retail Group',
                'project_date' => '2023-11-15',
                'project_url' => 'https://www.xyzstore.com',
                'cover_image' => 'ecommerce-xyz-cover.jpg',
                'images' => ['ecommerce-xyz-1.jpg', 'ecommerce-xyz-2.jpg', 'ecommerce-xyz-3.jpg'],
                'service_keywords' => ['Web Development', 'UI/UX Design'], // Digunakan untuk mencari service_id
            ],
            [
                'title' => 'Aplikasi Mobile MyHealth Connect',
                'description' => 'Aplikasi mobile untuk manajemen kesehatan pribadi, termasuk pelacakan jadwal, pengingat obat, dan integrasi dengan perangkat wearable. Tersedia di iOS dan Android.',
                'client_name' => 'Meditech Innovations',
                'project_date' => '2024-01-20',
                'project_url' => 'https://app.myhealthconnect.com',
                'cover_image' => 'myhealth-app-cover.jpg',
                'images' => ['myhealth-app-1.jpg', 'myhealth-app-2.jpg'],
                'service_keywords' => ['Mobile App Development', 'UI/UX Design'],
            ],
            [
                'title' => 'Desain Ulang Antarmuka FinPro Dashboard',
                'description' => 'Revitalisasi UI/UX untuk dashboard manajemen keuangan enterprise, meningkatkan usability dan visualisasi data yang kompleks menjadi lebih mudah dipahami.',
                'client_name' => 'FinPro Solutions',
                'project_date' => '2023-09-01',
                'project_url' => null,
                'cover_image' => 'finpro-dashboard-cover.jpg',
                'images' => ['finpro-dashboard-1.jpg', 'finpro-dashboard-2.jpg','finpro-dashboard-2.jpg'],
                'service_keywords' => ['UI/UX Design'],
            ],
            [
                'title' => 'Sistem Informasi Akademik EduManage',
                'description' => 'Pengembangan sistem informasi akademik terintegrasi untuk kampus, mengelola data mahasiswa, mata kuliah, nilai, dan jadwal perkuliahan.',
                'client_name' => 'Universitas Jaya',
                'project_date' => '2023-07-25',
                'project_url' => null,
                'cover_image' => 'edumanage-sia-cover.jpg',
                'images' => ['edumanage-sia-1.jpg','edumanage-sia-1.jpg'],
                'service_keywords' => ['Web Development', 'Custom Software Development'],
            ],
            [
                'title' => 'Optimasi SEO untuk Travelio.id',
                'description' => 'Strategi dan implementasi optimasi mesin pencari (SEO) yang komprehensif, meningkatkan peringkat kata kunci dan lalu lintas organik untuk situs travel.',
                'client_name' => 'Travelio.id',
                'project_date' => '2024-02-10',
                'project_url' => 'https://www.travelio.id',
                'cover_image' => 'travelio-seo-cover.jpg',
                'images' => [],
                'service_keywords' => ['Digital Marketing'],
            ],
            [
                'title' => 'Branding & Identitas Visual Cafe Kopi Kita',
                'description' => 'Pengembangan identitas visual lengkap mulai dari logo, kartu nama, menu, hingga desain interior untuk kafe baru.',
                'client_name' => 'Kopi Kita Cafe',
                'project_date' => '2023-12-05',
                'project_url' => null,
                'cover_image' => 'kopi-kita-branding-cover.jpg',
                'images' => ['kopi-kita-branding-1.jpg', 'kopi-kita-branding-2.jpg'],
                'service_keywords' => ['Branding & Identity'],
            ],
            [
                'title' => 'Sistem Pemesanan Restoran DineQuick',
                'description' => 'Sistem pemesanan meja dan makanan online untuk restoran, dilengkapi dengan manajemen menu dan integrasi POS.',
                'client_name' => 'DineQuick Restaurant',
                'project_date' => '2024-03-01',
                'project_url' => 'https://order.dinequick.com',
                'cover_image' => 'dinequick-pos-cover.jpg',
                'images' => ['dinequick-pos-1.jpg'],
                'service_keywords' => ['Custom Software Development', 'Web Development'],
            ],
            [
                'title' => 'Pengembangan Aplikasi Internal HR Core',
                'description' => 'Aplikasi web internal untuk manajemen sumber daya manusia, termasuk absensi, cuti, dan data karyawan.',
                'client_name' => 'Global Corp HR',
                'project_date' => '2023-10-10',
                'project_url' => null,
                'cover_image' => 'hrcore-internal-cover.jpg',
                'images' => ['hrcore-internal-1.jpg', 'hrcore-internal-2.jpg'],
                'service_keywords' => ['Custom Software Development'],
            ],
            [
                'title' => 'Portal Berita Online InfoNasional',
                'description' => 'Pengembangan platform portal berita yang cepat, responsif, dengan fitur kategori, pencarian, dan iklan.',
                'client_name' => 'Media Berita Nasional',
                'project_date' => '2024-01-05',
                'project_url' => 'https://www.infonasional.com',
                'cover_image' => 'infonasional-portal-cover.jpg',
                'images' => ['infonasional-portal-1.jpg'],
                'service_keywords' => ['Web Development'],
            ],
            [
                'title' => 'Aplikasi Pengelola Proyek TeamFlow',
                'description' => 'Alat manajemen proyek berbasis web untuk tim kecil hingga menengah, dengan fitur tugas, timeline, dan kolaborasi real-time.',
                'client_name' => 'Startup Synergy',
                'project_date' => '2023-08-18',
                'project_url' => null,
                'cover_image' => 'teamflow-project-cover.jpg',
                'images' => ['teamflow-project-1.jpg'],
                'service_keywords' => ['Custom Software Development', 'UI/UX Design'],
            ],
            [
                'title' => 'Dashboard Monitoring IoT SmartFarm',
                'description' => 'Pengembangan dashboard interaktif untuk memvisualisasikan data sensor IoT dari pertanian pintar, membantu petani memantau kondisi dan kesehatan tanaman.',
                'client_name' => 'AgriTech Solutions',
                'project_date' => '2024-04-12',
                'project_url' => null,
                'cover_image' => 'smartfarm-iot-cover.jpg',
                'images' => ['smartfarm-iot-1.jpg', 'smartfarm-iot-2.jpg'],
                'service_keywords' => ['IoT Development', 'Data Visualization'],
            ],
            [
                'title' => 'Redesign Website Perusahaan Global Consult',
                'description' => 'Desain ulang website perusahaan untuk konsultasi bisnis, fokus pada estetika modern, responsivitas, dan user journey yang lebih baik.',
                'client_name' => 'Global Consult Inc.',
                'project_date' => '2023-06-30',
                'project_url' => 'https://www.globalconsult.com',
                'cover_image' => 'globalconsult-redesign-cover.jpg',
                'images' => ['globalconsult-redesign-1.jpg'],
                'service_keywords' => ['Web Development', 'UI/UX Design'],
            ],
        ];

        foreach ($portfolios as $portfolio) {
            // Mencari service_id berdasarkan keyword. Ini opsional dan bisa disesuaikan.
            // Jika Anda ingin service_id selalu terisi, pastikan ada service yang cocok.
            $service = Service::whereIn('title', $portfolio['service_keywords'])->inRandomOrder()->first();
            $service_id = $service ? $service->id : null;

            DB::table('portfolios')->insert([
                'title' => $portfolio['title'],
                'slug' => Str::slug($portfolio['title']),
                'description' => $portfolio['description'],
                'client_name' => $portfolio['client_name'],
                'project_date' => $portfolio['project_date'],
                'project_url' => $portfolio['project_url'],
                'cover_image' => Str::slug($portfolio['title']).'.jpg',
                'images' => json_encode($portfolio['images']), // Convert array to JSON string
                'service_id' => $service_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}