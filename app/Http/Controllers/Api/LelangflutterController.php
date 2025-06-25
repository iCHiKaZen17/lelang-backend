<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lelangflutter;
use Illuminate\Http\Request;

class LelangflutterController extends Controller
{
    /**
     * Menampilkan daftar lelang dengan filter, pencarian, dan paginasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Memulai query builder
        $query = Lelangflutter::query();

        // 1. Filter berdasarkan status ('berlangsung', 'selesai', dll)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 2. Filter berdasarkan pencarian teks
        if ($request->filled('search')) {
            $search = $request->search;
            // Mencari di beberapa kolom sekaligus
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // 3. Filter berdasarkan kategori
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // 4. Filter berdasarkan rentang tanggal (berdasarkan waktu selesai lelang)
        if ($request->filled('start_date')) {
            $query->whereDate('waktu_selesai', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('waktu_selesai', '<=', $request->end_date);
        }

        // Urutkan berdasarkan yang terbaru secara default
        $query->latest(); // Ini sama dengan orderBy('created_at', 'desc')

        // Ambil hasil dengan paginasi (misal: 10 item per halaman)
        // Paginasi secara otomatis akan membaca parameter ?page=... dari URL
        $lelangs = $query->paginate(10);

        return response()->json($lelangs);
    }

    /**
     * Menampilkan detail dari satu resource lelang spesifik.
     *
     * @param  \App\Models\Lelangflutter  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelangflutter $lelang)
    {
        // Menggunakan "Route Model Binding", Laravel secara otomatis akan
        // mencari Lelangflutter berdasarkan ID dari URL.

        // Kita akan memuat relasi 'kategori' agar nama kategori ikut terkirim.
        $lelang->load('kategori');

        // Jika lelang tidak ditemukan, Laravel akan otomatis mengembalikan error 404.
        return response()->json($lelang);
    }


}
