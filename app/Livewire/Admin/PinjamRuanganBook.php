<?php

namespace App\Livewire\Admin;

use App\Models\Ruang;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Jobs\SetRoomAvailable;
use Illuminate\Support\Facades\Log;

class PinjamRuanganBook extends Component
{
          #[Title('Book Ruangan')]
    public $ruang_id;
    public $penanggung_jawab;
    public $acara_kegiatan;
    public $kapasitas;
    public $nomor_handphone;
    public $tanggal_pinjam;
    public $tanggal_selesai;
    public $waktu_mulai;
    public $waktu_selesai;
    public $catatan;

    public function mount($id)
    {
        $this->ruang_id = $id;
    }

    public function render()
    {
        $ruangan = Ruang::findOrFail($this->ruang_id);
        return view('livewire.admin.pinjam-ruangan-book', compact('ruangan'));
    }

    private function isRoomOccupied($ruang_id, $tanggal_pinjam, $waktu_mulai, $waktu_selesai)
    {
        return Peminjaman::where('ruang_id', $ruang_id)
        ->where('tanggal_pinjam', $tanggal_pinjam)
        ->where(function ($query) use ($waktu_mulai, $waktu_selesai) {
            $query->where(function ($q) use ($waktu_mulai, $waktu_selesai) {
                $q->where('waktu_mulai', '<=', $waktu_mulai)
                ->where('waktu_selesai', '>', $waktu_mulai);
            })->orWhere(function ($q) use ($waktu_mulai, $waktu_selesai) {
                $q->where('waktu_mulai', '<', $waktu_selesai)
                ->where('waktu_selesai', '>=', $waktu_selesai);
            });
        })
        ->exists();
    }
    
    public function create()
    {   
        $this->validate([
            'ruang_id' => 'required',
            'acara_kegiatan' => 'required',
            'kapasitas' => 'required',
            'penanggung_jawab' => 'required',
            'nomor_handphone' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_selesai' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'catatan' => 'required',
        ]);

        if ($this->isRoomOccupied($this->ruang_id, $this->tanggal_pinjam, $this->waktu_mulai, $this->waktu_selesai)) {
            session()->flash('error', 'Ruangan sudah dipesan untuk waktu yang dipilih.');
            return;
        }
        
        Peminjaman::create([
            'user_id' => auth()->user()->id,
            'ruang_id' => $this->ruang_id,
            'penanggung_jawab' => $this->penanggung_jawab,
            'acara_kegiatan' => $this->acara_kegiatan,
            'kapasitas' => $this->kapasitas,
            'nomor_handphone' => $this->nomor_handphone,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_selesai' => $this->tanggal_selesai,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'catatan' => $this->catatan,
        ]);
        Log::info('Peminjaman created for room_id: ' . $this->ruang_id);

        $ruang = Ruang::findOrFail($this->ruang_id);
        $ruang->status = 'Tidak Tersedia';
        $ruang->save();
        Log::info('Room status updated to Tidak Tersedia for room_id: ' . $this->ruang_id);

        $endtime = Carbon::parse($this->tanggal_selesai . ' ' . $this->waktu_selesai);
        Log::info('Dispatching SetRoomAvailable job for room_id: ' . $this->ruang_id . ' at ' . $endtime);
        SetRoomAvailable::dispatch($this->ruang_id)->delay($endtime);

        session()->flash('message', 'Data Ruangan Berhasil Ditambahkan');
        return redirect()->to('pinjam-ruangan');
    }
}