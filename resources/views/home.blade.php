@extends('components.client.layout')

@section('content')
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
            :link="route('product-detail', $product['id'])"
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
@endsection

@section('footer')
<x-client.footer />
@endsection