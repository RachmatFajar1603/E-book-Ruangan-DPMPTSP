<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class KontakForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'message']);

        session()->flash('message', 'Pesan Anda telah terkirim!');
    }
    public function render()
    {
        return view('livewire.kontak-form');
    }
}
