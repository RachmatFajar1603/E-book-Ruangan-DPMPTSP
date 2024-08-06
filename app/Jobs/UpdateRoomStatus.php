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
        Log::info("UpdateRoomStatus job started for room_id: {$this->ruang_id}, peminjaman_id: {$this->peminjaman_id}, status: {$this->status}");

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

                // Check if the booking still exists and is not cancelled
                if ($peminjaman->status === 'reject' || $peminjaman->status === 'cancelled') {
                    Log::info("Peminjaman status is '{$peminjaman->status}'. Cancelling the job.");
                    $this->delete();
                    return;
                }

                // Update room status
                $ruang->status = $this->status;
                $ruang->save();

                Log::info("Room status updated to '{$this->status}' for room_id: {$this->ruang_id}");
                Log::info("Final room status: {$ruang->fresh()->status}");
            });
        } catch (\Exception $e) {
            Log::error("Error in UpdateRoomStatus job: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            throw $e;
        }
    }

    public function failed(\Throwable $exception)
    {
        Log::error("UpdateRoomStatus job failed for room_id: {$this->ruang_id}, peminjaman_id: {$this->peminjaman_id}");
        Log::error("Error message: " . $exception->getMessage());
        Log::error("Stack trace: " . $exception->getTraceAsString());
    }
}