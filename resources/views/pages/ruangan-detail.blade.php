@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">{{ $room['title'] }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <div class="mb-4">
                    <img src="{{ $room['images'][0] }}" alt="{{ $room['title'] }}" class="w-full rounded-lg shadow-lg">
                </div>
                <div class="grid grid-cols-4 gap-2">
                    @foreach (array_slice($room['images'], 1) as $image)
                        <img src="{{ $image }}" alt="Room view" class="w-full h-20 object-cover rounded">
                    @endforeach
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Details Ruangan</h2>
                <ul class="space-y-2">
                    @foreach ($room['details'] as $key => $value)
                        <li><span class="font-medium">{{ $key }}:</span> {{ $value }}</li>
                    @endforeach
                </ul>

                <h2 class="text-xl font-semibold mt-6 mb-4">Fasilitas Ruangan {{ $room['title'] }}</h2>
                <div class="flex flex-wrap gap-4">
                    @foreach ($room['facilities'] as $facility)
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $facility }}</span>
                    @endforeach
                </div>

                <h2 class="text-xl font-semibold mt-6 mb-4">Ruangan ini telah di booking pada:</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Tanggal Pinjam</th>
                                <th class="px-4 py-2">Jam Mulai</th>
                                <th class="px-4 py-2">Jam Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($room['bookings'] as $booking)
                                <tr>
                                    <td class="border px-4 py-2">{{ $booking['date'] }}</td>
                                    <td class="border px-4 py-2">{{ $booking['start'] }}</td>
                                    <td class="border px-4 py-2">{{ $booking['end'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-8">
                    <a href="#"
                        class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">Booking</a>
                </div>
            </div>
        </div>
    </div>
@endsection
