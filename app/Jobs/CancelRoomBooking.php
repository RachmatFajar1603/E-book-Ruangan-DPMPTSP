<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CancelRoomBooking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $peminjamanId;

    public function __construct($peminjamanId)
    {
        $this->peminjamanId = $peminjamanId;
    }

    public function handle()
    {
        Log::info("Cancelling room booking jobs for peminjaman_id: {$this->peminjamanId}");

        try {
            DB::transaction(function () {
                $peminjaman = Peminjaman::findOrFail($this->peminjamanId);
                $ruang = $peminjaman->ruangan;

                // Delete all scheduled UpdateRoomStatus jobs for this peminjaman
                $jobs = DB::table('jobs')
                    ->where('payload', 'LIKE', '%UpdateRoomStatus%')
                    ->where('payload', 'LIKE', '%"peminjaman_id":' . $this->peminjamanId . '%')
                    ->delete();

                Log::info("Deleted {$jobs} UpdateRoomStatus jobs for peminjaman_id: {$this->peminjamanId}");

                // Reset room status if necessary
                if ($ruang->status === 'Tidak Tersedia') {
                    $ruang->status = 'Tersedia';
                    $ruang->save();
                    Log::info("Reset room status to 'Tersedia' for room_id: {$ruang->id}");
                }
            });
        } catch (\Exception $e) {
            Log::error("Error in CancelRoomBooking job: " . $e->getMessage());
            throw $e;
        }
    }
}