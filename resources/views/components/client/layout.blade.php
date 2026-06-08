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

    {{-- Pop up akses tolak --}}
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
            setTimeout(() => {
                const el = document.getElementById('toast-access');
                if (el) el.remove();
            }, 4000);
        </script>
    @endif

    {{-- Form logout customer --}}
    <form id="logoutFormCustomer" method="POST" action="/logout" class="hidden">@csrf</form>

    {{-- Modal Konfirmasi Logout --}}
    <div id="logoutModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/40">
        <div class="bg-white w-[360px] rounded-2xl p-8 shadow-xl">
            <h2 class="text-lg font-bold text-neutral-900 mb-2">Keluar dari akun?</h2>
            <p class="text-sm text-neutral-500 mb-6">Kamu yakin ingin logout dari Rekaps Store?</p>
            <div class="flex justify-end gap-3">
                <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                    class="px-5 py-2 rounded-xl bg-neutral-100 text-neutral-600 font-semibold">
                    Batal
                </button>
                <button onclick="document.getElementById('logoutFormCustomer').submit()"
                    class="px-5 py-2 rounded-xl bg-red-500 text-white font-semibold">
                    Keluar
                </button>
            </div>
        </div>
    </div>

    {{-- Toast sukses --}}
    @if (session('success'))
        <div id="toast-success"
            class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-3 bg-green-600 text-white px-6 py-4 rounded-xl shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button onclick="document.getElementById('toast-success').remove()"
                class="ml-2 text-white/80 hover:text-white text-lg">&times;</button>
        </div>
        <script>
            setTimeout(() => {
                const el = document.getElementById('toast-success');
                if (el) el.remove();
            }, 4000);
        </script>
    @endif

    <script>
        function confirmLogout() {
            document.getElementById('logoutModal').classList.remove('hidden');
        }
    </script>

</body>

</html>
