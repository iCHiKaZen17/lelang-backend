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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul banner
            $table->string('image_path'); // Path/lokasi gambar disimpan
            $table->string('link_url')->nullable(); // URL tujuan jika banner diklik
            $table->boolean('is_active')->default(true); // Status untuk menampilkan/menyembunyikan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
