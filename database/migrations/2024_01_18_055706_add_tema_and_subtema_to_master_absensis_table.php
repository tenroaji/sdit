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
        Schema::table('master_absensis', function (Blueprint $table) {
            $table->string('tema')->nullable();
            $table->string('subtema')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_absensis', function (Blueprint $table) {
            $table->dropColumn(['tema', 'subtema']);
        });
    }
};
