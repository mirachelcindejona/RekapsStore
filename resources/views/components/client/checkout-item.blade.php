@props(['product'])

<div class="flex items-center bg-neutral-50 rounded-xl p-3 gap-3">
    {{-- Image --}}
    <div class="flex-1 max-w-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
        <img src="{{ asset($product->images->first()->image_path ?? 'assets/images/placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
    </div>
    {{-- Info --}}
    <div class="flex-1 min-w-0">
        <p class="text-sm font-bold text-neutral-800 truncate">{{ $product->name }}</p>
        <p class="text-xs text-neutral-400">Variasi: {{ $product->variants->first()->variant_name ?? '-' }}</p>
    </div>
    {{-- Price + Qty --}}
    <div class="flex flex-col items-end gap-2 shrink-0">
        <p class="text-sm font-bold text-neutral-800">Rp{{ number_format($product->selling_price - ($product->selling_price * $product->discount / 100), 0, ',', '.') }}</p>
        <x-client.quantity :qty="1" />
    </div>
</div>