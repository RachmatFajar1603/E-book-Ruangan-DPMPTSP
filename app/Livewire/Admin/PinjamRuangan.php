<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use App\Models\Ruang;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class PinjamRuangan extends Component
{   
    #[Title('Pinjam Ruangan')]
    public function render()
    {
        $ruangans = Ruang::with('peminjamans')->get();

        foreach ($ruangans as $ruang){
            $ruang->image_url = Storage::url($ruang->image);
            $ruang->total_peminjaman = $ruang->peminjamans->count();
        }

        return view('livewire.admin.pinjam-ruangan', compact('ruangans'));
    }
    
    public function showRenovationToast()
    {
        $this->dispatch('showToast', type: 'warning', message: 'Ruangan Sedang Di Renovasi');
    }
}
