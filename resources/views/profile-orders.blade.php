<x-client.profile-layout active="riwayat">

    <div class="bg-white border border-neutral-100 rounded-2xl p-4 sm:p-6 flex flex-col gap-4">

        <h2 class="text-sm sm:text-base font-bold text-neutral-800">Riwayat Pesanan</h2>

        <form method="GET" action="/profile/orders">
            <div class="flex items-center gap-2 border border-neutral-200 rounded-xl px-3 py-2">
                <img src="{{ asset('assets/icons/search-line.svg') }}" class="w-4 h-4 shrink-0">
                <input type="text" name="search" value="{{ $search }}"
                    placeholder="Cari pesananmu"
                    class="flex-1 text-sm text-neutral-700 focus:outline-none placeholder:text-neutral-300">
            </div>
        </form>

        @if($orders->isEmpty())
        <div class="flex flex-col items-center justify-center py-16 gap-2 text-center">
            <p class="text-neutral-400 text-sm">Belum ada riwayat pesanan.</p>
        </div>
        @else
        <div class="flex flex-col gap-3">
            @foreach($orders as $order)
            <a href="/profile/orders/{{ $order->order_code }}"
               class="block border border-neutral-200 rounded-2xl overflow-hidden hover:border-primary-200 transition bg-white">

                {{-- Items --}}
                @foreach($order->items as $item)
                <div class="flex items-center gap-3 p-3 sm:p-4 {{ !$loop->last ? 'border-b border-neutral-50' : '' }}">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-neutral-50 flex items-center justify-center shrink-0 overflow-hidden">
                        <img src="{{ $item->product->images->first() ? asset('storage/' . $item->product->images->first()->image_path) : asset('assets/images/placeholder.png') }}"
                            class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs sm:text-sm font-bold text-neutral-800 truncate">{{ $item->product->name }}</p>
                        <p class="text-[10px] sm:text-xs text-neutral-400">Variasi: {{ $item->variant->variant_value ?? '-' }}</p>
                        <p class="text-[10px] sm:text-xs text-neutral-400">Jumlah: {{ $item->quantity }}</p>
                    </div>
                </div>
                @endforeach

                <div class="px-3 sm:px-4 pb-1">
                    <p class="text-[10px] text-neutral-300">{{ $order->order_code }}</p>
                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-between px-3 sm:px-4 py-2 sm:py-3 bg-neutral-50">
                    <div class="flex items-center gap-2 flex-wrap">
                        @if($order->payment_status === 'Pending')
                            <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-amber-600 bg-amber-50 border border-amber-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 inline-block"></span>
                                Menunggu Pembayaran
                            </span>
                        @elseif($order->payment_status === 'Expired')
                            <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-red-600 bg-red-50 border border-red-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>
                                Expired
                            </span>
                        @elseif($order->payment_status === 'Cancelled')
                            <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-gray-600 bg-gray-50 border border-gray-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-400 inline-block"></span>
                                Dibatalkan
                            </span>
                        @elseif(in_array($order->payment_status, ['Lunas', 'Paid']))
                            @if($order->status === 'Menunggu Proses Produksi' || $order->status === 'Pending')
                                <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-primary-500 bg-primary-50 border border-primary-200 rounded-full px-2 py-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary-400 inline-block"></span>
                                    Menunggu Proses
                                </span>
                            @elseif($order->status === 'Sedang Diproduksi')
                                <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-yellow-500 bg-yellow-50 border border-yellow-200 rounded-full px-2 py-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 inline-block"></span>
                                    Sedang Diproduksi
                                </span>
                            @elseif($order->status === 'Siap Diambil')
                                <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-cyan-500 bg-cyan-50 border border-cyan-200 rounded-full px-2 py-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 inline-block"></span>
                                    Siap Diambil
                                </span>
                            @elseif($order->status === 'Pesanan Selesai')
                                <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-emerald-500 bg-emerald-50 border border-emerald-200 rounded-full px-2 py-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>
                                    Selesai
                                </span>
                            @endif
                        @endif
                    </div>
                    <p class="text-xs sm:text-sm font-extrabold text-neutral-800 shrink-0">Rp{{ number_format($order->total, 0, ',', '.') }}</p>
                </div>

            </a>
            @endforeach
        </div>
        @endif

    </div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const pendingOrders = @json($orders->where('payment_status', 'Pending')->pluck('order_code'));
    if (pendingOrders.length === 0) return;
    pendingOrders.forEach(orderCode => {
        const interval = setInterval(() => {
            fetch(`/payment/check/${orderCode}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status !== 'Pending') {
                        clearInterval(interval);
                        window.location.reload();
                    }
                }).catch(() => {});
        }, 5000);
    });
});
</script>
@endpush

</x-client.profile-layout>