<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
     public function index()
    {
        // Ambil semua carousel yang statusnya 'is_active' = true
        $carousel = Carousel::where('is_active', true)->get();

        // Kembalikan data sebagai JSON
        return response()->json($carousel);
    }
}
