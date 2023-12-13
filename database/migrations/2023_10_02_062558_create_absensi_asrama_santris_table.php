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
        Schema::create('absensi_asrama_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absensiasrama_id')->constrained('absensi_asramas')->cascadeOnDelete();
            $table->bigInteger('santri_id')->nullable();
            $table->boolean('status_hadir')->default(false);
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_asrama_santris');
    }
};
