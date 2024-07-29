<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kapasitas',
        'lokasi',
        'deskripsi',
        'kepemilikan',
        'image',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
