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
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
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
                            <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">09.30
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
