<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;

class PeminjamanSaya extends Component
{   
    #[Title('Peminjaman Saya')]
    public function render()
    {
        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get();
        return view('livewire.admin.peminjaman-saya', compact('peminjaman'));
    }
}
