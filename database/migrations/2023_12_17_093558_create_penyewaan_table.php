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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id('id_penyewaan');
            $table->date('tgl_penyewaan');
            $table->date('tgl_pengembalian')->nullable();
            $table->string('plat_nomor');
            $table->string('merek_motor');
            $table->string('tipe_motor');
            $table->integer('sewa_perhari');
            $table->string('id_pemilik');
            $table->string('id_penyewa');
            $table->foreign('id_pemilik')->references('username')->on('pemilik');
            $table->foreign('id_penyewa')->references('username')->on('penyewa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
