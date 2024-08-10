<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;

class PinjamRuanganDetail extends Component
{
    public $roomId;
    public $room;
    public $bookings;

    public function mount($id)
    {
        $this->roomId = $id;
        $this->loadRoomData();
    }

    public function loadRoomData()
    {
        $this->room = Ruang::with(['fasilitas', 'images', 'peminjaman' => function ($query) {
            $query->where('tanggal_pinjam', '>=', now())
                ->orderBy('tanggal_pinjam');
        }])->findOrFail($this->roomId);

        $this->room->image_url = Storage::url($this->room->image);

        $this->bookings = $this->room->peminjamans->map(function ($peminjamans) {
            return [
                'tanggal_pinjam' => $peminjamans->tanggal_pinjam,
                'tanggal_selesai' => $peminjamans->tanggal_selesai,
                'waktu_mulai' => $peminjamans->waktu_mulai,
                'waktu_selesai' => $peminjamans->waktu_selesai
            ];
        });
    }

    public function render()
    {
        return view('livewire.admin.pinjam-ruangan-detail');
    }
}
