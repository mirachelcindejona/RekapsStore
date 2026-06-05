<!-- ====== SIDEBAR ====== -->
<aside id="sidebar"
    class="fixed inset-y-0 left-0 w-[270px] bg-neutral-950 flex flex-col z-[100] overflow-hidden isolate -translate-x-full min-[900px]:translate-x-0 transition-transform duration-[250ms] ease-[cubic-bezier(0.4,0,0.2,1)]">

    <div
        class="absolute -top-[60px] -right-[60px] w-[180px] h-[180px] bg-primary-500 rounded-full opacity-[0.12] pointer-events-none -z-10">
    </div>

    {{-- LOGO --}}
    <div class="px-[22px] pt-[24px] pb-[18px] border-b border-white/5 flex items-center justify-center shrink-0">
        <div class="rounded-xl flex items-center justify-center shrink-0 relative overflow-hidden mr-2">
            <img src="{{ asset('assets/icons/logo-rekaps.svg') }}" alt="Logo" class="relative z-10" />
        </div>

        <div class="flex flex-col">
            <span class="font-['Carattere',cursive] text-[22px] text-neutral-50 leading-none">
                Rekaps Store
            </span>

            <span class="text-[9px] font-extrabold tracking-[2px] text-secondary-500 uppercase">
                Admin Panel
            </span>
        </div>
    </div>

    {{-- USER INFO --}}
    <div
        class="mx-[18px] my-[14px] bg-primary-500/18 border border-primary-500/28 rounded-xl p-[10px_12px] flex items-center gap-[10px] shrink-0">

        <div
            class="w-[34px] h-[34px] bg-gradient-to-br from-primary-500 to-primary-300 rounded-full flex items-center justify-center text-[13px] font-bold text-neutral-50 shrink-0">

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </div>

        <div class="flex-1 min-w-0">

            <div class="text-[11px] font-bold text-neutral-50 whitespace-nowrap overflow-hidden text-ellipsis">

                {{ auth()->user()->name }}

            </div>

            <span
                class="inline-flex items-center bg-secondary-500 text-neutral-950 text-[8px] font-extrabold tracking-[1px] uppercase px-[7px] py-[2px] rounded-full mt-[3px]">

                {{ auth()->user()->getRoleNames()->first() }}

            </span>

        </div>
    </div>

    {{-- MENU --}}
    <nav
        class="flex flex-col flex-1 overflow-y-auto px-[14px] gap-[4px]
        [&::-webkit-scrollbar]:w-[5px]
        [&::-webkit-scrollbar-track]:bg-transparent
        [&::-webkit-scrollbar-thumb]:bg-neutral-300
        [&::-webkit-scrollbar-thumb]:rounded-full
        hover:[&::-webkit-scrollbar-thumb]:bg-primary-500">

        {{-- dashboard --}}
        <div class="text-[9px] font-extrabold tracking-[2px] uppercase text-neutral-500 pt-[10px] px-[8px] pb-[5px]">

            Utama

        </div>

        @can('dashboard')
            <a href="{{ url('/admin') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px]
            transition-colors duration-[250ms] mb-[2px] outline-none
            {{ request()->is('admin') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">

                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.66665 10.8333V13.3333M9.99998 8.33332V13.3333M13.3333 12.5V13.3333M16.6666 15.8333V8.74999C16.6666 8.62062 16.6365 8.49302 16.5787 8.37731C16.5208 8.2616 16.4368 8.16095 16.3333 8.08332L10.5 3.70832C10.3557 3.60014 10.1803 3.54166 9.99998 3.54166C9.81967 3.54166 9.64423 3.60014 9.49998 3.70832L3.66665 8.08332C3.56315 8.16095 3.47915 8.2616 3.42129 8.37731C3.36343 8.49302 3.33331 8.62062 3.33331 8.74999V15.8333C3.33331 16.0543 3.42111 16.2663 3.57739 16.4226C3.73367 16.5789 3.94563 16.6667 4.16665 16.6667H15.8333C16.0543 16.6667 16.2663 16.5789 16.4226 16.4226C16.5788 16.2663 16.6666 16.0543 16.6666 15.8333Z"
                            stroke="{{ request()->is('admin') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                Dashboard
            </a>
        @endcan

        {{-- produk --}}
        @can('produk')
            <a href="{{ url('/admin/product') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px]
            transition-colors duration-[250ms] mb-[2px] outline-none
            {{ request()->is('admin/product*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">

                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.3333 4.58333L16.6666 6.66667V13.3333L9.99998 17.5L3.33331 13.3333V6.66667L9.99998 2.5L13.3333 4.58333ZM3.33331 6.66667L6.66665 8.75M13.3333 4.58333L6.66665 8.75M9.99998 17.5V10.8333M6.66665 8.75L9.99998 10.8333M9.99998 10.8333L16.6666 6.66667"
                            stroke="{{ request()->is('admin/product*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                Produk
            </a>

            <a href="{{ url('/admin/categories') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/categories*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.16669 4.16667H17.5M9.16669 10H17.5M9.16669 15.8333H17.5"
                            stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M4.16667 5.83333C5.08714 5.83333 5.83333 5.08714 5.83333 4.16667C5.83333 3.24619 5.08714 2.5 4.16667 2.5C3.24619 2.5 2.5 3.24619 2.5 4.16667C2.5 5.08714 3.24619 5.83333 4.16667 5.83333Z"
                            stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M4.16667 5.83333C5.08714 5.83333 5.83333 5.08714 5.83333 4.16667C5.83333 3.24619 5.08714 2.5 4.16667 2.5C3.24619 2.5 2.5 3.24619 2.5 4.16667C2.5 5.08714 3.24619 5.83333 4.16667 5.83333Z"
                            stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M4.16667 11.6667C5.08714 11.6667 5.83333 10.9205 5.83333 9.99999C5.83333 9.07952 5.08714 8.33333 4.16667 8.33333C3.24619 8.33333 2.5 9.07952 2.5 9.99999C2.5 10.9205 3.24619 11.6667 4.16667 11.6667Z"
                            stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M4.16667 17.5C5.08714 17.5 5.83333 16.7538 5.83333 15.8333C5.83333 14.9129 5.08714 14.1667 4.16667 14.1667C3.24619 14.1667 2.5 14.9129 2.5 15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5Z"
                            stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                Kategori Produk
            </a>
        @endcan

        {{-- orders --}}

        @can('pesanan')
            <a href="{{ url('/admin/orders') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px]
            transition-colors duration-[250ms] mb-[2px] outline-none
            {{ request()->is('admin/orders*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">

                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.66665 5.83333H13.3333M6.66665 9.16667H13.3333M6.66665 12.5H9.99998M16.6666 17.5V4.16667C16.6666 3.72464 16.4911 3.30072 16.1785 2.98816C15.8659 2.67559 15.442 2.5 15 2.5H4.99998C4.55795 2.5 4.13403 2.67559 3.82147 2.98816C3.50891 3.30072 3.33331 3.72464 3.33331 4.16667V17.5L5.41665 15.8333L7.91665 17.5L9.99998 15.8333L12.0833 17.5L14.5833 15.8333L16.6666 17.5Z"
                            stroke="{{ request()->is('admin/orders*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                Pesanan
            </a>
        @endcan

        {{-- keuangan --}}

        @can('keuangan')
            <div class="text-[9px] font-extrabold tracking-[2px] uppercase text-neutral-500 pt-[10px] px-[8px] pb-[5px]">

                Keuangan

            </div>

            <a href="{{ url('/admin/finance') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px]
            transition-colors duration-[250ms] mb-[2px] outline-none
            {{ request()->is('admin/finance*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">

                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 18.3333C14.6025 18.3333 18.3334 14.6025 18.3334 10C18.3334 5.3975 14.6025 1.66666 10 1.66666C5.39752 1.66666 1.66669 5.3975 1.66669 10C1.66669 14.6025 5.39752 18.3333 10 18.3333Z"
                            stroke="{{ request()->is('admin/finance*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M12.5 6.66667H10M10 6.66667H9.16667C8.72464 6.66667 8.30072 6.84226 7.98816 7.15482C7.6756 7.46738 7.5 7.89131 7.5 8.33333C7.5 8.77536 7.6756 9.19928 7.98816 9.51184C8.30072 9.8244 8.72464 10 9.16667 10H10.8333C11.2754 10 11.6993 10.1756 12.0118 10.4882C12.3244 10.8007 12.5 11.2246 12.5 11.6667C12.5 12.1087 12.3244 12.5326 12.0118 12.8452C11.6993 13.1577 11.2754 13.3333 10.8333 13.3333H10M10 6.66667V5M7.5 13.3333H10M10 13.3333V15"
                            stroke="{{ request()->is('admin/finance*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                Keuangan
            </a>
        @endcan

        {{-- promo --}}
        @canany(['diskon'])
            <a href="{{ url('/admin/promo') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px]
            transition-colors duration-[250ms] mb-[2px] outline-none
            {{ request()->is('admin/promo*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">

                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 9.31V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H9.31C9.75199 2.50009 10.1758 2.67575 10.4883 2.98833L17.155 9.655C17.4675 9.96755 17.643 10.3914 17.643 10.8333C17.643 11.2753 17.4675 11.6991 17.155 12.0117L12.0117 17.155C11.6991 17.4675 11.2753 17.643 10.8333 17.643C10.3914 17.643 9.96755 17.4675 9.655 17.155L2.98833 10.4883C2.67575 10.1758 2.50009 9.75199 2.5 9.31Z"
                            stroke="{{ request()->is('admin/promo*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>

                Diskon & Voucher
            </a>
        @endcanany

        {{-- manage users --}}

        @can('pengguna')
            <div class="text-[9px] font-extrabold tracking-[2px] uppercase text-neutral-500 pt-[10px] px-[8px] pb-[5px]">

                Lainnya

            </div>

            <a href="{{ url('/admin/users') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px]
            transition-colors duration-[250ms] mb-[2px] outline-none
            {{ request()->is('admin/users*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">

                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.50002 10.8333C9.34097 10.8333 10.8334 9.34095 10.8334 7.5C10.8334 5.65905 9.34097 4.16667 7.50002 4.16667C5.65907 4.16667 4.16669 5.65905 4.16669 7.5C4.16669 9.34095 5.65907 10.8333 7.50002 10.8333Z"
                        stroke="{{ request()->is('admin/users*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M13.3334 15.8333C13.3334 13.0717 10.7217 10.8333 7.50002 10.8333C4.27835 10.8333 1.66669 13.0717 1.66669 15.8333M12.5 10.8333C13.057 10.8333 13.6051 10.6937 14.0942 10.4273C14.5834 10.1609 14.998 9.77612 15.3001 9.3082C15.6023 8.84028 15.7823 8.30411 15.8239 7.74868C15.8654 7.19324 15.7671 6.63625 15.538 6.12858C15.3088 5.62092 14.9561 5.17877 14.5121 4.84254C14.068 4.5063 13.5468 4.2867 12.996 4.2038C12.4452 4.12089 11.8824 4.17733 11.3591 4.36795C10.8357 4.55856 10.3685 4.87729 10 5.295"
                        stroke="{{ request()->is('admin/users*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M18.3333 15.8333C18.3333 13.0717 15.7217 10.8333 12.5 10.8333C11.8275 10.8333 10.7475 10.5892 10 9.80417"
                        stroke="{{ request()->is('admin/users*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                </span>

                Pengguna
            </a>
        @endcan

        @can('laporan')
            <a href="{{ url('/admin/reports') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/reports*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.66665 13.3333V9.16667M9.99998 13.3333V6.66667M13.3333 13.3333V11.6667M15 3.33333H4.99998C4.55795 3.33333 4.13403 3.50893 3.82147 3.82149C3.50891 4.13405 3.33331 4.55797 3.33331 5V15C3.33331 15.442 3.50891 15.866 3.82147 16.1785C4.13403 16.4911 4.55795 16.6667 4.99998 16.6667H15C15.442 16.6667 15.8659 16.4911 16.1785 16.1785C16.4911 15.866 16.6666 15.442 16.6666 15V5C16.6666 4.55797 16.4911 4.13405 16.1785 3.82149C15.8659 3.50893 15.442 3.33333 15 3.33333Z"
                            stroke="{{ request()->is('admin/reports*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                Laporan
            </a>
        @endcan

        @can('kasir')
            <a href="{{ url('/admin/cashier') }}"
                class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/reports*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
                <span class="w-[18px] shrink-0 flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.5 2.5H4.16667L4.58333 5M4.58333 5L5.83333 12.5H15L17.5 5H4.58333Z" stroke="#D7C2F9"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M6.66665 17.5C7.12688 17.5 7.49998 17.1269 7.49998 16.6667C7.49998 16.2064 7.12688 15.8333 6.66665 15.8333C6.20641 15.8333 5.83331 16.2064 5.83331 16.6667C5.83331 17.1269 6.20641 17.5 6.66665 17.5Z"
                            stroke="#D7C2F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M14.1666 17.5C14.6269 17.5 15 17.1269 15 16.6667C15 16.2064 14.6269 15.8333 14.1666 15.8333C13.7064 15.8333 13.3333 16.2064 13.3333 16.6667C13.3333 17.1269 13.7064 17.5 14.1666 17.5Z"
                            stroke="#D7C2F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </span>
                Mode Kasir
            </a>
        @endcan
    </nav>

    {{-- LOGOUT --}}
    <div class="p-[14px] border-t border-white/5 shrink-0">

        <form action="{{ route('admin.logout') }}" method="POST">

            @csrf

            <button type="submit"
                class="flex items-center gap-[10px] w-full px-[12px] py-[9px]
                rounded-lg text-neutral-400 text-[12px] font-semibold
                transition-colors duration-[250ms]
                hover:bg-[#c10007]/15 hover:text-red-400
                border-none outline-none cursor-pointer">

                <img src="{{ asset('assets/icons/logout-half-circle-line.svg') }}" alt="Logout" />

                Keluar
            </button>

        </form>

    </div>

</aside>

{{-- <!-- ====== SIDEBAR ====== -->
<aside id="sidebar"
    class="fixed inset-y-0 left-0 w-[270px] bg-neutral-950 flex flex-col z-[100] overflow-hidden isolate -translate-x-full min-[900px]:translate-x-0 transition-transform duration-[250ms] ease-[cubic-bezier(0.4,0,0.2,1)]">

    <div
        class="absolute -top-[60px] -right-[60px] w-[180px] h-[180px] bg-primary-500 rounded-full opacity-[0.12] pointer-events-none -z-10">
    </div>

    <div class="px-[22px] pt-[24px] pb-[18px] border-b border-white/5 flex items-center justify-center shrink-0">
        <div class="rounded-xl flex items-center justify-center shrink-0 relative overflow-hidden mr-2">
            <img src="{{ asset('assets/icons/logo-rekaps.svg') }}" alt="Logo" class="relative z-10" />
        </div>
        <div class="flex flex-col">
            <span class="font-['Carattere',cursive] text-[22px] text-neutral-50 leading-none">Rekaps Store</span>
            <span class="text-[9px] font-extrabold tracking-[2px] text-secondary-500 uppercase">Admin Panel</span>
        </div>
    </div>

    <div
        class="mx-[18px] my-[14px] bg-primary-500/18 border border-primary-500/28 rounded-xl p-[10px_12px] flex items-center gap-[10px] shrink-0">
        <div
            class="w-[34px] h-[34px] bg-gradient-to-br from-primary-500 to-primary-300 rounded-full flex items-center justify-center text-[13px] font-bold text-neutral-50 shrink-0">
            AR</div>
        <div class="flex-1 min-w-0">
            <div class="text-[11px] font-bold text-neutral-50 whitespace-nowrap overflow-hidden text-ellipsis">Admin
                Rekaps</div>
            <span
                class="inline-flex items-center bg-secondary-500 text-neutral-950 text-[8px] font-extrabold tracking-[1px] uppercase px-[7px] py-[2px] rounded-full mt-[3px]">KETUA</span>
        </div>
    </div>

    <nav
        class="flex flex-col flex-1 overflow-y-auto px-[14px] gap-[4px] [&::-webkit-scrollbar]:w-[5px] [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-primary-500">

        <div class="text-[9px] font-extrabold tracking-[2px] uppercase text-neutral-500 pt-[10px] px-[8px] pb-[5px]">
            Utama</div>

        <a href="{{ url('/admin') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.66665 10.8333V13.3333M9.99998 8.33332V13.3333M13.3333 12.5V13.3333M16.6666 15.8333V8.74999C16.6666 8.62062 16.6365 8.49302 16.5787 8.37731C16.5208 8.2616 16.4368 8.16095 16.3333 8.08332L10.5 3.70832C10.3557 3.60014 10.1803 3.54166 9.99998 3.54166C9.81967 3.54166 9.64423 3.60014 9.49998 3.70832L3.66665 8.08332C3.56315 8.16095 3.47915 8.2616 3.42129 8.37731C3.36343 8.49302 3.33331 8.62062 3.33331 8.74999V15.8333C3.33331 16.0543 3.42111 16.2663 3.57739 16.4226C3.73367 16.5789 3.94563 16.6667 4.16665 16.6667H15.8333C16.0543 16.6667 16.2663 16.5789 16.4226 16.4226C16.5788 16.2663 16.6666 16.0543 16.6666 15.8333Z"
                        stroke="{{ request()->is('admin') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Dashboard
        </a>

        <a href="{{ url('/admin/product') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/product*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.3333 4.58333L16.6666 6.66667V13.3333L9.99998 17.5L3.33331 13.3333V6.66667L9.99998 2.5L13.3333 4.58333ZM3.33331 6.66667L6.66665 8.75M13.3333 4.58333L6.66665 8.75M9.99998 17.5V10.8333M6.66665 8.75L9.99998 10.8333M9.99998 10.8333L16.6666 6.66667"
                        stroke="{{ request()->is('admin/product*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Produk
        </a>

        <a href="{{ url('/admin/categories') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/categories*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.16669 4.16667H17.5M9.16669 10H17.5M9.16669 15.8333H17.5"
                        stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M4.16667 5.83333C5.08714 5.83333 5.83333 5.08714 5.83333 4.16667C5.83333 3.24619 5.08714 2.5 4.16667 2.5C3.24619 2.5 2.5 3.24619 2.5 4.16667C2.5 5.08714 3.24619 5.83333 4.16667 5.83333Z"
                        stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M4.16667 5.83333C5.08714 5.83333 5.83333 5.08714 5.83333 4.16667C5.83333 3.24619 5.08714 2.5 4.16667 2.5C3.24619 2.5 2.5 3.24619 2.5 4.16667C2.5 5.08714 3.24619 5.83333 4.16667 5.83333Z"
                        stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M4.16667 11.6667C5.08714 11.6667 5.83333 10.9205 5.83333 9.99999C5.83333 9.07952 5.08714 8.33333 4.16667 8.33333C3.24619 8.33333 2.5 9.07952 2.5 9.99999C2.5 10.9205 3.24619 11.6667 4.16667 11.6667Z"
                        stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M4.16667 17.5C5.08714 17.5 5.83333 16.7538 5.83333 15.8333C5.83333 14.9129 5.08714 14.1667 4.16667 14.1667C3.24619 14.1667 2.5 14.9129 2.5 15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5Z"
                        stroke="{{ request()->is('admin/categories*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Kategori Produk
        </a>

        <a href="{{ url('/admin/orders') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/orders*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.66665 5.83333H13.3333M6.66665 9.16667H13.3333M6.66665 12.5H9.99998M16.6666 17.5V4.16667C16.6666 3.72464 16.4911 3.30072 16.1785 2.98816C15.8659 2.67559 15.442 2.5 15 2.5H4.99998C4.55795 2.5 4.13403 2.67559 3.82147 2.98816C3.50891 3.30072 3.33331 3.72464 3.33331 4.16667V17.5L5.41665 15.8333L7.91665 17.5L9.99998 15.8333L12.0833 17.5L14.5833 15.8333L16.6666 17.5Z"
                        stroke="{{ request()->is('admin/orders*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Pesanan
        </a>

        <div class="text-[9px] font-extrabold tracking-[2px] uppercase text-neutral-500 pt-[10px] px-[8px] pb-[5px]">
            Keuangan</div>

        <a href="{{ url('/admin/finance') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/finance*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 18.3333C14.6025 18.3333 18.3334 14.6025 18.3334 10C18.3334 5.3975 14.6025 1.66666 10 1.66666C5.39752 1.66666 1.66669 5.3975 1.66669 10C1.66669 14.6025 5.39752 18.3333 10 18.3333Z"
                        stroke="{{ request()->is('admin/finance*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.5 6.66667H10M10 6.66667H9.16667C8.72464 6.66667 8.30072 6.84226 7.98816 7.15482C7.6756 7.46738 7.5 7.89131 7.5 8.33333C7.5 8.77536 7.6756 9.19928 7.98816 9.51184C8.30072 9.8244 8.72464 10 9.16667 10H10.8333C11.2754 10 11.6993 10.1756 12.0118 10.4882C12.3244 10.8007 12.5 11.2246 12.5 11.6667C12.5 12.1087 12.3244 12.5326 12.0118 12.8452C11.6993 13.1577 11.2754 13.3333 10.8333 13.3333H10M10 6.66667V5M7.5 13.3333H10M10 13.3333V15"
                        stroke="{{ request()->is('admin/finance*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Keuangan
        </a>

        <a href="{{ url('/admin/promo') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/promo*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.5 9.31V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H9.31C9.75199 2.50009 10.1758 2.67575 10.4883 2.98833L17.155 9.655C17.4675 9.96755 17.643 10.3914 17.643 10.8333C17.643 11.2753 17.4675 11.6991 17.155 12.0117L12.0117 17.155C11.6991 17.4675 11.2753 17.643 10.8333 17.643C10.3914 17.643 9.96755 17.4675 9.655 17.155L2.98833 10.4883C2.67575 10.1758 2.50009 9.75199 2.5 9.31Z"
                        stroke="{{ request()->is('admin/promo*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Diskon & Voucher
        </a>

        <div class="text-[9px] font-extrabold tracking-[2px] uppercase text-neutral-500 pt-[10px] px-[8px] pb-[5px]">
            Lainnya</div>

        <a href="{{ url('/admin/users') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/users*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.50002 10.8333C9.34097 10.8333 10.8334 9.34095 10.8334 7.5C10.8334 5.65905 9.34097 4.16667 7.50002 4.16667C5.65907 4.16667 4.16669 5.65905 4.16669 7.5C4.16669 9.34095 5.65907 10.8333 7.50002 10.8333Z"
                        stroke="{{ request()->is('admin/users*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M13.3334 15.8333C13.3334 13.0717 10.7217 10.8333 7.50002 10.8333C4.27835 10.8333 1.66669 13.0717 1.66669 15.8333M12.5 10.8333C13.057 10.8333 13.6051 10.6937 14.0942 10.4273C14.5834 10.1609 14.998 9.77612 15.3001 9.3082C15.6023 8.84028 15.7823 8.30411 15.8239 7.74868C15.8654 7.19324 15.7671 6.63625 15.538 6.12858C15.3088 5.62092 14.9561 5.17877 14.5121 4.84254C14.068 4.5063 13.5468 4.2867 12.996 4.2038C12.4452 4.12089 11.8824 4.17733 11.3591 4.36795C10.8357 4.55856 10.3685 4.87729 10 5.295"
                        stroke="{{ request()->is('admin/users*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M18.3333 15.8333C18.3333 13.0717 15.7217 10.8333 12.5 10.8333C11.8275 10.8333 10.7475 10.5892 10 9.80417"
                        stroke="{{ request()->is('admin/users*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Pengguna
        </a>

        <a href="{{ url('/admin/reports') }}"
            class="flex items-center gap-[10px] p-[10px] rounded-lg text-[14px] transition-colors duration-[250ms] mb-[2px] outline-none {{ request()->is('admin/reports*') ? 'bg-primary-500 text-neutral-50 shadow-[0_4px_14px_rgba(125,57,235,0.38)] font-bold' : 'text-[#d7c2f9] font-semibold hover:bg-primary-500/20 hover:text-neutral-50' }}">
            <span class="w-[18px] shrink-0 flex items-center justify-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.66665 13.3333V9.16667M9.99998 13.3333V6.66667M13.3333 13.3333V11.6667M15 3.33333H4.99998C4.55795 3.33333 4.13403 3.50893 3.82147 3.82149C3.50891 4.13405 3.33331 4.55797 3.33331 5V15C3.33331 15.442 3.50891 15.866 3.82147 16.1785C4.13403 16.4911 4.55795 16.6667 4.99998 16.6667H15C15.442 16.6667 15.8659 16.4911 16.1785 16.1785C16.4911 15.866 16.6666 15.442 16.6666 15V5C16.6666 4.55797 16.4911 4.13405 16.1785 3.82149C15.8659 3.50893 15.442 3.33333 15 3.33333Z"
                        stroke="{{ request()->is('admin/reports*') ? '#C6FF33' : '#D7C2F9' }}" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Laporan
        </a>
    </nav>

    <div class="p-[14px] border-t border-white/5 shrink-0">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-[10px] w-full px-[12px] py-[9px] rounded-lg text-neutral-400 text-[12px] font-semibold transition-colors duration-[250ms] hover:bg-[#c10007]/15 hover:text-red-400 border-none outline-none cursor-pointer">
                <img src="{{ asset('assets/icons/logout-half-circle-line.svg') }}" alt="Logout" />
                Keluar
            </button>
        </form>
    </div>
</aside>
<!-- END .sidebar --> --}}
