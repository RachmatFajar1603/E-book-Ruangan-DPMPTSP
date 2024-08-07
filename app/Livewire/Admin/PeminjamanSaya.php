<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\WithPagination;

class PeminjamanSaya extends Component
{
    use WithPagination;

    public $search = ''; // Pastikan diinisialisasi dengan nilai kosong

    #[Title('Peminjaman Saya')]

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

        $peminjamanQuery = Peminjaman::where('user_id', auth()->user()->id);

        if ($this->search) {
            $peminjamanQuery->where(function ($query) {
                $query->where('penanggung_jawab', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('status', 'LIKE', '%' . $this->search . '%');
            });
        }

        $peminjaman = $peminjamanQuery->paginate(10);

        return view('livewire.admin.peminjaman-saya', compact('peminjaman', 'sumall', 'sumverified', 'sumrejected'));
    }
}
