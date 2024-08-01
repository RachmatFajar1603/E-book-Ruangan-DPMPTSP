<?php

namespace App\Jobs;

use App\Models\Ruang;
use App\Models\Peminjaman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SetRoomUnavailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ruang_id;
    protected $tanggal_pinjam;
    protected $waktu_mulai;
    protected $peminjaman_id;

    public function __construct($ruang_id, $tanggal_pinjam, $waktu_mulai, $peminjaman_id)
    {
        $this->ruang_id = $ruang_id;
        $this->tanggal_pinjam = $tanggal_pinjam;
        $this->waktu_mulai = $waktu_mulai;
        $this->peminjaman_id = $peminjaman_id;
    }

    public function handle()
    {
        try {
            Log::info("SetRoomUnavailable job started for room_id: " . $this->ruang_id);

            $ruang = Ruang::findOrFail($this->ruang_id);
            $peminjaman = Peminjaman::findOrFail($this->peminjaman_id);

            // Check if the booking is still valid
            $now = Carbon::now();
            $bookingStart = Carbon::parse($this->tanggal_pinjam . ' ' . $this->waktu_mulai);

            if ($now->gte($bookingStart) && $now->lte(Carbon::parse($peminjaman->tanggal_selesai . ' ' . $peminjaman->waktu_selesai))) {
                $ruang->status = 'Tidak Tersedia';
                $ruang->save();
                Log::info("Room status updated to 'Tidak Tersedia' for room_id: " . $this->ruang_id);
            } else {
                Log::info("Room status not updated for room_id: " . $this->ruang_id . ". Booking is no longer valid or hasn't started yet.");
            }
        } catch (\Exception $e) {
            Log::error("Error in SetRoomUnavailable job: " . $e->getMessage());
        }
    }
}