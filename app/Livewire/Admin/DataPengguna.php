<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class DataPengguna extends Component
{   
    #[Title('Data Pengguna')]
    public function render()
    {   

        return view('livewire.admin.data-pengguna',[
            "users" => User::all()
        ]);
    }
}
