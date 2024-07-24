<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($rooms as $room)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ $room['image'] }}" alt="{{ $room['name'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $room['name'] }}</h3>
                <p class="text-sm text-gray-600 mb-1">Lokasi: {{ $room['location'] }}</p>
                <p class="text-sm text-gray-600 mb-3">Lantai: {{ $room['floor'] }}</p>
                <a href="#" class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">View Details</a>
            </div>
        </div>
    @endforeach
</div>
