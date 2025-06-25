<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
class carousel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image_path',
        'link_url',
        'is_active',
    ];

     /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Buat atribut baru 'image_url' yang berisi URL lengkap ke gambar.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Storage::url($attributes['image_path']),
        );
    }
    public function up(){
        Schema::create('carousel', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamps();
        });
    }
}
