<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class PinjamRuangan extends Component
{   
    #[Title('Pinjam Ruangan')]
    public function render()
    {
        return view('livewire.admin.pinjam-ruangan');
    }
}
