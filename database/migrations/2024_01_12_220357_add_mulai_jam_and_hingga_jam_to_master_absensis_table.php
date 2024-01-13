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
            $table->time('mulai_jam');
            $table->time('hingga_jam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_absensis', function (Blueprint $table) {
            $table->dropColumn(['mulai_jam', 'hingga_jam']);
        });
    }
};
