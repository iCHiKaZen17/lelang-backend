<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lelangflutter; // Gunakan model yang baru
use Carbon\Carbon;
class LelangflutterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lelangflutter::create([
            'nama_barang' => 'Lukisan Pemandangan Senja',
            'deskripsi' => 'Lukisan cat minyak di atas kanvas oleh seniman lokal ternama.',
            'harga_awal' => 5000000,
            'image_path' => 'lelang/lukisan.jpg',
            'waktu_mulai' => Carbon::now()->subHour(),
            'waktu_selesai' => Carbon::now()->addHours(2),
            'status' => 'berlangsung',
        ]);
    }
}
