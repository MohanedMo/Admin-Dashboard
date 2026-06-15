<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Real Estate Admin Dashboard — Manage properties, clients, and sales with ease.">
    <title>@yield('title', 'Dashboard') — Real Estate Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-bg-body text-text-primary min-h-screen overflow-x-hidden antialiased">

    <div class="fixed inset-0 bg-black/55 backdrop-blur-sm z-[1035] hidden lg:hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    @include('partials.sidebar')

    <div class="flex flex-col min-h-screen transition-all duration-300 lg:ml-[270px]">
        @include('partials.navbar')

        <main class="flex-1 p-4 md:p-7">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar) {
                sidebar.classList.toggle('-translate-x-full');
            }
            if (overlay) {
                overlay.classList.toggle('hidden');
            }
        }
    </script>

    @yield('scripts')
</body>

</html>
