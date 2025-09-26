<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Membantu orang tua dalam memantau tumbuh kembang anak sejak dini dengan diagnosis berbasis Fuzzy Tsukamoto.">
    <meta name="generator" content="Tele Stunting">
    <title>@yield('title', 'Tele Stunting - Deteksi Dini Stunting pada Balita')</title>
    <favicon rel="icon" type="image/png" href="{{ asset('favicon.ico') }}"/>

    {{--    Google Fonts--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    {{--    Tailwind CSS--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
@include('partials.navigation')

<main>
    @yield('content')
</main>

@include('partials.footer')

<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuButton = document.getElementById('mobile-menu-button');
        const menuIcon = menuButton.querySelector('[data-lucide="menu"]');
        const closeIcon = menuButton.querySelector('[data-lucide="x"]');

        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            menuIcon.style.display = 'none';
            closeIcon.style.display = 'block';
        } else {
            mobileMenu.classList.add('hidden');
            menuIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    }
</script>
</body>
</html>
