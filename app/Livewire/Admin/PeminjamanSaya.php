<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\WithPagination;

class PeminjamanSaya extends Component
{
    use WithPagination;

    #[Title('Peminjaman Saya')]

    public $search = '';
    public $perPage = 10;
    public $sortField = 'tanggal_pinjam';
    public $sortDirection = 'asc';

    protected $queryString = ['search' => ['except' => ''], 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function render()
    {
        $sumall = Peminjaman::count();
        $sumverified = Peminjaman::where('status', 'verified')->count();
        $sumrejected = Peminjaman::where('status', 'rejected')->count();

        $peminjamanQuery = Peminjaman::where('user_id', auth()->user()->id);

        if ($this->search) {
            $peminjamanQuery->where(function ($query) {
                $query->where('penanggung_jawab', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('status', 'LIKE', '%' . $this->search . '%');
            });
        }

        $peminjamanQuery = $this->applySorting($peminjamanQuery);

        $peminjaman = $peminjamanQuery->paginate($this->perPage);

        return view('livewire.admin.peminjaman-saya', compact('peminjaman', 'sumall', 'sumverified', 'sumrejected'));
    }

    protected function applySorting($query)
    {
        switch ($this->sortField) {
            case 'penanggung_jawab':
                $query->orderBy('penanggung_jawab', $this->sortDirection);
                break;
            case 'ruangan':
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
            case 'acara_kegiatan':
                $query->orderBy('acara_kegiatan', $this->sortDirection);
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
}
