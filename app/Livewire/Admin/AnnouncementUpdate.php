<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class AnnouncementUpdate extends Component
{
    use WithFileUploads;

    public $announcements;
    public $announcement_id;
    public $title;
    public $content;
    public $is_published = false;
    public $isEditing = false;
    public $photo;

    public function mount($id)
    {
        $this->announcements = Announcement::find($id);
        $this->announcement_id = $this->announcements->id;
        $this->title = $this->announcements->title;
        $this->content = $this->announcements->content;
        $this->is_published = $this->announcements->is_published;
    }
    public function render()
    {
        return view('livewire.admin.announcement-update');
    }

    public function update()
    {
        $this->announcements->update($this->all());

        if ($this->photo) {
            Storage::disk('public')->delete($this->announcements->photo);
            $photoPath = $this->photo->store('announcements', 'public');
            $this->announcements->update(['photo' => $photoPath]);
        }

        

        return redirect('pengumuman-manager');
        session()->flash('message', 'Pengumuman berhasil diperbarui.');
    }
}
