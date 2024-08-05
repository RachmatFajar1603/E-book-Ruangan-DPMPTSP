<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Ruang;
use Livewire\WithPagination;
use App\Jobs\UpdateRoomStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DataPeminjaman extends Component
{   
    use WithPagination;

    #[Title('Data Peminjaman')]

    public $search = '';
    public $perPage = 10;
    public $editingId = null;
    public $editStatus = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'verified';
        $peminjaman->save();

        $this->dispatch('showToast', type: 'success', message: 'Peminjaman berhasil disetujui');
    }

    public function reject($id)
    {
        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->status = 'rejected';
            $peminjaman->save();
    
            $this->cancelRoomStatusJobs($peminjaman);
            $this->freeUpTimeSlot($peminjaman);
    
            DB::commit();
            $this->dispatch('showToast', type: 'error', message: 'Peminjaman ditolak');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error rejecting peminjaman: " . $e->getMessage());
            $this->dispatch('showToast', type: 'error', message: 'Terjadi kesalahan saat menolak peminjaman');
        }
    }

    public function startEdit($id)
    {
        $this->editingId = $id;
        $this->editStatus = Peminjaman::findOrFail($id)->status;
    }

    public function saveEdit()
    {
        $peminjaman = Peminjaman::findOrFail($this->editingId);
        $oldStatus = $peminjaman->status;
        $peminjaman->status = $this->editStatus;
        $peminjaman->save();

        if ($oldStatus !== 'booked' && $this->editStatus === 'booked') {
            // If changing back to 'booked', we might need to reschedule jobs
            // This logic would depend on your specific requirements
        } elseif ($oldStatus === 'booked' && $this->editStatus !== 'booked') {
            $this->cancelRoomStatusJobs($peminjaman);
            $this->freeUpTimeSlot($peminjaman);
        }

        $this->editingId = null;
        $this->dispatch('showToast', type: 'success', message: 'Status peminjaman berhasil diubah');
    }

    public function cancelEdit()
    {
        $this->editingId = null;
    }

    private function cancelRoomStatusJobs($peminjaman)
    {
        // Coba membatalkan batch job jika ada
        $batch = Bus::findBatch("peminjaman_{$peminjaman->id}");
        if ($batch) {
            $batch->cancel();
            Log::info("Cancelled batch job for peminjaman_id: {$peminjaman->id}");
        } else {
            // Jika batch tidak ditemukan, coba batalkan job individual
            $jobs = DB::table('jobs')
            ->where('payload', 'like', '%UpdateRoomStatus%')
            ->where('payload', 'like', '%"peminjaman_id":' . $peminjaman->id . '%')
            ->get();
            
            foreach ($jobs as $job) {
                DB::table('jobs')->where('id', $job->id)->delete();
                Log::info("Cancelled individual job for peminjaman_id: {$peminjaman->id}");
            }
        }
    }
    
    private function freeUpTimeSlot($peminjaman)
    {
        $ruang = Ruang::find($peminjaman->ruang_id);
        $ruang->status = 'Tersedia';
        $ruang->save();
        Log::info("Set room status to 'Tersedia' for room_id: {$ruang->id}");
    }

    public function render()
    {
        $sumall = Peminjaman::count();
        $sumverified = Peminjaman::where('status', 'verified')->count();
        $sumrejected = Peminjaman::where('status', 'rejected')->count();
        $peminjaman = Peminjaman::with(['user', 'user.bidang', 'ruang'])
            ->when($this->search, function ($query) {
                $query->where('penanggung_jawab', 'like', '%' . $this->search . '%')
                    ->orWhere('acara_kegiatan', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('ruang', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.data-peminjaman', compact('peminjaman', 'sumall', 'sumverified', 'sumrejected'));
    }
}