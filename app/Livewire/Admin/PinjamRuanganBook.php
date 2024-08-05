<?php

namespace App\Livewire\Admin;

use App\Models\Fasilitas;
use App\Models\Ruang;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Jobs\ManageRoomBooking;
use Illuminate\Support\Facades\Storage;

class PinjamRuanganBook extends Component
{
    #[Title('Book Ruangan')]
    public $ruangan;
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
    public $tanggalError = '';
    public $waktuError = '';
    public $fasilitas = [];



    public function mount($id)
    {
        $this->ruangan = Ruang::findOrFail($id);
        $this->ruangan->image_url = Storage::url($this->ruangan->image);
        $this->ruang_id = $id;
        $this->fasilitas = $this->getFacilities();

    }

    private function getFacilities()
    {
        $fasilitas = $this->ruangan->fasilitas;
        if (!$fasilitas) {
            return [];
        }

        return collect($fasilitas->getAttributes())
            ->filter(function ($value, $key) {
                return $value === 1 && !in_array($key, ['id', 'created_at', 'updated_at']);
            })
            ->keys()
            ->map(function ($item) {
                return ucfirst(str_replace('_', ' ', $item));
            });
    }

    public function updatedTanggalPinjam()
    {
        $this->validateDates();
    }

    public function updatedTanggalSelesai()
    {
        $this->validateDates();
    }

    public function updatedWaktuMulai()
    {
        $this->validateTimes();
    }

    public function updatedWaktuSelesai()
    {
        $this->validateTimes();
    }

    public function validateDates()
    {
        if ($this->tanggal_pinjam && $this->tanggal_selesai) {
            if (strtotime($this->tanggal_selesai) < strtotime($this->tanggal_pinjam)) {
                $this->tanggalError = 'Tanggal selesai tidak boleh sebelum tanggal mulai.';
            } else {
                $this->tanggalError = '';
            }
        }
    }

    public function validateTimes()
    {
        if ($this->waktu_mulai && $this->waktu_selesai) {
            if ($this->tanggal_pinjam == $this->tanggal_selesai) {
                if (strtotime($this->waktu_selesai) <= strtotime($this->waktu_mulai)) {
                    $this->waktuError = 'Waktu selesai harus setelah waktu mulai.';
                } else {
                    $this->waktuError = '';
                }
            } else {
                $this->waktuError = '';
            }
        }
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

        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $conflict = Peminjaman::where('ruang_id', $ruang_id)
                ->where('status', 'verified')
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
        $this->validateDates();
        $this->validateTimes();

        if ($this->tanggalError || $this->waktuError) {
            return;
        }

        $this->validate([
            'ruang_id' => 'required',
            'acara_kegiatan' => 'required',
            'kapasitas' => 'required',
            'penanggung_jawab' => 'required',
            'nomor_handphone' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_pinjam',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'catatan' => 'required',
        ]);
    
        if ($this->isRoomOccupied($this->ruang_id, $this->tanggal_pinjam, $this->tanggal_selesai, $this->waktu_mulai, $this->waktu_selesai)) {
            session()->flash('toast', ['type' => 'success', 'message' => 'Ruangan sudah dipesan pada waktu tersebut']);
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
    
        // Dispatch the job to manage room booking
        ManageRoomBooking::dispatch($peminjaman->id);
    
        session()->flash('toast', ['type' => 'success', 'message' => 'Peminjaman berhasil diajukan']);
        $this->redirect('/pinjam-ruangan');
    }
}