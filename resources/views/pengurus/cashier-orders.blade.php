@extends('pengurus.layouts.layout-cashier')

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

@extends('pengurus.layouts.layout-cashier')

@section('title', 'Kasir')

@section('page_title', 'Kasir')

@section('page_breadcrumb', 'Kasir')

@section('content')

    <div class="flex-1 bg-neutral-50 rounded-[16px] flex flex-col overflow-hidden shadow-sm border border-neutral-200">
        <div class="flex flex-col px-[16px] pt-[16px] shrink-0">
            <div class="flex items-center bg-neutral-200 rounded-[8px] px-[9px] py-[11px] mb-[16px] gap-[8px]">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#737373"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Cari..."
                    class="bg-transparent border-none outline-none text-[12px] w-full text-[#000] placeholder:text-neutral-500">
            </div>
            <div class="flex overflow-x-auto pos-scroll gap-[12px] pb-[16px] border-b border-black/10">
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold shrink-0">Semua
                    (9)</button>
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">Merchandise
                    (4)</button>
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">Makanan
                    (3)</button>
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">Jasa
                    (2)</button>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pos-scroll p-[16px]">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-[16px]">

                <div
                    class="bg-neutral-50 border border-neutral-200 rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="w-full h-[150px] bg-neutral-100 relative flex justify-center items-center overflow-hidden">
                        <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                            class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="flex flex-col p-[12px] gap-[8px]">
                        <div class="flex flex-col">
                            <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Basrengggg
                            </h3>
                            <span class="text-[18px] font-bold text-primary-500">Rp5.000</span>
                            <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 50</span>
                        </div>
                        <button
                            class="w-full bg-neutral-50 border border-primary-500 text-primary-500 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-white transition-colors">
                            Tambah
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div
        class="w-full lg:w-[357px] min-[900px]:w-[360px] bg-neutral-950 rounded-[16px] p-[16px] flex flex-col text-white shadow-xl h-full min-h-0 shrink-0">

        <div class="flex flex-col gap-[16px] pb-[16px] border-b border-white/20 shrink-0">
            <div class="flex flex-col gap-[4px]">
                <div class="flex items-center gap-[8px]">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <h2 class="text-[18px] font-extrabold text-white m-0">Keranjang</h2>
                </div>
                <span class="text-[12px] text-neutral-300">1 Item - Klik produk untuk menambah</span>
            </div>

            <div class="bg-neutral-950 border border-secondary-500 rounded-[10px] px-[15px] py-[10px] flex items-center">
                <input type="text" placeholder="Nama pembeli (opsional)"
                    class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-[#525252]">
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pos-scroll py-[16px] flex flex-col gap-[12px]">

            <div class="border border-neutral-50 rounded-[12px] p-[12px] flex flex-col gap-[10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-[10px] items-center">
                        <div
                            class="w-[45px] h-[45px] bg-neutral-100 rounded-[8px] flex items-center justify-center overflow-hidden shrink-0">
                            <img src="{{ asset('assets/img/products/poster-jersey.png') }}"
                                class="h-[40px] object-contain" />
                        </div>
                        <div class="flex flex-col justify-center gap-[2px]">
                            <span class="text-[12px] font-medium text-white leading-none">Basrengggg</span>
                            <span class="text-[12px] font-bold text-white leading-none">Rp5.000</span>
                            <span
                                class="text-[10px] font-bold text-primary-500 cursor-pointer hover:underline mt-[2px]">Tambah
                                catatan</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-[12px]">
                        <button
                            class="w-[30px] h-[26px] border border-primary-500 rounded-[6px] text-secondary-500 flex items-center justify-center text-[16px] font-medium hover:bg-primary-500/20">-</button>
                        <span class="text-[12px] font-medium text-white w-[10px] text-center">1</span>
                        <button
                            class="w-[30px] h-[26px] border border-primary-500 rounded-[6px] text-secondary-500 flex items-center justify-center text-[16px] font-medium hover:bg-primary-500/20">+</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col pt-[16px] gap-[16px] border-t border-[#333] shrink-0">

            <div class="flex flex-col gap-[8px]">
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Subtotal</span>
                    <span>Rp10.000</span>
                </div>
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Diskon</span>
                    <span>—</span>
                </div>
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Voucher</span>
                    <span class="text-primary-500 font-bold cursor-pointer hover:underline">+ Masukkan
                        kode</span>
                </div>
                <div class="flex justify-between items-center mt-[4px]">
                    <span class="text-[16px] font-extrabold text-neutral-300">Total</span>
                    <span class="text-[16px] font-extrabold text-secondary-500" id="totalTagihan">Rp10.000</span>
                </div>
            </div>

            <div class="flex flex-col gap-[10px]">

                <div class="flex gap-[9px]">
                    <button id="btnTunai" onclick="switchMethod('tunai')"
                        class="flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors">
                        Tunai
                    </button>
                    <button id="btnQris" onclick="switchMethod('qris')"
                        class="flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors">
                        QRIS
                    </button>
                </div>

                <div id="areaTunai" class="flex flex-col gap-[10px]">
                    <div class="bg-neutral-950 border border-secondary-500 rounded-[10px] px-[15px] py-[10px]">
                        <input type="number" id="inputUang" oninput="hitungKembalian(); clearActiveNominal()"
                            placeholder="Uang diterima..."
                            class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-[#525252]">
                    </div>

                    <div class="flex gap-[7px] overflow-x-auto pos-scroll pb-[4px]">
                        <button onclick="setNominal(2000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">2rb</button>
                        <button onclick="setNominal(5000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">5rb</button>
                        <button onclick="setNominal(10000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">10rb</button>
                        <button onclick="setNominal(20000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">20rb</button>
                        <button onclick="setNominal(50000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">50rb</button>
                        <button onclick="setNominal(100000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">100rb</button>
                    </div>

                    <div id="teksKembalian" class="text-[12px] font-semibold text-secondary-500 mt-[2px]">
                        Kembalian: Rp 0
                    </div>
                </div>

                <button
                    class="w-full bg-secondary-500 text-black shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] py-[12px] text-[16px] font-extrabold hover:bg-[#b0eb1e] transition-colors mt-[4px]">
                    Proses Pembayaran
                </button>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        // Simulasi total harga di keranjang
        const TOTAL_HARGA = 10000;
        let currentMethod = 'tunai';


        /* ---- Switch Payment Method ---- */
        function switchMethod(method) {
            currentMethod = method;
            const btnTunai = document.getElementById('btnTunai');
            const btnQris = document.getElementById('btnQris');
            const areaTunai = document.getElementById('areaTunai');

            if (method === 'tunai') {
                // Style Aktif untuk Tunai
                btnTunai.className =
                    "flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";
                // Style Pasif untuk QRIS
                btnQris.className =
                    "flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";

                // Munculkan input uang & kembalian
                areaTunai.classList.remove('hidden');
                areaTunai.classList.add('flex');
            } else {
                // Style Aktif untuk QRIS
                btnQris.className =
                    "flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";
                // Style Pasif untuk Tunai
                btnTunai.className =
                    "flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";

                // Sembunyikan input uang & kembalian
                areaTunai.classList.add('hidden');
                areaTunai.classList.remove('flex');
            }
        }

        /* ---- Set Cepat Nominal Uang ---- */
        function setNominal(amount, btnElement) {
            // Masukkan value ke input
            document.getElementById('inputUang').value = amount;

            // Hitung ulang kembalian
            hitungKembalian();

            // Reset semua tombol nominal agar tidak aktif
            const buttons = document.querySelectorAll('.btn-nominal');
            buttons.forEach(btn => {
                btn.className =
                    "btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent";
            });

            // Jadikan tombol yang di-klik aktif (Garis & Text Lime)
            btnElement.className =
                "btn-nominal px-[12px] py-[6px] bg-[#292524] border border-secondary-500 text-secondary-500 rounded-full text-[10px] font-bold shrink-0";
        }

        /* ---- Hitung Kembalian Otomatis ---- */
        function hitungKembalian() {
            const inputVal = parseInt(document.getElementById('inputUang').value) || 0;
            const kembalian = inputVal - TOTAL_HARGA;
            const tampilKembalian = kembalian > 0 ? kembalian : 0; // Jika minus, biarkan 0

            document.getElementById('teksKembalian').innerText = 'Kembalian: Rp ' + tampilKembalian.toLocaleString('id-ID');
        }

        /* ---- Hapus status aktif tombol nominal jika user ngetik manual ---- */
        function clearActiveNominal() {
            const buttons = document.querySelectorAll('.btn-nominal');
            buttons.forEach(btn => {
                btn.className =
                    "btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent";
            });
        }
    </script>
@endsection

@extends('pengurus.layouts.layout-cashier')

@section('title', 'Rekap Bazar')

@section('page_title', 'Rekap Bazar')

@section('page_breadcrumb', 'Rekap Bazar')

@section('content')
    <div class="flex flex-col gap-[24px] pb-[40px] w-full">

        <div class="flex justify-between items-center w-full gap-[16px]">
            <h1 class="text-[20px] md:text-[24px] font-bold text-black leading-none">Rekap Hari Ini</h1>
            <button
                class="flex items-center gap-[6px] px-[16px] py-[8px] rounded-[12px] shadow-sm hover:opacity-90 transition-opacity shrink-0"
                style="background: conic-gradient(from 160.29deg at 84% -40%, #951806 0deg, #FE6E4C 360deg);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span class="text-[12px] font-semibold text-white">Reset Data</span>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[16px] w-full">

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-primary-100 opacity-80 rounded-bl-[100%] z-0">
                </div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">TOTAL PENJUALAN</span>
                    <div class="flex items-end gap-[4px]">
                        <span class="text-[12px] font-bold text-black mb-[4px]">Rp</span>
                        <span class="text-[24px] font-black text-black leading-none">14.5jt</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px] ml-[4px]">dari transaksi
                            selesai</span>
                    </div>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-secondary-200 opacity-80 rounded-bl-[100%] z-0">
                </div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">TRANSAKSI</span>
                    <div class="flex items-end gap-[6px]">
                        <span class="text-[24px] font-black text-black leading-none">45</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px]">pesanan dibayar</span>
                    </div>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-[#FFC9C9] opacity-80 rounded-bl-[100%] z-0"></div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">ITEM TERJUAL</span>
                    <div class="flex items-end gap-[6px]">
                        <span class="text-[24px] font-black text-black leading-none">120</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px]">total item</span>
                    </div>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-[#FEE685] opacity-80 rounded-bl-[100%] z-0"></div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">RATA-RATA</span>
                    <div class="flex items-end gap-[4px]">
                        <span class="text-[12px] font-bold text-black mb-[4px]">Rp</span>
                        <span class="text-[24px] font-black text-black leading-none">322rb</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px] ml-[4px]">per transaksi</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex items-center gap-[20px] w-full mt-[10px]">
            <h2 class="text-[18px] font-bold text-black whitespace-nowrap m-0">Top Item Terlaris</h2>
            <div class="h-[0.3px] bg-black flex-1"></div>
        </div>

        <div class="flex overflow-x-auto pos-scroll gap-[16px] pb-[12px] w-full">

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px_20px] flex items-center gap-[20px] min-w-[260px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)] shrink-0">
                <div class="absolute right-0 top-0 w-[75px] h-[79px] bg-primary-100 opacity-[0.15] rounded-bl-[100%] z-0">
                </div>
                <span class="text-[36px] font-bold text-[#EFB100] leading-none z-10">#1</span>
                <div class="flex flex-col z-10 gap-[2px]">
                    <span class="text-[16px] font-bold text-black leading-tight">Roti kukus thailand</span>
                    <span class="text-[14px] font-bold text-primary-500 leading-tight">10 terjual - Rp 30.000</span>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px_20px] flex items-center gap-[20px] min-w-[260px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)] shrink-0">
                <div class="absolute right-0 top-0 w-[75px] h-[79px] bg-primary-100 opacity-[0.15] rounded-bl-[100%] z-0">
                </div>
                <span class="text-[36px] font-bold text-[#94A3B8] leading-none z-10">#2</span>
                <div class="flex flex-col z-10 gap-[2px]">
                    <span class="text-[16px] font-bold text-black leading-tight">Basrenggg Pedes</span>
                    <span class="text-[14px] font-bold text-primary-500 leading-tight">8 terjual - Rp 40.000</span>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px_20px] flex items-center gap-[20px] min-w-[260px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)] shrink-0">
                <div class="absolute right-0 top-0 w-[75px] h-[79px] bg-primary-100 opacity-[0.15] rounded-bl-[100%] z-0">
                </div>
                <span class="text-[36px] font-bold text-[#B45309] leading-none z-10">#3</span>
                <div class="flex flex-col z-10 gap-[2px]">
                    <span class="text-[16px] font-bold text-black leading-tight">Jersey RPL Pink</span>
                    <span class="text-[14px] font-bold text-primary-500 leading-tight">5 terjual - Rp 600.000</span>
                </div>
            </div>

        </div>

        <div class="flex items-center gap-[20px] w-full mt-[10px]">
            <h2 class="text-[18px] font-bold text-black whitespace-nowrap m-0">Riwayat Transaksi</h2>
            <div class="h-[0.3px] bg-black flex-1"></div>
        </div>

        <div class="w-full bg-white rounded-[16px] shadow-[0_0_8px_rgba(0,0,0,0.15)] overflow-hidden flex flex-col">
            <div class="w-full overflow-x-auto pos-scroll">
                <table class="w-full min-w-[1000px] text-left border-collapse">
                    <thead>
                        <tr class="bg-neutral-50 border-b-[0.2px] border-neutral-600">
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                ID Transaksi</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Waktu</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Nama Pelanggan</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Metode</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Total Belanja</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Nominal Uang</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Status</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="border-b-[0.1px] border-neutral-700 hover:bg-neutral-50 transition-colors">
                            <td class="py-[16px] px-[16px] text-[12px] font-bold text-primary-500 whitespace-nowrap">
                                #TRX-001
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">
                                09.30
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">Umum
                            </td>
                            <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                <span
                                    class="inline-flex justify-center items-center px-[10px] py-[4px] bg-primary-100 rounded-full text-[10px] font-bold text-primary-500">QRIS</span>
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-bold text-black whitespace-nowrap">Rp 120.000
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-bold text-black whitespace-nowrap">Rp 120.000
                            </td>
                            <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                <span
                                    class="inline-flex justify-center items-center px-[10px] py-[4px] bg-secondary-200 bg-opacity-40 rounded-full text-[10px] font-bold text-secondary-700">Selesai</span>
                            </td>
                            <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                <button
                                    class="w-[36px] h-[36px] mx-auto bg-neutral-50 border border-primary-500 rounded-[12px] shadow-[0_2px_4px_rgba(62,52,69,0.25)] flex justify-center items-center hover:bg-primary-500 hover:text-white text-primary-500 transition-colors group">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr class="border-b-[0.1px] border-neutral-700 hover:bg-neutral-50 transition-colors">
                            <td class="py-[16px] px-[16px] text-[12px] font-bold text-primary-500 whitespace-nowrap">
                                #TRX-002
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">
                                09.35
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">Agus
                            </td>
                            <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                <span
                                    class="inline-flex justify-center items-center px-[10px] py-[4px] bg-[#FEF3C6] rounded-full text-[10px] font-bold text-[#EFB100]">Tunai</span>
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-bold text-black whitespace-nowrap">Rp 50.000
                            </td>
                            <td class="py-[16px] px-[16px] text-[12px] font-bold text-black whitespace-nowrap">Rp 100.000
                            </td>
                            <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                <span
                                    class="inline-flex justify-center items-center px-[10px] py-[4px] bg-[#FEF3C6] rounded-full text-[10px] font-bold text-[#EFB100]">Proses</span>
                            </td>
                            <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                <button
                                    class="w-[36px] h-[36px] mx-auto bg-neutral-50 border border-primary-500 rounded-[12px] shadow-[0_2px_4px_rgba(62,52,69,0.25)] flex justify-center items-center hover:bg-primary-500 hover:text-white text-primary-500 transition-colors group">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('footer')
    <script></script>
@endsection
