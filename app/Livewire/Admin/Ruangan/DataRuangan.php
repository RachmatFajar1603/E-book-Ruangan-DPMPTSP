<?php

namespace App\Livewire\Admin\Ruangan;

use App\Models\Bidang;
use App\Models\Fasilitas;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class DataRuangan extends Component
{
    use WithPagination;

    public $search = '';

    #[Title('Data Ruangan')]

    public function mount()
    {
        if (session()->has('message')) {
            $this->dispatch('showToastr', message: session('message'));
        }
    }

    public function render()
    {
        $ruangtersedia = Ruang::where('status', 'Tersedia')->count();
        $ruangtidaktersedia = Ruang::where('status', 'Tidak Tersedia')->count();

        $ruangs = Ruang::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('lokasi', 'like', '%' . $this->search . '%')
            ->orWhereHas('bidang', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        foreach ($ruangs as $ruang) {
            $ruang->image_url = Storage::url($ruang->image);
            $ruang->total_peminjaman = $ruang->peminjamans->count();
        }

        return view('livewire.admin.ruangan.data-ruangan', compact('ruangs', 'ruangtersedia', 'ruangtidaktersedia'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        // delete ruang and fasilitas where ruang_id = $id
        Fasilitas::where('id', $id)->delete();
        Ruang::where('id', $id)->delete();
        $this->dispatch('showToast', type: 'error', message: 'Ruangan Dihapus');
    }
}
