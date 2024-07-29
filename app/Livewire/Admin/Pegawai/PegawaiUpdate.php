<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Component;

class PegawaiUpdate extends Component
{   
    public $nip;
    public $nama;

    public $pegawai;
    public function mount($id){
        $this->pegawai = Pegawai::find($id);
        $this->nip = $this->pegawai->nip;
        $this->nama = $this->pegawai->nama;
    }
    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-update');
    }

    public function update(){
        $this->pegawai->update($this->all());
        return redirect('pegawai');
    }
}
