<x-client.profile-layout active="riwayat">

    <div class="flex flex-col gap-3">

        {{-- Header --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-5 flex items-center justify-between">
            <div>
                <p class="text-xs text-neutral-400">Kode Pesanan</p>
                <p class="text-sm font-bold text-neutral-800">{{ $order->order_code }}</p>
            </div>
            <span class="text-xs font-bold px-3 py-1 rounded-full
                {{ $order->payment_status === 'Paid' ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 
                   ($order->payment_status === 'Pending' ? 'bg-yellow-50 text-yellow-600 border border-yellow-200' : 
                   'bg-red-50 text-red-500 border border-red-200') }}">
                {{ $order->payment_status }}
            </span>
        </div>

        {{-- QR kalau belum bayar --}}
        @if($qrUrl)
        <div class="bg-white border border-neutral-100 rounded-2xl p-5 flex flex-col items-center gap-3">
            <p class="text-sm font-bold text-neutral-800">Selesaikan Pembayaran</p>
            <img src="{{ $qrUrl }}" class="w-48 h-48 object-contain">
            <p class="text-xs text-neutral-400 text-center">Scan QR ini untuk menyelesaikan pembayaran</p>
        </div>
        @endif

        {{-- Items --}}
        <div class="bg-white border border-neutral-100 rounded-2xl overflow-hidden">
            @foreach($order->items as $item)
            <div class="flex items-center gap-4 p-4 {{ !$loop->last ? 'border-b border-neutral-50' : '' }}">
                <div class="w-16 h-16 rounded-xl bg-neutral-50 flex items-center justify-center shrink-0 overflow-hidden">
                    <img
                        src="{{ $item->product->images->first()
                            ? asset('storage/' . $item->product->images->first()->image_path)
                            : asset('assets/images/placeholder.png') }}"
                        class="w-full h-full object-contain"
                    >
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-neutral-800">{{ $item->product->name }}</p>
                    <p class="text-xs text-neutral-400">Variasi: {{ $item->variant->variant_value ?? '-' }}</p>
                    <p class="text-xs text-neutral-400">Jumlah: {{ $item->quantity }}</p>
                </div>
                <p class="text-sm font-bold text-primary-500">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>

        {{-- Ringkasan --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-5 flex flex-col gap-2">
            <p class="text-sm font-bold text-neutral-800 mb-1">Ringkasan Pembayaran</p>
            <div class="flex justify-between text-xs text-neutral-600">
                <span>Subtotal</span>
                <span>Rp{{ number_format($order->subtotal, 0, ',', '.') }}</span>
            </div>
            @if($order->discount > 0)
            <div class="flex justify-between text-xs text-red-500">
                <span>Diskon</span>
                <span>-Rp{{ number_format($order->discount, 0, ',', '.') }}</span>
            </div>
            @endif
            <div class="flex justify-between text-sm font-bold text-neutral-800 border-t border-neutral-100 pt-2 mt-1">
                <span>Total</span>
                <span class="text-primary-500">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

        {{-- Timeline Status --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-5 flex flex-col gap-4">
            <p class="text-sm font-bold text-neutral-800">Status Pesanan</p>
            <div class="flex flex-col gap-3">

                @php
                    $statuses = [
                        ['label' => 'Pesanan Dibuat', 'key' => 'created', 'done' => true],
                        ['label' => 'Menunggu Pembayaran', 'key' => 'pending', 'done' => in_array($order->payment_status, ['Pending', 'Paid'])],
                        ['label' => 'Pembayaran Dikonfirmasi', 'key' => 'paid', 'done' => $order->payment_status === 'Paid'],
                        ['label' => 'Pesanan Diproses', 'key' => 'processing', 'done' => in_array($order->status, ['Diproses', 'Selesai'])],
                        ['label' => 'Selesai', 'key' => 'done', 'done' => $order->status === 'Selesai'],
                    ];
                @endphp

                @foreach($statuses as $status)
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 rounded-full flex items-center justify-center shrink-0
                        {{ $status['done'] ? 'bg-primary-500' : 'bg-neutral-200' }}">
                        @if($status['done'])
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        @endif
                    </div>
                    <p class="text-xs {{ $status['done'] ? 'font-semibold text-neutral-800' : 'text-neutral-400' }}">
                        {{ $status['label'] }}
                    </p>
                </div>
                @if(!$loop->last)
                <div class="w-0.5 h-4 {{ $status['done'] ? 'bg-primary-300' : 'bg-neutral-100' }} ml-2.5"></div>
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
        })
        .catch(() => {});
}, 5000);
</script>
@endif
</x-client.profile-layout>