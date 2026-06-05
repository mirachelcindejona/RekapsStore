@extends('admin.layouts.layout')

@section('title', 'Laporan Review Pengguna')

@section('page_title', 'Laporan & Rekap')

@section('page_breadcrumb', 'Laporan Review Pengguna')

@section('content')

      <div class="hidden print-header">

        <div class="text-center mb-[30px]">

            <h1 class="text-[28px] font-bold">
                REKAPS STORE
            </h1>

            <h2 class="text-[20px] font-semibold mt-[6px]">
                LAPORAN KEUANGAN
            </h2>

            <p class="mt-[6px] text-[14px] text-neutral-600">
                Dicetak pada {{ now()->format('d F Y') }}
            </p>

        </div>

    </div>

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

            <button onclick="printReport()"
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl border border-primary-500 text-primary-500 bg-neutral-50 font-bold text-[13px] cursor-pointer transition-all duration-[250ms] hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 17V15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V17M7 17V19C7 19.5304 7.21071 20.0391 7.58579 20.4142C7.96086 20.7893 8.46957 21 9 21H15C15.5304 21 16.0391 20.7893 16.4142 20.4142C16.7893 20.0391 17 19.5304 17 19V17M7 17H5C4.46957 17 3.96086 16.7893 3.58579 16.4142C3.21071 16.0391 3 15.5304 3 15V9C3 8.46957 3.21071 7.96086 3.58579 7.58579C3.96086 7.21071 4.46957 7 5 7H6M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V9C21 8.46957 20.7893 7.96086 20.4142 7.58579C20.0391 7.21071 19.5304 7 19 7H18M6 7V5C6 4.46957 6.21071 3.96086 6.58579 3.58579C6.96086 3.21071 7.46957 3 8 3H16C16.5304 3 17.0391 3.21071 17.4142 3.58579C17.7893 3.96086 18 4.46957 18 5V7M6 7H18" stroke="#A87AF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 9C2 8.20435 2.31607 7.44129 2.87868 6.87868C3.44129 6.31607 4.20435 6 5 6H19C19.7956 6 20.5587 6.31607 21.1213 6.87868C21.6839 7.44129 22 8.20435 22 9V15C22 15.7956 21.6839 16.5587 21.1213 17.1213C20.5587 17.6839 19.7956 18 19 18H17C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V15C16 14.7348 15.8946 14.4804 15.7071 14.2929C15.5196 14.1054 15.2652 14 15 14H9C8.73478 14 8.48043 14.1054 8.29289 14.2929C8.10536 14.4804 8 14.7348 8 15V17C8 17.2652 7.89464 17.5196 7.70711 17.7071C7.51957 17.8946 7.26522 18 7 18H5C4.20435 18 3.44129 17.6839 2.87868 17.1213C2.31607 16.5587 2 15.7956 2 15V9ZM7 9C6.73478 9 6.48043 9.10536 6.29289 9.29289C6.10536 9.48043 6 9.73478 6 10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11H8C8.26522 11 8.51957 10.8946 8.70711 10.7071C8.89464 10.5196 9 10.2652 9 10C9 9.73478 8.89464 9.48043 8.70711 9.29289C8.51957 9.10536 8.26522 9 8 9H7Z" fill="#A87AF2"/>
                </svg>
                Cetak Laporan Review
            </button>

            <a href="/admin/report-review/export"
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
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 0.833333C5 0.61232 4.9122 0.400358 4.75592 0.244078C4.59964 0.0877973 4.38768 0 4.16667 0C3.94565 0 3.73369 0.0877973 3.57741 0.244078C3.42113 0.400358 3.33333 0.61232 3.33333 0.833333V1.66667H2.5C1.83696 1.66667 1.20107 1.93006 0.732233 2.3989C0.263392 2.86774 0 3.50363 0 4.16667V14.1667C0 14.8297 0.263392 15.4656 0.732233 15.9344C1.20107 16.4033 1.83696 16.6667 2.5 16.6667H12.5C13.163 16.6667 13.7989 16.4033 14.2678 15.9344C14.7366 15.4656 15 14.8297 15 14.1667V4.16667C15 3.50363 14.7366 2.86774 14.2678 2.3989C13.7989 1.93006 13.163 1.66667 12.5 1.66667H11.6667V0.833333C11.6667 0.61232 11.5789 0.400358 11.4226 0.244078C11.2663 0.0877973 11.0543 0 10.8333 0C10.6123 0 10.4004 0.0877973 10.2441 0.244078C10.0878 0.400358 10 0.61232 10 0.833333V1.66667H8.33333V0.833333C8.33333 0.61232 8.24554 0.400358 8.08926 0.244078C7.93297 0.0877973 7.72101 0 7.5 0C7.27899 0 7.06702 0.0877973 6.91074 0.244078C6.75446 0.400358 6.66667 0.61232 6.66667 0.833333V1.66667H5V0.833333ZM6.66667 1.66667V4.16667C6.66667 4.38768 6.75446 4.59964 6.91074 4.75592C7.06702 4.9122 7.27899 5 7.5 5C7.72101 5 7.93297 4.9122 8.08926 4.75592C8.24554 4.59964 8.33333 4.38768 8.33333 4.16667V1.66667H6.66667ZM10 1.66667H11.6667V4.16667C11.6667 4.38768 11.5789 4.59964 11.4226 4.75592C11.2663 4.9122 11.0543 5 10.8333 5C10.6123 5 10.4004 4.9122 10.2441 4.75592C10.0878 4.59964 10 4.38768 10 4.16667V1.66667ZM5 1.66667V4.16667C5 4.38768 4.9122 4.59964 4.75592 4.75592C4.59964 4.9122 4.38768 5 4.16667 5C3.94565 5 3.73369 4.9122 3.57741 4.75592C3.42113 4.59964 3.33333 4.38768 3.33333 4.16667V1.66667H5ZM4.16667 6.66667C3.94565 6.66667 3.73369 6.75446 3.57741 6.91074C3.42113 7.06702 3.33333 7.27899 3.33333 7.5C3.33333 7.72101 3.42113 7.93297 3.57741 8.08926C3.73369 8.24554 3.94565 8.33333 4.16667 8.33333H10.8333C11.0543 8.33333 11.2663 8.24554 11.4226 8.08926C11.5789 7.93297 11.6667 7.72101 11.6667 7.5C11.6667 7.27899 11.5789 7.06702 11.4226 6.91074C11.2663 6.75446 11.0543 6.66667 10.8333 6.66667H4.16667ZM4.16667 10C3.94565 10 3.73369 10.0878 3.57741 10.2441C3.42113 10.4004 3.33333 10.6123 3.33333 10.8333C3.33333 11.0543 3.42113 11.2663 3.57741 11.4226C3.73369 11.5789 3.94565 11.6667 4.16667 11.6667H7.5C7.72101 11.6667 7.93297 11.5789 8.08926 11.4226C8.24554 11.2663 8.33333 11.0543 8.33333 10.8333C8.33333 10.6123 8.24554 10.4004 8.08926 10.2441C7.93297 10.0878 7.72101 10 7.5 10H4.16667Z" fill="#5928A7"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Review
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                {{ $totalReviews }}
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
                {{ $averageRating }} <span class="text-[16px]">/5</span>
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
                {{ $positivePercentage }}<span class="text-[16px]">%</span>
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
                {{ $favoriteProduct->name ?? "-" }}
            </h2>

        </div>

    </div>

        <!-- FILTER -->
    <form method="GET"
        class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] mb-[24px]">

        <div class="flex items-center justify-between flex-wrap gap-[18px]">

            <!-- FILTER -->
            <div class="flex items-end gap-[12px] flex-wrap">

                <div>

                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        From
                    </p>

                    <input
                        type="date"
                        name="from_date"
                        value="{{ request('from_date') }}"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                </div>

                <div>

                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        To
                    </p>

                    <input
                        type="date"
                        name="to_date"
                        value="{{ request('to_date') }}"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                </div>

                <div>

                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        Rating
                    </p>

                    <select
                        name="rating"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                        <option value="">
                            Semua Rating
                        </option>

                        <option value="5"
                            {{ request('rating') == '5' ? 'selected' : '' }}>
                            5
                        </option>

                        <option value="4"
                            {{ request('rating') == '4' ? 'selected' : '' }}>
                            4
                        </option>

                        <option value="3"
                            {{ request('rating') == '3' ? 'selected' : '' }}>
                            3
                        </option>

                        <option value="2"
                            {{ request('rating') == '2' ? 'selected' : '' }}>
                            2
                        </option>

                        <option value="1"
                            {{ request('rating') == '1' ? 'selected' : '' }}>
                            1
                        </option>

                    </select>

                </div>

            </div>

            <!-- SEARCH -->
            <div class="flex items-center gap-[10px]">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari customer atau produk"
                    class="w-[280px] max-[560px]:w-full px-[16px] py-[11px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                <button
                    type="submit"
                    class="px-[20px] py-[11px] bg-primary-500 text-neutral-50 rounded-xl font-bold text-[13px] hover:bg-[#5928a7] transition-all duration-[250ms]">

                    Cari

                </button>
                <a href="{{ url('/admin/report-review') }}"
                    class="px-[20px] py-[11px] border border-neutral-300 rounded-xl font-bold text-[13px] text-neutral-600 hover:bg-neutral-100 transition-all duration-[250ms]">
                    Reset
                </a>

            </div>

        </div>

    </form>

     
    <h2 class="text-[18px] font-bold text-neutral-800 mb-[14px] mt-[14px]">
        Detail Review Pengguna
    </h2>

    <!-- TABLE WRAPPER -->
    <div class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full">

        <table class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1200px]">

            <thead class="bg-neutral-100 border-b border-neutral-200">

                <tr>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TANGGAL
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        CUSTOMER
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        PRODUK
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        RATING
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        KOMENTAR
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        STATUS BALASAN
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($reviews as $review)

                <tr>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $review->created_at->format('d M Y') }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $review->user->name }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $review->product->name }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">

                        @for($i = 1; $i <= 5; $i++)

                            @if($i <= $review->rating)

                                ⭐

                            @else

                                ☆

                            @endif

                        @endfor

                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200 max-w-[350px]">

                        {{ Str::limit($review->comment, 80) }}

                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">

                        @if($review->admin_reply)

                            <span class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-green-100 text-green-600">
                                Sudah Dibalas
                            </span>

                        @else

                            <span class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-yellow-100 text-yellow-700">
                                Belum Dibalas
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- RATING PERPRODUK --}}
    <details
    class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] mb-[24px]  mt-[24px]">

        <summary
            class="cursor-pointer font-bold text-[16px]">

            ⭐ Rating Per Produk

        </summary>

        <div class="mt-[18px]">

            <div class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full mb-[24px]">

            <table class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[900px]">

                <thead class="bg-neutral-100 border-b border-neutral-200">

                    <tr>

                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500">
                            PRODUK
                        </th>

                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500">
                            TOTAL REVIEW
                        </th>

                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500">
                            RATING RATA-RATA
                        </th>

                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500">
                            DIBALAS ADMIN
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($productRatings as $product)

                    <tr>

                        <td class="px-[16px] py-[14px] border-t border-neutral-200">
                            {{ $product->name }}
                        </td>

                        <td class="px-[16px] py-[14px] border-t border-neutral-200">
                            {{ $product->total_reviews }}
                        </td>

                        <td class="px-[16px] py-[14px] border-t border-neutral-200 font-semibold">

                            ⭐ {{ $product->average_rating }}

                        </td>

                        <td class="px-[16px] py-[14px] border-t border-neutral-200">

                            {{ $product->replied_reviews }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        </div>

    </details>

    {{-- PRINT --}}
    <div id="print-report" class="hidden">

        <div class="p-10">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold">
                    REKAPS STORE
                </h1>

                <h2 class="text-xl font-semibold mt-2">
                    LAPORAN REVIEW PENGGUNA
                </h2>

                <p class="text-sm text-neutral-500 mt-1">
                    Periode :
                    {{ request('from_date') ? \Carbon\Carbon::parse(request('from_date'))->format('d M Y') : 'Awal Data' }}
                    -
                    {{ request('to_date') ? \Carbon\Carbon::parse(request('to_date'))->format('d M Y') : 'Akhir Data' }}
                </p>

                <p class="text-sm text-neutral-500 mt-2">
                    Dicetak pada {{ now()->format('d F Y') }}
                </p>

            </div>

            <div class="border-t border-b py-4 mb-6">

                <h3 class="text-lg font-bold mb-3">
                    Ringkasan Review
                </h3>

                <div class="space-y-2 text-sm">

                    <div class="flex justify-between">
                        <span>Total Review</span>
                        <span class="font-semibold">
                            {{ $totalReviews }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Rata-rata Rating</span>
                        <span class="font-semibold">
                            {{ $averageRating }}/5
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Review Positif</span>
                        <span class="font-semibold">
                            {{ $positivePercentage }}%
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Produk Terfavorit</span>
                        <span class="font-semibold">
                            {{ $favoriteProduct?->name ?? '-' }}
                        </span>
                    </div>

                </div>

            </div>

            <h3 class="text-lg font-bold mb-4">
                Rating Per Produk
            </h3>

            <table class="w-full border border-neutral-400 text-sm mb-8">

                <thead>

                    <tr class="bg-neutral-100">

                        <th class="border border-neutral-400 px-3 py-2">
                            Produk
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Total Review
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Rating Rata-rata
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Dibalas Admin
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($productRatings as $product)

                    <tr>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->name }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->total_reviews }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->average_rating }}/5
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->replied_reviews }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <h3 class="text-lg font-bold mb-4">
                Detail Review Pengguna
            </h3>

            <table class="w-full border border-neutral-400 text-sm">

                <thead>

                    <tr class="bg-neutral-100">

                        <th class="border border-neutral-400 px-3 py-2">
                            Tanggal
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Customer
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Produk
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Rating
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Komentar
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Status Balasan
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($reviews as $review)

                    <tr>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $review->created_at->format('d M Y') }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $review->user->name }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $review->product->name }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $review->rating }}/5
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $review->comment }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">

                            {{ $review->admin_reply
                                ? 'Sudah Dibalas'
                                : 'Belum Dibalas'
                            }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="mt-16 flex justify-end">

                <div class="text-center">

                    <p>
                        Kepala Departement <br>
                        Ekonomi Kreatif HIMARPL
                    </p>

                    <div class="h-20"></div>

                    <p>(________________)</p>

                </div>

            </div>

        </div>

    </div>


@endsection

<style>
.print-header{
    display:none;
}

@media print {

    .print-header{
        display:block !important;
    }

    .no-print{
        display:none !important;
    }

    aside,
    nav,
    header{
        display:none !important;
    }

    body{
        background:white !important;
    }

    table{
        min-width:100% !important;
    }

}

</style>

<script>

function printReport() {

    const printContents =
        document.getElementById('print-report').innerHTML;

    const originalContents =
        document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

    location.reload();

}

</script>