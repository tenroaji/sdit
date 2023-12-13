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
        Schema::create('penyusunan_jadwal_ujians', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('semester');
            $table->bigInteger('tingkat_id')->nullable();
            $table->bigInteger('ujian_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyusunan_jadwal_ujians');
    }
};
