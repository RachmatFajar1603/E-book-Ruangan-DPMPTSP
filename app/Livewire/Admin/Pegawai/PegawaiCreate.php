<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportNavigate\SupportNavigate;

class PegawaiCreate extends Component
{

    public $nip;
    public $nama;
    public $isPegawai = true;
    

    #[Title('Tambah Pegawai')]
    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-create', ['isPegawai' => $this->isPegawai]);
    }

    public function create(){
        $data = $this->all();
        Pegawai::create($data);
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Pegawai Ditambahkan'
        ]);
        return $this->redirect('/pegawai');
    }
}
