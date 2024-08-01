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
use Illuminate\Bus\Batchable;

class UpdateRoomStatus implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ruang_id;
    protected $peminjaman_id;
    protected $status;

    public function __construct($ruang_id, $peminjaman_id, $status)
    {
        $this->ruang_id = $ruang_id;
        $this->peminjaman_id = $peminjaman_id;
        $this->status = $status;
    }

    public function handle()
    {
        try {
            $ruang = Ruang::findOrFail($this->ruang_id);
            $peminjaman = Peminjaman::findOrFail($this->peminjaman_id);
            $now = Carbon::now();

            // Check if the peminjaman is still valid (not rejected)
            if ($peminjaman->status != 'rejected') {
                if ($now->between(
                    Carbon::parse($now->format('Y-m-d') . ' ' . $peminjaman->waktu_mulai),
                    Carbon::parse($now->format('Y-m-d') . ' ' . $peminjaman->waktu_selesai)
                )) {
                    $ruang->status = $this->status;
                    $ruang->save();
                    Log::info("Room status updated to '{$this->status}' for room_id: {$this->ruang_id}");
                } else {
                    Log::info("Room status not updated. Current time is outside booking hours.");
                }
            } else {
                Log::info("Room status not updated. Booking has been rejected.");
            }
        } catch (\Exception $e) {
            Log::error("Error in UpdateRoomStatus job: " . $e->getMessage());
        }
    }
}