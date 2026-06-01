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

                <a href="#" class="historybox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="history" src="{{ asset('assets/icons/history-home.svg') }}" alt="">
                </a>

                <a href="#" class="notifbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="notif" src="{{ asset('assets/icons/bell-nav.svg') }}" alt="">
                </a>

                <a href="#" class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium flex items-center justify-center bg-teal-600 rounded-lg">
                    <span>GA</span>
                </a>

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

            <a href="#" class="historybox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="history" src="{{ asset('assets/icons/history-home.svg') }}" alt="">
            </a>

            <a href="#" class="notifbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="notif" src="{{ asset('assets/icons/bell-nav.svg') }}" alt="">
            </a>

            <a href="#" class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium flex items-center justify-center bg-teal-600 rounded-lg">
                <span>GA</span>
            </a>

        </div>

    </div>

</nav>
<script>
    // CART
    document.querySelectorAll('.cartbox').forEach((box) => {
        const icon = box.querySelector('.cart');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/cart-lw.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/cart-line.svg';
            }, 200);
        });
    });

    // HISTORY
    document.querySelectorAll('.historybox').forEach((box) => {
        const icon = box.querySelector('.history');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/history-home-lw.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/history-home.svg';
            }, 200);
        });
    });

    // NOTIFICATION
    document.querySelectorAll('.notifbox').forEach((box) => {
        const icon = box.querySelector('.notif');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/bell-nav-h.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/bell-nav.svg';
            }, 200);
        });
    });

    // ACCOUNT
    document.querySelectorAll('.accountbox').forEach((box) => {
        const icon = box.querySelector('.account');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/user-anonymous-lw.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/user-anonymous.svg';
            }, 200);
        });
    });
</script>