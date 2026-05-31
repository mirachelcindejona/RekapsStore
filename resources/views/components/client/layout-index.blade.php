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
    <main class="pt-24 sm:pt-16 max-w-7xl mx-auto px-2 flex-1 w-full flex flex-col gap-2">
        @yield('content')
    </main>
    @yield('footer')
</body>
</html>