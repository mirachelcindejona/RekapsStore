<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard') — Rekaps Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carattere&family=Montserrat:wght@100..900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="font-['Montserrat',sans-serif] bg-neutral-50 text-neutral-950 min-h-dvh overflow-x-hidden">
    <div class="flex min-h-dvh">
        <x-admin.sidebar-admin></x-admin.sidebar-admin>

        <div
            class="flex-1 flex flex-col bg-primary-50 min-h-dvh min-w-0 min-[900px]:ml-[270px] w-full max-[900px]:max-w-[100vw]">

            <x-admin.navbar-admin></x-admin.navbar-admin>

            <main class="flex-1 p-[14px] min-[560px]:p-[30px] min-w-0 max-w-full">
                @yield('content')
            </main>
        </div>
    </div>
    <div id="sidebarOverlay" onclick="closeSidebar()" class="hidden fixed inset-0 bg-black/45 z-[99]"></div>

    @yield('footer')
    {{-- Toast akses ditolak --}}
    @if (session('error_access'))
        <div id="toast-access"
            class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-3 bg-red-600 text-white px-6 py-4 rounded-xl shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
            </svg>
            <span class="text-sm font-medium">{{ session('error_access') }}</span>
            <button onclick="document.getElementById('toast-access').remove()"
                class="ml-2 text-white/80 hover:text-white text-lg leading-none">&times;</button>
        </div>

        <script>
            /* ---- Sidebar Toggle ---- */
            function toggleSidebar() {
                document.getElementById("sidebar").classList.toggle("open");
                document.getElementById("sidebarOverlay").classList.toggle("show");
            }

            function closeSidebar() {
                document.getElementById("sidebar").classList.remove("open");
                document.getElementById("sidebarOverlay").classList.remove("show");
            }

            function toggleSidebar() {
                document.getElementById('sidebar').classList.toggle('-translate-x-full');
                document.getElementById('sidebarOverlay').classList.toggle('hidden');
            }

            function closeSidebar() {
                document.getElementById('sidebar').classList.add('-translate-x-full');
                document.getElementById('sidebarOverlay').classList.add('hidden');
            }

            setTimeout(() => {
                const el = document.getElementById('toast-access');
                if (el) el.remove();
            }, 4000);
        </script>
    @endif
</body>

</html>
