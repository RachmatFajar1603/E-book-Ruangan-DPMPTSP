<div id="welcome-popup"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 invisible opacity-0 transition-all duration-300 ease-in-out">
    <div
        class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full transform scale-95 transition-all duration-300 ease-in-out">
        @if ($announcement)
            <h2 class="text-2xl font-bold mb-4">{{ $announcement->title }}</h2>
            <p class="mb-6">{{ Str::limit($announcement->content, 200) }}</p>
            <div class="flex justify-between items-center">
                <a href="{{ route('pengumuman.show', $announcement->id) }}" class="text-blue-600 hover:underline">Baca
                    selengkapnya</a>
                <button id="close-popup"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                    Tutup
                </button>
            </div>
        @else
            <h2 class="text-2xl font-bold mb-4">Selamat Datang!</h2>
            <p class="mb-6">Terima kasih telah mengunjungi situs kami.</p>
            <button id="close-popup"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                Tutup
            </button>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('welcome-popup');
        const popupContent = popup.querySelector('div');
        const closeButton = document.getElementById('close-popup');

        function showPopup() {
            popup.classList.remove('invisible', 'opacity-0');
            setTimeout(() => {
                popupContent.classList.remove('scale-95');
                popupContent.classList.add('scale-100');
            }, 10);
        }

        function hidePopup() {
            popupContent.classList.remove('scale-100');
            popupContent.classList.add('scale-95');
            setTimeout(() => {
                popup.classList.add('invisible', 'opacity-0');
            }, 300);
        }

        if (!sessionStorage.getItem('popupShown')) {
            setTimeout(showPopup, 1000); // Show popup after 1 second
        }

        closeButton.addEventListener('click', function() {
            hidePopup();
            sessionStorage.setItem('popupShown', 'true');
        });
    });
</script>
