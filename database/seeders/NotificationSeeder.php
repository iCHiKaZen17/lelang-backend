<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Notification;
class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari user pertama, atau buat jika tidak ada
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Buat notifikasi yang belum dibaca
        Notification::create([
            'user_id' => $user->id,
            'title' => 'Anda memenangkan lelang!',
            'message' => 'Selamat, Anda telah memenangkan lelang untuk item "Gitar Akustik Vintage 1985".',
            'link_url' => '/lelang/2',
            'read_at' => null, // null berarti belum dibaca
        ]);

        // Buat notifikasi yang sudah dibaca
        Notification::create([
            'user_id' => $user->id,
            'title' => 'Lelang Akan Dimulai',
            'message' => 'Lelang untuk "Lukisan Pemandangan Senja" akan dimulai dalam 1 jam.',
            'link_url' => '/lelang/1',
            'read_at' => now()->subDay(), // sudah dibaca kemarin
        ]);
    
    }
}
