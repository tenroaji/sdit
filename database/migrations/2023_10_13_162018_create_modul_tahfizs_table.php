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
        Schema::create('modul_tahfizs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('santri_id')->nullable();
            $table->timestamp('tanggal_setor')->nullable();
            $table->bigInteger('surah_id')->nullable();
            $table->integer('juz')->nullable();
            $table->integer('ayat_start')->nullable();
            $table->integer('ayat_end')->nullable();
            $table->string('hasil_tes')->nullable();
            $table->bigInteger('guru_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_tahfizs');
    }
};
