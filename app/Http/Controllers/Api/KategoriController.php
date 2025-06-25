<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan semua resource kategori.
     */
    public function index()
    {
        // Ambil semua kategori, urutkan berdasarkan nama
        $kategoris = Kategori::orderBy('nama', 'asc')->get();

        return response()->json($kategoris);
    }
}
