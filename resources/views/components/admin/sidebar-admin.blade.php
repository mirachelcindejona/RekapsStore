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

        <a href="dashboard.html" class="nav-item active">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/home-analytics-line.svg') }}" alt="Dashboard" />
            </span>
            Dashboard
        </a>

        <a href="../admin/product/product.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/box-line.svg') }}" alt="Produk" />
            </span>
            Produk
        </a>

        <a href="../admin/orders/orders.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/receipt-text-line.svg') }}" alt="Pesanan" />
            </span>
            Pesanan
        </a>

        <a href="../admin/cashier/cashier.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/monitor-line.svg') }}" alt="Kasir" />
            </span>
            Kasir
        </a>

        <!-- Grup: Keuangan & Stok -->
        <div class="nav-group-label">Keuangan</div>

        <a href="../admin/finance/finance.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/dollar-circle-line.svg') }}" alt="Keuangan" />
            </span>
            Keuangan
        </a>

        <a href="../admin/finance/discount-voucher.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/creditcard-line.svg') }}" alt="Pembayaran" />
            </span>
            Pembayaran
        </a>

        <a href="../admin/promo/promo.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/tag-line.svg') }}" alt="Diskon & Voucher" />
            </span>
            Diskon & Voucher
        </a>

        <!-- Grup: Lainnya -->
        <div class="nav-group-label">Lainnya</div>

        <a href="../admin/users/users.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/users-line.svg') }}" alt="Pengguna" />
            </span>
            Pengguna
        </a>

        <a href="laporan.html" class="nav-item">
            <span class="nav-item-icon">
                <img src="{{ asset('assets/icons/analytics-line.svg') }}" alt="" />
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
