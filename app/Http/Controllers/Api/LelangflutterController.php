<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lelangflutter;
use Illuminate\Http\Request;

class LelangflutterController extends Controller
{
    public function index()
    {
        $lelangs = Lelangflutter::whereIn('status', ['berlangsung', 'belum_dimulai'])
                                ->orderBy('waktu_mulai', 'asc')
                                ->take(10)
                                ->get();

        return response()->json($lelangs);
    }
}
