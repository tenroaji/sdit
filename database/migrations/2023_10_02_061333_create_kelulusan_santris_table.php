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
        Schema::create('kelulusan_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelulusan_id')->constrained('penentuan_kelulusans')->cascadeOnDelete();
            $table->string('tahun')->nullable();
            $table->bigInteger('santri_id');
            $table->bigInteger('strata_lama')->nullable();
            $table->bigInteger('strata_baru')->nullable();
            $table->string('predikat')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelulusan_santris');
    }
};
