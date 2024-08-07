<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Booking' }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @livewireStyles

    @php
    $isPage = "";
    $parentPath = request()->segment(1);
    // dashboard
    if ($parentPath == 'beranda') {
        $isPage = "beranda";
    // datamaster
    } elseif ($parentPath == 'pengumuman-manager') {
        $isPage = "pengumuman-manager";
    }
    elseif ($parentPath == 'contact-messages') {
        $isPage = "contact-messages";
    }
    elseif ($parentPath == 'pegawai') {
        $isPage = "pegawai";
    } elseif ($parentPath == 'datapengguna') {
        $isPage = "datapengguna";
    } elseif ($parentPath == 'bidang') {
        $isPage = "bidang";
    } elseif ($parentPath == 'dataruangan') {
        $isPage = "dataruangan";
    // peminjaman menu
    } elseif ($parentPath == 'datapeminjaman') {
        $isPage = "datapeminjaman";
    }
    elseif ($parentPath == 'pinjam-ruangan') {
        $isPage = "pinjam-ruangan";
    }
    elseif ($parentPath == 'laporan') {
        $isPage = "laporan";
    } elseif ($parentPath == 'peminjamansaya') {
        $isPage = "peminjamansaya";
    }
    @endphp
</head>

<body class="bg-gray-50 dark:bg-gray-50 m-5">
    @livewireScripts
    @include('layouts.sidebar')
    
    {{ $slot }}

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('showToast', (event) => {
                toastr[event.type](event.message);
            });
        });

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('showToastr', (event) => {
                toastr[event.type](event.message);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            @if (session()->has('toast'))
                let toast = @json(session('toast'));
                toastr[toast.type](toast.message);
            @endif
        });
    </script>
</body>

</html>
