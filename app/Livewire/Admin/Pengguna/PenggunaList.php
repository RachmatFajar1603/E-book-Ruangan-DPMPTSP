<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class PenggunaList extends Component
{   
    #[Title('Data Pengguna')]
    public function render()
    {
        return view('livewire.admin.pengguna.pengguna-list',[
            "users" => User::all()
        ]);
    }

    public function delete($id){
        $pengguna = User::find($id);
        $pengguna->delete();
        return redirect('datapengguna');
    }
}
