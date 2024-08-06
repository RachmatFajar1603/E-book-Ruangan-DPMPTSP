<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Bidang;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BerandaAdmin extends Component
{
    #[Title('Beranda')]
    public function render()
    {
        $sumall = Peminjaman::count();
        $bidangCount = Peminjaman::distinct('user_id')->count('user_id');
        $sumverified = Peminjaman::where('status', 'verified')->count();
        $sumrejected = Peminjaman::where('status', 'rejected')->count();
        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get();
        $ruangtersedia = Ruang::where('status', 'Tersedia')->get();
        $ruangtidaktersedia = Ruang::where('status', 'Tidak Tersedia')->get();
        $ruangs = Ruang::all();
        $pengguna = User::count();
        $bidang = Bidang:: count();

        // Get room names and their borrowing counts
        $roomData = Ruang::withCount('peminjamans')->get();
        $chartLabels = $roomData->pluck('nama'); // X-axis labels
        $chartValues = $roomData->pluck('peminjamans_count'); // Y-axis values

        // Get monthly room usage counts
        $monthlyRoomUsage = Peminjaman::select(
                DB::raw('MONTH(tanggal_pinjam) as month'),
                DB::raw('count(*) as peminjaman_count') // Count all peminjaman in each month
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('peminjaman_count', 'month');

        // Initialize chart values for each month
        $chartMonthlyValues = array_fill(1, 12, 0); // 12 months initialized to 0

        foreach ($monthlyRoomUsage as $month => $count) {
            $chartMonthlyValues[$month] = $count;
        }

        // Get bidang names and their borrowing counts
        $bidangData = Peminjaman::with('user.bidang')
            ->get()
            ->groupBy('user.bidang.nama')
            ->map(function ($peminjaman) {
                return $peminjaman->count();
            });

        $chartBidangLabels = $bidangData->keys(); // X-axis labels for bidang
        $chartBidangValues = $bidangData->values(); // Y-axis values for bidang

        return view('livewire.admin.beranda-admin', compact(
            'peminjaman', 'sumall', 'sumverified', 'sumrejected', 'ruangs', 
            'ruangtersedia', 'ruangtidaktersedia', 'bidangCount', 'bidang', 'pengguna',
            'chartLabels', 'chartValues', // Existing chart data
            'chartMonthlyValues', // New monthly chart data
            'chartBidangLabels', 'chartBidangValues', // New bidang chart data
            'bidangData' // Data of peminjaman per bidang
        ));
    }
}
