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

    protected $queryString = ['search' => ['except' => '']];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $sumall = Peminjaman::count();
        $sumverified = Peminjaman::where('status', 'verified')->count();
        $sumrejected = Peminjaman::where('status', 'rejected')->count();

        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)
            ->where(function($query) {
                $query->where('penanggung_jawab', 'like', '%'.$this->search.'%')
                    ->orWhere('acara_kegiatan', 'like', '%'.$this->search.'%')
                    ->orWhereHas('ruang', function($query) {
                        $query->where('nama', 'like', '%'.$this->search.'%');
                    });
            })
            ->paginate($this->perPage);

        return view('livewire.admin.peminjaman-saya', compact('peminjaman', 'sumall', 'sumverified', 'sumrejected'));
    }
}
