<?php

namespace App\Livewire\Admin\Ruangan;

use App\Models\Bidang;
use App\Models\Fasilitas;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class RuanganCreate extends Component
{       
    use WithFileUploads;

    public $nama;
    public $kapasitas;
    public $lokasi;
    public $deskripsi;
    public $kepemilikan;
    public $fasilitas_id;
    public $thumbnail;
    public $additionalImages = [];
    public $ac;
    public $meja;
    public $kursi;
    public $projector;
    public $thumbnailPreview;
    public $additionalImagesPreview = [];

    #[Title('Tambah Ruangan')]

    public function mount()
    {
        if (session()->has('message')) {
            $this->dispatch('showToastr', message: session('message'));
        }
    }

    public function updatedThumbnail()
    {
        $this->thumbnailPreview = $this->thumbnail->temporaryUrl();
    }

    public function updatedAdditionalImages()
    {
        $this->additionalImagesPreview = [];
        foreach ($this->additionalImages as $image) {
            $this->additionalImagesPreview[] = $image->temporaryUrl();
        }
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
            'thumbnail' => 'required|image', // max 2MB
            'additionalImages.*' => 'image', // max 2MB per image
            'additionalImages' => 'max:4', // max 4 additional images
        ]);

        $fasilitas = Fasilitas::create([
            'ac' => $this->ac,
            'meja' => $this->meja,
            'kursi' => $this->kursi,
            'proyektor' => $this->projector,
        ]);

        $thumbnailPath = $this->thumbnail->store('ruang', 'public');

        $ruang = Ruang::create([
            'nama' => $this->nama,
            'kapasitas' => $this->kapasitas,
            'lokasi' => $this->lokasi,
            'deskripsi' => $this->deskripsi,
            'bidang_id' => $this->kepemilikan,
            'fasilitas_id' => $fasilitas->id,
            'image' => $thumbnailPath, // This is the thumbnail
        ]);

        if ($this->additionalImages) {
            foreach ($this->additionalImages as $index => $image) {
                $imagePath = $image->store('ruang', 'public');
                Image::create([
                    'ruang_id' => $ruang->id,
                    'image' => $imagePath,
                    'order' => $index + 1,
                ]);
            }
        }

        session()->flash('toast', ['type' => 'success', 'message' => 'Ruangan berhasil ditambahkan']);
        return redirect()->to('/dataruangan');
    }
}