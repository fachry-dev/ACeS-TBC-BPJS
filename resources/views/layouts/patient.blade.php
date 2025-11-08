<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ACeS-TBC') - Pasien</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Ambil config Tailwind dari 'app.blade.php' Anda --}}
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
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-brand-gray">

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar Navigasi Dashboard -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-brand-green">AceS TBC</h1>
                <span class="text-sm text-gray-500">Panel Pasien</span>
            </div>
            <nav class="mt-6">
                {{-- Helper 'request()->routeIs' akan memberi style aktif pada link --}}
                <a href="{{ route('patient.dashboard') }}" 
                   class="flex items-center px-6 py-3 text-gray-700
                          {{ request()->routeIs('patient.dashboard') ? 'bg-brand-green-light border-l-4 border-brand-green text-brand-green-dark font-semibold' : 'hover:bg-gray-100' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="{{ route('profile.index') }}" 
                   class="flex items-center px-6 py-3 text-gray-700
                          {{ request()->routeIs('profile.index') ? 'bg-brand-green-light border-l-4 border-brand-green text-brand-green-dark font-semibold' : 'hover:bg-gray-100' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="ml-3">Profil Saya</span>
                </a>
            </nav>
            
            <!-- Tombol Logout -->
            <div class="absolute bottom-0 w-64 p-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center justify-center px-4 py-2 text-gray-700 hover:bg-red-100 hover:text-red-600 rounded-lg">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="ml-2">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-brand-gray">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>