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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('referer_url')->nullable();
            $table->text('landing_page')->after('referer_url')->nullable();
            $table->string('utm_source')->after('landing_page')->nullable();
            $table->string('utm_medium')->after('utm_source')->nullable();
            $table->string('utm_campaign')->after('utm_medium')->nullable();
            $table->string('location_city')->after('utm_campaign')->nullable();
            $table->string('location_country')->after('location_city')->nullable();
            $table->string('device_type')->after('location_country')->nullable();
            $table->timestamp('visit_timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
