<?php

namespace App\Livewire;

use App\Models\Ruang;
use App\Models\Peminjaman;
use Livewire\Component;
use Carbon\Carbon;

class AvailabilityCheck extends Component
{
    public $tanggal_awal;
    public $tanggal_akhir;
    public $jam_mulai;
    public $jam_selesai;
    public $ruangan;

    public $availableRooms;
    public $showResults = false;
    public $noAvailableRooms = false;
    public $alertMessage = null;

    public function mount()
    {
        $this->showResults = false;
        $this->noAvailableRooms = false;
        $this->alertMessage = null;
        $this->availableRooms = collect(); // Inisialisasi sebagai koleksi kosong
    }

    public function checkAvailability()
    {
        $this->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'ruangan' => 'required|exists:ruangs,id',
        ]);

        $startDateTime = Carbon::parse($this->tanggal_awal . ' ' . $this->jam_mulai);
        $endDateTime = Carbon::parse($this->tanggal_akhir . ' ' . $this->jam_selesai);

        $conflictingBookings = Peminjaman::where('ruang_id', $this->ruangan)
            ->where(function ($query) use ($startDateTime, $endDateTime) {
                $query->where(function ($q) use ($startDateTime, $endDateTime) {
                    $q->whereBetween('tanggal_pinjam', [$startDateTime->toDateString(), $endDateTime->toDateString()])
                        ->orWhereBetween('tanggal_selesai', [$startDateTime->toDateString(), $endDateTime->toDateString()])
                        ->orWhere(function ($q2) use ($startDateTime, $endDateTime) {
                            $q2->where('tanggal_pinjam', '<=', $startDateTime->toDateString())
                                ->where('tanggal_selesai', '>=', $endDateTime->toDateString());
                        });
                })->where(function ($q) use ($startDateTime, $endDateTime) {
                    $q->whereBetween('waktu_mulai', [$startDateTime->toTimeString(), $endDateTime->toTimeString()])
                        ->orWhereBetween('waktu_selesai', [$startDateTime->toTimeString(), $endDateTime->toTimeString()])
                        ->orWhere(function ($q2) use ($startDateTime, $endDateTime) {
                            $q2->where('waktu_mulai', '<=', $startDateTime->toTimeString())
                                ->where('waktu_selesai', '>=', $endDateTime->toTimeString());
                        });
                });
            })
            ->exists();

        if ($conflictingBookings) {
            $this->alertMessage = "Maaf, ruangan tidak tersedia pada jadwal yang Anda pilih karena sudah ada peminjaman.";
            $this->availableRooms = collect();
            $this->showResults = true;
            $this->noAvailableRooms = true;
        } else {
            $this->alertMessage = null;
            $this->availableRooms = Ruang::where('id', $this->ruangan)->get();
            $this->showResults = true;
            $this->noAvailableRooms = $this->availableRooms->isEmpty();
        }
    }

    public function render()
    {
        $ruangs = Ruang::all();
        $favoriteRooms = Ruang::withCount('peminjamans')
            ->orderBy('peminjamans_count', 'desc')
            ->take(4)
            ->get();

        return view('livewire.availability-check', [
            'ruangs' => $ruangs,
            'favoriteRooms' => $favoriteRooms,
        ]);
    }
}
