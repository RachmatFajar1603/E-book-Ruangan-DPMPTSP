<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class PeminjamanSaya extends Component
{   
    #[Title('Peminjaman Saya')]
    public function render()
    {
        return view('livewire.admin.peminjaman-saya');
    }
}
