<?php

namespace App\Livewire\Admin;

use App\Models\Ruang;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Jobs\SetRoomAvailable;
use App\Jobs\SetRoomUnavailable;
use Illuminate\Support\Facades\Storage;
use App\Jobs\UpdateRoomStatus;
use Illuminate\Support\Facades\Bus;

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
        $ruangan->image_url = Storage::url($ruangan->image);
        return view('livewire.admin.pinjam-ruangan-book', compact('ruangan'));
    }

    private function isRoomOccupied($ruang_id, $tanggal_pinjam, $tanggal_selesai, $waktu_mulai, $waktu_selesai)
    {
    $start_date = Carbon::parse($tanggal_pinjam);
    $end_date = Carbon::parse($tanggal_selesai);

    // Loop through each day
    for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $conflict = Peminjaman::where('ruang_id', $ruang_id)
                ->where('status', '!=', 'rejected') // Exclude rejected bookings
                ->where('tanggal_pinjam', '<=', $date)
                ->where('tanggal_selesai', '>=', $date)
                ->where(function ($query) use ($waktu_mulai, $waktu_selesai) {
                    $query->where(function ($q) use ($waktu_mulai, $waktu_selesai) {
                        $q->where('waktu_mulai', '<', $waktu_selesai)
                          ->where('waktu_selesai', '>', $waktu_mulai);
                    });
                })
                ->exists();

            if ($conflict) {
            return true;
            }
        }
        
        return false;
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
    
        if ($this->isRoomOccupied($this->ruang_id, $this->tanggal_pinjam, $this->tanggal_selesai, $this->waktu_mulai, $this->waktu_selesai)) {
            session()->flash('message', 'Ruangan sudah dipesan pada tanggal dan waktu tersebut');
            return;
        }
        
        $peminjaman = Peminjaman::create([
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
    
        $startDate = Carbon::parse($this->tanggal_pinjam);
        $endDate = Carbon::parse($this->tanggal_selesai);
    
        $jobs = [];
    
        // Prepare jobs for daily status updates
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $setUnavailable = $date->copy()->setTimeFromTimeString($this->waktu_mulai);
            $setAvailable = $date->copy()->setTimeFromTimeString($this->waktu_selesai);
    
            $unavailableJob = new UpdateRoomStatus($this->ruang_id, $peminjaman->id, 'Tidak Tersedia');
            $availableJob = new UpdateRoomStatus($this->ruang_id, $peminjaman->id, 'Tersedia');
            
            $jobs[] = $unavailableJob->delay($setUnavailable);
            $jobs[] = $availableJob->delay($setAvailable);
        }
    
        // Dispatch jobs as a batch
        Bus::batch($jobs)
            ->name("peminjaman_{$peminjaman->id}")
            ->dispatch();
    
        session()->flash('message', 'Data Ruangan Berhasil Ditambahkan');
        return redirect()->to('pinjam-ruangan');
    }
}