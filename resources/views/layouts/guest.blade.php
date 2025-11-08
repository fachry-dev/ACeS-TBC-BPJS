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

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Poppins', 'sans-serif'] },
                    colors: {
                        'brand-green': {
                            light: '#E0F2F1',
                            DEFAULT: '#4CAF50', // Warna hijau utama Anda
                            dark: '#388E3C',
                        },
                        'brand-gray': '#1F2937', // Warna card (gelap)
                        'brand-dark': '#111827', // Warna background (gelap)
                        'brand-teal-light': '#D6EFEF',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-brand-dark text-gray-100">

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>