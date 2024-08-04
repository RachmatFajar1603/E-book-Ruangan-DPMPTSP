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

            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $bookingStart = $date->copy()->setTimeFrom($startTime);
                $bookingEnd = $date->copy()->setTimeFrom($endTime);

                UpdateRoomStatus::dispatch($ruang->id, $peminjaman->id, 'Tidak Tersedia')
                    ->delay($bookingStart);
                UpdateRoomStatus::dispatch($ruang->id, $peminjaman->id, 'Tersedia')
                    ->delay($bookingEnd);
            }

            Log::info("Booking jobs scheduled for peminjaman_id: {$this->peminjaman_id}");
        } catch (\Exception $e) {
            Log::error("Error in ManageRoomBooking job: " . $e->getMessage());
            Log::error($e->getTraceAsString());
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

            if ($peminjaman->status == 'verified' || $peminjaman->status == 'booking') {
                $ruang->status = $this->status;
                $ruang->save();
                Log::info("Room status updated to '{$this->status}' for room_id: {$this->ruang_id}");
            } elseif ($peminjaman->status == 'rejected') {
                $ruang->status = 'Tersedia';
                $ruang->save();
                Log::info("Room status set to 'Tersedia' due to rejected booking for room_id: {$this->ruang_id}");
            }
        } catch (\Exception $e) {
            Log::error("Error in UpdateRoomStatus job: " . $e->getMessage());
            Log::error($e->getTraceAsString());
            throw $e;
        }
    }
}