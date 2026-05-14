@extends('pengurus.layouts.layout-cashier')

@section('title', 'Rekap Bazar')

@section('page_title', 'Rekap Bazar')

@section('page_breadcrumb', 'Rekap Bazar')

@section('content')
    <div class="flex flex-col gap-[24px] pb-[40px] w-full">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center w-full gap-[16px]">

            <div class="flex flex-wrap gap-[12px]">
                <button
                    class="px-[16px] py-[8px] bg-[#7D39EB] shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors">
                    Hari ini
                </button>
                <button
                    class="px-[16px] py-[8px] bg-[#E5E5E5] rounded-full text-[#404040] text-[14px] font-bold hover:bg-[#d4d4d4] transition-colors cursor-pointer">
                    7 hari
                </button>
                <button
                    class="px-[16px] py-[8px] bg-[#E5E5E5] rounded-full text-[#404040] text-[14px] font-bold hover:bg-[#d4d4d4] transition-colors cursor-pointer">
                    1 bulan
                </button>
                <button
                    class="px-[16px] py-[8px] bg-[#E5E5E5] rounded-full text-[#404040] text-[14px] font-bold hover:bg-[#d4d4d4] transition-colors cursor-pointer">
                    Pilih tanggal
                </button>
            </div>

            <div class="flex items-center gap-[12px]">
                <button
                    class="w-[36px] h-[36px] flex justify-center items-center hover:bg-gray-200 rounded-full transition-colors cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="text-[18px] text-black min-w-[150px] text-center">
                    <span class="font-bold">
                        Rabu
                    </span>
                    <span>
                        13/05/2026
                    </span>
                </div>

                <button
                    class="w-[36px] h-[36px] flex justify-center items-center hover:bg-gray-200 rounded-full transition-colors cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[16px] w-full">

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-primary-100 opacity-80 rounded-bl-[100%] z-0"></div>
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
                                    class="w-[36px] h-[36px] mx-auto bg-neutral-50 border border-primary-500 rounded-[12px] shadow-[0_2px_4px_rgba(62,52,69,0.25)] flex justify-center items-center hover:bg-primary-500 hover:text-white text-primary-500 transition-colors group cursor-pointer"
                                    onclick="openModal('modalDetailPesanan')">
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
                                    class="w-[36px] h-[36px] mx-auto bg-neutral-50 border border-primary-500 rounded-[12px] shadow-[0_2px_4px_rgba(62,52,69,0.25)] flex justify-center items-center hover:bg-primary-500 hover:text-white text-primary-500 transition-colors group cursor-pointer"
                                    onclick="openModal('modalDetailPesanan')">
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
    <!-- MODAL DETAIL PESANAN / STRUK KASIR -->
    <div id="modalDetailPesanan" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-[#FAFAFA] w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col items-center gap-[20px]">

            <!-- Receipt Box (Same as Modal 5) -->
            <div class="bg-[#F5F5F5] rounded-[12px] p-[28px_20px] flex flex-col gap-[8px] w-full">
                <div class="flex flex-col items-center gap-[4px] w-full pb-[16px] border-b-[0.2px] border-black">
                    <span class="font-['Carattere'] text-[32px] text-[#7D39EB] text-center leading-[1] italic">Rekaps
                        Store</span>
                    <span class="font-['Montserrat'] text-[12px] font-normal text-[#737373] text-center">DEPARTEMEN EKONOMI
                        KREATIF</span>
                    <div class="flex items-center gap-[12px]">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-[#737373]">@himarpl</span>
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-[#737373]">@rekaps.store</span>
                    </div>
                </div>

                <!-- Details Table -->
                <div class="flex flex-col gap-[4px] w-full py-[10px] border-b-[0.2px] border-dashed border-black">
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">No.Transaksi</span>
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">#TRX-0342</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">Kasir</span>
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">Admin Ekraf</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">Waktu</span>
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">3/4/2026, 09.04.00</span>
                    </div>
                </div>

                <!-- Items -->
                <div class="flex flex-col gap-[4px] w-full py-[10px] border-b-[0.2px] border-dashed border-black">
                    <div class="flex flex-col w-full pb-[8px]">
                        <div class="flex justify-between items-center w-full">
                            <span class="font-['Montserrat'] text-[12px] font-medium text-black">Basrenggg</span>
                            <span class="font-['Montserrat'] text-[12px] font-normal text-black">Rp 5.000 x 1</span>
                            <span class="font-['Montserrat'] text-[12px] font-bold text-black text-right min-w-[60px]">Rp
                                5.000</span>
                        </div>
                        <span class="font-['Montserrat'] text-[10px] font-normal text-black">Catatan: pedesnya sedeng
                            dikit</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between items-center w-full">
                            <span class="font-['Montserrat'] text-[12px] font-medium text-black">Basrenggg</span>
                            <span class="font-['Montserrat'] text-[12px] font-normal text-black">Rp 5.000 x 1</span>
                            <span class="font-['Montserrat'] text-[12px] font-bold text-black text-right min-w-[60px]">Rp
                                5.000</span>
                        </div>
                        <span class="font-['Montserrat'] text-[10px] font-normal text-black">Catatan: pedesnya sedeng
                            dikit</span>
                    </div>
                </div>

                <!-- Total Calculation -->
                <div class="flex flex-col gap-[4px] w-full py-[10px] border-b-[0.2px] border-black">
                    <div class="flex justify-between items-center w-full mb-[4px]">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Catatan Transaksi</span>
                        <span class="font-['Montserrat'] text-[12px] font-normal text-black">Nitip dulu barangnya</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Total pesanan</span>
                        <span class="font-['Montserrat'] text-[12px] font-bold text-black">Rp 10.000</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Diskon</span>
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">—</span>
                    </div>
                </div>

                <div class="flex justify-between items-center w-full pt-[8px]">
                    <span class="font-['Montserrat'] text-[14px] font-bold text-black">Total</span>
                    <span class="font-['Montserrat'] text-[14px] font-bold text-[#7D39EB]">Rp 10.000</span>
                </div>
                <div class="flex justify-between items-center w-full mt-[4px]">
                    <span class="font-['Montserrat'] text-[12px] font-medium text-black">Metode Bayar</span>
                    <span class="font-['Montserrat'] text-[12px] font-medium text-black">QRIS</span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-[12px] w-full mt-[10px]">
                <button
                    class="flex-1 h-[48px] bg-[#FAFAFA] border border-[#7D39EB] shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-[#7D39EB] flex justify-center items-center hover:bg-[#7D39EB] hover:text-white transition-colors cursor-pointer"
                    onclick="closeModal('modalDetailPesanan')">Kembali</button>
                <button
                    class="flex-1 h-[48px] bg-[#7D39EB] shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-white flex justify-center items-center gap-[8px] hover:opacity-90 transition-opacity cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Cetak Struk
                </button>
            </div>
        </div>
    </div>

    <script>
        /* ---- Modal Scripts ---- */

        // Fungsi untuk membuka modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            }
        }

        // Fungsi untuk menutup modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            }
        }
    </script>
@endsection
