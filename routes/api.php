<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\LelangflutterController;
use App\Http\Controllers\Api\NotificationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/carousel', [CarouselController::class,'index']);
Route::get('/lelang/jadwal', [LelangflutterController::class, 'index']);
// Grup route yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    // Endpoint untuk mengambil semua notifikasi
    Route::get('/notifications', [NotificationController::class, 'index']);

    // Endpoint untuk menandai notifikasi sebagai sudah dibaca
    // Menggunakan PATCH karena kita hanya mengupdate sebagian kecil data
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead']);
});
