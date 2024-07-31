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

    #[Title('Tambah Pegawai')]
    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-create');
    }

    public function create(){
        $data = $this->all();
        dd($data);
        Pegawai::create($data);
        return $this->redirect('/pegawai');
    }
}
