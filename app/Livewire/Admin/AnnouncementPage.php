<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;
use Carbon\Carbon;

class AnnouncementPage extends Component
{
    use WithPagination;

    public $showPopup = false;
    public $currentAnnouncement;
    public $search = '';
    public $startDate;
    public $endDate;
    public $perPage = 9;

    protected $queryString = ['search' => ['except' => ''], 'startDate', 'endDate'];

    public function mount()
    {
        $this->resetDates();
    }

    public function render()
    {
        $query = Announcement::query();

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ]);
        }

        if ($this->search !== '') {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        $announcements = $query->latest()->paginate($this->perPage);

        return view('livewire.admin.announcement-page', [
            'announcements' => $announcements,
            'totalAnnouncements' => Announcement::count(),
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStartDate()
    {
        $this->resetPage();
    }

    public function updatedEndDate()
    {
        $this->resetPage();
    }

    public function resetDates()
    {
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
    }

    public function clearFilter()
    {
        $this->resetDates();
        $this->search = '';
        $this->resetPage();
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
