<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Ruang;
use Livewire\WithPagination;
use App\Jobs\UpdateRoomStatus;
use Illuminate\Support\Facades\Bus;
use Carbon\Carbon;

class DataPeminjaman extends Component
{   
    use WithPagination;

    #[Title('Data Peminjaman')]

    public $search = '';
    public $perPage = 10;

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
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'rejected';
        $peminjaman->save();

        $this->cancelRoomStatusJobs($peminjaman);
        $this->freeUpTimeSlot($peminjaman);

        $this->dispatch('showToast', type: 'error', message: 'Peminjaman ditolak');
    }

    private function cancelRoomStatusJobs($peminjaman)
    {
        // Find and cancel the batch of jobs for this peminjaman
        $batch = Bus::findBatch("peminjaman_{$peminjaman->id}");
        if ($batch) {
            $batch->cancel();
        }
    }

    private function freeUpTimeSlot($peminjaman)
    {
        // Set the room status to 'Tersedia' immediately
        $ruang = Ruang::find($peminjaman->ruang_id);
        $ruang->status = 'Tersedia';
        $ruang->save();

        // You might want to add additional logic here, such as notifying users
        // that this time slot is now available
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