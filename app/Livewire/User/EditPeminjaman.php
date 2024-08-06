<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use App\Jobs\CancelRoomBooking;
use App\Jobs\ManageRoomBooking;
use Carbon\Carbon;

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
    public $imageUrl;
    public $fasilitas = [];

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
        $this->fasilitas = $this->getFacilities();

        if ($this->ruangan) {
            $this->imageUrl = $this->getImageUrl($this->ruangan->image);
        }
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

    private function getImageUrl($imagePath)
    {
        return $imagePath ? Storage::url($imagePath) : null;
    }

    private function isRoomOccupied($ruang_id, $tanggal_pinjam, $tanggal_selesai, $waktu_mulai, $waktu_selesai)
    {
        $start_date = Carbon::parse($tanggal_pinjam);
        $end_date = Carbon::parse($tanggal_selesai);

        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $conflict = Peminjaman::where('ruang_id', $ruang_id)
                ->whereIn('status', ['booked', 'verified'])
                ->where('tanggal_pinjam', '<=', $date)
                ->where('tanggal_selesai', '>=', $date)
                ->where(function ($query) use ($waktu_mulai, $waktu_selesai) {
                    $query->where(function ($q) use ($waktu_mulai, $waktu_selesai) {
                        $q->where('waktu_mulai', '<', $waktu_selesai)
                          ->where('waktu_selesai', '>', $waktu_mulai);
                    });
                })
                ->where('id', '!=', $this->peminjamanId) // Exclude the current booking
                ->exists();

            if ($conflict) {
                return true;
            }
        }
        
        return false;
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

    public function update()
    {
        try {
            $this->validate();

            $this->validateDates();
            $this->validateTimes();

            if ($this->tanggalError || $this->waktuError) {
                return;
            }

            $peminjaman = Peminjaman::findOrFail($this->peminjamanId);

            // Check if the room is occupied for the new time slot
            if ($this->isRoomOccupied($peminjaman->ruang_id, $this->tanggal_pinjam, $this->tanggal_selesai, $this->waktu_mulai, $this->waktu_selesai)) {
                throw new \Exception('Ruangan sudah dipesan pada waktu tersebut.');
            }

            // Cancel the existing room booking jobs
            CancelRoomBooking::dispatch($peminjaman->id);

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

            // Create new room booking jobs with updated data
            ManageRoomBooking::dispatch($peminjaman->id);

            session()->flash('toast', ['type' => 'success', 'message' => 'Peminjaman berhasil diperbarui']);
            return redirect()->to('/peminjamansaya');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('showToast', type: 'error', message: 'Validasi gagal. Silakan periksa kembali input Anda.');
        } catch (\Exception $e) {
            $this->dispatch('showToast', type: 'error', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.edit-peminjaman');
    }
}