<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'Budi Santoso',
                'position' => 'CEO, PT Inovasi Digital',
                'avatar' => 'avatar-budi.jpg', // Path relatif dari public/images
                'content' => 'Tim ini benar-benar mengubah cara kami berinteraksi dengan pelanggan. Solusi CRM mereka sangat intuitif dan meningkatkan efisiensi penjualan kami hingga 30%. Luar biasa!',
                'rating' => 5,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(30),
                'updated_at' => Carbon::now()->subDays(30),
            ],
            [
                'name' => 'Siti Aminah',
                'position' => 'Pendiri, Kopi Nusantara',
                'avatar' => 'avatar-siti.jpg',
                'content' => 'Aplikasi mobile custom yang mereka buat melampaui ekspektasi. Desainnya cantik, fungsionalitasnya sempurna, dan dukungan purna jualnya sangat responsif. Sangat direkomendasikan!',
                'rating' => 5,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(25),
                'updated_at' => Carbon::now()->subDays(25),
            ],
            [
                'name' => 'Michael Chang',
                'position' => 'CTO, Tech Solutions Inc.',
                'avatar' => 'avatar-michael.jpg',
                'content' => 'Kami terkesan dengan keahlian teknis dan kemampuan mereka dalam menangani proyek kompleks. Sistem ERP yang dibangun sangat stabil dan telah menjadi tulang punggung operasional kami.',
                'rating' => 4,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(20),
                'updated_at' => Carbon::now()->subDays(20),
            ],
            [
                'name' => 'Dewi Lestari',
                'position' => 'Manajer Pemasaran, Gaya Hidup Sehat',
                'avatar' => 'avatar-dewi.jpg',
                'content' => 'Desain ulang website kami sangat modern dan user-friendly. Sejak peluncuran, tingkat konversi kami meningkat signifikan. Mereka benar-benar mengerti visi kami.',
                'rating' => 5,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(15),
            ],
            [
                'name' => 'Rizky Pratama',
                'position' => 'Owner, Kedai Buku Pintar',
                'avatar' => 'avatar-rizky.jpg',
                'content' => 'Solusi POS yang disediakan sangat efisien dan mudah digunakan oleh staf kami. Fitur manajemen inventarisnya sangat membantu dalam mengelola stok buku kami.',
                'rating' => 4,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'name' => 'Lisa Handayani',
                'position' => 'Spesialis HR, Prima Karya',
                'avatar' => 'avatar-lisa.jpg',
                'content' => 'Aplikasi manajemen HR mereka sangat komprehensif. Menghemat banyak waktu kami dalam administrasi karyawan dan analisis data. Sangat direkomendasikan untuk bisnis yang berkembang!',
                'rating' => 5,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'John Doe',
                'position' => 'CTO, Global Tech',
                'avatar' => 'avatar-john.jpg',
                'content' => 'The team delivered an outstanding e-commerce platform that exceeded our expectations. Their technical expertise and dedication are truly commendable.',
                'rating' => 5,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Marketing Director, Bright Future',
                'avatar' => 'avatar-sarah.jpg',
                'content' => 'Their digital marketing strategies boosted our online presence significantly. We saw a remarkable increase in leads within weeks. Highly recommended!',
                'rating' => 4,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ]);
    }
}