<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\Bidang;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
use Illuminate\Validation\ValidationException;

class PenggunaCreate extends Component
{   
    
    public $nip_reg;
    public $nama;
    public $email;
    public $telepon;
    public $bidang_id;
    public $keterangan;
    public $selectedRole;
    public $password;

    public function updateNama($nama)
    {
        $this->nama = $nama;
    }

    public function render()
    {   
        $bidangs = Bidang::all();
        $roles = Role::all();
        return view('livewire.admin.pengguna.pengguna-create', compact('bidangs', 'roles'));
    }

    public function checkNip($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        
        if ($pegawai) {
            $this->nama = $pegawai->nama;
            return response()->json(['nama' => $pegawai->nama]);
        }
        
        $this->nama = null;
        return response()->json(['nama' => null]);
    }

    public function create()
    {
            $validatedData = $this->validate([
                'nip_reg' => 'required',
                'nama' => 'required',
                'email' => 'required|email|unique:users,email',
                'telepon' => 'required',
                'bidang_id' => 'required',
                'keterangan' => 'required',
                'selectedRole' => 'required|exists:roles,name',
                'password' => 'required|min:6',
            ]);


            $user = User::create([
                'nip_reg' => $this->nip_reg,
                'nama' => $this->nama,
                'email' => $this->email,
                'telepon' => $this->telepon,
                'bidang_id' => $this->bidang_id,
                'keterangan' => $this->keterangan,
                'password' => Hash::make($this->password),
            ]);

            $user->assignRole($this->selectedRole);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'Data Pengguna Berhasil Ditambahkan'
            ]);
            return $this->redirect('/datapengguna');
    }
}