@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="Keranjang Belanja" />
@endsection

@section('content')

@if(session('error'))
<div class="bg-red-50 border border-red-200 text-red-500 text-sm font-semibold px-4 py-2 rounded-xl">
    {{ session('error') }}
</div>
@endif

<form id="cartForm" method="POST" action="/checkout" class="flex flex-col gap-2 pb-17">
    @csrf

    {{-- ===== HEADER ROW ===== --}}
    <div class="flex items-center px-3 py-3 bg-neutral-50 rounded-xl">
        <label class="flex items-center gap-2 cursor-pointer select-none w-8">
            <x-client.select variant="selectAll" />
        </label>
        <span class="flex-1 text-neutral-700 text-sm font-semibold md:hidden">Pilih Semua</span>
        <div class="hidden md:grid grid-cols-[2fr_1fr_1fr_1fr_2rem] flex-1 text-neutral-700 text-sm font-semibold">
            <span>Produk</span>
            <span class="text-center">Varian</span>
            <span class="text-center">Harga</span>
            <span class="text-center">Jumlah</span>
            <span></span>
        </div>
    </div>

    {{-- ===== CART ITEMS ===== --}}
    @foreach ($products as $product)
    <x-client.cart-item 
        :product="$product"
        :price="$product->selling_price - ($product->selling_price * $product->discount / 100)"
    />
    @endforeach

    {{-- checkout --}}
    <div class="flex fixed bottom-2 left-1/2 -translate-x-1/2 w-full max-w-7xl px-2 z-10">
        <div class="flex w-full bg-white border border-neutral-100 rounded-xl px-6 py-3 shadow-lg items-center justify-between">
            <p class="text-xs sm:text-sm font-semibold text-neutral-700">Total Harga : 
                <span id="totalHarga" class="text-sm sm:text-lg font-semibold text-neutral-800">Rp0</span>
            </p>
            <button type="submit" class="bg-primary-500 cursor-pointer hover:bg-primary-600 active:scale-95 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition">
                Checkout
            </button>
        </div>
    </div>

</form>

<script>
function updateTotal() {
    const items = document.querySelectorAll('.cart-item:checked');
    let total = 0;
    items.forEach(cb => {
        total += parseFloat(cb.dataset.price);
    });
    document.getElementById('totalHarga').textContent = 'Rp' + total.toLocaleString('id-ID');
}

document.addEventListener('DOMContentLoaded', updateTotal);
</script>

@endsection