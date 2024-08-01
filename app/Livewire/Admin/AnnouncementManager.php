<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\Attributes\Title;

class AnnouncementManager extends Component
{
    #[Title('Pengumuman Manager')]
    public $announcements;
    public $announcement_id;
    public $title;
    public $content;
    public $is_published = false;
    public $isEditing = false;

    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required',
        'is_published' => 'boolean',
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

        Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
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
        $announcement->update([
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
        ]);

        $this->resetInputFields();
        $this->isEditing = false;
        session()->flash('message', 'Pengumuman berhasil diperbarui.');
    }

    public function delete($id)
    {
        Announcement::find($id)->delete();
        session()->flash('message', 'Pengumuman berhasil dihapus.');
    }

    private function resetInputFields()
    {
        $this->announcement_id = null;
        $this->title = '';
        $this->content = '';
        $this->is_published = false;
    }
}
