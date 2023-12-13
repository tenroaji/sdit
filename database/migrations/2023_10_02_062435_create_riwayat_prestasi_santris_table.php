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
        Schema::create('riwayat_prestasi_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santris')->cascadeOnDelete();
            $table->string('prestasi')->nullable();
            $table->string('tahun')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('dokpres1')->nullable();
            $table->string('dokpres2')->nullable();
            $table->string('dokpres3')->nullable();
            $table->text('catatan')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_prestasi_santris');
    }
};
