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
    </script>
</body>

</html>
