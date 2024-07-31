<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class PinjamRuanganBook extends Component
{   
    #[Title('Book Ruangan')]
    public function render()
    {
        return view('livewire.admin.pinjam-ruangan-book');
    }
}
