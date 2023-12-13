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
        Schema::create('nilai_santris', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('masternilai_id');
            $table->bigInteger('santri_id')->nullable();
            $table->bigInteger('jenisnilai_id')->nullable();
            $table->decimal('nilai',20,2)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_santris');
    }
};
