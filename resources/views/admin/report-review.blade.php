@extends('admin.layouts.layout')

@section('title', 'Laporan Review Pengguna')

@section('page_title', 'Laporan & Rekap')

@section('page_breadcrumb', 'Laporan Review Pengguna')

@section('content')

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-[20px] flex-wrap gap-[12px]">

        <div class="flex items-center gap-[14px] mb-[24px]">

            <a href="{{ url('/admin/reports') }}"
                class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50">

                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">

                    <path d="M19 12H5M12 19l-7-7 7-7" />

                </svg>

            </a>

            <h1 class="text-[20px] font-bold text-neutral-900 m-0">
                Laporan Review Pengguna
            </h1>

        </div>

        <div class="flex items-center gap-[12px]">

            <button
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl border border-primary-500 text-primary-500 bg-neutral-50 font-bold text-[13px] cursor-pointer transition-all duration-[250ms] hover:bg-primary-50">
                🖨 Print
            </button>

            <button
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl bg-primary-500 text-neutral-50 font-bold text-[13px] shadow-[0_4px_14px_rgba(125,57,235,0.35)] cursor-pointer transition-all duration-[250ms] hover:bg-[#5928a7]">
                ⬇ Export as Excel
            </button>

        </div>

    </div>

    <!-- FILTER -->
    <div
        class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] mb-[24px]">

        <div class="flex items-center justify-between flex-wrap gap-[18px]">

            <!-- DATE -->
            <div class="flex items-center gap-[12px] flex-wrap">

                <div>
                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        From
                    </p>

                    <input type="date"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                </div>

                <div>
                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        To
                    </p>

                    <input type="date"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                </div>

            </div>

            <!-- SEARCH -->
            <div class="flex items-center gap-[10px]">

                <input type="text"
                    placeholder="Cari ID Pembayaran atau ID Pelanggan"
                    class="w-[280px] max-[560px]:w-full px-[16px] py-[11px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                <button
                    class="px-[20px] py-[11px] bg-primary-500 text-neutral-50 rounded-xl font-bold text-[13px] hover:bg-[#5928a7] transition-all duration-[250ms]">
                    Cari
                </button>

            </div>

        </div>

    </div>

    <!-- STATISTIC CARD -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-[24px]">

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-violet-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-100 text-violet-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 0.833333C5 0.61232 4.9122 0.400358 4.75592 0.244078C4.59964 0.0877973 4.38768 0 4.16667 0C3.94565 0 3.73369 0.0877973 3.57741 0.244078C3.42113 0.400358 3.33333 0.61232 3.33333 0.833333V1.66667H2.5C1.83696 1.66667 1.20107 1.93006 0.732233 2.3989C0.263392 2.86774 0 3.50363 0 4.16667V14.1667C0 14.8297 0.263392 15.4656 0.732233 15.9344C1.20107 16.4033 1.83696 16.6667 2.5 16.6667H12.5C13.163 16.6667 13.7989 16.4033 14.2678 15.9344C14.7366 15.4656 15 14.8297 15 14.1667V4.16667C15 3.50363 14.7366 2.86774 14.2678 2.3989C13.7989 1.93006 13.163 1.66667 12.5 1.66667H11.6667V0.833333C11.6667 0.61232 11.5789 0.400358 11.4226 0.244078C11.2663 0.0877973 11.0543 0 10.8333 0C10.6123 0 10.4004 0.0877973 10.2441 0.244078C10.0878 0.400358 10 0.61232 10 0.833333V1.66667H8.33333V0.833333C8.33333 0.61232 8.24554 0.400358 8.08926 0.244078C7.93297 0.0877973 7.72101 0 7.5 0C7.27899 0 7.06702 0.0877973 6.91074 0.244078C6.75446 0.400358 6.66667 0.61232 6.66667 0.833333V1.66667H5V0.833333ZM6.66667 1.66667V4.16667C6.66667 4.38768 6.75446 4.59964 6.91074 4.75592C7.06702 4.9122 7.27899 5 7.5 5C7.72101 5 7.93297 4.9122 8.08926 4.75592C8.24554 4.59964 8.33333 4.38768 8.33333 4.16667V1.66667H6.66667ZM10 1.66667H11.6667V4.16667C11.6667 4.38768 11.5789 4.59964 11.4226 4.75592C11.2663 4.9122 11.0543 5 10.8333 5C10.6123 5 10.4004 4.9122 10.2441 4.75592C10.0878 4.59964 10 4.38768 10 4.16667V1.66667ZM5 1.66667V4.16667C5 4.38768 4.9122 4.59964 4.75592 4.75592C4.59964 4.9122 4.38768 5 4.16667 5C3.94565 5 3.73369 4.9122 3.57741 4.75592C3.42113 4.59964 3.33333 4.38768 3.33333 4.16667V1.66667H5ZM4.16667 6.66667C3.94565 6.66667 3.73369 6.75446 3.57741 6.91074C3.42113 7.06702 3.33333 7.27899 3.33333 7.5C3.33333 7.72101 3.42113 7.93297 3.57741 8.08926C3.73369 8.24554 3.94565 8.33333 4.16667 8.33333H10.8333C11.0543 8.33333 11.2663 8.24554 11.4226 8.08926C11.5789 7.93297 11.6667 7.72101 11.6667 7.5C11.6667 7.27899 11.5789 7.06702 11.4226 6.91074C11.2663 6.75446 11.0543 6.66667 10.8333 6.66667H4.16667ZM4.16667 10C3.94565 10 3.73369 10.0878 3.57741 10.2441C3.42113 10.4004 3.33333 10.6123 3.33333 10.8333C3.33333 11.0543 3.42113 11.2663 3.57741 11.4226C3.73369 11.5789 3.94565 11.6667 4.16667 11.6667H7.5C7.72101 11.6667 7.93297 11.5789 8.08926 11.4226C8.24554 11.2663 8.33333 11.0543 8.33333 10.8333C8.33333 10.6123 8.24554 10.4004 8.08926 10.2441C7.93297 10.0878 7.72101 10 7.5 10H4.16667Z" fill="#5928A7"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Review
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                340
            </h2>

        </div>

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-lime-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-lime-100 text-lime-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M9.99935 1.66797L12.5743 6.88464L18.3327 7.7263L14.166 11.7846L15.1493 17.518L9.99935 14.8096L4.84935 17.518L5.83268 11.7846L1.66602 7.7263L7.42435 6.88464L9.99935 1.66797Z" stroke="#8DB524" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Rata-rata Penilaian
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                4.7 <span class="text-[16px]">/5</span>
            </h2>

        </div>

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-red-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-red-100 text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M5.83268 9.16797L9.16602 1.66797C9.82906 1.66797 10.4649 1.93136 10.9338 2.4002C11.4026 2.86904 11.666 3.50493 11.666 4.16797V7.5013H16.3827C16.6243 7.49857 16.8636 7.54839 17.084 7.64732C17.3044 7.74624 17.5007 7.89191 17.6592 8.07423C17.8178 8.25655 17.9348 8.47115 18.0021 8.70318C18.0695 8.9352 18.0856 9.1791 18.0493 9.41797L16.8993 16.918C16.8391 17.3154 16.6372 17.6776 16.3309 17.938C16.0247 18.1983 15.6346 18.3392 15.2327 18.3346H5.83268M5.83268 9.16797V18.3346M5.83268 9.16797H3.33268C2.89065 9.16797 2.46673 9.34356 2.15417 9.65612C1.84161 9.96868 1.66602 10.3926 1.66602 10.8346V16.668C1.66602 17.11 1.84161 17.5339 2.15417 17.8465C2.46673 18.159 2.89065 18.3346 3.33268 18.3346H5.83268" stroke="#C10007" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Review Positif
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                96<span class="text-[16px]">%</span>
            </h2>

        </div>

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-teal-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-teal-100 text-teal-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 2.5C0 1.83696 0.263392 1.20107 0.732233 0.732233C1.20107 0.263392 1.83696 0 2.5 0H14.1667C14.8297 0 15.4656 0.263392 15.9344 0.732233C16.4033 1.20107 16.6667 1.83696 16.6667 2.5V10.8333C16.6667 11.4964 16.4033 12.1323 15.9344 12.6011C15.4656 13.0699 14.8297 13.3333 14.1667 13.3333H11.5233C11.3023 13.3334 11.0904 13.4212 10.9342 13.5775L9.51167 15C9.19912 15.3125 8.77527 15.488 8.33333 15.488C7.89139 15.488 7.46755 15.3125 7.155 15L5.7325 13.5775C5.57626 13.4212 5.36433 13.3334 5.14333 13.3333H2.5C1.83696 13.3333 1.20107 13.0699 0.732233 12.6011C0.263392 12.1323 0 11.4964 0 10.8333V2.5ZM4.16667 2.5C3.94565 2.5 3.73369 2.5878 3.57741 2.74408C3.42113 2.90036 3.33333 3.11232 3.33333 3.33333C3.33333 3.55435 3.42113 3.76631 3.57741 3.92259C3.73369 4.07887 3.94565 4.16667 4.16667 4.16667H12.5C12.721 4.16667 12.933 4.07887 13.0893 3.92259C13.2455 3.76631 13.3333 3.55435 13.3333 3.33333C13.3333 3.11232 13.2455 2.90036 13.0893 2.74408C12.933 2.5878 12.721 2.5 12.5 2.5H4.16667ZM4.16667 5.83333C3.94565 5.83333 3.73369 5.92113 3.57741 6.07741C3.42113 6.23369 3.33333 6.44565 3.33333 6.66667C3.33333 6.88768 3.42113 7.09964 3.57741 7.25592C3.73369 7.4122 3.94565 7.5 4.16667 7.5H12.5C12.721 7.5 12.933 7.4122 13.0893 7.25592C13.2455 7.09964 13.3333 6.88768 13.3333 6.66667C13.3333 6.44565 13.2455 6.23369 13.0893 6.07741C12.933 5.92113 12.721 5.83333 12.5 5.83333H4.16667ZM4.16667 9.16667C3.94565 9.16667 3.73369 9.25446 3.57741 9.41074C3.42113 9.56703 3.33333 9.77899 3.33333 10C3.33333 10.221 3.42113 10.433 3.57741 10.5893C3.73369 10.7455 3.94565 10.8333 4.16667 10.8333H7.5C7.72101 10.8333 7.93297 10.7455 8.08926 10.5893C8.24554 10.433 8.33333 10.221 8.33333 10C8.33333 9.77899 8.24554 9.56703 8.08926 9.41074C7.93297 9.25446 7.72101 9.16667 7.5 9.16667H4.16667Z" fill="#00786F"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Banyak Di Review
            </p>

            <h2 class="text-[16px] font-black text-neutral-950 leading-[36px]">
                Keychain HIMARPL
            </h2>

        </div>

    </div>

    <!-- TABLE WRAPPER -->
    <div class="grid grid-cols-1 xl:grid-cols-[2fr_1.2fr] gap-[20px]">

        <!-- REVIEW TABLE -->
        <div
            class="bg-neutral-50 rounded-3xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)]">

            <div class="px-[18px] py-[16px] border-b border-neutral-200">

                <h2 class="text-[16px] font-bold text-neutral-900">
                    Review Pengguna
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full border-collapse min-w-[700px]">

                    <thead class="bg-neutral-100">

                        <tr>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                ID_PESANAN
                            </th>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                TANGGAL
                            </th>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                NAMA CUSTOMER
                            </th>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                PRODUK TERJUAL
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="hover:bg-primary-50 transition-all">

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                131313
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-semibold">
                                3 May
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Siti Masdariah
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Jahim HIMARPL
                            </td>

                        </tr>

                        <tr class="hover:bg-primary-50 transition-all">

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                131314
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-semibold">
                                3 May
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Mirachel C.
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Jahim HIMARPL
                            </td>

                        </tr>

                        <tr class="hover:bg-primary-50 transition-all">

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                131315
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-semibold">
                                3 May
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Harits Nur A.
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Jersey RPL
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- RATING TABLE -->
        <div
            class="bg-neutral-50 rounded-3xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)]">

            <div class="px-[18px] py-[16px] border-b border-neutral-200">

                <h2 class="text-[16px] font-bold text-neutral-900 uppercase">
                    Rating Barang
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full border-collapse min-w-[400px]">

                    <thead class="bg-neutral-100">

                        <tr>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                ID_BARANG
                            </th>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                PRODUK
                            </th>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                RATING
                            </th>

                            <th
                                class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                                ACTION
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr class="hover:bg-primary-50 transition-all">

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                101010
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Jahim HIMARPL
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] text-[#7ba600]">
                                ★★★★
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[12px] font-bold text-primary-500 cursor-pointer">
                                Lihat Detail
                            </td>

                        </tr>

                        <tr class="hover:bg-primary-50 transition-all">

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                131315
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                                Jersey RPL
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] text-[#7ba600]">
                                ★★★★
                            </td>

                            <td
                                class="px-[16px] py-[16px] border-t border-neutral-200 text-[12px] font-bold text-primary-500 cursor-pointer">
                                Lihat Detail
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection