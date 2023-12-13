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
        Schema::create('periode_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->decimal('biaya',20,2);
            $table->timestamp('mulai')->nullable();
            $table->timestamp('sampai')->nullable();
            $table->bigInteger('strata_id')->nullable();
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
        Schema::dropIfExists('periode_pendaftarans');
    }
};
