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
        Schema::create('kegiatan_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('penyusunan_kegiatans')->cascadeOnDelete();
            $table->bigInteger('santri_id')->nullable();
            $table->string('peranan')->nullable();
            $table->text('catatan')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_santris');
    }
};
