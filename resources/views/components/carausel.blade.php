<div class="flex justify-center w-full">
    <div class="carousel w-full md:w-5/6 h-[300px] sm:h-[400px] md:h-[500px] overflow-hidden mt-0 md:mt-2 rounded-xl shadow-xl"
        id="myCarousel">
        <div id="slide1" class="carousel-item relative w-full">
            <img src="/images/ruangan-1.jpeg" class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Selamat
                    Datang Di <br> Peminjaman Ruang Pada DPMPTSP Aceh</h2>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img src="/images/ruangan-2.jpeg" class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Temukan
                    ruang yang sempurna untuk setiap pertemuan Anda</h2>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img src="/images/ruangan-3.jpeg" class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Fasilitas
                    lengkap untuk mendukung setiap acara Anda</h2>
            </div>
        </div>
        <div id="slide4" class="carousel-item relative w-full">
            <img src="/images/ruangan-4.jpeg" class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Nikmati
                    kenyamanan dan profesionalisme dalam setiap pertemuan</h2>
            </div>
        </div>
        <!-- Repeat for slide2, slide3, and slide4 -->
    </div>
</div>
<div class="flex justify-center w-full py-2 gap-2">
    <a href="#slide1" class="btn btn-xs">1</a>
    <a href="#slide2" class="btn btn-xs">2</a>
    <a href="#slide3" class="btn btn-xs">3</a>
    <a href="#slide4" class="btn btn-xs">4</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('myCarousel');
        const slides = carousel.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;
        let currentSlide = 0;

        function showSlide(n) {
            slides[currentSlide].style.display = 'none';
            currentSlide = (n + totalSlides) % totalSlides;
            slides[currentSlide].style.display = 'block';
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Auto-advance slides every 5 seconds
        setInterval(nextSlide, 5000);

        // Prevent default behavior for navigation buttons
        document.querySelectorAll('.btn-xs').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const slideNumber = parseInt(this.textContent) - 1;
                showSlide(slideNumber);
            });
        });

        // Initially show the first slide
        showSlide(0);
    });
</script>
