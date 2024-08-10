<?php

namespace App\Livewire\Admin\Ruangan;

use App\Models\Bidang;
use App\Models\Fasilitas;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class DataRuangan extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'nama';
    public $sortDirection = 'asc';

    #[Title('Data Ruangan')]

    protected $queryString = ['search' => ['except' => ''], 'sortField', 'sortDirection'];

    public function mount()
    {
        if (session()->has('message')) {
            $this->dispatch('showToastr', message: session('message'));
        }
    }

    public function render()
    {
        $ruangtersedia = Ruang::where('status', 'Tersedia')->count();
        $ruangtidaktersedia = Ruang::where('status', 'Tidak Tersedia')->count();

        if (auth()->user()->hasRole('superadmin')) {
            $ruangs = $this->getRuangs();
        } elseif (auth()->user()->hasRole('adminbidang')) {
            $ruangs = Ruang::where('bidang_id', auth()->user()->bidang_id)->paginate($this->perPage);
        }

        foreach ($ruangs as $ruang) {
            $ruang->image_url = Storage::url($ruang->image);
            $ruang->total_peminjaman = $ruang->peminjamans->count();
        }

        return view('livewire.admin.ruangan.data-ruangan', compact('ruangs', 'ruangtersedia', 'ruangtidaktersedia'));
    }
    

    public function getRuangs()
    {
        $query = Ruang::where(function ($query) {
            $query->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('lokasi', 'like', '%' . $this->search . '%')
                ->orWhereHas('bidang', function ($subQuery) {
                    $subQuery->where('nama', 'like', '%' . $this->search . '%');
                });
        });

        $query = $this->applySorting($query);

        return $query->paginate($this->perPage);
    }

    protected function applySorting($query)
    {
        switch ($this->sortField) {
            case 'nama':
            case 'lokasi':
            case 'kapasitas':
            case 'status':
                $query->orderBy($this->sortField, $this->sortDirection);
                break;
            case 'bidang':
                $query->orderBy(function ($query) {
                    $query->select('nama')
                        ->from('bidangs')
                        ->whereColumn('bidangs.id', 'ruangs.bidang_id')
                        ->limit(1);
                }, $this->sortDirection);
                break;
            default:
                $query->orderBy('nama', 'asc');
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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Fasilitas::where('id', $id)->delete();
        Ruang::where('id', $id)->delete();
        $this->dispatch('showToast', type: 'error', message: 'Ruangan Dihapus');
    }
}
