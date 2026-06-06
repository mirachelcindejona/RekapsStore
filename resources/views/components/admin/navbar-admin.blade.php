<!-- NAVBAR -->
<header
    class="h-[68px] bg-neutral-50 border-b border-neutral-200 flex items-center px-[14px] min-[560px]:px-[28px] gap-[14px] sticky top-0 z-50 shadow-[0_2px_16px_rgba(0,0,0,0.07)] shrink-0">

    <button
        class="hidden max-[900px]:flex w-[40px] h-[40px] rounded-lg bg-neutral-100 items-center justify-center cursor-pointer text-neutral-600 outline-none border-none"
        onclick="toggleSidebar()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <div class="flex-1 flex flex-col gap-[1px]">
        <div class="text-[18px] font-bold text-neutral-950 leading-none">@yield('page_title', 'Dashboard')</div>
        <div class="text-[12px] text-neutral-400 font-medium">
            Rekaps Store / <span class="text-primary-500">@yield('page_breadcrumb', 'Overview')</span>
        </div>
    </div>

    <div class="flex items-center gap-[8px]">
        <div
            class="hidden min-[560px]:flex items-center gap-[8px] bg-neutral-200 rounded-lg px-[14px] py-[8px] min-w-[268px]">
            <img src="{{ asset('assets/icons/search-line.svg') }}" alt="Search" class="text-neutral-400 shrink-0" />
            <input type="text" placeholder="Cari..."
                class="bg-transparent border-none outline-none text-[12px] font-medium text-neutral-950 w-full placeholder:text-neutral-400" />
        </div>

        <button
            class="w-[40px] h-[40px] rounded-lg flex items-center justify-center bg-neutral-200 text-neutral-500 cursor-pointer transition-colors duration-300 relative hover:bg-primary-500 hover:text-neutral-50 border-none outline-none">
            <img src="{{ asset('assets/icons/bell-line.svg') }}" alt="Notification" />
        </button>

        <a
            href="{{ route('admin.profile') }}"
            class="
            w-[48px]
            h-[48px]
            rounded-xl
            bg-primary-500
            text-white
            flex
            items-center
            justify-center
            font-bold">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

        </a>
    </div>
</header>
<!-- END .navbar -->
