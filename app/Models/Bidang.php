<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'bidang_id');
    }
}
