<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Attributes\Title;
use Livewire\Component;

class PegawaiUpdate extends Component
{   
    public $nip;
    public $nama;

    public $pegawai;

    public $isPegawai = true;
    public function mount($id){
        $this->pegawai = Pegawai::find($id);
        $this->nip = $this->pegawai->nip;
        $this->nama = $this->pegawai->nama;
    }

    #[Title('Update Pegawai')]
    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-update', ['isPegawai' => $this->isPegawai]);
    }

    public function update(){
        $this->pegawai->update($this->all());
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Data Pegawai Diupdate'
        ]);
        return redirect('pegawai');
    }
}
