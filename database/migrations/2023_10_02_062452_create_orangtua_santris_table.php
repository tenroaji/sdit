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
        Schema::create('orangtua_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santris')->cascadeOnDelete();
            $table->string('ayah')->nullable();
            $table->string('kerja_ayah')->nullable();
            $table->string('telp_ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('kerja_ibu')->nullable();
            $table->string('telp_ibu')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('kota_id')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('kartukeluarga1')->nullable();
            $table->string('kartukeluarga2')->nullable();
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
        Schema::dropIfExists('orangtua_santris');
    }
};
