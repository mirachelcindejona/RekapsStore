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
<body class="bg-primary-50">
    {{-- navbar --}}
    <x-client.navbar-index></x-client.navbar-index>
    {{-- main-content --}}
    <main class="pt-23 sm:pt-19 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 h-full">
        {{-- carousel --}}
        <div class="hidden sm:flex"> 
            <x-client.carousel />
        </div>
        {{-- category-filter --}}
        <x-client.category-filter></x-client.category-filter>
        {{-- products --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-2 items-stretch">
            @foreach ($products as $product)
            <x-client.product-card
                :link="$product['link']"
                :discount="$product['discount']"
                :image="$product['image']"
                :name="$product['name']"
                :price="$product['price']"
                :rating="$product['rating']"
                :reviews="$product['reviews']"
                :category="$product['category']"
            />
            @endforeach
        </div>
    </main>
    <x-client.footer></x-client.footer>
</body>
</html>