@extends('admin.layouts.layout')

@section('title', 'Laporan Stok Barang')

@section('page_title', 'Laporan & Rekap')

@section('page_breadcrumb', 'Laporan Stok Barang')

@section('content')

        <div class="hidden print-header">

            <div class="text-center mb-[30px]">

                <h1 class="text-[28px] font-bold">
                    REKAPS STORE
                </h1>

                <h2 class="text-[20px] font-semibold mt-[6px]">
                    LAPORAN STOK BARANG
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
                Laporan Stok Barang
            </h1>

        </div>

        <div class="flex items-center gap-[12px]">

            <button onclick="printReport()"
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl border border-primary-500 text-primary-500 bg-neutral-50 font-bold text-[13px] cursor-pointer transition-all duration-[250ms] hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 17V15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V17M7 17V19C7 19.5304 7.21071 20.0391 7.58579 20.4142C7.96086 20.7893 8.46957 21 9 21H15C15.5304 21 16.0391 20.7893 16.4142 20.4142C16.7893 20.0391 17 19.5304 17 19V17M7 17H5C4.46957 17 3.96086 16.7893 3.58579 16.4142C3.21071 16.0391 3 15.5304 3 15V9C3 8.46957 3.21071 7.96086 3.58579 7.58579C3.96086 7.21071 4.46957 7 5 7H6M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V9C21 8.46957 20.7893 7.96086 20.4142 7.58579C20.0391 7.21071 19.5304 7 19 7H18M6 7V5C6 4.46957 6.21071 3.96086 6.58579 3.58579C6.96086 3.21071 7.46957 3 8 3H16C16.5304 3 17.0391 3.21071 17.4142 3.58579C17.7893 3.96086 18 4.46957 18 5V7M6 7H18" stroke="#A87AF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 9C2 8.20435 2.31607 7.44129 2.87868 6.87868C3.44129 6.31607 4.20435 6 5 6H19C19.7956 6 20.5587 6.31607 21.1213 6.87868C21.6839 7.44129 22 8.20435 22 9V15C22 15.7956 21.6839 16.5587 21.1213 17.1213C20.5587 17.6839 19.7956 18 19 18H17C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V15C16 14.7348 15.8946 14.4804 15.7071 14.2929C15.5196 14.1054 15.2652 14 15 14H9C8.73478 14 8.48043 14.1054 8.29289 14.2929C8.10536 14.4804 8 14.7348 8 15V17C8 17.2652 7.89464 17.5196 7.70711 17.7071C7.51957 17.8946 7.26522 18 7 18H5C4.20435 18 3.44129 17.6839 2.87868 17.1213C2.31607 16.5587 2 15.7956 2 15V9ZM7 9C6.73478 9 6.48043 9.10536 6.29289 9.29289C6.10536 9.48043 6 9.73478 6 10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11H8C8.26522 11 8.51957 10.8946 8.70711 10.7071C8.89464 10.5196 9 10.2652 9 10C9 9.73478 8.89464 9.48043 8.70711 9.29289C8.51957 9.10536 8.26522 9 8 9H7Z" fill="#A87AF2"/>
                </svg>
                Cetak Laporan Stok Barang
            </button>

            <a href="/admin/report-stock/export"
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
                    <path d="M8.66699 10.7637V17.0605L3.15625 13.6172C3.10847 13.5872 3.06933 13.5454 3.04199 13.4961C3.01464 13.4467 3.00005 13.3914 3 13.335V7.43066L8.66699 10.7637ZM17 13.335C16.9999 13.3914 16.9854 13.4467 16.958 13.4961C16.9307 13.5454 16.8915 13.5872 16.8438 13.6172L11.333 17.0605V10.7627L17 7.42969V13.335ZM10 2.16797C10.0625 2.16797 10.1238 2.18564 10.1768 2.21875L15.2305 5.37695L10 8.4541L4.76855 5.37695L9.82324 2.21875C9.87622 2.18564 9.93753 2.16797 10 2.16797Z" fill="#5928A7" stroke="#5928A7"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Produk
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                {{ $totalProducts }}
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
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                    <path d="M14.3333 14.3333H2.66667C1.33333 14.3333 1 13.2225 1 12.6667V2.66667C1 2.22464 1.17559 1.80072 1.48816 1.48816C1.80072 1.17559 2.22464 1 2.66667 1H11C11.442 1 11.866 1.17559 12.1785 1.48816C12.4911 1.80072 12.6667 2.22464 12.6667 2.66667V7.66667M14.3333 14.3333C13.7775 14.3333 12.6667 14 12.6667 12.6667V7.66667M14.3333 14.3333C15.6667 14.3333 16 13.2225 16 12.6667V7.66667H12.6667" stroke="#C10007" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Stock
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                {{ $totalStock }}
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
                    <path d="M15.8327 4.16667L17.4993 2.5ZM15.8327 4.16667L14.166 2.5ZM15.8327 4.16667L17.4993 5.83333ZM15.8327 4.16667L14.166 5.83333Z" fill="#8DB524"/>
                    <path d="M15.8327 4.16667L17.4993 2.5M15.8327 4.16667L14.166 2.5M15.8327 4.16667L17.4993 5.83333M15.8327 4.16667L14.166 5.83333" stroke="#8DB524" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 3H10.459C10.2885 3.78286 10.2878 4.59592 10.4658 5.38281C10.4688 5.39581 10.4726 5.40891 10.4756 5.42188C10.3251 5.36437 10.1642 5.33301 10 5.33301C9.64653 5.33301 9.30763 5.47379 9.05762 5.72363C8.80757 5.97368 8.66699 6.31337 8.66699 6.66699V13.333C8.66699 13.6866 8.80757 14.0263 9.05762 14.2764C9.30764 14.5262 9.64653 14.667 10 14.667C10.3535 14.667 10.6924 14.5262 10.9424 14.2764C11.1924 14.0263 11.333 13.6866 11.333 13.333V7.32812C11.5148 7.58693 11.7159 7.83306 11.9414 8.05859C12.676 8.79319 13.6039 9.30495 14.6172 9.53418C15.4041 9.71216 16.2171 9.71145 17 9.54102V15C17 15.5304 16.7891 16.039 16.4141 16.4141C16.039 16.7891 15.5304 17 15 17H5C4.46957 17 3.96101 16.7891 3.58594 16.4141C3.21086 16.039 3 15.5304 3 15V5C3 4.46957 3.21086 3.96101 3.58594 3.58594C3.96101 3.21086 4.46957 3 5 3ZM6.66699 7.83301C6.31337 7.83301 5.97368 7.97358 5.72363 8.22363C5.47358 8.47368 5.33301 8.81337 5.33301 9.16699V13.333C5.33301 13.6866 5.47358 14.0263 5.72363 14.2764C5.97368 14.5264 6.31337 14.667 6.66699 14.667C7.02042 14.6669 7.35942 14.5262 7.60938 14.2764C7.85942 14.0263 8 13.6866 8 13.333V9.16699C8 8.81337 7.85942 8.47368 7.60938 8.22363C7.35942 7.97376 7.02042 7.83309 6.66699 7.83301ZM13.333 10.333C12.9796 10.3331 12.6406 10.4738 12.3906 10.7236C12.1406 10.9737 12 11.3134 12 11.667V13.333C12 13.6866 12.1406 14.0263 12.3906 14.2764C12.6406 14.5262 12.9796 14.6669 13.333 14.667C13.6866 14.667 14.0263 14.5264 14.2764 14.2764C14.5264 14.0263 14.667 13.6866 14.667 13.333V11.667C14.667 11.3134 14.5264 10.9737 14.2764 10.7236C14.0263 10.4736 13.6866 10.333 13.333 10.333Z" fill="#8DB524" stroke="#8DB524"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Produk Low Stock
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                {{ $lowStockProducts }}
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
                Nilai Inventaris
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                Rp {{ number_format($inventoryValue,0,',','.') }}
            </h2>

        </div>

    </div>

     <!-- FILTER -->
    <form method="GET" action="{{ url('/admin/report-stock') }}" class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] mb-[24px]">

        <div class="flex items-end justify-between flex-wrap gap-[18px]">

            <div class="flex items-end gap-[12px] flex-wrap">


                <!-- CATEGORY -->
                <div>

                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        Kategori
                    </p>

                    <select
                        name="category"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- STOCK STATUS -->
                <div>

                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        Status Stok
                    </p>

                    <select
                        name="stock_status"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="aman"
                            {{ request('stock_status') == 'aman' ? 'selected' : '' }}>
                            Aman
                        </option>

                        <option
                            value="low"
                            {{ request('stock_status') == 'low' ? 'selected' : '' }}>
                            Low Stock
                        </option>

                    </select>

                </div>

                <!-- PRODUCT TYPE -->
                <div>

                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        Tipe Produk
                    </p>

                    <select
                        name="product_type"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                        <option value="">
                            Semua Tipe
                        </option>

                        <option
                            value="Ready Stok"
                            {{ request('product_type') == 'Ready Stok' ? 'selected' : '' }}>
                            Ready Stok
                        </option>

                        <option
                            value="PO"
                            {{ request('product_type') == 'PO' ? 'selected' : '' }}>
                            PO
                        </option>

                        <option
                            value="Jasa"
                            {{ request('product_type') == 'Jasa' ? 'selected' : '' }}>
                            Jasa
                        </option>

                    </select>

                </div>

            </div>

            <div class="flex gap-[10px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..."
                    class="w-[240px] px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">


                <button
                    type="submit"
                    class="px-[20px] py-[11px] bg-primary-500 text-neutral-50 rounded-xl font-bold text-[13px] hover:bg-[#5928a7] transition-all duration-[250ms]">
                    Cari
                </button>

                <a href="{{ url('/admin/report-stock') }}"
                    class="px-[20px] py-[11px] border border-neutral-300 rounded-xl font-bold text-[13px] text-neutral-600 hover:bg-neutral-100 transition-all duration-[250ms]">
                    Reset
                </a>

            </div>

        </div>

    </form>

    <div class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full">
        <table class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1000px]">

            <thead class="bg-neutral-100 border-b border-neutral-200">

                <tr>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        PRODUK
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        KATEGORI
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        HARGA MODAL
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        HARGA JUAL
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TOTAL STOK
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        NILAI STOK
                    </th>

                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        STATUS
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($products as $product)

                

                <tr>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $product->name }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $product->category->name }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        Rp {{ number_format($product->cost_price,0,',','.') }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        Rp {{ number_format($product->selling_price,0,',','.') }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200 font-semibold">
                        {{ $product->total_stock }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        Rp {{ number_format($product->total_stock * $product->cost_price,0,',','.') }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">

                        @if($product->total_stock < 10)

                            <span class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-red-100 text-red-500">
                                Low Stock
                            </span>

                        @else

                            <span class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-green-100 text-green-600">
                                Aman
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div id="print-report" class="hidden">

        <div class="p-10">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold">
                    REKAPS STORE
                </h1>

                <h2 class="text-xl font-semibold mt-2">
                    LAPORAN KEUANGAN
                </h2>

                <p class="text-sm text-neutral-500 mt-2">
                    Dicetak pada {{ now()->format('d F Y') }}
                </p>

            </div>


                <div class="border-t border-b py-4 mb-6">

                    <h3 class="text-lg font-bold mb-3">
                        Ringkasan Stok Barang
                    </h3>

                    <div class="space-y-2 text-sm">

                        <div class="flex justify-between">
                            <span>Total Produk</span>
                            <span class="font-semibold">
                                {{ $totalProducts }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Total Stok</span>
                            <span class="font-semibold">
                                {{ $totalStock }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Produk Low Stock</span>
                            <span class="font-semibold">
                                {{ $lowStockProducts }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Nilai Inventaris</span>
                            <span class="font-semibold">
                                Rp {{ number_format($inventoryValue,0,',','.') }}
                            </span>
                        </div>

                    </div>

                </div>


            <h3 class="text-lg font-bold mb-4">
                Detail Laporan Stok Barang
            </h3>

            <table class="w-full border border-neutral-400 text-sm">

                <thead>

                    <tr class="bg-neutral-100">

                        <th class="border border-neutral-400 px-3 py-2">
                            Produk
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Kategori
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Harga Modal
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Harga Jual
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Total Stok
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Nilai Stok
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($products as $product)

                    <tr>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->name }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->category->name }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            Rp {{ number_format($product->cost_price,0,',','.') }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            Rp {{ number_format($product->selling_price,0,',','.') }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->total_stock }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            Rp {{ number_format($product->total_stock * $product->cost_price,0,',','.') }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $product->total_stock < 10 ? 'Low Stock' : 'Aman' }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="mt-16 flex justify-end">

                <div class="text-center">

                    <p>Kepala Departement <br> Ekonomi Kreatif HIMARPL</p>

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