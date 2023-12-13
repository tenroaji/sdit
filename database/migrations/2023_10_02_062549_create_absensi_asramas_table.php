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
        Schema::create('absensi_asramas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->foreignId('asrama_id')->constrained('asramas')->cascadeOnDelete();
            $table->bigInteger('kamarasrama_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_asramas');
    }
};
