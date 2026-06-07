<x-client.profile-layout active="riwayat">

    <div class="bg-white border border-neutral-100 rounded-2xl p-6 flex flex-col gap-4">

        <h2 class="text-base font-bold text-neutral-800">Riwayat Pesanan</h2>

        {{-- Search --}}
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
        <div class="flex flex-col gap-4">
            @foreach($orders as $order)
            <div class="border border-neutral-100 rounded-2xl overflow-hidden">

                {{-- Order Items --}}
                @foreach($order->items as $item)
                <div class="flex items-center gap-4 p-4 {{ !$loop->last ? 'border-b border-neutral-50' : '' }}">
                    <div class="w-20 h-20 rounded-xl bg-neutral-50 flex items-center justify-center shrink-0 overflow-hidden">
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
                </div>
                @endforeach
                <div class="px-4 pb-2">
                    <p class="text-[11px] text-neutral-400">
                        {{ $order->order_code }}
                    </p>
                </div>
                {{-- Order Footer --}}
                <div class="flex items-center justify-between px-4 py-3 bg-neutral-50">
                    {{-- badge status --}}
                    <div class="flex items-center gap-2">
                        @if($order->payment_status === 'Pending')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-teal-600 bg-teal-50 border border-teal-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-teal-400 inline-block"></span>
                                Admin Memeriksa Pembayaran
                            </span>

                        @elseif($order->payment_status === 'Expired')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-red-600 bg-red-50 border border-red-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>
                                Expired
                            </span>

                        @elseif($order->payment_status === 'Cancelled')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-red-600 bg-red-50 border border-red-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>
                                Pesanan Dibatalkan
                            </span>

                        @elseif($order->status === 'Pending')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-primary-500 bg-primary-50 border border-primary-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary-400 inline-block"></span>
                                Menunggu Proses Produksi
                            </span>

                        @elseif($order->status === 'Diproses')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-yellow-500 bg-yellow-50 border border-yellow-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-400 inline-block"></span>
                                Sedang Diproduksi
                            </span>

                        @elseif($order->status === 'Siap Diambil')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-cyan-500 bg-cyan-50 border border-cyan-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 inline-block"></span>
                                Siap Diambil
                            </span>

                        @elseif($order->status === 'Selesai')

                            <span class="flex items-center gap-1 text-[10px] font-bold text-emerald-500 bg-emerald-50 border border-emerald-200 rounded-full px-2 py-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>
                                Pesanan Selesai
                            </span>

                        @endif
                    </div>
                    <div class="flex items-center gap-3">
                        <p class="text-sm font-extrabold text-neutral-800">Rp{{ number_format($order->total, 0, ',', '.') }}</p>
                        @if($order->status === 'Selesai')
                        <button class="text-xs font-bold bg-neutral-200 text-neutral-500 px-4 py-2 rounded-xl cursor-default">
                            Selesai
                        </button>
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        @endif

    </div>

</x-client.profile-layout>