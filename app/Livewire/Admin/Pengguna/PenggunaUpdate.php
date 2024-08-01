<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\Bidang;
use App\Models\User;
use Livewire\Component;

class PenggunaUpdate extends Component
{   
    public $nip_reg;
    public $nama;
    public $email;
    public $telepon;
    public $bidang_id;
    public $keterangan;
    public $role;
    public $password;

    public $pengguna;
    public function mount($id){
        $this->pengguna = User::find($id);
        $this->nip_reg = $this->pengguna->nip_reg;
        $this->nama = $this->pengguna->nama;
        $this->email = $this->pengguna->email;
        $this->telepon = $this->pengguna->telepon;
        $this->bidang_id = $this->pengguna->bidang_id;
        $this->keterangan = $this->pengguna->keterangan;
        $this->role = $this->pengguna->role;
    }
    public function render()
    {   
        $bidangs = Bidang::all();
        return view('livewire.admin.pengguna.pengguna-update', compact('bidangs'));
    }

    public function update(){
        $this->pengguna->update($this->all());
        return redirect('datapengguna');
    }
}
