<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Attributes\Title;
use Livewire\Component;

class PegawaiList extends Component
{   

    #[Title('Data Pegawai')]
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
