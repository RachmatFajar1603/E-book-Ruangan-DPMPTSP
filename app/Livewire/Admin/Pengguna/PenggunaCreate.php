<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\Bidang;
use App\Models\User;
use Livewire\Component;

class PenggunaCreate extends Component
{   
    
    public $nip_reg;
    public $nama;
    public $email;
    public $telepon;
    public $bidang_id;
    public $keterangan;
    public $role;
    public $password;

    public function render()
    {   
        $bidangs = Bidang::all();
        return view('livewire.admin.pengguna.pengguna-create', compact('bidangs'));
    }

    public function create(){
        $data = $this->all();
        User::create($data);
        return $this->redirect('/datapengguna');
    }
}
