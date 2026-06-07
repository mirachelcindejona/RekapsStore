@props([
    'variant' => 'search',
    'title' => ''
])

<nav class="shadow-md px-2 sm:px-5 py-2 fixed bg-neutral-50 w-full box-border z-50">

    {{-- ========================= --}}
    {{-- MOBILE PAGE NAVBAR --}}
    {{-- ========================= --}}
    @if ($variant === 'page')

        <div class="flex sm:hidden items-center justify-between gap-3">

            {{-- LEFT --}}
            <div class="flex items-center gap-3">
                <a href="{{ url()->previous() }}" class="flex items-center justify-center">
                    <img src="{{ asset('assets/icons/back-big.svg') }}" alt="">
                </a>
                <h1 class="font-semibold leading-4 text-sm text-neutral-700"> {{ $title }} </h1>
            </div>

            {{-- navbar-menu --}}
            <div class="flex flex-1 justify-end items-center gap-1.5">

                <a href="#" class="searchbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="search" src="{{ asset('assets/icons/search-line.svg') }}" alt="">
                </a>

                <a href="/profile/orders" class="historybox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="history" src="{{ asset('assets/icons/history-home.svg') }}" alt="">
                </a>

                {{-- MOBILE notif --}}
                <div class="relative group">
                    <button class="notifbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer relative">
                        <img class="notif" src="{{ asset('assets/icons/bell-nav.svg') }}" alt="">
                        @php $unreadCount = auth()->check() ? \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count() : 0; @endphp
                        @if($unreadCount > 0)
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">
                            {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                        </span>
                        @endif
                    </button>
                    @include('components.client.notif-dropdown')
                </div>
                {{-- Avatar Mobile --}}
                @auth
                <div class="relative group">
                    <button class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium flex items-center justify-center bg-teal-600 rounded-lg cursor-pointer">
                        <span>{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}</span>
                    </button>
                    <div class="absolute right-0 top-12 w-44 bg-white border border-neutral-100 rounded-xl shadow-lg flex flex-col overflow-hidden
                                opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <a href="/profile" class="flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition">
                            <img src="{{ asset('assets/icons/menu-profile.svg') }}" class="w-4 h-4"> Akun Saya
                        </a>
                        <a href="/profile/notifications" class="flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition">
                            <img src="{{ asset('assets/icons/menu-bell.svg') }}" class="w-4 h-4"> Notifikasi
                        </a>
                        <a href="/profile/orders" class="flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition">
                            <img src="{{ asset('assets/icons/menu-history.svg') }}" class="w-4 h-4"> Riwayat Pesanan
                        </a>
                        <div class="border-t border-neutral-100">
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="group/logout flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-600 hover:bg-red-50 hover:text-red-500 transition w-full cursor-pointer">
                                    <img src="{{ asset('assets/icons/logout-half-circle-line.svg') }}" class="w-4 h-4 block group-hover/logout:hidden">
                                    <img src="{{ asset('assets/icons/logout-half-circle-line-h.svg') }}" class="w-4 h-4 hidden group-hover/logout:block">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm font-semibold text-primary-500 px-4 py-2 bg-primary-50 hover:bg-primary-100 rounded-xl transition">
                    Login
                </a>
                @endauth

            </div>

        </div>

    @endif

    {{-- ========================= --}}
    {{-- DESKTOP / DEFAULT NAVBAR --}}
    {{-- ========================= --}}
    <div class="{{ $variant === 'page' ? 'hidden sm:flex' : 'flex' }} gap-2">

        {{-- navbar-logo --}}
        <div class="hidden md:flex">
            <img src="{{ asset('assets/icons/logo-rekaps-text.svg') }}" width="180px" alt="">
        </div>

        {{-- navbar-searchbar --}}
        <div class="flex flex-2 md:flex-6 justify-start sm:justify-end items-center">
            <form action="#" method="GET" class="h-[40px] flex w-full bg-neutral-200 items-center px-2 py-2 rounded-lg gap-2">
                <button type="submit">
                    <img src="{{ asset('assets/icons/search-line.svg') }}" alt="">
                </button>
                <input type="text" placeholder="Cari di Rekaps Store" class="outline-none w-full text-[12px] bg-transparent">
            </form>
        </div>

        {{-- navbar-menu --}}
        <div class="flex flex-1 justify-end items-center gap-1.5">

            <a href="/cart" class="cartbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="cart" src="{{ asset('assets/icons/cart-line.svg') }}" alt="">
            </a>

            <a href="/profile/orders" class="historybox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="history" src="{{ asset('assets/icons/history-home.svg') }}" alt="">
            </a>

            {{-- MOBILE notif --}}
            <div class="relative group">
                <button class="notifbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer relative">
                    <img class="notif" src="{{ asset('assets/icons/bell-nav.svg') }}" alt="">
                    @php $unreadCount = auth()->check() ? \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count() : 0; @endphp
                    @if($unreadCount > 0)
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">
                        {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                    </span>
                    @endif
                </button>
                @include('components.client.notif-dropdown')
            </div>

            {{-- Avatar Desktop --}}
            <div class="relative group">
                <button class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium flex items-center justify-center bg-teal-600 rounded-lg cursor-pointer">
                    <span>{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}</span>
                </button>
                <div class="absolute right-0 top-12 w-44 bg-white border border-neutral-100 rounded-xl shadow-lg flex flex-col overflow-hidden
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <a href="/profile" class="flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition">
                        <img src="{{ asset('assets/icons/menu-profile.svg') }}" class="w-4 h-4"> Akun Saya
                    </a>
                    <a href="/profile/notifications" class="flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition">
                        <img src="{{ asset('assets/icons/menu-bell.svg') }}" class="w-4 h-4"> Notifikasi
                    </a>
                    <a href="/profile/orders" class="flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-700 hover:bg-primary-50 hover:text-primary-500 transition">
                        <img src="{{ asset('assets/icons/menu-history.svg') }}" class="w-4 h-4"> Riwayat Pesanan
                    </a>
                    <div class="border-t border-neutral-100">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="group/logout flex items-center gap-2 px-4 py-2.5 text-sm text-neutral-600 hover:bg-red-50 hover:text-red-500 transition w-full cursor-pointer">
                                <img src="{{ asset('assets/icons/logout-half-circle-line.svg') }}" class="w-4 h-4 block group-hover/logout:hidden">
                                <img src="{{ asset('assets/icons/logout-half-circle-line-h.svg') }}" class="w-4 h-4 hidden group-hover/logout:block">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</nav>

<script>
    // CART
    document.querySelectorAll('.cartbox').forEach((box) => {
        const icon = box.querySelector('.cart');
        box.addEventListener('mouseenter', () => { icon.src = '/assets/icons/cart-lw.svg'; });
        box.addEventListener('mouseleave', () => { setTimeout(() => { icon.src = '/assets/icons/cart-line.svg'; }, 200); });
    });

    // HISTORY
    document.querySelectorAll('.historybox').forEach((box) => {
        const icon = box.querySelector('.history');
        box.addEventListener('mouseenter', () => { icon.src = '/assets/icons/history-home-lw.svg'; });
        box.addEventListener('mouseleave', () => { setTimeout(() => { icon.src = '/assets/icons/history-home.svg'; }, 200); });
    });

    // NOTIFICATION
    document.querySelectorAll('.notifbox').forEach((box) => {
        const icon = box.querySelector('.notif');
        box.addEventListener('mouseenter', () => { icon.src = '/assets/icons/bell-nav-h.svg'; });
        box.addEventListener('mouseleave', () => { setTimeout(() => { icon.src = '/assets/icons/bell-nav.svg'; }, 200); });
    });

    function markAllRead() {
    fetch('/notifications/read-all', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    }).then(() => window.location.reload());
}
</script>