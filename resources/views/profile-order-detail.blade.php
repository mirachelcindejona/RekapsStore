<x-client.profile-layout active="riwayat">

    <div class="flex flex-col gap-2 lg:gap-3">

        {{-- Header --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <p class="text-[10px] sm:text-xs text-neutral-400">Kode Pesanan</p>
                <p class="text-xs sm:text-sm font-bold text-neutral-800">{{ $order->order_code }}</p>
            </div>
            <div class="self-start sm:self-auto">
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
                        Pesanan Dibatalkan
                    </span>
                @elseif(in_array($order->payment_status, ['Lunas', 'Paid']))
                    @if(in_array($order->status, ['Menunggu Proses Produksi', 'Pending']))
                        <span class="flex items-center gap-1 text-[10px] sm:text-xs font-bold text-primary-500 bg-primary-50 border border-primary-200 rounded-full px-2 py-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-400 inline-block"></span>
                            Menunggu Proses Produksi
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
                            Pesanan Selesai
                        </span>
                    @endif
                @endif
            </div>
        </div>

        {{-- QR kalau belum bayar --}}
        @if($qrUrl)
        <div class="bg-white border border-neutral-100 rounded-2xl p-4 sm:p-5 flex flex-col items-center gap-3">
            <p class="text-xs sm:text-sm font-bold text-neutral-800">Selesaikan Pembayaran</p>
            <img src="{{ $qrUrl }}" class="w-40 h-40 sm:w-48 sm:h-48 object-contain">
            <p class="text-[10px] sm:text-xs text-neutral-400 text-center">Scan QR ini untuk menyelesaikan pembayaran</p>
        </div>
        @endif

        {{-- Items --}}
        <div class="bg-white border border-neutral-100 rounded-2xl overflow-hidden">
            @foreach($order->items as $item)
            <div class="flex items-center gap-3 p-3 sm:p-4 {{ !$loop->last ? 'border-b border-neutral-50' : '' }}">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-neutral-50 flex items-center justify-center shrink-0 overflow-hidden">
                    <img src="{{ $item->product->images->first() ? asset('storage/' . $item->product->images->first()->image_path) : asset('assets/images/placeholder.png') }}"
                        class="w-full h-full object-contain">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs sm:text-sm font-bold text-neutral-800 truncate">{{ $item->product->name }}</p>
                    <p class="text-[10px] sm:text-xs text-neutral-400">Variasi: {{ $item->variant->variant_value ?? '-' }}</p>
                    <p class="text-[10px] sm:text-xs text-neutral-400">Jumlah: {{ $item->quantity }}</p>
                </div>
                <p class="text-xs sm:text-sm font-bold text-primary-500 shrink-0">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>

        {{-- Ringkasan --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-4 sm:p-5 flex flex-col gap-2">
            <p class="text-xs sm:text-sm font-bold text-neutral-800 mb-1">Ringkasan Pembayaran</p>
            <div class="flex justify-between text-[10px] sm:text-xs text-neutral-600">
                <span>Subtotal</span>
                <span>Rp{{ number_format($order->subtotal, 0, ',', '.') }}</span>
            </div>
            @if($order->discount > 0)
            <div class="flex justify-between text-[10px] sm:text-xs text-red-500">
                <span>Diskon</span>
                <span>-Rp{{ number_format($order->discount, 0, ',', '.') }}</span>
            </div>
            @endif
            <div class="flex justify-between text-xs sm:text-sm font-bold text-neutral-800 border-t border-neutral-100 pt-2 mt-1">
                <span>Total</span>
                <span class="text-primary-500">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

        {{-- Timeline --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-4 sm:p-5 flex flex-col gap-3 sm:gap-4">
            <p class="text-xs sm:text-sm font-bold text-neutral-800">Status Pesanan</p>
            <div class="flex flex-col gap-2 sm:gap-3">

                @php
                if ($order->payment_status === 'Expired') {
                    $statuses = [
                        ['label' => 'Pesanan Dibuat', 'done' => true],
                        ['label' => 'Pembayaran Expired', 'done' => false],
                    ];
                } elseif ($order->payment_status === 'Cancelled') {
                    $statuses = [
                        ['label' => 'Pesanan Dibuat', 'done' => true],
                        ['label' => 'Pesanan Dibatalkan', 'done' => false],
                    ];
                } else {
                    $isPaid = in_array($order->payment_status, ['Lunas', 'Paid']);
                    $statuses = [
                        ['label' => 'Pesanan Dibuat', 'done' => true],
                        ['label' => 'Pembayaran Berhasil', 'done' => $isPaid],
                        ['label' => 'Menunggu Proses Produksi', 'done' => $isPaid && in_array($order->status, ['Menunggu Proses Produksi', 'Sedang Diproduksi', 'Siap Diambil', 'Pesanan Selesai'])],
                        ['label' => 'Sedang Diproduksi', 'done' => $isPaid && in_array($order->status, ['Sedang Diproduksi', 'Siap Diambil', 'Pesanan Selesai'])],
                        ['label' => 'Siap Diambil', 'done' => $isPaid && in_array($order->status, ['Siap Diambil', 'Pesanan Selesai'])],
                        ['label' => 'Pesanan Selesai', 'done' => $isPaid && $order->status === 'Pesanan Selesai'],
                    ];
                }
                @endphp

                @foreach($statuses as $status)
                <div class="flex items-center gap-2 sm:gap-3">
                    <div class="w-4 h-4 sm:w-5 sm:h-5 rounded-full flex items-center justify-center shrink-0
                        {{ $status['done'] ? 'bg-primary-500' : 'bg-neutral-200' }}">
                        @if($status['done'])
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5 sm:w-3 sm:h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        @endif
                    </div>
                    <p class="text-[10px] sm:text-xs {{ $status['done'] ? 'font-semibold text-neutral-800' : 'text-neutral-400' }}">
                        {{ $status['label'] }}
                    </p>
                </div>
                @if(!$loop->last)
                <div class="w-0.5 h-3 sm:h-4 {{ $status['done'] ? 'bg-primary-300' : 'bg-neutral-100' }} ml-2"></div>
                @endif
                @endforeach

            </div>
        </div>

    </div>

@if($order->payment_status === 'Pending')
<script>
const orderCode = '{{ $order->order_code }}';
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
</script>
@endif

</x-client.profile-layout>