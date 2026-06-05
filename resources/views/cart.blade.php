@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="Keranjang Belanja" />
@endsection

@section('content')

@if(session('error'))
<div class="bg-red-50 border border-red-200 text-red-500 text-sm font-semibold px-4 py-2 rounded-xl mb-2">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-600 text-sm font-semibold px-4 py-2 rounded-xl mb-2">
    {{ session('success') }}
</div>
@endif

<form id="cartForm" method="POST" action="/checkout">
    @csrf

    {{-- HEADER ROW --}}
    <div class="flex items-center px-3 py-3 bg-neutral-50 rounded-xl mb-2">
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

    {{-- CART ITEMS --}}
    <div class="flex flex-col gap-2 pb-17">
        @forelse ($items as $item)
        <x-client.cart-item
            :product="$item->product"
            :price="$item->product->selling_price - ($item->product->selling_price * $item->product->discount / 100)"
            :quantity="$item->quantity"
            :itemId="$item->id"
            :variantId="$item->product_variant_id"
        />
        @empty
        <div class="flex flex-col items-center justify-center py-16 gap-2 text-center">
            <p class="text-neutral-400 text-sm font-semibold">Keranjangmu masih kosong.</p>
            <a href="/home" class="text-primary-500 text-xs font-semibold hover:underline">Mulai belanja</a>
        </div>
        @endforelse
    </div>

    {{-- CHECKOUT BAR --}}
    <div class="flex fixed bottom-2 left-1/2 -translate-x-1/2 w-full max-w-7xl px-2 z-10">
        <div class="flex w-full bg-white border border-neutral-100 rounded-xl px-6 py-3 shadow-lg items-center justify-between">
            <p class="text-xs sm:text-sm font-semibold text-neutral-700">Total Harga :
                <span id="totalHarga" class="text-sm sm:text-lg font-semibold text-neutral-800">Rp0</span>
            </p>
            <button type="submit" form="cartForm" class="bg-primary-500 cursor-pointer hover:bg-primary-600 active:scale-95 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition">
                Checkout
            </button>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/30" onclick="closeDeleteModal()"></div>
        <div class="relative z-10 w-full max-w-sm bg-white rounded-2xl p-6 flex flex-col items-center gap-4 mx-4">
            <div class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center">
                <img src="{{ asset('assets/icons/delete-bin-line-h.svg') }}" class="w-6 h-6">
            </div>
            <div class="text-center">
                <p class="text-base font-bold text-neutral-800">Hapus produk ini?</p>
                <p class="text-xs text-neutral-400 mt-1">Produk akan dihapus dari keranjangmu.</p>
            </div>
            <div class="flex gap-2 w-full">
                <button onclick="closeDeleteModal()"
                    class="flex-1 border border-neutral-200 text-neutral-600 text-sm font-semibold py-2.5 rounded-xl hover:bg-neutral-50 transition cursor-pointer">
                    Batal
                </button>
                <button id="confirmDeleteBtn"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2.5 rounded-xl transition cursor-pointer">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</form>

<script>
function updateTotal() {
    const items = document.querySelectorAll('.cart-item:checked');
    let total = 0;
    items.forEach(cb => {
        total += parseFloat(cb.dataset.price) * parseFloat(cb.dataset.qty);
    });
    document.getElementById('totalHarga').textContent = 'Rp' + total.toLocaleString('id-ID');
}
document.addEventListener('DOMContentLoaded', updateTotal);

let pendingDeleteId = null;

function deleteItem(itemId) {
    pendingDeleteId = itemId;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    pendingDeleteId = null;
    document.getElementById('deleteModal').classList.add('hidden');
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
    if (!pendingDeleteId) return;

    fetch(`/cart/remove/${pendingDeleteId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    }).then(() => window.location.reload());
});
</script>

@endsection