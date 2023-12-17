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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('id_pengembalian');
            $table->date('tgl_penyewaan');
            $table->date('tgl_pengembalian')->nullable();
            $table->string('plat_nomor');
            $table->unsignedBigInteger('id_penyewaan');
            $table->foreign('id_penyewaan')->references('id_penyewaan')->on('penyewaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
