<?php

namespace App\Livewire\Admin\Ruangan;

use App\Models\Bidang;
use App\Models\Fasilitas;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class DataRuangan extends Component
{   

    #[Title('Data Ruangan')]

    public function mount()
    {
        if (session()->has('message')) {
            $this->dispatch('showToastr', message: session('message'));
        }
    }

    public function render()
    {   
        $ruangtersedia = Ruang::where('status', 'Tersedia')->get();
        $ruangtidaktersedia = Ruang::where('status', 'Tidak Tersedia')->get();
        $ruangs = Ruang::all();

        foreach ($ruangs as $ruang){
            $ruang->image_url = Storage::url($ruang->image);
            $ruang->total_peminjaman = $ruang->peminjamans->count();
        }

        return view('livewire.admin.ruangan.data-ruangan', compact( 'ruangs', 'ruangtersedia', 'ruangtidaktersedia'));
    }

    public function delete($id)
    {
        // delete ruang and fasilitas where ruang_id = $id
        Fasilitas::where('id', $id)->delete();
        Ruang::where('id', $id)->delete();
        $this->dispatch('showToast', type: 'error', message: 'Ruangan Dihapus');
    }
}
