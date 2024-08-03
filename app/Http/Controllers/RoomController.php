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
        $room = Ruang::with('fasilitas')->findOrFail($id);
        return view('pages.ruangan-detail', compact('room'));
    }
}
