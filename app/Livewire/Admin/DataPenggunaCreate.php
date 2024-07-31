<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class DataPenggunaCreate extends Component
{   
    #[Title('Tambah Pengguna')]
    public function render()
    {
        return view('livewire.admin.data-pengguna-create');
    }
}
