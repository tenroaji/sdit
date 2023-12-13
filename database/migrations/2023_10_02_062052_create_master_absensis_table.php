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
        Schema::create('master_absensis', function (Blueprint $table) {
            $table->id();
            $table->string('tahun')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->bigInteger('jam_id')->nullable();
            $table->bigInteger('matapelajaran_id')->nullable();
            $table->bigInteger('guru_id')->nullable();
            $table->bigInteger('kelas_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_absensis');
    }
};
