<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\Bidang;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Pegawai;

class PenggunaUpdate extends Component
{   
    public $nip_reg;
    public $nama;
    public $email;
    public $telepon;
    public $bidang_id;
    public $keterangan;
    public $selectedRole;  // Changed from $role to $selectedRole
    public $password;
    public $pengguna;
    public $isPengguna = true;

    public function mount($id){
        
        $this->pengguna = User::find($id);
        $this->nip_reg = $this->pengguna->nip_reg;
        $this->nama = $this->pengguna->nama;
        $this->email = $this->pengguna->email;
        $this->telepon = $this->pengguna->telepon;
        $this->bidang_id = $this->pengguna->bidang_id;
        $this->keterangan = $this->pengguna->keterangan;
        $this->selectedRole = $this->pengguna->roles->first()->name ?? null;  // Get the first role name, if any
    }
    public function render()
    {   
        $roles = Role::all();
        $bidangs = Bidang::all();
        return view('livewire.admin.pengguna.pengguna-update', compact('bidangs', 'roles'),['isPengguna' => $this->isPengguna]);
    }

    public function checkNip($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        
        if ($pegawai) {
            return response()->json(['nama' => $pegawai->nama]);
        }
        
        return response()->json(['nama' => null]);
    }


    public function update(){

        $validatedData = $this->validate([
            'nip_reg' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'bidang_id' => 'required',
            'keterangan' => 'required',
            'selectedRole' => 'required|exists:roles,name',
            'password' => 'nullable|min:6',
        ]);

        $this->pengguna->update($this->all());

        $this->pengguna->syncRoles([$this->selectedRole]);
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Data Pengguna Berhasil Diupdate'
        ]);
        return redirect('datapengguna');
    }
}
