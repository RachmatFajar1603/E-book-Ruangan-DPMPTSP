<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('pages.pengumuman-detail', compact('announcement'));
    }
}
