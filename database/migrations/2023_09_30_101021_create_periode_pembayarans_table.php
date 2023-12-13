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
        Schema::create('periode_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->bigInteger('tingkat_id')->nullable();
            $table->bigInteger('strata_id')->nullable();
            $table->decimal('jumlah_bayar',20,2)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_pembayarans');
    }
};
