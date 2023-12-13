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
        Schema::create('static_infos', function (Blueprint $table) {
            $table->id();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('tentang')->nullable();
            $table->string('alamat')->nullable();
            $table->text('aturan_daftar')->nullable();
            $table->text('aturan_pondok')->nullable();
            $table->text('struktur_organisasi')->nullable();
            $table->string('info1')->nullable();
            $table->string('info2')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('pimpinan1')->nullable();
            $table->string('pimpinan2')->nullable();
            $table->string('pimpinan3')->nullable();
            $table->string('pimpinan4')->nullable();
            $table->string('jab1')->nullable();
            $table->string('jab2')->nullable();
            $table->string('jab3')->nullable();
            $table->string('jab4')->nullable();
            $table->string('fotopimpinan1')->nullable();
            $table->string('fotopimpinan2')->nullable();
            $table->string('fotopimpinan3')->nullable();
            $table->string('fotopimpinan4')->nullable();
            $table->string('banner1')->nullable();
            $table->string('banner2')->nullable();
            $table->string('banner3')->nullable();
            $table->string('banner4')->nullable();
            $table->text('tawar1')->nullable();
            $table->text('tawar2')->nullable();
            $table->text('tawar3')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_infos');
    }
};
