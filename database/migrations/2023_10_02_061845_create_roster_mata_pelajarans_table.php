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
        Schema::create('roster_mata_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyusunanroster_id')->constrained('penyusunan_rosters')->cascadeOnDelete();
            $table->bigInteger('hari_id');
            $table->bigInteger('jam_id');
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
        Schema::dropIfExists('roster_mata_pelajarans');
    }
};
