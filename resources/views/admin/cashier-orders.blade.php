@extends('admin.layouts.layout-cashier')

@section('title', 'Pesanan Bazar')
@section('page_title', 'Pesanan Bazar')
@section('page_breadcrumb', 'Pesanan Bazar')

@section('content')
    @php
        $countSemua = $orders->count();
        $countProses = $orders->where('status', 'Proses')->count();
        $countSelesai = $orders->where('status', 'Selesai')->count();
        $countDibatalkan = $orders->where('status', 'Dibatalkan')->count(); // ← tambah ini
    @endphp

    <div class="flex flex-col gap-[20px] pb-[50px] w-full">

        <div class="flex flex-wrap gap-[12px]" id="filterTabs">
            <button onclick="changeFilter('semua', this)"
                class="tab-btn px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors">
                Semua <span id="countSemua">({{ $countSemua }})</span>
            </button>
            <button onclick="changeFilter('proses', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">
                Proses <span id="countProses">({{ $countProses }})</span>
            </button>
            <button onclick="changeFilter('selesai', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">
                Selesai <span id="countSelesai">({{ $countSelesai }})</span>
            </button>
            <button onclick="changeFilter('dibatalkan', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">
                Dibatalkan <span id="countDibatalkan">({{ $countDibatalkan }})</span>
            </button>
        </div>

        <div id="ordersContainer" class="flex flex-wrap items-start content-start gap-[20px] w-full">

            @forelse ($orders as $order)
                <div class="order-card flex flex-col {{ $order->status == 'Selesai' ? 'bg-white/70' : 'bg-white' }} rounded-[24px] pb-[16px] w-[310px] shrink-0 transition-all duration-300 shadow-sm"
                    data-id="{{ $order->id }}" data-pinned="{{ $order->is_pinned ? 'true' : 'false' }}"
                    data-completed="{{ $order->status == 'Selesai' ? 'true' : 'false' }}"
                    data-status="{{ strtolower($order->status) }}"
                    data-timestamp="{{ \Carbon\Carbon::parse($order->created_at)->timestamp }}">

                    <div
                        class="flex justify-between items-center bg-neutral-200 px-[16px] py-[12px] rounded-t-[24px] mb-[12px]">
                        <div class="flex items-center gap-[12px]">
                            <div class="text-[36px] font-bold leading-[40px] text-black">#{{ $order->id }}</div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[16px] font-bold leading-[24px] text-black truncate max-w-[120px]">{{ $order->customer_name }}</span>
                                <span
                                    class="text-[14px] leading-[20px] text-neutral-700">{{ \Carbon\Carbon::parse($order->created_at)->format('H:i') }}</span>
                            </div>
                        </div>
                        <div class="bg-primary-100 rounded-full px-[8px] py-[3px]">
                            <span
                                class="text-primary-500 text-[10px] font-bold leading-[12px]">{{ (int) \Carbon\Carbon::parse($order->created_at)->diffInMinutes(now()) }}
                                Menit</span>
                        </div>
                    </div>

                    <div class="flex flex-col px-[16px] gap-[8px] flex-1">
                        @foreach ($order->items as $item)
                            <div
                                class="flex items-start gap-[15px] border-b-[0.3px] border-black/20 pb-[8px] last:border-0 last:pb-0">
                                <span
                                    class="text-[20px] font-bold leading-[28px] text-black shrink-0">{{ $item->quantity }}x</span>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[16px] font-bold leading-[24px] text-black">{{ $item->product->name ?? 'Produk' }}</span>
                                    @if ($item->notes)
                                        <span class="text-[12px] leading-[16px] text-neutral-600">Note:
                                            {{ $item->notes }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @if ($order->notes)
                            <div
                                class="mt-[8px] p-[8px_12px] bg-yellow-50 border border-yellow-200 rounded-[10px] flex flex-col gap-0.5">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-amber-700">Catatan
                                    Transaksi:</span>
                                <span class="text-[12px] font-medium text-black leading-tight">{{ $order->notes }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-row items-center gap-[10px] px-[16px] mt-[20px] w-full">
                        <button
                            class="btn-selesai flex-1 h-[48px] {{ $order->status == 'Selesai' ? 'bg-neutral-300 cursor-default' : ($order->status == 'Dibatalkan' ? 'bg-red-100 cursor-default' : 'bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] hover:opacity-90') }} rounded-[16px] flex justify-center items-center gap-[8px] transition-colors"
                            onclick="{{ $order->status == 'Proses' ? 'markDone(this, ' . $order->id . ')' : '' }}"
                            {{ $order->status != 'Proses' ? 'disabled' : '' }}>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="{{ $order->status == 'Selesai' ? '#A87AF2' : ($order->status == 'Dibatalkan' ? '#ef4444' : '#C6FF33') }}"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-selesai">
                                @if ($order->status == 'Dibatalkan')
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                @else
                                    <path d="M20 6L9 17l-5-5"></path>
                                @endif
                            </svg>
                            <span
                                class="text-[16px] font-bold {{ $order->status == 'Selesai' ? 'text-primary-300' : ($order->status == 'Dibatalkan' ? 'text-red-400' : 'text-white') }}">
                                {{ $order->status == 'Selesai' ? 'Selesai' : ($order->status == 'Dibatalkan' ? 'Dibatalkan' : 'Tandai Selesai') }}
                            </span>
                        </button>

                        <button
                            class="btn-pin w-[48px] h-[48px] shrink-0 {{ $order->is_pinned ? 'bg-secondary-500 border-transparent' : 'bg-neutral-50 border-secondary-600' }} shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all {{ $order->status != 'Proses' ? 'hidden' : '' }}"
                            onclick="togglePin(this, {{ $order->id }})">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7D39EB"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-pin">
                                <line x1="12" y1="17" x2="12" y2="22"></line>
                                <path
                                    d="M5 17h14v-1.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.68V6a3 3 0 0 0-3-3h0a3 3 0 0 0-3 3v4.68a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24Z">
                                </path>
                            </svg>
                        </button>
                    </div>

                </div>
            @empty
                <div class="w-full text-center py-10 text-neutral-500 text-[14px]">Belum ada data transaksi masuk.</div>
            @endforelse

        </div>
    </div>
@endsection

@section('footer')
    <script>
        let currentActiveFilter = 'semua';

        document.addEventListener("DOMContentLoaded", function() {
            sortCards();
        });

        function changeFilter(filterType, btnElement) {
            currentActiveFilter = filterType;

            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(btn => {
                btn.className =
                    "tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors";
            });

            btnElement.className =
                "tab-btn px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors";

            applyFilter();
        }

        function applyFilter() {
            const cards = document.querySelectorAll('.order-card');

            cards.forEach(card => {
                const status = card.dataset.status;

                if (currentActiveFilter === 'semua') {
                    card.style.display = 'flex';
                } else {
                    card.style.display = status === currentActiveFilter ? 'flex' : 'none';
                }
            });
        }

        function updateCounterBadges() {
            const cards = document.querySelectorAll('.order-card');
            let totalSemua = cards.length;
            let totalProses = 0;
            let totalSelesai = 0;
            let totalDibatalkan = 0;

            cards.forEach(card => {
                const status = card.dataset.status;
                if (status === 'selesai') totalSelesai++;
                else if (status === 'dibatalkan') totalDibatalkan++;
                else totalProses++;
            });

            document.getElementById('countSemua').innerText = `(${totalSemua})`;
            document.getElementById('countProses').innerText = `(${totalProses})`;
            document.getElementById('countSelesai').innerText = `(${totalSelesai})`;
            document.getElementById('countDibatalkan').innerText = `(${totalDibatalkan})`;
        }

        function togglePin(btn, orderId) {
            const card = btn.closest('.order-card');
            if (card.dataset.completed === 'true') return;

            fetch(`{{ url('/admin/cashier/orders/pin') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: orderId
                })
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    let isPinned = card.dataset.pinned === 'true';
                    isPinned = !isPinned;
                    card.dataset.pinned = isPinned;

                    if (isPinned) {
                        btn.className =
                            "btn-pin w-[48px] h-[48px] shrink-0 bg-secondary-500 border-transparent shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all";
                    } else {
                        btn.className =
                            "btn-pin w-[48px] h-[48px] shrink-0 bg-neutral-50 border border-secondary-600 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all";
                    }

                    sortCards();
                }
            });
        }

        function markDone(btn, orderId) {
            const card = btn.closest('.order-card');
            if (card.dataset.completed === 'true') return;

            fetch(`{{ url('/admin/cashier/orders/done') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: orderId
                })
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    card.dataset.completed = 'true';
                    card.dataset.pinned = 'false';

                    card.className =
                        "order-card flex flex-col bg-white/70 rounded-[24px] pb-[16px] w-[310px] shrink-0 transition-all duration-300 shadow-sm";

                    const pinBtn = card.querySelector('.btn-pin');
                    if (pinBtn) pinBtn.classList.add('hidden');

                    btn.className =
                        "btn-selesai flex-1 h-[48px] bg-neutral-300 cursor-default rounded-[16px] flex justify-center items-center gap-[8px] transition-all";

                    const textSpan = btn.querySelector('.text-selesai');
                    textSpan.className = "text-primary-300 text-[16px] font-bold";
                    textSpan.innerText = 'Selesai';

                    const icon = btn.querySelector('.icon-selesai');
                    icon.setAttribute('stroke', '#A87AF2');

                    sortCards();
                    applyFilter();
                    updateCounterBadges();
                }
            });
        }

        function sortCards() {
            const container = document.getElementById('ordersContainer');
            const cards = Array.from(container.querySelectorAll('.order-card'));

            cards.sort((a, b) => {
                const aStatus = a.dataset.status;
                const bStatus = b.dataset.status;
                const aPinned = a.dataset.pinned === 'true';
                const bPinned = b.dataset.pinned === 'true';
                const aTime = parseInt(a.dataset.timestamp);
                const bTime = parseInt(b.dataset.timestamp);

                // Proses di atas, Selesai & Dibatalkan di bawah
                const aBottom = aStatus === 'selesai' || aStatus === 'dibatalkan';
                const bBottom = bStatus === 'selesai' || bStatus === 'dibatalkan';
                if (aBottom !== bBottom) return aBottom ? 1 : -1;

                // Pin di atas dalam grup yang sama
                if (aPinned !== bPinned) return aPinned ? -1 : 1;

                return aTime - bTime;
            });

            cards.forEach(card => container.appendChild(card));
        }
    </script>
@endsection
