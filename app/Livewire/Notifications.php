<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    protected $listeners = ['showToast'];

    public function showToast($type, $message)
    {
        $this->dispatchBrowserEvent('show-toast', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}