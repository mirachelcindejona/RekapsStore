<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('assets/icons/logo-rekaps.svg') }}">
    <title>Rekaps Store</title>
</head>
<body class="bg-primary-50 font-sans min-h-screen flex flex-col gap-10">
    @yield('navbar')
    <main class="pt-16 sm:pt-16 max-w-7xl mx-auto px-2 flex-1 w-full flex flex-col gap-1 sm:gap-1 mb-4">
        @yield('content')
    </main>
    @yield('footer')

    {{-- Pop up akses ditolak --}}
    @if(session('error_access'))
    <div id="toast-access" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-3 bg-red-600 text-white px-6 py-4 rounded-xl shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
        </svg>
        <span class="text-sm font-medium">{{ session('error_access') }}</span>
        <button onclick="document.getElementById('toast-access').remove()" class="ml-2 text-white/80 hover:text-white text-lg leading-none">&times;</button>
    </div>
    <script>
        setTimeout(() => {
            const el = document.getElementById('toast-access');
            if (el) el.remove();
        }, 4000);
    </script>
    @endif

</body>
</html>