<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class PegawaiList extends Component
{
    use WithPagination;

    #[Title('Data Pegawai')]

    public $search;
    public function render()
    {
        return view('livewire.admin.pegawai.pegawai-list', [
            "pegawais" => Pegawai::where(function ($query) {
                $query->where('nip', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('nama', 'LIKE', '%' . $this->search . '%');
                // Tambahkan kolom lain yang ingin Anda cari di sini
                // Contoh: ->orWhere('email', 'LIKE', '%'.$this->search.'%');
            })->paginate(10)
        ]);
    }

    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('pegawai');
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }
}
