<!-- resources/views/components/room-card.blade.php -->
<div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white transition-transform duration-300 hover:scale-105">
    <img class="w-full h-48 object-cover" src="{{ $room->image_url }}" alt="{{ $room->nama }}">
    <div class="px-6 py-2">
        <div class="font-bold text-xl mb-2 text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">{{ $room->nama }}</div>
        <p>
            Kepemilikan: {{ $room->bidang->nama }}
        </p>
        <p>
            {{ $room->lokasi}}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <a href="{{ route('ruangan.detail', ['id' => $room->id]) }}" class="bg-gray-700 hover:bg-gray-300 transition duration-300 ease-in-out text-white font-bold py-2 px-4 rounded-lg flex justify-center">
            View Details
        </a>
    </div>
</div>
