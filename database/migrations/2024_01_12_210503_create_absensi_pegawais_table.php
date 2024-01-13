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
        Schema::create('absensi_pegawais', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->bigInteger('id_pegawai');
            $table->boolean('status_Kehadiran')->default(0);
            $table->text('alasan_absen')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_pegawais');
    }
};