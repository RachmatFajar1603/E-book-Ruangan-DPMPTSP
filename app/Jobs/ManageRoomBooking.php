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
            DB::transaction(function () {
                $peminjaman = Peminjaman::lockForUpdate()->findOrFail($this->peminjaman_id);
                $ruang = Ruang::findOrFail($peminjaman->ruang_id);

                // Cancel any existing UpdateRoomStatus jobs for this peminjaman
                $cancelledJobs = DB::table('jobs')
                    ->where('payload', 'LIKE', '%UpdateRoomStatus%')
                    ->where('payload', 'LIKE', '%"peminjaman_id":' . $this->peminjaman_id . '%')
                    ->delete();

                Log::info("Cancelled {$cancelledJobs} existing UpdateRoomStatus jobs for peminjaman_id: {$this->peminjaman_id}");

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
            });
        } catch (\Exception $e) {
            Log::error("Error in ManageRoomBooking job: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            throw $e;
        }
    }

    public function failed(\Throwable $exception)
    {
        Log::error("ManageRoomBooking job failed for peminjaman_id: {$this->peminjaman_id}");
        Log::error("Error message: " . $exception->getMessage());
        Log::error("Stack trace: " . $exception->getTraceAsString());
    }
}