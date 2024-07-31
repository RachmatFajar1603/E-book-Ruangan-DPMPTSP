<?php

namespace App\Livewire\Admin;

use App\Models\Bidang;
use App\Models\Fasilitas;
use Livewire\Component;
use App\Models\Ruang;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class DataRuangan extends Component
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

    public function updatedImage()
    {
        $this->thumbnailPreview = $this->image->temporaryUrl();
    }

    #[Title('Data Ruangan')]
    public function render()
    {
        $ruangs = Ruang::all();

        foreach ($ruangs as $ruang){
            $ruang->image_url = Storage::url($ruang->image);
        }
        
        $bidangs = Bidang::all();
        return view('livewire.admin.data-ruangan', compact('bidangs', 'ruangs'));
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

        $imageUrl = Storage::url($imagePath);

        session()->flash('message', 'Data Ruangan Berhasil Ditambahkan. Image Path: ' . $imageUrl);
        return $this->redirect('/dataruangan');
    }
}
