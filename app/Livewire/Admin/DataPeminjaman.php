<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class DataPeminjaman extends Component
{   
    #[Title('Data Peminjaman')]
    public function render()
    {
        return view('livewire.admin.data-peminjaman');
    }
}
