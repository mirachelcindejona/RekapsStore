<!-- NAVBAR -->
<header class="navbar">
    <!-- Tombol hamburger (hanya tampil di mobile) -->
    <button class="btn-menu-toggle" onclick="toggleSidebar()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <!-- Judul halaman -->
    <div class="navbar-left">
        <div class="navbar-page-title">Dashboard</div>
        <div class="navbar-breadcrumb">
            Rekaps Store / <span class="breadcrumb-active">Overview</span>
        </div>
    </div>

    <!-- Kanan: search, notifikasi, avatar -->
    <div class="navbar-right">
        <div class="navbar-search">
            <img src="{{ asset('assets/icons/search-line.svg') }}" alt="" />
            <input type="text" placeholder="Cari..." />
        </div>

        <button class="icon-btn">
            <img src="{{ asset('assets/icons/bell-line.svg') }}" alt="" />
            <span class="notif-dot"></span>
        </button>

        <div class="navbar-avatar">A</div>
    </div>
</header>
<!-- END .navbar -->
