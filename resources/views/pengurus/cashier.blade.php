@extends('pengurus.layouts.layout-cashier')

@section('title', 'Kasir')

@section('page_title', 'Kasir')

@section('page_breadcrumb', 'Kasir')

@section('content')

    <div class="flex-1 bg-neutral-50 rounded-[16px] flex flex-col overflow-hidden shadow-sm border border-neutral-200">
        <div class="flex flex-col px-[16px] pt-[16px] shrink-0">
            <div class="flex items-center bg-neutral-200 rounded-[8px] px-[9px] py-[11px] mb-[16px] gap-[8px]">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#737373" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
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
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6FF33" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
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
