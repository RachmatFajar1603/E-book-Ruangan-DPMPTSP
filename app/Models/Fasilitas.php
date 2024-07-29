<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'wifi',
        'ac',
        'proyektor',
        'kursi',
        'sofa',
        'meja',
        'meja_operator',
        'komputer_operator',
        'sound_system',
        'dispenser',
        'webcam',
        'hdmi',
        'stock_contact',
        'panggung',
        'whiteboard',
        'space_spanduk',
        'storage',
    ];
}
