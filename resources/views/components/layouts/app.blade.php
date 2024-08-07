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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-50 m-5">
    @livewireScripts
    @include('layouts.sidebar')

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
