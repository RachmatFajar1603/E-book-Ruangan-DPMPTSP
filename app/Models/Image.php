<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['ruang_id', 'image', 'order'];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
}
