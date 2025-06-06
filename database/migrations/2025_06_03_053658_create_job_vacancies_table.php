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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location'); // Cth: "Jakarta, Indonesia", "Remote"
            $table->enum('type', ['Full-time', 'Part-time', 'Contract', 'Internship']); // Jenis pekerjaan
            $table->longText('description'); // Deskripsi umum pekerjaan
            $table->json('responsibilities')->nullable(); // Menyimpan daftar tanggung jawab
            $table->json('qualifications')->nullable(); // Menyimpan daftar kualifikasi
            $table->date('closing_date')->nullable(); // Tanggal penutupan lowongan
            $table->boolean('is_active')->default(true); // Untuk mengaktifkan/menonaktifkan lowongan dari admin
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
