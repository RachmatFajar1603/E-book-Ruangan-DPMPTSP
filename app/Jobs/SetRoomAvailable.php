<?php

namespace App\Jobs;

use App\Models\Ruang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SetRoomAvailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ruang_id;

    public function __construct($ruang_id)
    {
        $this->ruang_id = $ruang_id;
    }

    public function handle()
    {
        try {
            Log::info("SetRoomAvailable job started for room_id: " . $this->ruang_id);
    
            $ruang = Ruang::findOrFail($this->ruang_id);
            $ruang->status = 'Tersedia';
            $ruang->save();
    
            Log::info("Room status updated to 'Tersedia' for room_id: " . $this->ruang_id);
        } catch (\Exception $e) {
            Log::error("Error in SetRoomAvailable job: " . $e->getMessage());
        }
    }
}