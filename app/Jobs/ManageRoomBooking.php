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
use Illuminate\Support\Facades\DB;

class ManageRoomBooking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $peminjaman_id;

    public function __construct($peminjaman_id)
    {
        $this->peminjaman_id = $peminjaman_id;
    }

    public function handle()
    {
        try {
            $peminjaman = Peminjaman::findOrFail($this->peminjaman_id);
            $ruang = Ruang::findOrFail($peminjaman->ruang_id);

            $startDate = Carbon::parse($peminjaman->tanggal_pinjam);
            $endDate = Carbon::parse($peminjaman->tanggal_selesai);
            $startTime = Carbon::parse($peminjaman->waktu_mulai);
            $endTime = Carbon::parse($peminjaman->waktu_selesai);

            Log::info("Scheduling jobs for peminjaman_id: {$this->peminjaman_id}, from {$startDate} to {$endDate}");

            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $bookingStart = $date->copy()->setTimeFrom($startTime);
                $bookingEnd = $date->copy()->setTimeFrom($endTime);

                Log::info("Scheduling 'Tidak Tersedia' job for {$bookingStart}");
                UpdateRoomStatus::dispatch($ruang->id, $peminjaman->id, 'Tidak Tersedia', $bookingStart);

                Log::info("Scheduling 'Tersedia' job for {$bookingEnd}");
                UpdateRoomStatus::dispatch($ruang->id, $peminjaman->id, 'Tersedia', $bookingEnd);
            }

            Log::info("All booking jobs scheduled for peminjaman_id: {$this->peminjaman_id}");
        } catch (\Exception $e) {
            Log::error("Error in ManageRoomBooking job: " . $e->getMessage());
            throw $e;
        }
    }
}

class UpdateRoomStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ruang_id;
    protected $peminjaman_id;
    protected $status;
    public $executeAt;

    public $tries = 3;
    public $maxExceptions = 3;
    public $backoff = [10, 60, 120];

    public function __construct($ruang_id, $peminjaman_id, $status, $executeAt)
    {
        $this->ruang_id = $ruang_id;
        $this->peminjaman_id = $peminjaman_id;
        $this->status = $status;
        $this->executeAt = $executeAt;
    }

    public function handle()
    {
        Log::info("UpdateRoomStatus job started for room_id: {$this->ruang_id}, status: {$this->status}");

        $now = Carbon::now();
        Log::info("Current time: {$now}, Scheduled execution time: {$this->executeAt}");

        if ($now->lt($this->executeAt)) {
            $delay = $this->executeAt->diffInSeconds($now);
            Log::info("Releasing job back to queue. Will retry in {$delay} seconds");
            $this->release($delay);
            return;
        }

        try {
            DB::transaction(function () {
                $ruang = Ruang::lockForUpdate()->findOrFail($this->ruang_id);
                $peminjaman = Peminjaman::findOrFail($this->peminjaman_id);

                Log::info("Current peminjaman status: {$peminjaman->status}");
                Log::info("Current room status: {$ruang->status}");

                // Periksa apakah status peminjaman adalah 'reject'
                if ($peminjaman->status === 'reject') {
                    Log::info("Peminjaman status is 'reject'. Cancelling the job.");
                    $this->delete();
                    return;
                }

                // Ubah status ruangan jika peminjaman tidak di-reject
                $ruang->status = $this->status;
                $ruang->save();

                Log::info("Room status updated to '{$this->status}' for room_id: {$this->ruang_id}");
                Log::info("Final room status: {$ruang->fresh()->status}");
            });
        } catch (\Exception $e) {
            Log::error("Error in UpdateRoomStatus job: " . $e->getMessage());
            throw $e;
        }
    }
}