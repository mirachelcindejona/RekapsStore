@extends('admin.layouts.layout-cashier')

@section('title', 'Pesanan Bazar')

@section('page_title', 'Pesanan Bazar')

@section('page_breadcrumb', 'Pesanan Bazar')

@section('content')
    <div class="flex flex-col gap-[20px] pb-[50px] w-full">

        <div class="flex flex-wrap gap-[12px]" id="filterTabs">
            <button onclick="changeFilter('semua', this)"
                class="tab-btn px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors">Semua</button>
            <button onclick="changeFilter('proses', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">Proses</button>
            <button onclick="changeFilter('selesai', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">Selesai</button>
        </div>

        <div id="ordersContainer" class="flex flex-wrap items-start content-start gap-[20px] w-full">

            <div class="order-card flex flex-col bg-white rounded-[24px] pb-[16px] w-[310px] shrink-0 transition-all duration-300 shadow-sm"
                data-id="1" data-pinned="false" data-completed="false" data-pin-time="0" data-original-order="1">

                <div
                    class="flex justify-between items-center bg-neutral-200 px-[16px] py-[12px] rounded-t-[24px] mb-[12px]">
                    <div class="flex items-center gap-[12px]">
                        <div class="text-[36px] font-bold leading-[40px] text-black">#1</div>
                        <div class="flex flex-col">
                            <span class="text-[16px] font-bold leading-[24px] text-black">Umum</span>
                            <span class="text-[14px] leading-[20px] text-neutral-700">09.30</span>
                        </div>
                    </div>
                    <div class="bg-primary-100 rounded-full px-[8px] py-[3px]">
                        <span class="text-primary-500 text-[10px] font-bold leading-[12px]">15 Menit</span>
                    </div>
                </div>

                <div class="flex flex-col px-[16px] gap-[8px] flex-1">
                    <div class="flex items-start gap-[30px] border-b-[0.3px] border-black pb-[8px]">
                        <span class="text-[20px] font-bold leading-[28px] text-black">1x</span>
                        <div class="flex flex-col">
                            <span class="text-[16px] font-bold leading-[24px] text-black">Roti kukus thailand</span>
                            <span class="text-[12px] leading-[16px] text-black">Catatan: jangan pedes</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-[30px] border-b-[0.3px] border-black pb-[8px]">
                        <span class="text-[20px] font-bold leading-[28px] text-black">5x</span>
                        <div class="flex flex-col">
                            <span class="text-[16px] font-bold leading-[24px] text-black">Basrenggg</span>
                            <span class="text-[12px] leading-[16px] text-black">Catatan: pedesnya sedeng</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row items-center gap-[10px] px-[16px] mt-[20px] w-full">
                    <button
                        class="btn-selesai flex-1 h-[48px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-[16px] flex justify-center items-center gap-[8px] transition-colors"
                        onclick="markDone(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-selesai">
                            <path d="M20 6L9 17l-5-5"></path>
                        </svg>
                        <span class="text-white text-[16px] font-bold text-selesai">Tandai Selesai</span>
                    </button>
                    <button
                        class="btn-pin w-[48px] h-[48px] shrink-0 bg-neutral-50 border border-secondary-600 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all"
                        onclick="togglePin(this)">
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

            <div class="order-card flex flex-col bg-white rounded-[24px] pb-[16px] w-[310px] shrink-0 transition-all duration-300 shadow-sm"
                data-id="2" data-pinned="false" data-completed="false" data-pin-time="0" data-original-order="2">

                <div
                    class="flex justify-between items-center bg-neutral-200 px-[16px] py-[12px] rounded-t-[24px] mb-[12px]">
                    <div class="flex items-center gap-[12px]">
                        <div class="text-[36px] font-bold leading-[40px] text-black">#2</div>
                        <div class="flex flex-col">
                            <span class="text-[16px] font-bold leading-[24px] text-black">Umum</span>
                            <span class="text-[14px] leading-[20px] text-neutral-700">09.35</span>
                        </div>
                    </div>
                    <div class="bg-primary-100 rounded-full px-[8px] py-[3px]">
                        <span class="text-primary-500 text-[10px] font-bold leading-[12px]">2 Menit</span>
                    </div>
                </div>

                <div class="flex flex-col px-[16px] gap-[8px] flex-1">
                    <div class="flex items-start gap-[30px] border-b-[0.3px] border-black pb-[8px]">
                        <span class="text-[20px] font-bold leading-[28px] text-black">2x</span>
                        <div class="flex flex-col">
                            <span class="text-[16px] font-bold leading-[24px] text-black">Jersey RPL Pink</span>
                            <span class="text-[12px] leading-[16px] text-black">Ukuran L</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row items-center gap-[10px] px-[16px] mt-[20px] w-full">
                    <button
                        class="btn-selesai flex-1 h-[48px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-[16px] flex justify-center items-center gap-[8px] transition-colors"
                        onclick="markDone(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-selesai">
                            <path d="M20 6L9 17l-5-5"></path>
                        </svg>
                        <span class="text-white text-[16px] font-bold text-selesai">Tandai Selesai</span>
                    </button>
                    <button
                        class="btn-pin w-[48px] h-[48px] shrink-0 bg-neutral-50 border border-secondary-600 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all"
                        onclick="togglePin(this)">
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

        </div>
    </div>
@endsection

@section('footer')
    <script>
        // Menyimpan state filter saat ini
        let currentActiveFilter = 'semua';

        /* ==== FUNGSI FILTER TABS ==== */
        function changeFilter(filterType, btnElement) {
            currentActiveFilter = filterType;

            // Reset styling semua tombol tab
            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(btn => {
                btn.className =
                    "tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors";
            });

            // Terapkan styling ungu ke tombol yang diklik
            btnElement.className =
                "tab-btn px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors";

            // Jalankan eksekusi filternya
            applyFilter();
        }

        function applyFilter() {
            const cards = document.querySelectorAll('.order-card');

            cards.forEach(card => {
                const isCompleted = card.dataset.completed === 'true';

                if (currentActiveFilter === 'semua') {
                    card.style.display = 'flex'; // Munculkan semua
                } else if (currentActiveFilter === 'proses') {
                    // Munculkan hanya jika belum selesai
                    card.style.display = isCompleted ? 'none' : 'flex';
                } else if (currentActiveFilter === 'selesai') {
                    // Munculkan hanya jika sudah selesai
                    card.style.display = isCompleted ? 'flex' : 'none';
                }
            });
        }

        /* ==== FUNGSI PIN KARTU ==== */
        function togglePin(btn) {
            const card = btn.closest('.order-card');

            if (card.dataset.completed === 'true') return;

            let isPinned = card.dataset.pinned === 'true';
            isPinned = !isPinned;
            card.dataset.pinned = isPinned;

            if (isPinned) {
                btn.classList.remove('bg-neutral-50', 'border-secondary-600');
                btn.classList.add('bg-secondary-500', 'border-transparent');
                card.dataset.pinTime = Date.now();
            } else {
                btn.classList.remove('bg-secondary-500', 'border-transparent');
                btn.classList.add('bg-neutral-50', 'border-secondary-600');
                card.dataset.pinTime = '0';
            }

            sortCards();
        }

        /* ==== FUNGSI TANDAI SELESAI ==== */
        function markDone(btn) {
            const card = btn.closest('.order-card');
            if (card.dataset.completed === 'true') return;

            card.dataset.completed = 'true';
            card.dataset.pinned = 'false';
            card.dataset.pinTime = '0';

            card.classList.remove('bg-white');
            card.classList.add('bg-white/70');

            const pinBtn = card.querySelector('.btn-pin');
            pinBtn.classList.add('hidden');

            btn.classList.remove('bg-primary-500', 'shadow-[0_0_8px_rgba(114,52,214,0.35)]');
            btn.classList.add('bg-neutral-300', 'cursor-default');

            const textSpan = btn.querySelector('.text-selesai');
            textSpan.classList.remove('text-white');
            textSpan.classList.add('text-primary-300');
            textSpan.innerText = 'Selesai';

            const icon = btn.querySelector('.icon-selesai');
            icon.setAttribute('stroke', '#A87AF2');

            sortCards();

            // Panggil applyFilter agar kartu hilang dari layar jika user sedang berada di tab "Proses"
            applyFilter();
        }

        /* ==== FUNGSI PENGURUTAN ==== */
        function sortCards() {
            const container = document.getElementById('ordersContainer');
            const cards = Array.from(container.querySelectorAll('.order-card'));

            cards.sort((a, b) => {
                const aDone = a.dataset.completed === 'true';
                const bDone = b.dataset.completed === 'true';
                const aPinned = a.dataset.pinned === 'true';
                const bPinned = b.dataset.pinned === 'true';
                const aTime = parseInt(a.dataset.pinTime);
                const bTime = parseInt(b.dataset.pinTime);
                const aOrig = parseInt(a.dataset.originalOrder);
                const bOrig = parseInt(b.dataset.originalOrder);

                if (aDone !== bDone) return aDone ? 1 : -1;
                if (aPinned && !bPinned) return -1;
                if (!aPinned && bPinned) return 1;
                if (aPinned && bPinned) return aTime - bTime;

                return aOrig - bOrig;
            });

            cards.forEach(card => container.appendChild(card));
        }
    </script>
@endsection
