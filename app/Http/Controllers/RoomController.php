<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {     
        $rooms = Ruang::all();

        foreach($rooms as $room){
            $room->image_url = Storage::url($room->image);
        }
        return view('pages.ruangan', compact('rooms'));
    }

    public function show($id)
    {
        $room = Ruang::with(['fasilitas', 'images', 'peminjaman' => function($query) {
            $query->where('tanggal_pinjam', '>=', now())
                  ->orderBy('tanggal_pinjam');
        }])->findOrFail($id);

        $room->image_url = Storage::url($room->image);
        
        $bookings = $room->peminjaman->map(function ($peminjaman) {
            return [
                'tanggal' => $peminjaman->tanggal_pinjam->format('d-m-Y'),
                'jam_mulai' => $peminjaman->waktu_mulai,
                'jam_selesai' => $peminjaman->waktu_selesai
            ];
        });

        return view('pages.ruangan-detail', compact('room', 'bookings'));
    }
}
