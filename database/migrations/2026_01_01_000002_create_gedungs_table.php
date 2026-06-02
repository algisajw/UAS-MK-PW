<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gedungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gedung');
            $table->integer('kapasitas');
            $table->string('lokasi');
            $table->bigInteger('harga_sewa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gedungs');
    }
};
