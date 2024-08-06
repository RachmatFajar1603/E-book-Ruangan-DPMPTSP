<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;

class Laporan extends Component
{
    use WithPagination;

    #[Title('Laporan')]
    public $startDate;
    public $endDate;
    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search' => ['except' => '']];

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
            ->where(function ($query) {
                $query->where('penanggung_jawab', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($subQuery) {
                        $subQuery->where('nama', 'like', '%' . $this->search . '%')
                            ->orWhere('nip_reg', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('ruangan', function ($subQuery) {
                        $subQuery->where('nama', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('catatan', 'like', '%' . $this->search . '%');
            })
            ->orderBy('tanggal_pinjam')
            ->paginate($this->perPage);
    }

    public function exportExcel()
    {
        return Excel::download(new PeminjamanExport($this->startDate, $this->endDate, $this->search), 'laporan_peminjaman.xlsx');
    }

    public function clearFilter()
    {
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
        $this->search = '';
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
