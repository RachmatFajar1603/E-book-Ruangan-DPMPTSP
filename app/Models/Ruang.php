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
        'bidang_id',
        'fasilitas_id',
        'image',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
