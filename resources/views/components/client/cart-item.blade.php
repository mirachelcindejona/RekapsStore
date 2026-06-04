@props(['product', 'price' => 0])

<div class="flex items-center bg-neutral-50 px-3 py-5 rounded-xl gap-3">

    {{-- Checkbox --}}
    <div class="flex justify-center shrink-0">
        <input 
            type="checkbox" 
            class="cart-item w-4 h-4 accent-primary-500 rounded cursor-pointer"
            name="selected_products[]"
            value="{{ $product->id }}"
            data-price="{{ $price }}"
            onchange="syncSelectAll(); updateTotal();"
        >
    </div>

    {{-- MOBILE --}}
    <div class="flex flex-1 gap-3 md:hidden items-center">
        <div class="flex-1 max-w-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
            <img src="{{ asset($product->images->first()->image_path ?? 'assets/images/placeholder.png') }}" alt="{{ $product->name }}" class="object-contain">
        </div>
        <div class="flex-1 min-w-0 flex flex-col gap-3">
            <div class="flex flex-col">
                <p class="text-sm font-bold text-neutral-800 truncate">{{ $product->name }}</p>
                <p class="text-xs text-neutral-400 mb-0.5">
                    {{ $product->variants->first()->variant_name ?? '-' }}:
                    {{ implode(', ', json_decode($product->variants->first()->variant_values ?? '[]', true)) }}
                </p>
                <p class="text-sm text-neutral-500 line-through">Rp{{ number_format($product->selling_price, 0, ',', '.') }}</p>
                <p class="text-[16px] font-semibold text-primary-500">Rp{{ number_format($price, 0, ',', '.') }}</p>
                <div class="flex w-fit items-center gap-1 text-xs font-semibold text-teal-500 bg-teal-100 rounded-full whitespace-nowrap pl-1 pr-2 py-1">
                    <img src="{{ asset('assets/icons/box.svg') }}" class="w-3 h-3 object-contain">
                    <span class="leading-none">{{ $product->product_type }}</span>
                </div>
            </div>
            <x-client.quantity :qty="1" />
        </div>
        <div class="flex items-center justify-between">
            <button type="button" class="group w-7 h-7 flex items-center justify-center rounded-lg bg-neutral-100 border cursor-pointer border-neutral-300 hover:border-red-500 hover:bg-red-100 transition">
                <img src="{{ asset('assets/icons/delete-bin-line.svg') }}" alt="" class="block group-hover:hidden">
                <img src="{{ asset('assets/icons/delete-bin-line-h.svg') }}" alt="" class="hidden group-hover:block">
            </button>
        </div>
    </div>

    {{-- DESKTOP --}}
    <div class="hidden md:grid grid-cols-[2fr_1fr_1fr_1fr_2rem] flex-1 items-center">
        <div class="flex items-center gap-3">
            <div class="flex-1 max-w-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
                <img src="{{ asset($product->images->first()->image_path ?? 'assets/images/placeholder.png') }}" alt="{{ $product->name }}" class="object-contain">
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-[16px] font-bold text-neutral-800">{{ $product->name }}</p>
                <div class="flex w-fit items-center gap-1 text-xs font-semibold text-teal-500 bg-teal-100 rounded-full whitespace-nowrap pl-1 pr-2 py-1">
                    <img src="{{ asset('assets/icons/box.svg') }}" class="w-3 h-3 object-contain">
                    <span class="leading-none">{{ $product->product_type }}</span>
                </div>
            </div>
        </div>
        <p class="text-sm text-neutral-500 text-center">
            {{ $product->variants->first()->variant_name ?? '-' }}:
            {{ implode(', ', json_decode($product->variants->first()->variant_values ?? '[]', true)) }}
        </p>
        <div class="text-center">
            <p class="text-[10px] text-neutral-400">-</p>
            <p class="text-sm text-neutral-500 line-through">Rp{{ number_format($product->selling_price, 0, ',', '.') }}</p>
            <p class="text-lg font-semibold text-primary-500">Rp{{ number_format($price, 0, ',', '.') }}</p>
        </div>
        <div class="flex justify-center">
            <x-client.quantity :qty="1" />
        </div>
        <button type="button" class="group w-7 h-7 flex items-center justify-center rounded-lg bg-neutral-100 border cursor-pointer border-neutral-300 hover:border-red-500 hover:bg-red-100 transition">
            <img src="{{ asset('assets/icons/delete-bin-line.svg') }}" alt="" class="block group-hover:hidden">
            <img src="{{ asset('assets/icons/delete-bin-line-h.svg') }}" alt="" class="hidden group-hover:block">
        </button>
    </div>

</div>