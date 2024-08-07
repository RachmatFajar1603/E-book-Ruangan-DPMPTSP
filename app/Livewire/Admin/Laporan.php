<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Laporan extends Component
{
    use WithPagination;

    #[Title('Laporan')]
    public $startDate;
    public $endDate;
    public $search = '';
    public $perPage = 10;
    public $sortField = 'tanggal_pinjam';
    public $sortDirection = 'asc';

    protected $queryString = ['search' => ['except' => ''], 'sortField', 'sortDirection'];

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
        $query = Peminjaman::whereBetween('tanggal_pinjam', [$this->startDate, $this->endDate])
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
            });

        $query = $this->applySorting($query);

        return $query->paginate($this->perPage);
    }

    protected function applySorting($query)
    {
        switch ($this->sortField) {
            case 'id':
                $query->orderBy('id', $this->sortDirection);
                break;
            case 'user_id':
                $query->orderBy('user_id', $this->sortDirection);
                break;
            case 'nip_reg':
                $query->orderBy('user_id', $this->sortDirection);
                break;
            case 'bidang':
                $query->orderBy('user_id', $this->sortDirection);
                break;
            case 'penanggung_jawab':
                $query->orderBy('penanggung_jawab', $this->sortDirection);
                break;
            case 'ruang_id':
                $query->orderBy('ruang_id', $this->sortDirection);
                break;
            case 'tanggal_pinjam':
                $query->orderBy('tanggal_pinjam', $this->sortDirection);
                break;
            case 'tanggal_selesai':
                $query->orderBy('tanggal_selesai', $this->sortDirection);
                break;
            case 'waktu_mulai':
                $query->orderBy('waktu_mulai', $this->sortDirection);
                break;
            case 'waktu_selesai':
                $query->orderBy('waktu_selesai', $this->sortDirection);
                break;
            case 'catatan':
                $query->orderBy('catatan', $this->sortDirection);
                break;
            case 'kapasitas':
                $query->orderBy('kapasitas', $this->sortDirection);
                break;
            case 'status':
                $query->orderBy('status', $this->sortDirection);
                break;
            default:
                $query->orderBy('tanggal_pinjam', 'asc');
        }

        return $query;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function exportExcel()
    {
        return Excel::download(new PeminjamanExport($this->startDate, $this->endDate, $this->search, $this->sortField, $this->sortDirection), 'laporan_peminjaman.xlsx');
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
