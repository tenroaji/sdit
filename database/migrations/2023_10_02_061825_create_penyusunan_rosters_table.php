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
        Schema::create('penyusunan_rosters', function (Blueprint $table) {
            $table->id();
            $table->string('tahun')->nullable();
            $table->string('semester')->nullable();
            $table->bigInteger('tingkat_id')->nullable();
            $table->bigInteger('kelas_id')->nullable();
            $table->bigInteger('strata_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyusunan_rosters');
    }
};
