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

    public function render()
    {   
        $ruangtersedia = Ruang::where('status', 'Tersedia')->get();
        $ruangtidaktersedia = Ruang::where('status', 'Tidak Tersedia')->get();
        $ruangs = Ruang::all();

        return view('livewire.admin.ruangan.data-ruangan', compact( 'ruangs', 'ruangtersedia', 'ruangtidaktersedia'));
    }
}
