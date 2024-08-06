<div>
    <main class="p-4 sm:ml-64 font-poppins min-h-screen">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Pesan Kontak</h2>
            <div class="space-y-4">
                @foreach ($messages as $message)
                    <div class="flex flex-col">
                        <div class="flex items-center mb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>
                            <span class="ml-2 font-semibold">{{ $message->name }}</span>
                            <span
                                class="ml-auto text-sm text-gray-500">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="bg-white rounded-lg rounded-tl-none shadow-md p-4 ml-6">
                            <p class="text-gray-700 mb-2">{{ $message->message }}</p>
                            <span class="text-sm text-blue-500">{{ $message->email }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
