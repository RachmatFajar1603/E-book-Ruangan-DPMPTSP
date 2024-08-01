<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;

class Laporan extends Component
{   
    #[Title('Laporan')]
    public function render()
    {
        $peminjaman = Peminjaman::all();
        return view('livewire.admin.laporan', compact('peminjaman'));
    }
}
