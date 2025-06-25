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
        Schema::create('lelangflutters', function (Blueprint $table) {
             $table->id();
            $table->string('nama_barang');
            $table->text('deskripsi');
            $table->decimal('harga_awal', 15, 2);
            $table->string('image_path');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->enum('status', ['belum_dimulai', 'berlangsung', 'selesai'])->default('belum_dimulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelangflutters');
    }
};
