<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Bidang;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Ruang;

class BerandaAdmin extends Component
{
    #[Title('Beranda')]
    public function render()
    {
        $sumall = Peminjaman::count();
        $bidang = Bidang::count();
        $sumverified = Peminjaman::where('status', 'verified')->count();
        $sumrejected = Peminjaman::where('status', 'rejected')->count();
        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get();
        $ruangtersedia = Ruang::where('status', 'Tersedia')->get();
        $ruangtidaktersedia = Ruang::where('status', 'Tidak Tersedia')->get();
        $ruangs = Ruang::all();
        $pengguna = User::count();

        // Get room names and their borrowing counts
        $roomData = Ruang::withCount('peminjamans')->get();
        $chartLabels = $roomData->pluck('nama'); // X-axis labels
        $chartValues = $roomData->pluck('peminjamans_count'); // Y-axis values

        foreach ($ruangs as $ruang) {
            $ruang->total_peminjaman = $ruang->peminjamans->count();
        }

        return view('livewire.admin.beranda-admin', compact(
            'peminjaman', 'sumall', 'sumverified', 'sumrejected', 'ruangs', 
            'ruangtersedia', 'ruangtidaktersedia', 'bidang', 'pengguna',
            'chartLabels', 'chartValues' // Add these to the view
        ));
    }
}
