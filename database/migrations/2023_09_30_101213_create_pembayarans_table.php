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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periodepembayaran_id')->constrained('periode_pembayarans')->cascadeOnDelete();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->timestamp('tanggal_bayar')->nullable();
            $table->string('nomor_pembayaran')->nullable();
            $table->bigInteger('santri_id')->nullable();
            $table->boolean('status_bayar')->default(0);
            $table->string('metode_bayar')->nullable();
            $table->decimal('nilai_bayar',20,2)->nullable();
            $table->decimal('sisa_bayar',20,2)->nullable();
            $table->string('bank')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
