<?php

namespace App\Livewire\Admin;

use App\Models\Bidang;
use App\Models\Fasilitas;
use Livewire\Component;
use App\Models\Ruang;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

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
    public $proyektor;

    #[Title('Data Ruangan')]
    public function render()
    {
        $bidangs = Bidang::all();
        return view('livewire.admin.data-ruangan', compact('bidangs'));
    }

    public function create()
    {
        Ruang::create($this->all());
        Fasilitas::create($this->all());

        session()->flash('message', 'Data Ruangan Berhasil Ditambahkan');
        return $this->redirect('/dataruangan', navigate:true);
    }

    // public function store()
    // {
    //     $this->validate([
    //         'nama' => 'required',
    //         'kapasitas' => 'required',
    //         'lokasi' => 'required',
    //         'deskripsi' => 'required',
    //         'kepemilikan' => 'required',
    //         'fasilitas_id' => 'required',
    //         'image' => 'required|image|max:1024',
    //         'ac'=>'required',
    //         'meja'=>'required',
    //         'kursi'=>'required',
    //         'proyektor'=>'required',
    //     ]);

    //     $imageName = time().'.'.$this->image->extension();
    //     $this->image->move(public_path('ruang'), $imageName);
    //     $imagePath = 'ruang/'.$imageName;

    //     Ruang::create([
    //         'nama' => $this->nama,
    //         'kapasitas' => $this->kapasitas,
    //         'lokasi' => $this->lokasi,
    //         'deskripsi' => $this->deskripsi,
    //         'kepemilikan' => $this->kepemilikan,
    //         'fasilitas_id' => $this->fasilitas_id,
    //         'image' => $imagePath,
    //     ]);

    //     Fasilitas::create([
    //         'ac' => $this->ac,
    //         'meja' => $this->meja,
    //         'kursi' => $this->kursi,
    //         'proyektor' => $this->proyektor,
    //     ]);

    //     session()->flash('message', 'Data Ruangan Berhasil Ditambahkan');
    //     return redirect(route('dataruangan'));
    // }
}
