<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
     /**
     * Mengambil daftar notifikasi milik pengguna yang sedang login.
     */
    public function index()
    {
        // Auth::id() mengambil ID dari user yang terautentikasi (via token)
        $notifications = Notification::where('user_id', Auth::id())
                                     ->latest() // Urutkan dari yang terbaru
                                     ->get();

        return response()->json($notifications);
    }

    /**
     * Menandai notifikasi spesifik sebagai sudah dibaca.
     */
    public function markAsRead(Notification $notification)
    {
        // Pastikan notifikasi ini benar-benar milik user yang sedang login
        if ($notification->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Jika belum dibaca, update kolom 'read_at' dengan waktu sekarang
        if (is_null($notification->read_at)) {
            $notification->read_at = now();
            $notification->save();
        }

        return response()->json(['message' => 'Notification marked as read.']);
    }
}
