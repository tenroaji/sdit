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
        Schema::create('pembagian_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->bigInteger('tingkat_id');
            $table->bigInteger('kelas_id');
            $table->text('deskripsi')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembagian_kelas');
    }
};
