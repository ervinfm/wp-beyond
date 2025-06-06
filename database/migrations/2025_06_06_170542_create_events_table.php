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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('speaker_name');
            $table->string('speaker_title');
            $table->string('speaker_image')->nullable();
            $table->dateTime('event_date');
            $table->enum('status', ['upcoming', 'past'])->default('upcoming');
            $table->string('registration_link')->nullable();
            $table->string('video_recording_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
