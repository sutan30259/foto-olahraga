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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); //id klient
            $table->foreignId('paket_id')->constrained(); //id paket
            $table->string('kode_pesanan')->unique(); //contoh <ODR-20260128-001
            $table->date('tanggal_foto');
            $table->string('status_bayar')->default('belum_bayar'); //belum bayar, dp, lunas
            $table->string('metode_bayar')->nullable(); //midtrans, cash
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
