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
        Schema::create('kenaikan_tingkat_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penentuankenaikan_id')->constrained('penentuan_kenaikans')->cascadeOnDelete();
            $table->foreignId('santri_id')->constrained('santris')->cascadeOnDelete();
            $table->string('tahun')->nullable();
            $table->bigInteger('tingkat_lama')->nullable();
            $table->bigInteger('tingkat_baru')->nullable();
            $table->text('deskripsi')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kenaikan_tingkat_santris');
    }
};
