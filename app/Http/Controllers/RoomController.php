<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = [
            [
                'title' => 'RUANG PIMPINAN A105',
                'image' => 'https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww',
                'details' => [
                    'Lokasi' => 'Gedung Kampus A',
                    'Lantai' => '1',
                ],
                'detailsUrl' => '/rooms/a105',
            ],
            [
                'title' => 'RUANG PIMPINAN A105',
                'image' => 'https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww',
                'details' => [
                    'Lokasi' => 'Gedung Kampus A',
                    'Lantai' => '1',
                ],
                'detailsUrl' => '/rooms/a106',
            ],
            [
                'title' => 'RUANG PIMPINAN A105',
                'image' => 'https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww',
                'details' => [
                    'Lokasi' => 'Gedung Kampus A',
                    'Lantai' => '1',
                ],
                'detailsUrl' => '/rooms/a106',
            ],
            [
                'title' => 'RUANG PIMPINAN A105',
                'image' => 'https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww',
                'details' => [
                    'Lokasi' => 'Gedung Kampus A',
                    'Lantai' => '1',
                ],
                'detailsUrl' => '/rooms/a106',
            ],
        ];

        return view('pages.ruangan', compact('rooms'));
    }
}
