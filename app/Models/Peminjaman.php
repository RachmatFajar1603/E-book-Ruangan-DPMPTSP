<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ruang_id',
        'penanggung_jawab',
        'acara_kegiatan',
        'kapasitas',
        'nomor_handphone',
        'tanggal_pinjam',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'catatan',
        'status',
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
