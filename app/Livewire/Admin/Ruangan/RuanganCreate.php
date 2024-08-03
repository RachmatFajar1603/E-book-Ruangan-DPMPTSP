<?php

namespace App\Livewire\Admin\Ruangan;

use App\Models\Bidang;
use App\Models\Fasilitas;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class RuanganCreate extends Component
{       
    use WithFileUploads;

    public $nama;
    public $kapasitas;
    public $lokasi;
    public $deskripsi;
    public $kepemilikan;
    public $fasilitas_id;
    public $image;
    public $ac;
    public $meja;
    public $kursi;
    public $projector;
    public $thumbnailLabel;
    public $thumbnailPreview;

    #[Title('Tambah Ruangan')]

    public function updatedImage()
    {
        $this->thumbnailPreview = $this->image->temporaryUrl();
    }

    public function render()
    {   
        $ruangs = Ruang::all();

        foreach ($ruangs as $ruang){
            $ruang->image_url = Storage::url($ruang->image);
        }

        $bidangs = Bidang::all();
        return view('livewire.admin.ruangan.ruangan-create', compact('bidangs', 'ruangs'));
    }

    public function create()
    {
        $this->validate([
            'image' => 'required|image|',
        ]);

        $imagePath = $this->image->store('ruang', 'public');

        Fasilitas::create([
            'ac' => $this->ac,
            'meja' => $this->meja,
            'kursi' => $this->kursi,
            'proyektor' => $this->projector,
        ]);

        Ruang::create([
            'nama' => $this->nama,
            'kapasitas' => $this->kapasitas,
            'lokasi' => $this->lokasi,
            'deskripsi' => $this->deskripsi,
            'bidang_id' => $this->kepemilikan,
            // set fasilitas_id same with this ruang id for now
            'fasilitas_id' => Fasilitas::latest()->first()->id,
            'image' => $imagePath,
        ]);

        $this->dispatch('showToast', type: 'success', message: 'Data Ruangan Berhasil Ditambahkan');
        return $this->redirect('/dataruangan');
    }
}
