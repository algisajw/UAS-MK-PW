<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyewans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gedung_id')
                ->constrained('gedungs')
                ->onDelete('cascade');
            $table->string('nama_penyewa');
            $table->date('tanggal_sewa');
            $table->integer('durasi_hari');
            $table->bigInteger('total_harga');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewans');
    }
};
