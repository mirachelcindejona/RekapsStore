<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-neutral-950 text-neutral-50 overflow-x-hidden">
    @yield('content')
    @yield('scripts')
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-neutral-950 text-neutral-50 overflow-x-hidden">

    <div class="flex min-h-screen w-full flex-col lg:flex-row">

        <!-- LEFT -->
        <div class="flex w-full flex-col p-8 lg:w-[40%] lg:p-12">

            <div class="mb-14 lg:mb-[60px]">
                <img
                    src="{{ asset('assets/icons/rekaps-store-logo.svg') }}"
                    alt="logo"
                    class="w-auto h-12">
            </div>

            <div class="w-full max-w-sm self-start lg:max-w-[320px]">

                @yield('content')

            </div>
        </div>

        <!-- RIGHT -->
        <div
            class="hidden w-[60%] bg-primary-500 lg:flex items-center justify-center [clip-path:polygon(20%_0,100%_0,100%_100%,0%_100%)] p-12">

            <div class="max-w-[450px] w-full flex flex-col items-start justify-center">

                <h1 class="text-5xl font-extrabold leading-[1.2] text-neutral-50 uppercase tracking-tighter">
                    WELCOME TO<br>
                    <span class="text-secondary-500">
                        REKAPS
                    </span> STORE
                </h1>

                <p class="mt-4 text-left text-sm font-bold text-neutral-50">
                    Berkarya, berkolaborasi, dan berkembang bersama
                </p>

            </div>
        </div>

    </div>

    @yield('scripts')

</body>

</html> --}}