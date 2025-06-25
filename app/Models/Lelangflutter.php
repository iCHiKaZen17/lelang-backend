<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Lelangflutter extends Model
{
    use HasFactory;

     protected $fillable = [
        'nama_barang',
        'deskripsi',
        'kategori_id',
        'harga_awal',
        'image_path',
        'waktu_mulai',
        'waktu_selesai',
        'status',
    ];

    protected $appends = ['image_url'];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Storage::url($attributes['image_path']),
        );
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
