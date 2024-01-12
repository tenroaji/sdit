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
        Schema::create('ref_kompetensi_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kompetensi')->nullable();
            $table->string('jenis_kompetensi')->nullable();
            $table->string('cara_menilai')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_kompetensi_gurus');
    }
};
