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
        Schema::create('motor', function (Blueprint $table) {
            $table->string('plat_nomor')->primary();
            $table->string('merek');
            $table->string('tipe');
            $table->integer('sewa_perhari');
            $table->string('id_pemilik');
            $table->foreign('id_pemilik')->references('username')->on('pemilik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motor');
    }
};
