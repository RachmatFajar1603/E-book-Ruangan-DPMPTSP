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

        $bookings = $room->peminjamans->map(function ($peminjamans) {
            return [
                'tanggal_pinjam' => $peminjamans->tanggal_pinjam,
                'tanggal_selesai' => $peminjamans->tanggal_selesai,
                'waktu_mulai' => $peminjamans->waktu_mulai,
                'waktu_selesai' => $peminjamans->waktu_selesai
            ];
        });

        return view('pages.ruangan-detail', compact('room', 'bookings'));
    }
}
