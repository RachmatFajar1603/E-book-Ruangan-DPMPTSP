<?php

namespace App\Livewire\Admin\Ruangan;

use App\Models\Bidang;
use App\Models\Fasilitas;
use App\Models\Ruang;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditRuang extends Component
{
    use WithFileUploads;

    public $ruangId;
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
    public $existingThumbnail;
    public $existingAdditionalImages;

    #[Title('Update Data Pengguna')]
    public function mount($id)
    {
        $ruang = Ruang::with('fasilitas', 'bidang', 'images')->findOrFail($id);
        $this->ruangId = $ruang->id;
        $this->nama = $ruang->nama;
        $this->kapasitas = $ruang->kapasitas;
        $this->lokasi = $ruang->lokasi;
        $this->deskripsi = $ruang->deskripsi;
        $this->kepemilikan = $ruang->bidang_id;
        $this->fasilitas_id = $ruang->fasilitas_id;
        $this->existingThumbnail = $ruang->image;
        $this->existingAdditionalImages = $ruang->images;
        
        if ($ruang->fasilitas) {
            $this->ac = $ruang->fasilitas->ac;
            $this->meja = $ruang->fasilitas->meja;
            $this->kursi = $ruang->fasilitas->kursi;
            $this->projector = $ruang->fasilitas->proyektor;
        }
    }

    public function render()
    {   
        $bidangs = Bidang::all();
        return view('livewire.admin.ruangan.edit-ruang', compact('bidangs'));
    }

    public function removeExistingImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
        $this->existingAdditionalImages = $this->existingAdditionalImages->filter(function ($img) use ($imageId) {
            return $img->id !== $imageId;
        });
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'kapasitas' => 'required|numeric',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kepemilikan' => 'required',
            'thumbnail' => 'nullable|image|max:2048', // max 2MB
            'additionalImages.*' => 'image|max:2048', // max 2MB per image
            'additionalImages' => 'max:4', // max 4 additional images
        ]);

        $ruang = Ruang::findOrFail($this->ruangId);

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('ruang', 'public');
            if ($ruang->image) {
                Storage::disk('public')->delete($ruang->image);
            }
        } else {
            $thumbnailPath = $this->existingThumbnail;
        }

        $ruang->update([
            'nama' => $this->nama,
            'kapasitas' => $this->kapasitas,
            'lokasi' => $this->lokasi,
            'deskripsi' => $this->deskripsi,
            'bidang_id' => $this->kepemilikan,
            'image' => $thumbnailPath,
        ]);

        Fasilitas::updateOrCreate(
            ['id' => $this->fasilitas_id],
            [
                'ac' => $this->ac ? 1 : 0,
                'meja' => $this->meja ? 1 : 0,
                'kursi' => $this->kursi ? 1 : 0,
                'proyektor' => $this->projector ? 1 : 0,
            ]
        );

        if ($this->additionalImages) {
            foreach ($this->additionalImages as $image) {
                $imagePath = $image->store('ruang', 'public');
                Image::create([
                    'ruang_id' => $ruang->id,
                    'image' => $imagePath,
                    'order' => $ruang->images()->count() + 1,
                ]);
            }
        }
        
        session()->flash('toast', ['type' => 'success', 'message' => 'Ruangan berhasil diperbarui']);
        return $this->redirect('/dataruangan');
    }
}