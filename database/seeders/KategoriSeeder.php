<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            'Elektronik',
            'Otomotif',
            'Properti',
            'Seni & Koleksi',
            'Fashion',
            'Perabotan Rumah Tangga',
        ];

        foreach ($kategoris as $nama) {
            Kategori::create([
                'nama' => $nama,
                'slug' => Str::slug($nama),
            ]);
        }
    }
}
