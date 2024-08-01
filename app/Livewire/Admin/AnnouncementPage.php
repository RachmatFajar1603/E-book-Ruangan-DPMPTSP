<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class AnnouncementPage extends Component
{
    use WithPagination;

    public $showPopup = false;
    public $currentAnnouncement;

    protected $listeners = ['showAnnouncement'];

    public function mount()
    {
        $this->showPopup = !session('popupShown');
        if ($this->showPopup) {
            $this->currentAnnouncement = Announcement::latest()->first();
        }
    }

    public function render()
    {
        return view('livewire.admin.announcement-page', [
            'announcements' => Announcement::latest()->paginate(9), // Menampilkan 9 pengumuman per halaman
        ]);
    }

    public function showAnnouncement($id)
    {
        $this->currentAnnouncement = Announcement::findOrFail($id);
        $this->showPopup = true;
    }

    public function hidePopup()
    {
        $this->showPopup = false;
        session(['popupShown' => true]);
    }
}
