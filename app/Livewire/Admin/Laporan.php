<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class Laporan extends Component
{   
    #[Title('Laporan')]
    public function render()
    {
        return view('livewire.admin.laporan');
    }
}
