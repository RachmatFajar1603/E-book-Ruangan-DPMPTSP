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
        $sumall = Peminjaman::count();
        $sumverified = Peminjaman::where('status', 'verified')->count();
        $sumrejected = Peminjaman::where('status', 'rejected')->count();
        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get();
        return view('livewire.admin.peminjaman-saya', compact('peminjaman', 'sumall', 'sumverified', 'sumrejected'));
    }
}
