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
        Schema::table('master_nilais', function (Blueprint $table) {
            $table->string('capaian_pembelajaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_nilais', function (Blueprint $table) {
            $table->dropColumn('capaian_pembelajaran');
        });
    }
};
