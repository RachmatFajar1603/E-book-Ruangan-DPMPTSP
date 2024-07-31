<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use App\Models\Ruang;
use Livewire\Component;

class PinjamRuangan extends Component
{   
    #[Title('Pinjam Ruangan')]
    public function render()
    {
        $ruangans = Ruang::all();
        return view('livewire.admin.pinjam-ruangan', compact('ruangans'));
    }
}
