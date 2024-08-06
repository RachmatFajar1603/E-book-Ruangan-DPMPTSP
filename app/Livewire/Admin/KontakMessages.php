<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class KontakMessages extends Component
{
    public function render()
    {
        $messages = Contact::latest()->get();
        return view('livewire.admin.kontak-messages', ['messages' => $messages]);
    }
}
