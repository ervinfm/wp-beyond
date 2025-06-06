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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pemberi testimoni
            $table->string('position'); // Jabatan/Perusahaan (cth: CEO, Startup A)
            $table->string('avatar')->nullable(); // Path ke foto/avatar
            $table->text('content'); // Isi testimoni
            $table->unsignedTinyInteger('rating')->nullable(); // Untuk rating bintang 1-5
            $table->boolean('is_active')->default(true); // Kontrol untuk menampilkan/menyembunyikan dari admin
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
