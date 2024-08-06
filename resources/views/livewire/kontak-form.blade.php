<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        <div>
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
            <input type="text" id="name" wire:model="name" required
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" wire:model="email" required
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Saran</label>
            <textarea id="message" wire:model="message" rows="5" required
                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit"
                class="bg-gray-700 hover:bg-gray-600 transition duration-300 ease-in-out text-white font-bold py-3 px-4 rounded-xl focus:outline-none focus:shadow-outline w-full">
                Kirim Saran
            </button>
        </div>
    </form>
</div>
