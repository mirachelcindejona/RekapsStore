@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="Checkout" />
@endsection

@section('content')

<div class="flex flex-col md:flex-row gap-3 items-start">

    {{-- ===== KIRI: Checkout Items ===== --}}
    <div class="flex flex-col gap-2 w-full md:flex-1">
        @foreach ($products as $product)
            <x-client.checkout-item :product="$product" />
        @endforeach
    </div>

    {{-- ===== KANAN: Ringkasan Transaksi ===== --}}
    <div class="w-full md:w-80 md:sticky md:top-15">
        <div class="flex flex-col w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 gap-3">

            {{-- Toggle Detail --}}
            <div class="flex items-center justify-end">
                <p id="toggleDetailBtn" class="text-xs text-neutral-400 cursor-pointer hover:text-primary-500 transition"
                   onclick="toggleDetail()">
                   Lihat Detail Transaksi
                </p>
            </div>

            {{-- Detail Transaksi --}}
            <div id="detailTransaksi" class="hidden flex-col gap-2 border-t border-neutral-100 pt-3">
                <p class="text-xs font-semibold text-neutral-500 mb-1">Detail Transaksimu</p>
                @foreach ($products as $product)
                <div class="flex items-center justify-between">
                    <p class="text-xs text-neutral-600 truncate max-w-[60%]">{{ $product->name }}</p>
                    <p class="text-xs font-semibold text-neutral-800">Rp{{ number_format($product->selling_price - ($product->selling_price * $product->discount / 100), 0, ',', '.') }}</p>
                </div>
                @endforeach
                <div class="border-t border-neutral-100 pt-2 mt-1">
                    <button type="button"
                        onclick="document.getElementById('voucherModal').classList.remove('hidden')"
                        class="flex items-center gap-1 text-xs font-semibold bg-neutral-100 hover:bg-neutral-200 text-neutral-400 border rounded-lg border-neutral-300 cursor-pointer py-1 px-2 transition">
                        <span class="text-base leading-none">+</span> Pakai Voucher
                    </button>
                </div>
            </div>

            {{-- Total + Bayar --}}
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-neutral-700">Total Harga</p>
                <p class="text-sm font-semibold text-primary-500">Rp{{ number_format($products->sum(fn($p) => $p->selling_price - ($p->selling_price * $p->discount / 100)), 0, ',', '.') }}</p>
            </div>
            <form method="POST" action="/payment">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 cursor-pointer bg-primary-500 hover:bg-primary-600 text-white text-sm font-bold py-3 rounded-xl transition">
                    <img src="{{ asset('assets/icons/secure-payment.svg') }}" alt="" class="w-4 h-4">
                    Bayar Sekarang
                </button>
            </form>

        </div>
    </div>

</div>

{{-- Voucher Modal --}}
<div id="voucherModal" class="hidden fixed inset-0 z-50 flex items-end md:items-center justify-center">
    <div class="absolute inset-0 bg-black/30" onclick="document.getElementById('voucherModal').classList.add('hidden')"></div>
    <div class="relative z-10 w-full max-w-md bg-white rounded-t-2xl md:rounded-2xl p-5 flex flex-col gap-4">
        <div class="flex items-center justify-between">
            <p class="text-sm font-bold text-neutral-800">Pilih Vouchermu</p>
            <button onclick="document.getElementById('voucherModal').classList.add('hidden')"
                class="flex items-center justify-center rounded-full transition text-neutral-500 text-xl cursor-pointer leading-none">
                &times;
            </button>
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-xs font-semibold text-neutral-600">Kode Voucher</p>
            <input type="text" placeholder="Masukan kode vouchermu disini"
                class="w-full border border-neutral-200 rounded-xl px-3 py-2 text-sm text-neutral-700 placeholder:text-neutral-300 focus:outline-none focus:border-primary-400 transition">
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-xs font-semibold text-neutral-600">Diskon</p>
            <div class="flex flex-col gap-2">
                @foreach ($vouchers as $voucher)
                    <x-client.voucher-item
                        :name="$voucher->code"
                        :desc="'Minimal pembelian Rp' . number_format($voucher->min_purchase, 0, ',', '.')"
                        :off="$voucher->value . '% OFF'"
                        :value="$voucher->code"
                        :checked="false"
                        :disabled="false"
                    />
                @endforeach
            </div>
        </div>
        <button class="w-full bg-primary-500 hover:bg-primary-600 active:scale-95 text-white text-sm font-bold py-3 rounded-xl transition">
            Pakai Voucher
        </button>
    </div>
</div>

<script>
function toggleDetail() {
    const detail = document.getElementById('detailTransaksi');
    const btn = document.getElementById('toggleDetailBtn');
    const isHidden = detail.classList.contains('hidden');

    if (isHidden) {
        detail.classList.remove('hidden');
        detail.classList.add('flex');
        btn.textContent = 'Sembunyikan Detail';
    } else {
        detail.classList.add('hidden');
        detail.classList.remove('flex');
        btn.textContent = 'Lihat Detail Transaksi';
    }
}
</script>

@endsection