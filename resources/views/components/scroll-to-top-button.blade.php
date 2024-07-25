<button id="scrollToTopBtn"
    class="fixed bottom-5 right-5 bg-gray-800 text-white p-2 rounded-full shadow-lg opacity-0 transition-opacity duration-300 ease-in-out hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
</button>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                scrollToTopBtn.classList.remove("hidden");
                scrollToTopBtn.classList.add("block");
            } else {
                scrollToTopBtn.classList.remove("block");
                scrollToTopBtn.classList.add("hidden");
            }
        });

        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });
</script>
