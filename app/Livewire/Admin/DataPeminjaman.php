<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;

class DataPeminjaman extends Component
{   
    #[Title('Data Peminjaman')]
    public function render()
    {
        $peminjaman = Peminjaman::all();
        return view('livewire.admin.data-peminjaman', compact('peminjaman'));
    }
}
