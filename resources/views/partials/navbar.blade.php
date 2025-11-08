<header class="sticky top-0 z-50 w-full p-4">
    <nav id="navbar" class="container mx-auto flex items-center justify-between px-6 py-3
                         bg-white rounded-full shadow-lg
                         transition-all duration-300 ease-in-out">
        
        <a href="#" class="flex items-center space-x-2">
            <img src="{{ asset('assets/logo_rsrelawan.png') }}" alt="Logo ACeS-TBC" class="h-10">
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <a href="#" class="text-gray-600 font-medium hover:text-brand-green">Beranda</a>
            <a href="#" class="text-gray-600 font-medium hover:text-brand-green">Cari Dokter</a>
            <a href="#" class="text-gray-600 font-medium hover:text-brand-green">Layanan Kami</a>
            <a href="#" class="text-gray-600 font-medium hover:text-brand-green">Informasi</a>
        </div>

        <a href="{{ route('login') }}" class="hidden md:block bg-brand-green text-white px-6 py-2 rounded-full font-medium hover:bg-brand-green-dark transition duration-300">
            Login
        </a>

        <button id="mobile-menu-button" class="md:hidden relative h-8 w-8 flex items-center justify-center">
            <div class="relative w-6 h-6">
                <span id="line1" class="block w-6 h-0.5 bg-gray-700 rounded-full absolute top-1 transition-all duration-300 ease-in-out"></span>
                <span id="line2" class="block w-6 h-0.5 bg-gray-700 rounded-full absolute top-3 transition-all duration-300 ease-in-out"></span>
                <span id="line3" class="block w-6 h-0.5 bg-gray-700 rounded-full absolute top-5 transition-all duration-300 ease-in-out"></span>
            </div>
        </button>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden container mx-auto bg-white/90 backdrop-blur-lg rounded-2xl shadow-xl mt-2 p-4 space-y-2">
        <a href="#" class="block text-gray-600 hover:text-brand-green">Beranda</a>
        <a href="#" class="block text-gray-600 hover:text-brand-green">Cari Dokter</a>
        <a href="#" class="block text-gray-600 hover:text-brand-green">Layanan Kami</a>
        <a href="#" class="block text-gray-600 hover:text-brand-green">Informasi</a>
        <a href="#" class="block bg-brand-green text-white px-5 py-2 rounded-full font-medium text-center">
            Login
        </a>
    </div>
</header>