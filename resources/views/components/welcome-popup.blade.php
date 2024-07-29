<div id="welcome-popup"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out">
    <div
        class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full transform scale-95 opacity-0 transition-all duration-300 ease-in-out">
        <h2 class="text-2xl font-bold mb-4">{{ $title ?? 'Welcome to Our Website!' }}</h2>
        <p class="mb-6">
            {{ $message ?? 'Thank you for visiting. We hope you enjoy your stay and find what you\'re looking for.' }}
        </p>
        <button id="close-popup"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
            {{ $buttonText ?? 'Close' }}
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('welcome-popup');
        const popupContent = popup.querySelector('div');
        const closeButton = document.getElementById('close-popup');

        // Function to show the popup
        function showPopup() {
            popup.classList.remove('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                popupContent.classList.remove('scale-95', 'opacity-0');
            }, 10);
        }

        // Function to hide the popup
        function hidePopup() {
            popupContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                popup.classList.add('opacity-0', 'pointer-events-none');
                // Set a flag in sessionStorage to indicate the popup has been shown
                sessionStorage.setItem('popupShown', 'true');
            }, 300);
        }

        // Check if the popup has been shown in this session
        const popupShown = sessionStorage.getItem('popupShown');

        // Show popup if it hasn't been shown in this session
        if (!popupShown) {
            showPopup();
        }

        // Hide popup when close button is clicked
        closeButton.addEventListener('click', hidePopup);
    });
</script>
