@props(['product', 'qty' => 1, 'variantId' => null])

@php
    $finalPrice = $product->selling_price - ($product->selling_price * $product->discount / 100);
@endphp

<div class="checkout-item flex items-center bg-neutral-50 rounded-xl pl-3 py-3 pr-6 gap-3"
     data-price="{{ $finalPrice }}"
     data-qty="{{ $qty }}"
     data-product-id="{{ $product->id }}">
    <div class="flex-1 max-w-40 max-h-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
        <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('assets/images/placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-bold text-neutral-800 truncate">{{ $product->name }}</p>
        <p class="text-xs text-neutral-400">
            Variasi: {{ optional($product->variants->firstWhere('id', $variantId))->variant_value ?? '-' }}
        </p>
        <p class="text-xs text-neutral-400 qty-label">Jumlah: {{ $qty }}</p>
    </div>
    <div class="flex flex-col items-end gap-2 shrink-0">
        <p class="item-total text-sm font-bold text-neutral-800">
            Rp{{ number_format($finalPrice * $qty, 0, ',', '.') }}
        </p>
        <x-client.quantity :qty="$qty" />
    </div>
</div>