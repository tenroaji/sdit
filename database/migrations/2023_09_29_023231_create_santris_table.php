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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->bigInteger('kota_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->timestamp('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('foto')->nullable();
            $table->bigInteger('tingkat_id')->nullable();
            $table->bigInteger('kelas_id')->nullable();
            $table->bigInteger('strata_id')->nullable();
            
            $table->boolean('status_aktif')->default(true);
            $table->bigInteger('user_id')->nullable();
            $table->string('tahun')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
