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
        Schema::create('jadwal_pulang_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwalpulang_id')->constrained('jadwal_pulangs')->cascadeOnDelete();
            $table->bigInteger('santri_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pulang_santris');
    }
};
