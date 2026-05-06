<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Produk — Rekaps Admin</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/product.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layout-admin.css') }}" />
</head>

<body>
    <div class="layout">
        <x-admin.sidebar-admin></x-admin.sidebar-admin>

        <div class="area-main">
            <x-admin.navbar-admin></x-admin.navbar-admin>

            <!-- Content -->
            <main class="content">
                @yield('content')
            </main>
            <!-- END .content -->
        </div>
        <!-- END .area-main -->
    </div>
    <!-- END .layout -->

    @yield('footer')
</body>

</html>
