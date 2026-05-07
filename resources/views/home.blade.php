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
<body>
    <x-client.navbar-main></x-client.navbar-main>
</body>
</html>