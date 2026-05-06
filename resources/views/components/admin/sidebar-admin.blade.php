<!-- ====== SIDEBAR ====== -->
<aside class="sidebar" id="sidebar">
    <!-- Logo / Brand -->
    <div class="sidebar-brand">
        <div class="brand-logo">
            <img src="{{ asset('assets/icons/logo-rekaps.svg') }}" alt="" />
        </div>
        <div class="brand-text">
            <span class="brand-name">Rekaps Store</span>
            <span class="brand-tagline">Admin Panel</span>
        </div>
    </div>

    <!-- Info Pengguna -->
    <div class="sidebar-user">
        <div class="user-avatar">AR</div>
        <div class="user-info">
            <div class="user-name">Admin Rekaps</div>
            <span class="user-role">KETUA</span>
        </div>
    </div>

    <!-- Navigasi -->
    <nav class="sidebar-nav">
        <!-- Grup: Utama -->
        <div class="nav-group-label">Utama</div>

        <a href="{{ url('/admin') }}" class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <span class="nav-item-icon">
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

        <a href="{{ url('/admin/product') }}" class="nav-item {{ request()->is('admin/product*') ? 'active' : '' }}">
            <span class="nav-item-icon">
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

        <a href="{{ url('/admin/orders') }}" class="nav-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
            <span class="nav-item-icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.66665 5.83333H13.3333M6.66665 9.16667H13.3333M6.66665 12.5H9.99998M16.6666 17.5V4.16667C16.6666 3.72464 16.4911 3.30072 16.1785 2.98816C15.8659 2.67559 15.442 2.5 15 2.5H4.99998C4.55795 2.5 4.13403 2.67559 3.82147 2.98816C3.50891 3.30072 3.33331 3.72464 3.33331 4.16667V17.5L5.41665 15.8333L7.91665 17.5L9.99998 15.8333L12.0833 17.5L14.5833 15.8333L16.6666 17.5Z"
                        stroke="{{ request()->is('admin/orders*') ? '#C6FF33' : '#D7C2F9' }} stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            Pesanan
        </a>

        <div class="nav-group-label">Keuangan</div>

        <a href="{{ url('/admin/finance') }}" class="nav-item {{ request()->is('admin/finance*') ? 'active' : '' }}">
            <span class="nav-item-icon">
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

        <a href="{{ url('/admin/promo') }}" class="nav-item {{ request()->is('admin/promo*') ? 'active' : '' }}">
            <span class="nav-item-icon">
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

        <div class="nav-group-label">Lainnya</div>

        <a href="{{ url('/admin/users') }}" class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
            <span class="nav-item-icon">
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
            class="nav-item {{ request()->is('admin/reports*') ? 'active' : '' }}">
            <span class="nav-item-icon">
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

    <!-- Tombol Logout -->
    <div class="sidebar-footer">
        <button class="btn-logout">
            <img src="{{ asset('assets/icons/logout-half-circle-line.svg') }}" alt="" />
            Keluar
        </button>
    </div>
</aside>
<!-- END .sidebar -->
