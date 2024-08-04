<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class Laporan extends Component
{
    #[Title('Laporan')]
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
    }

    public function render()
    {
        $peminjaman = $this->getPeminjaman();
        return view('livewire.admin.laporan', compact('peminjaman'));
    }

    public function getPeminjaman()
    {
        return Peminjaman::whereBetween('tanggal_pinjam', [$this->startDate, $this->endDate])
            ->orderBy('tanggal_pinjam')
            ->get();
    }

    public function exportExcel()
    {
        return Excel::download(new PeminjamanExport($this->startDate, $this->endDate), 'laporan_peminjaman.xlsx');
    }

    public function clearFilter()
    {
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
    }
}