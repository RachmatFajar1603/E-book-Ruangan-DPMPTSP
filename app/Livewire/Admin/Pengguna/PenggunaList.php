<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\User;
use Livewire\Attributes\isPage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class PenggunaList extends Component
{
    use WithPagination;

    public $isPengguna = true;

    #[Title('Data Pengguna')]
    public $search = '';
    public $perPage = 10;
    public $sortField = 'nama';
    public $sortDirection = 'asc';

    protected $queryString = ['search' => ['except' => ''], 'sortField', 'sortDirection'];

    public function render()
    {
        $users = $this->getUsers();

        return view('livewire.admin.pengguna.pengguna-list', compact('users'));
    }

    public function getUsers()
    {
        $query = User::where('nama', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('telepon', 'LIKE', '%' . $this->search . '%')
            ->orWhereHas('bidang', function ($query) {
                $query->where('nama', 'LIKE', '%' . $this->search . '%');
            });

        $query = $this->applySorting($query);

        return $query->paginate($this->perPage);
    }

    protected function applySorting($query)
    {
        switch ($this->sortField) {
            case 'nama':
            case 'email':
            case 'telepon':
            case 'keterangan':
                $query->orderBy($this->sortField, $this->sortDirection);
                break;
            case 'bidang':
                $query->orderBy(function ($query) {
                    $query->select('nama')
                        ->from('bidangs')
                        ->whereColumn('bidangs.id', 'users.bidang_id')
                        ->limit(1);
                }, $this->sortDirection);
                break;
            case 'role':
                $query->orderBy(DB::raw("CASE
                    WHEN users.id IN (SELECT model_id FROM model_has_roles WHERE role_id = (SELECT id FROM roles WHERE name = 'admin')) THEN 1
                    WHEN users.id IN (SELECT model_id FROM model_has_roles WHERE role_id = (SELECT id FROM roles WHERE name = 'admin_bidang')) THEN 2
                    WHEN users.id IN (SELECT model_id FROM model_has_roles WHERE role_id = (SELECT id FROM roles WHERE name = 'kepala_dinas')) THEN 3
                    ELSE 4
                END"), $this->sortDirection);
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

    public function delete($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();
        $this->dispatch('showToast', type: 'error', message: 'Pengguna Dihapus');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
