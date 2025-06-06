<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'title' => 'Laravel 11: Kupas Tuntas Fitur Terbaru',
                'slug' => 'laravel-11-kupas-tuntas-fitur-terbaru',
                'description' => 'Bergabunglah bersama kami untuk mendalami fitur-fitur terbaru dan paling menarik di Laravel 11. Sesi ini akan mencakup pembahasan mendalam tentang Reverb, routing baru, dan peningkatan performa.',
                'speaker_name' => 'Budi Dharmawan',
                'speaker_title' => 'Senior Backend Developer di TechCorp',
                'speaker_image' => 'https://i.pravatar.cc/150?u=budi-dharmawan',
                'event_date' => Carbon::now()->addDays(30),
                'status' => 'upcoming',
                'registration_link' => 'https://example.com/register/laravel-11',
                'video_recording_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'React Native vs Flutter: Mana yang Terbaik untuk Proyek Anda?',
                'slug' => 'react-native-vs-flutter-proyek-anda',
                'description' => 'Sebuah debat dan diskusi panel tentang kelebihan dan kekurangan React Native dan Flutter. Dapatkan wawasan dari para ahli untuk membantu Anda memilih teknologi yang tepat untuk proyek mobile Anda berikutnya.',
                'speaker_name' => 'Citra Lestari',
                'speaker_title' => 'Mobile Development Lead di Inovasi Digital',
                'speaker_image' => 'https://i.pravatar.cc/150?u=citra-lestari',
                'event_date' => Carbon::now()->addDays(45),
                'status' => 'upcoming',
                'registration_link' => 'https://example.com/register/react-vs-flutter',
                'video_recording_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pengenalan DevOps untuk Pemula',
                'slug' => 'pengenalan-devops-untuk-pemula',
                'description' => 'Sesi ini telah berlalu. Kami membahas dasar-dasar DevOps, termasuk CI/CD, Infrastructure as Code, dan pentingnya kolaborasi antara tim pengembang dan operasional.',
                'speaker_name' => 'Agus Setiawan',
                'speaker_title' => 'DevOps Engineer di Cloudify',
                'speaker_image' => 'https://i.pravatar.cc/150?u=agus-setiawan',
                'event_date' => Carbon::now()->subDays(15),
                'status' => 'past',
                'registration_link' => null,
                'video_recording_url' => 'https://youtube.com/watch?v=example123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Membangun API Cepat dengan FastAPI',
                'slug' => 'membangun-api-cepat-dengan-fastapi',
                'description' => 'Pelajari cara membangun API yang sangat cepat dan efisien menggunakan FastAPI, framework Python modern. Workshop ini membahas validasi data, dokumentasi otomatis, dan fitur-fitur canggih lainnya.',
                'speaker_name' => 'Rina Hartono',
                'speaker_title' => 'Python Developer & AI Specialist',
                'speaker_image' => 'https://i.pravatar.cc/150?u=rina-hartono',
                'event_date' => Carbon::now()->subDays(60),
                'status' => 'past',
                'registration_link' => null,
                'video_recording_url' => 'https://youtube.com/watch?v=example456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cybersecurity: Melindungi Aplikasi Web dari Serangan Umum',
                'slug' => 'cybersecurity-melindungi-aplikasi-web',
                'description' => 'Pahami ancaman keamanan siber yang paling umum seperti SQL Injection, XSS, dan CSRF. Pelajari praktik terbaik untuk mengamankan aplikasi web Anda dalam sesi yang informatif ini.',
                'speaker_name' => 'Doni Saputra',
                'speaker_title' => 'Ethical Hacker & Security Consultant',
                'speaker_image' => 'https://i.pravatar.cc/150?u=doni-saputra',
                'event_date' => Carbon::now()->addDays(60),
                'status' => 'upcoming',
                'registration_link' => 'https://example.com/register/cybersecurity-web',
                'video_recording_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}