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

        $this->bookings = $this->room->peminjaman->map(function ($peminjaman) {
            return [
                'tanggal_pinjam' => $peminjaman->tanggal_pinjam,
                'tanggal_selesai' => $peminjaman->tanggal_selesai,
                'waktu_mulai' => $peminjaman->waktu_mulai,
                'waktu_selesai' => $peminjaman->waktu_selesai
            ];
        });
    }

    public function render()
    {
        return view('livewire.admin.pinjam-ruangan-detail');
    }
}
