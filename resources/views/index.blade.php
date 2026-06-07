@extends('components.client.layout-index')

@section('navbar')
<x-client.navbar-index />
@endsection

@section('content')
{{-- carousel --}}
<div class="hidden sm:flex"> 
    <x-client.carousel />
</div>
{{-- category-filter --}}
<x-client.category-filter></x-client.category-filter>
{{-- products --}}
<div class="product-grid grid grid-cols-2 min-[480px]:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 items-stretch">
    @foreach ($products as $product)
    <x-client.product-card
        :link="route('product-detail', $product->slug)"
        :discount="$product->discount"
        :image="$product->images->first()->image_path ?? 'assets/images/placeholder.png'"
        :name="$product->name"
        :price="$product->selling_price"
        :rating="$product->reviews->avg('rating') ?? 0"
        :reviews="$product->reviews->count()"
        :category="$product->category->name ?? '-'"
    />
    @endforeach
</div>
@endsection

@section('footer')
<x-client.footer/>
@endsection