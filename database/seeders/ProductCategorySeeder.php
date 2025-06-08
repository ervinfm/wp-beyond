<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikasi jika seeder dijalankan lagi
        ProductCategory::query()->delete();

        $categories = [
            [
                'name' => 'Solusi SaaS (Software as a Service)',
                'description' => 'Produk berbasis langganan yang dapat diakses dari mana saja, dirancang untuk skalabilitas dan kemudahan penggunaan.',
            ],
            [
                'name' => 'Manajemen Aset & Inventaris',
                'description' => 'Platform untuk melacak, mengelola, dan mengoptimalkan siklus hidup aset fisik dan digital perusahaan Anda.',
            ],
            [
                'name' => 'Teknologi Pemerintahan (GovTech)',
                'description' => 'Solusi digital inovatif yang dirancang khusus untuk meningkatkan efisiensi dan transparansi layanan publik di sektor pemerintahan.',
            ],
            [
                'name' => 'Sistem Kesehatan Digital (HealthTech)',
                'description' => 'Teknologi yang menjembatani pasien, penyedia layanan, dan manajemen fasilitas kesehatan untuk ekosistem yang lebih terintegrasi.',
            ],
            [
                'name' => 'Analitik & Big Data',
                'description' => 'Mengubah data mentah menjadi wawasan strategis melalui dashboard interaktif dan pelaporan cerdas untuk pengambilan keputusan yang lebih baik.',
            ],
            [
                'name' => 'Safety and Security',
                'description' => 'Solusi kemanan digital yang mutakhir dengan penerapan AI dalam Pemantauan keamanan sistem yang dilindungi.',
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']), // Membuat slug otomatis dari nama
                'description' => $category['description'],
            ]);
        }
    }
}