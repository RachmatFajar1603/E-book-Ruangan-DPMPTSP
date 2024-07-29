<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Component;

class PegawaiList extends Component
{   

    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-list', [
            "pegawais" => Pegawai::all()
        ]);
    }

    public function delete($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('pegawai');
    }
}
