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
        Schema::create('pendaftaran_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periodependaftaran_id')->constrained('periode_pendaftarans')->cascadeOnDelete();
            $table->string('tahun');
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->bigInteger('kota_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->timestamp('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('foto')->nullable();
            $table->bigInteger('strata_id')->nullable();
            $table->boolean('status_bayar_biaya')->default(false);            
            $table->boolean('status_terima')->default(false);
            $table->bigInteger('user_id')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('lulus_tahun')->nullable();
            $table->string('ijasah')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_santris');
    }
};
