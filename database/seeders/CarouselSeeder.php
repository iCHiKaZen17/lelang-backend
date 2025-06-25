<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::create([
            'title' => 'Lelang Spesial Akhir Tahun',
            'image_path' => 'lelang/banner1.jpg', // Pastikan gambar ini ada di storage/app/public/lelang/
            'link_url' => '/lelang/12',
            'is_active' => true,
        ]);

        Carousel::create([
            'title' => 'Koleksi Antik Terbaru',
            'image_path' => 'lelang/banner2.jpg', // Pastikan gambar ini ada
            'link_url' => '/kategori/antik',
            'is_active' => true,
        ]);
    }
}
