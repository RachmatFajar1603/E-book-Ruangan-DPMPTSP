<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Component;
use Livewire\Features\SupportNavigate\SupportNavigate;

class PegawaiCreate extends Component
{

    public $nip;
    public $nama;

    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-create');
    }

    public function create(){
        Pegawai::create($this->all());
        return $this->redirect('/pegawai');
    }
}
