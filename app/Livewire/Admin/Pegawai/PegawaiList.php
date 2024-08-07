<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class PegawaiList extends Component
{
    use WithPagination;

    #[Title('Data Pegawai')]

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;

    protected $queryString = ['search' => ['except' => ''], 'sortField', 'sortDirection'];

    public function render()
    {
        $pegawais = $this->getPegawais();
        return view('livewire.admin.pegawai.pegawai-list', compact('pegawais'));
    }

    public function getPegawais()
    {
        $query = Pegawai::where(function ($query) {
            $query->where('nip', 'like', '%' . $this->search . '%')
                ->orWhere('nama', 'like', '%' . $this->search . '%');
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
            case 'nip':
                $query->orderBy('nip', $this->sortDirection);
                break;
            case 'nama':
                $query->orderBy('nama', $this->sortDirection);
                break;
            default:
                $query->orderBy('id', 'asc');
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

    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('pegawai');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
