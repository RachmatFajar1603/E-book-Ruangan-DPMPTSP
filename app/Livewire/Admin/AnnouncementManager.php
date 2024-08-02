<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AnnouncementManager extends Component
{
    use WithFileUploads;

    #[Title('Pengumuman Manager')]
    public $announcements;
    public $announcement_id;
    public $title;
    public $content;
    public $is_published = false;
    public $isEditing = false;
    public $photo;

    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required',
        'is_published' => 'boolean',
        'photo' => 'nullable|image|max:1024',
    ];

    public function render()
    {
        $this->announcements = Announcement::latest()->get();
        return view('livewire.admin.announcement-manager');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function store()
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('announcements', 'public');
        }

        Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
            'photo' => $photoPath,
        ]);

        $this->resetInputFields();
        session()->flash('message', 'Pengumuman berhasil dibuat.');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        $this->announcement_id = $id;
        $this->title = $announcement->title;
        $this->content = $announcement->content;
        $this->is_published = $announcement->is_published;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $announcement = Announcement::find($this->announcement_id);

        $photoPath = $announcement->photo;
        if ($this->photo) {
            if ($announcement->photo) {
                Storage::disk('public')->delete($announcement->photo);
            }
            $photoPath = $this->photo->store('announcements', 'public');
        }

        $announcement->update([
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
            'photo' => $photoPath,
        ]);

        $this->resetInputFields();
        $this->isEditing = false;
        session()->flash('message', 'Pengumuman berhasil diperbarui.');
    }

    public function delete($id)
    {
        $announcement = Announcement::find($id);
        if ($announcement->photo) {
            Storage::disk('public')->delete($announcement->photo);
        }
        $announcement->delete();
        session()->flash('message', 'Pengumuman berhasil dihapus.');
    }

    private function resetInputFields()
    {
        $this->announcement_id = null;
        $this->title = '';
        $this->content = '';
        $this->is_published = false;
        $this->photo = null;
    }
}
