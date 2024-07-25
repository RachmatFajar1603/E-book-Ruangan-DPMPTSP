<div class="flex justify-center w-full">
    <div class="carousel w-full md:w-5/6 h-[300px] sm:h-[400px] md:h-[500px] overflow-hidden mt-0 md:mt-2 rounded-xl shadow-xl"
        id="myCarousel">
        <div id="slide1" class="carousel-item relative w-full">
            <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Welcome to
                    Our Meeting Rooms</h2>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img src="https://media.istockphoto.com/id/1319189303/photo/shot-of-two-men-working-on-their-computers-in-a-modern-office.webp?b=1&s=170667a&w=0&k=20&c=8mBRp5-OEw5WafxiI4wMigAGyYYr00rcsW-qV4Kwhsw="
                class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Welcome
                    to Our Meeting Rooms</h2>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img src="https://media.istockphoto.com/id/1456301991/photo/ux-ui-design.webp?b=1&s=170667a&w=0&k=20&c=JtE6euFNXP-YLVxGD3NTs8DfQR_vMm5Gi3N-pZWXltY="
                class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Welcome
                    to Our Meeting Rooms</h2>
            </div>
        </div>
        <div id="slide4" class="carousel-item relative w-full">
            <img src="https://media.istockphoto.com/id/1759628359/photo/the-designer-team-is-designing-the-uxui-system-to-make-the-uxui-system-work-well-on-new.webp?b=1&s=170667a&w=0&k=20&c=fzgJiaBiJa_rV_22fEnMop2e-X4sQYlcyc09PCH08cQ="
                class="w-full h-full object-cover animate-fade-in" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white text-center animate-slide-up">Welcome
                    to Our Meeting Rooms</h2>
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
