<!-- resources/views/components/room-card.blade.php -->
<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full h-48 object-cover" src="{{ $room['image'] }}" alt="{{ $room['title'] }}">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">{{ $room['title'] }}</div>
        @foreach($room['details'] as $key => $value)
            <p class="text-gray-700 text-base">
                {{ $key }}: {{ $value }}
            </p>
        @endforeach
    </div>
    <div class="px-6 pt-4 pb-2">
        <a href="{{ $room['detailsUrl'] }}" class="bg-gray-700 hover:bg-gray-300 transition duration-300 ease-in-out text-white font-bold py-2 px-4 rounded-xl inline-block">
            View Details
        </a>
    </div>
</div>
