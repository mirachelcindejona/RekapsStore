@extends('admin.layouts.layout')

@section('title', 'Laporan Penjualan')

@section('page_title', 'Laporan & Rekap')

@section('page_breadcrumb', 'Laporan Penjualan')

@section('content')

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-[20px] flex-wrap gap-[12px]">

        <div class="flex items-center gap-[14px] mb-[24px]">
            <a href="{{ url('/admin/reports') }}"
             class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50">
             <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
             </svg>
            </a>
            <h1 class="text-[20px] font-bold text-neutral-900 m-0">Laporan Penjualan</h1>

            
        </div>

        <div class="flex items-center gap-[12px]">

            <button onclick="printReport()"
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl border border-primary-500 text-primary-500 bg-neutral-50 font-bold text-[13px] cursor-pointer transition-all duration-[250ms] hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 17V15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V17M7 17V19C7 19.5304 7.21071 20.0391 7.58579 20.4142C7.96086 20.7893 8.46957 21 9 21H15C15.5304 21 16.0391 20.7893 16.4142 20.4142C16.7893 20.0391 17 19.5304 17 19V17M7 17H5C4.46957 17 3.96086 16.7893 3.58579 16.4142C3.21071 16.0391 3 15.5304 3 15V9C3 8.46957 3.21071 7.96086 3.58579 7.58579C3.96086 7.21071 4.46957 7 5 7H6M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V9C21 8.46957 20.7893 7.96086 20.4142 7.58579C20.0391 7.21071 19.5304 7 19 7H18M6 7V5C6 4.46957 6.21071 3.96086 6.58579 3.58579C6.96086 3.21071 7.46957 3 8 3H16C16.5304 3 17.0391 3.21071 17.4142 3.58579C17.7893 3.96086 18 4.46957 18 5V7M6 7H18" stroke="#A87AF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 9C2 8.20435 2.31607 7.44129 2.87868 6.87868C3.44129 6.31607 4.20435 6 5 6H19C19.7956 6 20.5587 6.31607 21.1213 6.87868C21.6839 7.44129 22 8.20435 22 9V15C22 15.7956 21.6839 16.5587 21.1213 17.1213C20.5587 17.6839 19.7956 18 19 18H17C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V15C16 14.7348 15.8946 14.4804 15.7071 14.2929C15.5196 14.1054 15.2652 14 15 14H9C8.73478 14 8.48043 14.1054 8.29289 14.2929C8.10536 14.4804 8 14.7348 8 15V17C8 17.2652 7.89464 17.5196 7.70711 17.7071C7.51957 17.8946 7.26522 18 7 18H5C4.20435 18 3.44129 17.6839 2.87868 17.1213C2.31607 16.5587 2 15.7956 2 15V9ZM7 9C6.73478 9 6.48043 9.10536 6.29289 9.29289C6.10536 9.48043 6 9.73478 6 10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11H8C8.26522 11 8.51957 10.8946 8.70711 10.7071C8.89464 10.5196 9 10.2652 9 10C9 9.73478 8.89464 9.48043 8.70711 9.29289C8.51957 9.10536 8.26522 9 8 9H7Z" fill="#A87AF2"/>
                </svg>
                Print Laporan Penjualan
            </button>

            <a href="/admin/report-finance/export"
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl bg-primary-500 text-neutral-50 font-bold text-[13px] shadow-[0_4px_14px_rgba(125,57,235,0.35)] cursor-pointer transition-all duration-[250ms] hover:bg-[#5928a7]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 3C3.73478 3 3.48043 3.10536 3.29289 3.29289C3.10536 3.48043 3 3.73478 3 4V20C3 20.2652 3.10536 20.5196 3.29289 20.7071C3.48043 20.8946 3.73478 21 4 21H20C20.2652 21 20.5196 20.8946 20.7071 20.7071C20.8946 20.5196 21 20.2652 21 20V8C20.9999 7.73481 20.8946 7.48049 20.707 7.293L16.707 3.293C16.5195 3.10545 16.2652 3.00006 16 3H4ZM10 14C10 12.4 11.333 12 12 12C12.667 12 14 12.4 14 14C14 15.6 12.667 16 12 16C11.333 16 10 15.6 10 14ZM14 5H8V8H14V5Z" fill="#F2EBFD"/>
                </svg>
                Export as Excel
            </a>

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
                    <g clip-path="url(#clip0_3185_18466)">
                        <path d="M10 0.832031V19.1654M14.1667 4.16536H7.91667C7.14312 4.16536 6.40125 4.47266 5.85427 5.01964C5.30729 5.56662 5 6.30848 5 7.08203C5 7.85558 5.30729 8.59745 5.85427 9.14443C6.40125 9.69141 7.14312 9.9987 7.91667 9.9987H12.0833C12.8569 9.9987 13.5987 10.306 14.1457 10.853C14.6927 11.4 15 12.1418 15 12.9154C15 13.6889 14.6927 14.4308 14.1457 14.9778C13.5987 15.5247 12.8569 15.832 12.0833 15.832H5" stroke="#5928A7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_3185_18466">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Pendapatan
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                <span class="text-sm font-bold">Rp</span>18.4jt
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
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 4.16797C2.5 3.50493 2.76339 2.86904 3.23223 2.4002C3.70107 1.93136 4.33696 1.66797 5 1.66797H15C15.663 1.66797 16.2989 1.93136 16.7678 2.4002C17.2366 2.86904 17.5 3.50493 17.5 4.16797V17.5013C17.4999 17.6583 17.4555 17.812 17.3718 17.9448C17.2882 18.0776 17.1688 18.1841 17.0273 18.2521C16.8858 18.32 16.728 18.3465 16.572 18.3287C16.4161 18.3109 16.2684 18.2494 16.1458 18.1513L14.5383 16.8663L12.5458 18.1946C12.3986 18.2929 12.224 18.3417 12.0472 18.3341C11.8704 18.3264 11.7007 18.2627 11.5625 18.1521L10 16.9013L8.4375 18.1513C8.29934 18.2619 8.12957 18.3256 7.95278 18.3332C7.77599 18.3409 7.60135 18.292 7.45417 18.1938L5.46167 16.8655L3.85333 18.1513C3.7308 18.2492 3.58314 18.3104 3.42734 18.3281C3.27153 18.3458 3.11389 18.3192 2.97254 18.2513C2.83119 18.1834 2.71187 18.077 2.62828 17.9443C2.54468 17.8117 2.50022 17.6581 2.5 17.5013V4.16797ZM6.66667 5.0013C6.44565 5.0013 6.23369 5.0891 6.07741 5.24538C5.92113 5.40166 5.83333 5.61362 5.83333 5.83464C5.83333 6.05565 5.92113 6.26761 6.07741 6.42389C6.23369 6.58017 6.44565 6.66797 6.66667 6.66797H13.3333C13.5543 6.66797 13.7663 6.58017 13.9226 6.42389C14.0789 6.26761 14.1667 6.05565 14.1667 5.83464C14.1667 5.61362 14.0789 5.40166 13.9226 5.24538C13.7663 5.0891 13.5543 5.0013 13.3333 5.0013H6.66667ZM6.66667 8.33464C6.44565 8.33464 6.23369 8.42243 6.07741 8.57871C5.92113 8.73499 5.83333 8.94695 5.83333 9.16797C5.83333 9.38898 5.92113 9.60094 6.07741 9.75722C6.23369 9.9135 6.44565 10.0013 6.66667 10.0013H13.3333C13.5543 10.0013 13.7663 9.9135 13.9226 9.75722C14.0789 9.60094 14.1667 9.38898 14.1667 9.16797C14.1667 8.94695 14.0789 8.73499 13.9226 8.57871C13.7663 8.42243 13.5543 8.33464 13.3333 8.33464H6.66667ZM6.66667 11.668C6.44565 11.668 6.23369 11.7558 6.07741 11.912C5.92113 12.0683 5.83333 12.2803 5.83333 12.5013C5.83333 12.7223 5.92113 12.9343 6.07741 13.0906C6.23369 13.2468 6.44565 13.3346 6.66667 13.3346H10C10.221 13.3346 10.433 13.2468 10.5893 13.0906C10.7455 12.9343 10.8333 12.7223 10.8333 12.5013C10.8333 12.2803 10.7455 12.0683 10.5893 11.912C10.433 11.7558 10.221 11.668 10 11.668H6.66667Z" fill="#8DB524"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Pesanan
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                247
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
                    <path d="M17.5 5.0013V16.668C17.5 17.11 17.3244 17.5339 17.0118 17.8465C16.6993 18.159 16.2754 18.3346 15.8333 18.3346H4.16667C3.72464 18.3346 3.30072 18.159 2.98816 17.8465C2.67559 17.5339 2.5 17.11 2.5 16.668V5.0013L5 1.66797H15L17.5 5.0013ZM2.5 5.0013H17.5M13.3333 8.33464C13.3333 9.21869 12.9821 10.0665 12.357 10.6917C11.7319 11.3168 10.8841 11.668 10 11.668C9.11594 11.668 8.2681 11.3168 7.64298 10.6917C7.01786 10.0665 6.66667 9.21869 6.66667 8.33464" stroke="#C10007" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Produk Terjual 
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                58
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
                Rata-rata transaksi
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                134
            </h2>

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

    <!-- TABLE -->
    <div
        class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full">

        <table
            class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1000px]">

            <thead class="bg-neutral-100 border-b border-neutral-200">

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
                        PRODUCT TERJUAL
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        QTY
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TOTAL
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        METODE
                    </th>

                </tr>

            </thead>

            <tbody>

                <!-- ROW 1 -->
                <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        #131313
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        3 May
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        Siti Masdariah
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        Rp 140.000
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">
                            QRIS
                        </span>

                    </td>

                </tr>

                <!-- ROW 2 -->
                <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        #131314
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        3 May
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        Mirachel C.
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        Rp 140.000
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">
                            QRIS
                        </span>

                    </td>

                </tr>

                <!-- ROW 3 -->
                <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        #131315
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        3 May
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        Harits Nur A.
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] font-bold text-neutral-700 border-t border-neutral-200 whitespace-nowrap">
                        Rp 8.400.000
                    </td>

                    <td
                        class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 whitespace-nowrap">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#c6ff33]/20 text-[#7ba600]">
                            CASH
                        </span>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

@endsection 