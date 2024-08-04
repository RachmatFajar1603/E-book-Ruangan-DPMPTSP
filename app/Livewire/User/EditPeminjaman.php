<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;

class EditPeminjaman extends Component
{
    public $peminjaman;
    public $peminjamanId;
    public $ruangan;
    public $penanggung_jawab;
    public $acara_kegiatan;
    public $kapasitas;
    public $nomor_handphone;
    public $tanggal_pinjam;
    public $tanggal_selesai;
    public $waktu_mulai;
    public $waktu_selesai;
    public $catatan;
    public $tanggalError;
    public $waktuError;

    protected $rules = [
        'penanggung_jawab' => 'required|string',
        'acara_kegiatan' => 'required|string',
        'kapasitas' => 'required|integer|min:1',
        'nomor_handphone' => 'required|regex:/^08[0-9]{10}$/',
        'tanggal_pinjam' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_pinjam',
        'waktu_mulai' => 'required',
        'waktu_selesai' => 'required|after:waktu_mulai',
        'catatan' => 'nullable|string',
    ];

    public function mount($id)
    {
        $peminjaman = Peminjaman::with('ruangan')->findOrFail($id);
        $this->peminjamanId = $id;
        $this->ruangan = $peminjaman->ruangan;
        $this->penanggung_jawab = $peminjaman->penanggung_jawab;
        $this->acara_kegiatan = $peminjaman->acara_kegiatan;
        $this->kapasitas = $peminjaman->kapasitas;
        $this->nomor_handphone = $peminjaman->nomor_handphone;
        $this->tanggal_pinjam = $peminjaman->tanggal_pinjam;
        $this->tanggal_selesai = $peminjaman->tanggal_selesai;
        $this->waktu_mulai = $peminjaman->waktu_mulai;
        $this->waktu_selesai = $peminjaman->waktu_selesai;
        $this->catatan = $peminjaman->catatan;

        if ($this->ruangan) {
            $this->ruangan->image_url = $this->getImageUrl($this->ruangan->image);
        }
    }

    private function getImageUrl($imagePath)
    {
        return $imagePath ? Storage::url($imagePath) : null;
    }

    public function update()
    {
        $this->validate();

        if ($this->tanggal_pinjam > $this->tanggal_selesai) {
            $this->tanggalError = "Tanggal selesai harus setelah tanggal pinjam.";
            return;
        }

        if ($this->waktu_mulai >= $this->waktu_selesai) {
            $this->waktuError = "Waktu selesai harus setelah waktu mulai.";
            return;
        }

        $peminjaman = Peminjaman::findOrFail($this->peminjamanId);
        $peminjaman->update([
            'penanggung_jawab' => $this->penanggung_jawab,
            'acara_kegiatan' => $this->acara_kegiatan,
            'kapasitas' => $this->kapasitas,
            'nomor_handphone' => $this->nomor_handphone,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'tanggal_selesai' => $this->tanggal_selesai,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'catatan' => $this->catatan,
            'status' => 'booked',
        ]);

        session()->flash('toast', ['type' => 'success', 'message' => 'Peminjaman berhasil diperbarui']);
        return redirect()->to('/peminjamansaya');
    }

    public function render()
    {
        return view('livewire.edit-peminjaman');
    }
}