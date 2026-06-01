@extends('admin.layouts.layout')

@section('title', 'Laporan Keuangan')

@section('page_title', 'Laporan & Rekap')

@section('page_breadcrumb', 'Laporan Keuangan')

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
                Laporan Keuangan
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
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M2.5 16.668H17.5" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 5.0013L5 12.5013C5 13.4218 5.74619 14.168 6.66667 14.168C7.58714 14.168 8.33333 13.4218 8.33333 12.5013V5.0013C8.33333 4.08083 7.58714 3.33464 6.66667 3.33464C5.74619 3.33464 5 4.08083 5 5.0013Z" fill="#5928A7" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.666 8.33464V12.5013C11.666 13.4218 12.4122 14.168 13.3327 14.168C14.2532 14.168 14.9993 13.4218 14.9993 12.5013V8.33464C14.9993 7.41416 14.2532 6.66797 13.3327 6.66797C12.4122 6.66797 11.666 7.41416 11.666 8.33464Z" fill="#5928A7" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Pemasukan
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                <span class="text-sm font-bold">Rp</span>30.570.000
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
                    <path d="M2.5 3.33203H17.5" stroke="#C10007" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 7.4974L5 14.9974C5 15.9179 5.74619 16.6641 6.66667 16.6641C7.58714 16.6641 8.33333 15.9179 8.33333 14.9974V7.4974C8.33333 6.57692 7.58714 5.83073 6.66667 5.83073C5.74619 5.83073 5 6.57692 5 7.4974Z" fill="#C10007" stroke="#C10007" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.666 7.4987V11.6654C11.666 12.5858 12.4122 13.332 13.3327 13.332C14.2532 13.332 14.9993 12.5858 14.9993 11.6654V7.4987C14.9993 6.57822 14.2532 5.83203 13.3327 5.83203C12.4122 5.83203 11.666 6.57822 11.666 7.4987Z" fill="#C10007" stroke="#C10007" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Pengeluaran
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                <span class="text-sm font-bold">Rp</span>8.570.000
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
                    <path d="M17.5007 6.66797C17.5007 7.51797 16.5123 8.26797 15.0007 8.71964C14.0557 9.00297 12.9065 9.16797 11.6673 9.16797C10.4282 9.16797 9.27898 9.00214 8.33398 8.71964C6.82315 8.26797 5.83398 7.51797 5.83398 6.66797C5.83398 5.28714 8.44565 4.16797 11.6673 4.16797C14.889 4.16797 17.5007 5.28714 17.5007 6.66797Z" fill="#8DB524"/>
                    <path d="M17.5007 6.66797C17.5007 5.28714 14.889 4.16797 11.6673 4.16797C8.44565 4.16797 5.83398 5.28714 5.83398 6.66797M17.5007 6.66797V10.0013C17.5007 10.8513 16.5123 11.6013 15.0007 12.053C14.0557 12.3363 12.9065 12.5013 11.6673 12.5013C10.4282 12.5013 9.27898 12.3355 8.33398 12.053C6.82315 11.6013 5.83398 10.8513 5.83398 10.0013V6.66797M17.5007 6.66797C17.5007 7.51797 16.5123 8.26797 15.0007 8.71964C14.0557 9.00297 12.9065 9.16797 11.6673 9.16797C10.4282 9.16797 9.27898 9.00214 8.33398 8.71964C6.82315 8.26797 5.83398 7.51797 5.83398 6.66797" stroke="#8DB524" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2.5 10.0014V13.3347C2.5 14.1847 3.48917 14.9347 5 15.3864C5.945 15.6697 7.09417 15.8347 8.33333 15.8347C9.5725 15.8347 10.7217 15.6689 11.6667 15.3864C13.1775 14.9347 14.1667 14.1847 14.1667 13.3347V12.5014M2.5 10.0014C2.5 9.00385 3.8625 8.14302 5.83333 7.74219M2.5 10.0014C2.5 10.8514 3.48917 11.6014 5 12.053C5.945 12.3364 7.09417 12.5014 8.33333 12.5014C8.9125 12.5014 9.47167 12.4655 10 12.398" stroke="#8DB524" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>  
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Saldo Bersih
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                1390
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
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.66602 6.66797C1.66602 6.00493 1.92941 5.36904 2.39825 4.9002C2.86709 4.43136 3.50297 4.16797 4.16602 4.16797H15.8327C16.4957 4.16797 17.1316 4.43136 17.6004 4.9002C18.0693 5.36904 18.3327 6.00493 18.3327 6.66797V13.3346C18.3327 13.9977 18.0693 14.6336 17.6004 15.1024C17.1316 15.5712 16.4957 15.8346 15.8327 15.8346H4.16602C3.50297 15.8346 2.86709 15.5712 2.39825 15.1024C1.92941 14.6336 1.66602 13.9977 1.66602 13.3346V6.66797ZM9.16602 10.0013C9.16602 9.78029 9.25381 9.56833 9.41009 9.41205C9.56637 9.25577 9.77834 9.16797 9.99935 9.16797C10.2204 9.16797 10.4323 9.25577 10.5886 9.41205C10.7449 9.56833 10.8327 9.78029 10.8327 10.0013C10.8327 10.2223 10.7449 10.4343 10.5886 10.5906C10.4323 10.7468 10.2204 10.8346 9.99935 10.8346C9.77834 10.8346 9.56637 10.7468 9.41009 10.5906C9.25381 10.4343 9.16602 10.2223 9.16602 10.0013ZM9.99935 7.5013C9.33631 7.5013 8.70042 7.76469 8.23158 8.23354C7.76274 8.70238 7.49935 9.33826 7.49935 10.0013C7.49935 10.6643 7.76274 11.3002 8.23158 11.7691C8.70042 12.2379 9.33631 12.5013 9.99935 12.5013C10.6624 12.5013 11.2983 12.2379 11.7671 11.7691C12.236 11.3002 12.4993 10.6643 12.4993 10.0013C12.4993 9.33826 12.236 8.70238 11.7671 8.23354C11.2983 7.76469 10.6624 7.5013 9.99935 7.5013Z" fill="#00786F"/>
                </svg>  
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                % Keuntungan
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                Rp 180.000
            </h2>

        </div>

    </div>

    <!-- TABLE -->
    <div
        class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full">

        <table
            class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1000px]">

            <thead class="bg-neutral-100 border-b border-neutral-200">

                <tr>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TANGGAL
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        KETERANGAN
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        KATEGORI
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TIPE
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        JUMLAH
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TOTAL SALDO
                    </th>

                </tr>

            </thead>

            <tbody>

                <!-- ROW -->
                <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-semibold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        3 May
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-900 border-t border-neutral-200 whitespace-nowrap">
                        Penjualan Bazar Kampus
                    </td>

                    <td
                        class="px-[16px] py-[14px] border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">
                            Proker Bazar
                        </span>

                    </td>

                    <td
                        class="px-[16px] py-[14px] border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#c6ff33]/20 text-[#7ba600]">
                            Pemasukkan
                        </span>

                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-[#7ba600] border-t border-neutral-200 whitespace-nowrap">
                        + Rp. 2.400.000
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-900 border-t border-neutral-200 whitespace-nowrap">
                        Rp. 8.400.000
                    </td>

                </tr>

                <!-- ROW -->
                <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-semibold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        2 Juni
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-900 border-t border-neutral-200 whitespace-nowrap">
                        Penjualan Bazar Kampus
                    </td>

                    <td
                        class="px-[16px] py-[14px] border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">
                            Proker Bazar
                        </span>

                    </td>

                    <td
                        class="px-[16px] py-[14px] border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#c6ff33]/20 text-[#7ba600]">
                            Pemasukkan
                        </span>

                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-[#7ba600] border-t border-neutral-200 whitespace-nowrap">
                        + Rp. 2.400.000
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-900 border-t border-neutral-200 whitespace-nowrap">
                        Rp. 8.400.000
                    </td>

                </tr>

                <!-- ROW -->
                <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-semibold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        1 Juli
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-900 border-t border-neutral-200 whitespace-nowrap">
                        Penjualan Jaket Himpunan
                    </td>

                    <td
                        class="px-[16px] py-[14px] border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">
                            Proker Bazar
                        </span>

                    </td>

                    <td
                        class="px-[16px] py-[14px] border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#c6ff33]/20 text-[#7ba600]">
                            Pemasukkan
                        </span>

                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-[#7ba600] border-t border-neutral-200 whitespace-nowrap">
                        + Rp. 2.400.000
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-900 border-t border-neutral-200 whitespace-nowrap">
                        Rp. 8.400.000
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

@endsection