<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Announcement;

class WelcomePopup extends Component
{
    public $announcement;

    public function __construct()
    {
        $this->announcement = Announcement::latest()->first();
    }

    public function render()
    {
        return view('components.welcome-popup');
    }
}
