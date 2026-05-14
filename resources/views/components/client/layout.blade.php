<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('assets/icons/logo-rekaps.svg') }}">
    <title>Rekaps Store</title>
</head>
<body class="bg-primary-50 font-sans">
    <x-client.navbar-main></x-client.navbar-main>
    <main class="pt-15 sm:pt-19 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 h-full flex flex-col gap-1">
        @yield('content')
    </main>
    @yield('footer')
</body>
</html>