@extends('layouts.pages')

@section('content')
        <div class="relative py-24 px-4 sm:px-6 lg:px-8">
            <div class="w-full sm:w-5/6 max-w-screen-xl mx-auto">
                <div class="relative h-64 bg-cover bg-center rounded-xl overflow-hidden"
                    style="background-image: url('https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 flex flex-col justify-center items-center h-full text-white">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">Hubungi Kami</h1>
                        <nav class="text-sm">
                            <ol class="list-none p-0 inline-flex">
                                <li class="flex items-center">
                                    <a href="/" class="hover:text-gray-300">Home</a>
                                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512">
                                        <path
                                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                    </svg>
                                </li>
                                <li>Ruangan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 my-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($rooms as $room)
                <x-room-card :room="$room" />
            @endforeach
        </div>
    </div>
@endsection