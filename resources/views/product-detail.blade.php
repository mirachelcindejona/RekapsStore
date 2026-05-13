@extends('components.client.layout')

@section('content')

{{-- back-button --}}
<a href="{{ url()->previous() }}" class="flex font-semibold text-neutral-500 gap-2 items-center pb-2 cursor-pointer mt-2 sm:mt-0">
    <img src="{{ asset('assets/icons/back.svg') }}" alt="">
    Kembali
</a>
<div class="flex flex-col sm:flex-row gap-2">

    {{-- IMAGE --}}
    <div class="bg-neutral-50 rounded-xl p-4 flex-2 items-center flex">

        <img src="{{ asset($product['image']) }}"
                class="w-full object-contain">

    </div>

    {{-- OTHER-IMAGE --}}
    <div class="hidden sm:flex flex-col flex-1 gap-2">
        <div class="flex-1 rounded-xl bg-neutral-50 flex items-center">
            <img class="w-full object-contain" src="{{ asset($product['image']) }}" alt="">
        </div>
        <div class="flex-1 rounded-xl bg-neutral-50 flex items-center">
            <img class="w-full object-contain" src="{{ asset($product['image']) }}" alt="">
        </div>
        <div class="flex-1 rounded-xl bg-neutral-50 flex items-center">
            <img class="w-full object-contain" src="{{ asset($product['image']) }}" alt="">
        </div>
    </div>

    {{-- DETAIL --}}
    <div class="flex flex-col flex-3 bg-neutral-50 rounded-xl p-4 gap-5">

        <div class="flex-5 flex flex-col gap-5">
            <h1 class="text-xl sm:text-3xl font-bold">
            {{ $product['name'] }}
            </h1>

            <div class="flex flex-col">
                <span class="text-lg font-medium text-neutral-500 line-through">
                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                </span>
    
                <span class="text-xl sm:text-2xl font-bold text-primary-500">
                    Rp{{ number_format(($product['price']-($product['price']*$product['discount']/100)), 0, ',', '.') }}
                </span>
            </div>

            <div class="flex items-center gap-2">
                <span>⭐ {{ $product['rating'] }}</span>
                <span>|</span>
                <span>{{ $product['reviews'] }} Ulasan</span>
            </div>

            <div class="flex flex-wrap gap-2">

            {{-- READY STOCK --}}
            <div class="flex items-center gap-1 text-xs sm:text-sm font-semibold text-teal-500 bg-teal-100 rounded-full whitespace-nowrap px-3 py-1">
                <img src="{{ asset('assets/icons/box.svg') }}" class="w-4 h-4 object-contain">
                <span class="leading-none">Ready Stock</span>
            </div>
            {{-- CATEGORY --}}
            <div class="flex items-center gap-1 text-xs sm:text-sm font-semibold text-yellow-500 bg-yellow-100 rounded-full whitespace-nowrap px-3 py-1">
                <span class="leading-none">{{ $product['category'] }}</span>
            </div>

            </div>

            <div class="flex gap-5 items-center">
                <span class="font-bold">Ukuran</span>
                <ul class="flex gap-2 text-neutral-500 font-semibold w-full sm:w-auto">
                    <li class="size active" >S</li>
                    <li class="size" >M</li>
                    <li class="size" >L</li>
                    <li class="size" >XL</li>
                    <li class="size" >XXL</li>
                </ul>
            </div>
            <div class="flex flex-row gap-5 items-center">
                <span class="font-bold">Jumlah</span>

                <div class="flex items-center gap-2 h-full">

                    <button id="minusBtn"
                        class="w-8 h-8 rounded-lg bg-primary-500 cursor-pointer hover:bg-primary-600 text-neutral-50 text-xl font-bold transition">
                        -
                    </button>

                    <span id="quantity"
                        class="text-lg font-bold min-w-[24px] text-center">
                        1
                    </span>

                    <button id="plusBtn"
                        class="w-8 h-8 rounded-lg bg-primary-500 cursor-pointer hover:bg-primary-600 text-neutral-50 text-xl font-bold transition">
                        +
                    </button>

                </div>
            </div>

        </div>
        <div class="flex-1 w-full flex flex-col items-end justify-end gap-2">
            <button class="bg-neutral-50 border-2 text-primary-500 py-3 rounded-xl w-full flex justify-center items-center gap-2 font-medium hover:bg-primary-50 cursor-pointer transition-all duration-300 ease-in-out">
                <img src="{{ asset('assets/icons/cart-ill.svg') }}" alt="">
                Masukan Keranjang
            </button>
            <button class="bg-primary-500 text-neutral-50 py-3 rounded-xl w-full flex justify-center items-center gap-2 font-medium hover:bg-primary-600 cursor-pointer transition-all duration-300 ease-in-out">
                <img src="{{ asset('assets/icons/buy-ill.svg') }}" alt="">
                Beli Sekarang
            </button>
        </div>

    </div>

</div>
<div class="flex flex-col gap-2 bg-neutral-50 rounded-xl mt-1">
    <div>

        {{-- BUTTON --}}
        <button id="detailToggle" class="w-full flex text-lg cursor-pointer gap-2 text-neutral-700 font-semibold items-center p-2">
            <img src="{{ asset('assets/icons/dropdown.svg') }}" alt="">
            Detail Produk  
        </button>

        {{-- CONTENT --}}
        <div id="detailContent" class="hidden text-neutral-500 leading-8 px-10 pb-4">
            {{ $product['details'] }}
        </div>

    </div>
</div>
{{-- Rating Produk --}}
<section class="bg-white rounded-[18px] p-5 shadow-sm mt-1">
    
    {{-- Header --}}
    <h2 class="text-[20px] font-semibold text-gray-800 mb-5">
        Rating Produk
    </h2>

    {{-- Summary Rating --}}
    <div class="border border-gray-200 rounded-[16px] p-5 flex gap-6 mb-5">

        {{-- Rating Score --}}
        <div class="min-w-[140px] flex flex-col items-center justify-center border border-gray-200 rounded-[14px] px-5 py-4">
            <h1 class="text-[52px] font-bold text-[#7D39EB] leading-none">
                {{ $product['rating'] }}
            </h1>

            <div class="flex gap-[2px] text-yellow-400 text-[16px] mt-2">
                ★ ★ ★ ★ ★
            </div>

            <p class="text-[13px] text-gray-400 mt-1">
                5 Ulasan
            </p>
        </div>

        {{-- Rating Bars --}}
        <div class="flex-1 flex flex-col justify-center gap-2">

            {{-- 5 Star --}}
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm w-6">★ 5</span>

                <div class="flex-1 h-[8px] bg-gray-200 rounded-full overflow-hidden">
                    <div class="w-[85%] h-full bg-lime-400 rounded-full"></div>
                </div>

                <span class="text-gray-400 text-sm">4</span>
            </div>

            {{-- 4 Star --}}
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm w-6">★ 4</span>

                <div class="flex-1 h-[8px] bg-gray-200 rounded-full overflow-hidden">
                    <div class="w-[20%] h-full bg-lime-400 rounded-full"></div>
                </div>

                <span class="text-gray-400 text-sm">1</span>
            </div>

            {{-- 3 Star --}}
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm w-6">★ 3</span>

                <div class="flex-1 h-[8px] bg-gray-200 rounded-full overflow-hidden">
                    <div class="w-[0%] h-full bg-lime-400 rounded-full"></div>
                </div>

                <span class="text-gray-400 text-sm">0</span>
            </div>

            {{-- 2 Star --}}
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm w-6">★ 2</span>

                <div class="flex-1 h-[8px] bg-gray-200 rounded-full overflow-hidden">
                    <div class="w-[0%] h-full bg-lime-400 rounded-full"></div>
                </div>

                <span class="text-gray-400 text-sm">0</span>
            </div>

            {{-- 1 Star --}}
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm w-6">★ 1</span>

                <div class="flex-1 h-[8px] bg-gray-200 rounded-full overflow-hidden">
                    <div class="w-[0%] h-full bg-lime-400 rounded-full"></div>
                </div>

                <span class="text-gray-400 text-sm">0</span>
            </div>

        </div>
    </div>

{{-- Review List --}}
<div class="flex flex-col gap-4">

    {{-- Review Item --}}
    <div class="border border-gray-200 rounded-[16px] p-4">

        <div class="flex flex-col gap-4">

            {{-- HEADER --}}
            <div class="flex items-center gap-3">

                {{-- Avatar --}}
                <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-semibold text-sm shrink-0">
                    MS
                </div>

                <div class="flex flex-col">

                    {{-- Name --}}
                    <h3 class="font-semibold text-[14px] text-gray-800 leading-none">
                        Muhammad Sumbul
                    </h3>

                    {{-- Stars --}}
                    <div class="text-yellow-400 text-sm mt-1 leading-none">
                        ★★★★★
                    </div>

                </div>

            </div>

            {{-- Comment --}}
            <p class="text-[13px] text-gray-500 leading-relaxed">
                “Jerseynya bagus bangettt min bikin lagi yang lebih gacorrrr😍🔥”
            </p>

            {{-- Admin Reply --}}
            <div class="bg-purple-50 border border-purple-100 rounded-[12px] p-3">

                <p class="text-[12px] font-semibold text-[#7D39EB] mb-1">
                    ↳ Balasan Admin Rekaps
                </p>

                <p class="text-[13px] text-gray-500 leading-relaxed">
                    “Makasii udah memesan di rekaps store tunggu produk gacor lainnya yaaa”
                </p>

            </div>

        </div>

    </div>

    {{-- Review Item --}}
    <div class="border border-gray-200 rounded-[16px] p-4">

        <div class="flex flex-col gap-4">

            {{-- HEADER --}}
            <div class="flex items-center gap-3">

                {{-- Avatar --}}
                <div class="w-10 h-10 rounded-full bg-lime-500 flex items-center justify-center text-white font-semibold text-sm shrink-0">
                    US
                </div>

                <div class="flex flex-col">

                    <h3 class="font-semibold text-[14px] text-gray-800 leading-none">
                        Uum Sarwenah
                    </h3>

                    <div class="text-yellow-400 text-sm mt-1 leading-none">
                        ★★★★★
                    </div>

                </div>

            </div>

            {{-- Comment --}}
            <p class="text-[13px] text-gray-500 leading-relaxed">
                “Kerennnn bahannya adem dan premium wakkk🔥🔥🔥”
            </p>

            {{-- Reply Form --}}
            <div class="mt-1">

                <textarea 
                    class="w-full border border-gray-300 rounded-[12px] px-4 py-3 text-sm outline-none focus:border-[#7D39EB] resize-none"
                    rows="3"
                    placeholder="Tulis balasan..."
                ></textarea>

                <div class="flex flex-col sm:flex-row justify-end gap-2 mt-3">

                    <button class="px-4 py-2 rounded-[10px] bg-gray-200 text-gray-500 text-sm font-medium">
                        Batal
                    </button>

                    <button class="px-4 py-2 rounded-[10px] bg-[#7D39EB] text-white text-sm font-medium hover:bg-[#6b2fd1] transition">
                        Kirim Balasan
                    </button>

                </div>

            </div>

        </div>

    </div>

    {{-- Review Item --}}
    <div class="border border-gray-200 rounded-[16px] p-4">

        <div class="flex flex-col gap-4">

            {{-- HEADER --}}
            <div class="flex items-center gap-3">

                {{-- Avatar --}}
                <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white font-semibold text-sm shrink-0">
                    AS
                </div>

                <div class="flex flex-col">

                    <h3 class="font-semibold text-[14px] text-gray-800 leading-none">
                        Aku Siapa
                    </h3>

                    <div class="text-yellow-400 text-sm mt-1 leading-none">
                        ★★★★★
                    </div>

                </div>

            </div>

            {{-- Comment --}}
            <p class="text-[13px] text-gray-500 leading-relaxed">
                “Baguss bangetttt tapi sayang PO nya aga lama yhhh”
            </p>

            {{-- Reply Button --}}
            <button class="w-fit px-4 py-2 border border-[#7D39EB] text-[#7D39EB] rounded-[10px] text-sm font-medium hover:bg-purple-50 transition">
                ↳ Balas Review
            </button>

        </div>

    </div>

</div>

</section>

@endsection

@section('footer')
<style>
    .size {
        padding: 3px 9px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
        flex-shrink: 0;
    }

    .size:hover {
        background: var(--color-primary-100);
        color: var(--color-primary-500);
    }

    .size.active {
        background: var(--color-primary-500);
        color: var(--color-neutral-50);
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        // SIZE
        const sizes = document.querySelectorAll(".size");

        sizes.forEach(size => {
            size.addEventListener("click", function () {

                sizes.forEach(item => {
                    item.classList.remove("active");
                });

                this.classList.add("active");
            });
        });

        // QUANTITY
        const minusBtn = document.getElementById("minusBtn");
        const plusBtn = document.getElementById("plusBtn");
        const quantity = document.getElementById("quantity");

        let count = 1;

        plusBtn.addEventListener("click", () => {
            count++;
            quantity.textContent = count;
        });

        minusBtn.addEventListener("click", () => {
            if (count > 1) {
                count--;
                quantity.textContent = count;
            }
        });

        // DETAIL TOGGLE
        const detailToggle = document.getElementById("detailToggle");
        const detailContent = document.getElementById("detailContent");
        const detailIcon = document.getElementById("detailIcon");

        detailToggle.addEventListener("click", () => {

            detailContent.classList.toggle("hidden");

            if (detailContent.classList.contains("hidden")) {
                detailIcon.textContent = "+";
            } else {
                detailIcon.textContent = "-";
            }

        });

    });
</script>
@endsection