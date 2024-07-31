<?php

namespace App\Livewire\Admin;

use App\Models\Bidang;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class DataPenggunaCreate extends Component
{   
    public $nip_reg;
    public $nama;
    public $email;
    public $telepon;
    public $bidang_id;
    public $keterangan;
    public $role;
    public $password;

    #[Title('Tambah Pengguna')]

    public function render()
    {   
        $bidangs = Bidang::where('nama');
        return view('livewire.admin.data-pengguna-create', compact('bidangs'));
    }

    
    public function create(){
        $data = $this->all();
        User::create($data);
        return $this->redirect('/datapengguna');
    }
}