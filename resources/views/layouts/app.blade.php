<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'ACeS-TBC')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Poppins', 'sans-serif'] },
                    colors: {
                        'brand-green': {
                            light: '#E0F2F1',
                            DEFAULT: '#4CAF50',
                            dark: '#388E3C',
                        },
                        'brand-gray': '#F9F9F9',
                        'brand-teal-light': '#D6EFEF',
                    }
                }
            }
        }
    </script>

    <style>
        .swiper-scrollbar { display: none; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="font-sans bg-white">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="scroll-to-top" 
            class="hidden fixed bottom-6 right-6 z-50
                   bg-brand-green text-white p-3 rounded-full shadow-lg
                   hover:bg-brand-green-dark transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </button>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({ duration: 800, once: true });

        // Skrip Menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const line1 = document.getElementById('line1');
        const line2 = document.getElementById('line2');
        const line3 = document.getElementById('line3');
        if (mobileMenuButton && mobileMenu && line1 && line2 && line3) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                line1.classList.toggle('top-1');
                line1.classList.toggle('top-3');
                line1.classList.toggle('rotate-45');
                line2.classList.toggle('opacity-0');
                line3.classList.toggle('top-5');
                line3.classList.toggle('top-3');
                line3.classList.toggle('-rotate-45');
            });
        }

        // Skrip Navbar Blur
        const navbar = document.getElementById('navbar');
        if (navbar) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) {
                    navbar.classList.add('bg-white/80', 'backdrop-blur-lg', 'shadow-xl');
                    navbar.classList.remove('bg-white', 'shadow-lg');
                } else {
                    navbar.classList.remove('bg-white/80', 'backdrop-blur-lg', 'shadow-xl');
                    navbar.classList.add('bg-white', 'shadow-lg');
                }
            });
        }

        // Skrip Scroll to Top
        const scrollToTopButton = document.getElementById('scroll-to-top');
        if (scrollToTopButton) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 200) {
                    scrollToTopButton.classList.remove('hidden');
                } else {
                    scrollToTopButton.classList.add('hidden');
                }
            });
            scrollToTopButton.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Skrip Swiper
        const swiperResponsiveOptions = {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                768: { slidesPerView: 3, spaceBetween: 30 },
                1024: { slidesPerView: 4, spaceBetween: 30 },
            }
        };
        const dokterSlider = new Swiper('#dokter-slider', swiperResponsiveOptions);
        const layananUmumSlider = new Swiper('#layanan-umum-slider', swiperResponsiveOptions);
        const layananSpesialisSlider = new Swiper('#layanan-spesialis-slider', swiperResponsiveOptions);

        // Skrip Tabs
        const tabUmumBtn = document.getElementById('tab-umum-btn');
        const tabSpesialisBtn = document.getElementById('tab-spesialis-btn');
        const tabUmumContent = document.getElementById('tab-umum-content');
        const tabSpesialisContent = document.getElementById('tab-spesialis-content');
        if (tabUmumBtn && tabSpesialisBtn && tabUmumContent && tabSpesialisContent) {
            tabUmumBtn.addEventListener('click', () => {
                tabUmumContent.classList.remove('hidden');
                tabSpesialisContent.classList.add('hidden');
                tabUmumBtn.classList.add('bg-brand-green', 'text-white');
                tabUmumBtn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                tabSpesialisBtn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                tabSpesialisBtn.classList.remove('bg-brand-green', 'text-white');
            });
            tabSpesialisBtn.addEventListener('click', () => {
                tabSpesialisContent.classList.remove('hidden');
                tabUmumContent.classList.add('hidden');
                tabSpesialisBtn.classList.add('bg-brand-green', 'text-white');
                tabSpesialisBtn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                tabUmumBtn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                tabUmumBtn.classList.remove('bg-brand-green', 'text-white');
            });
        }
    </script>
</body>
</html>