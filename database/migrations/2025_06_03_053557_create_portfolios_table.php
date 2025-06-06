<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description'); // Deskripsi proyek
            $table->string('client_name')->nullable(); // Nama klien
            $table->date('project_date'); // Tanggal proyek selesai
            $table->string('project_url')->nullable(); // Link ke hasil proyek
            $table->string('cover_image'); // Gambar cover untuk kartu portfolio
            $table->json('images')->nullable(); // Menyimpan galeri gambar dalam format JSON
            
            // Relasi ke tabel 'services' (opsional)
            // Menunjukkan proyek ini menggunakan layanan apa
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
