<?php

namespace App\Jobs;

use App\Models\Ruang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SetRoomUnavailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ruang_id;

    public function __construct($ruang_id)
    {
        $this->ruang_id = $ruang_id;
    }

    public function handle()
    {
        Log::info("SetRoomUnavailable job started for room_id: " . $this->ruang_id);

        $ruang = Ruang::findOrFail($this->ruang_id);
        $ruang->status = 'Tidak Tersedia';
        $ruang->save();

        Log::info("Room status updated to 'Tidak Tersedia' for room_id: " . $this->ruang_id);
    }
}