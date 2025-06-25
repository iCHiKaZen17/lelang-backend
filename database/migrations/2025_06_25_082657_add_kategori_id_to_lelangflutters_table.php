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
        Schema::table('lelangflutters', function (Blueprint $table) {
        // Tambahkan kolom ini setelah kolom 'deskripsi'
        // Kita asumsikan ada tabel 'kategoris' nantinya
        $table->foreignId('kategori_id')->nullable()->after('deskripsi')->constrained('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lelangflutters', function (Blueprint $table) {
            //
        });
    }
};
