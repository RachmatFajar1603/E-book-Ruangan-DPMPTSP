<?php

namespace App\Livewire\Admin\Pengguna;

use App\Models\User;
use Livewire\Attributes\isPage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class PenggunaList extends Component
{
    use WithPagination;

    public $isPengguna = true;

    #[Title('Data Pengguna')]
    public $search = '';
    public function render()
    {   
        $users = User::where('nama', 'LIKE', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.pengguna.pengguna-list', [
            'isPengguna' => $this->isPengguna,
            'users' => $users,
        ]);
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
