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
        Schema::create('penilaian_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ref_kompetensi_guru_id')->nullable();
            $table->bigInteger('guru_id')->nullable();
            $table->date('periode_awal')->nullable();
            $table->date('periode_akhir')->nullable();
            $table->integer('nilai')->nullable();
            $table->integer('proporsi')->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->string('penilai')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_kinerjas');
    }
};
