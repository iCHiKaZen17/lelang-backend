<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lelangflutter; // Gunakan model yang baru
use App\Models\Kategori;
use Carbon\Carbon;
class LelangflutterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // LANGKAH 1: Ambil objek kategori yang relevan terlebih dahulu.
    // Ini mengasumsikan KategoriSeeder sudah dijalankan sebelumnya.
    $kategoriSeni = Kategori::where('nama', 'Seni & Koleksi')->first();
    $kategoriOtomotif = Kategori::where('nama', 'Otomotif')->first();
    $kategoriElektronik = Kategori::where('nama', 'Elektronik')->first();

    // Pastikan kategori ditemukan sebelum digunakan untuk menghindari error
    if (!$kategoriSeni || !$kategoriOtomotif || !$kategoriElektronik) {
        // Jika seeder kategori belum dijalankan, hentikan proses ini.
        $this->command->error('Seeder Kategori belum dijalankan. Silakan jalankan KategoriSeeder terlebih dahulu.');
        return;
    }


    // LANGKAH 2: Tambahkan 'kategori_id' saat membuat data lelang.

    // Contoh 1: Lelang yang sedang berlangsung
    Lelangflutter::create([
        'nama_barang' => 'Lukisan Pemandangan Senja',
        'deskripsi' => 'Lukisan cat minyak di atas kanvas oleh seniman lokal ternama.',
        'kategori_id' => $kategoriSeni->id, // <-- GUNAKAN ID DARI OBJEK KATEGORI
        'harga_awal' => 5000000,
        'image_path' => 'lelang/lukisan.jpg',
        'waktu_mulai' => Carbon::now()->subHour(),
        'waktu_selesai' => Carbon::now()->addHours(2),
        'status' => 'berlangsung',
    ]);

    // Contoh 2: Lelang yang akan datang (misal: ini item Otomotif)
    Lelangflutter::create([
        'nama_barang' => 'Velg Mobil Klasik Ring 15',
        'deskripsi' => 'Velg langka dengan kondisi mulus, cocok untuk restorasi.',
        'kategori_id' => $kategoriOtomotif->id, // <-- GUNAKAN ID DARI OBJEK KATEGORI
        'harga_awal' => 3500000,
        'image_path' => 'lelang/velg.jpg',
        'waktu_mulai' => Carbon::now()->addDay(),
        'waktu_selesai' => Carbon::now()->addDay()->addHours(3),
        'status' => 'belum_dimulai',
    ]);

    // Contoh 3: Lelang yang sudah selesai (misal: ini item Elektronik)
    Lelangflutter::create([
        'nama_barang' => 'Kamera Analog Klasik',
        'deskripsi' => 'Kamera berfungsi normal, body mulus.',
        'kategori_id' => $kategoriElektronik->id, // <-- GUNAKAN ID DARI OBJEK KATEGORI
        'harga_awal' => 1200000,
        'image_path' => 'lelang/kamera.jpg',
        'waktu_mulai' => Carbon::now()->subDays(2),
        'waktu_selesai' => Carbon::now()->subDays(2)->addHours(2),
        'status' => 'selesai',
    ]);
    }
}
