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

class SetRoomAvailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ruang_id;
    protected $tanggal_selesai;
    protected $waktu_selesai;

    public function __construct($ruang_id, $tanggal_selesai, $waktu_selesai)
    {
        $this->ruang_id = $ruang_id;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->waktu_selesai = $waktu_selesai;
    }

    public function handle()
    {
        try {
            Log::info("SetRoomAvailable job started for room_id: " . $this->ruang_id);

            $ruang = Ruang::findOrFail($this->ruang_id);
            
            // Check if there are any ongoing bookings
            $now = Carbon::now();
            $ongoingBookings = Peminjaman::where('ruang_id', $this->ruang_id)
                ->where(function ($query) use ($now) {
                    $query->where('tanggal_selesai', '>', $now->toDateString())
                        ->orWhere(function ($q) use ($now) {
                            $q->where('tanggal_selesai', '=', $now->toDateString())
                                ->where('waktu_selesai', '>', $now->toTimeString());
                        });
                })
                ->exists();

            if (!$ongoingBookings) {
                $ruang->status = 'Tersedia';
                $ruang->save();
                Log::info("Room status updated to 'Tersedia' for room_id: " . $this->ruang_id);
            } else {
                Log::info("Room status not updated for room_id: " . $this->ruang_id . " due to ongoing bookings");
            }
        } catch (\Exception $e) {
            Log::error("Error in SetRoomAvailable job: " . $e->getMessage());
        }
    }
}