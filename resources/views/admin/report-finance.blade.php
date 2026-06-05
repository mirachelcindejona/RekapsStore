@extends('admin.layouts.layout')

@section('title', 'Laporan Keuangan')

@section('page_title', 'Laporan & Rekap')

@section('page_breadcrumb', 'Laporan Keuangan')

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
    <div class="flex items-center justify-between mb-[20px] flex-wrap gap-[12px] no-print">

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

            <button onclick="printReport()"
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl border border-primary-500 text-primary-500 bg-neutral-50 font-bold text-[13px] cursor-pointer transition-all duration-[250ms] hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 17V15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V17M7 17V19C7 19.5304 7.21071 20.0391 7.58579 20.4142C7.96086 20.7893 8.46957 21 9 21H15C15.5304 21 16.0391 20.7893 16.4142 20.4142C16.7893 20.0391 17 19.5304 17 19V17M7 17H5C4.46957 17 3.96086 16.7893 3.58579 16.4142C3.21071 16.0391 3 15.5304 3 15V9C3 8.46957 3.21071 7.96086 3.58579 7.58579C3.96086 7.21071 4.46957 7 5 7H6M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V9C21 8.46957 20.7893 7.96086 20.4142 7.58579C20.0391 7.21071 19.5304 7 19 7H18M6 7V5C6 4.46957 6.21071 3.96086 6.58579 3.58579C6.96086 3.21071 7.46957 3 8 3H16C16.5304 3 17.0391 3.21071 17.4142 3.58579C17.7893 3.96086 18 4.46957 18 5V7M6 7H18" stroke="#A87AF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 9C2 8.20435 2.31607 7.44129 2.87868 6.87868C3.44129 6.31607 4.20435 6 5 6H19C19.7956 6 20.5587 6.31607 21.1213 6.87868C21.6839 7.44129 22 8.20435 22 9V15C22 15.7956 21.6839 16.5587 21.1213 17.1213C20.5587 17.6839 19.7956 18 19 18H17C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V15C16 14.7348 15.8946 14.4804 15.7071 14.2929C15.5196 14.1054 15.2652 14 15 14H9C8.73478 14 8.48043 14.1054 8.29289 14.2929C8.10536 14.4804 8 14.7348 8 15V17C8 17.2652 7.89464 17.5196 7.70711 17.7071C7.51957 17.8946 7.26522 18 7 18H5C4.20435 18 3.44129 17.6839 2.87868 17.1213C2.31607 16.5587 2 15.7956 2 15V9ZM7 9C6.73478 9 6.48043 9.10536 6.29289 9.29289C6.10536 9.48043 6 9.73478 6 10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11H8C8.26522 11 8.51957 10.8946 8.70711 10.7071C8.89464 10.5196 9 10.2652 9 10C9 9.73478 8.89464 9.48043 8.70711 9.29289C8.51957 9.10536 8.26522 9 8 9H7Z" fill="#A87AF2"/>
                </svg>
                Cetak Laporan Keuangan
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
                <span class="text-sm font-bold">Rp</span>Rp {{ number_format($totalIncome,0,',','.') }}
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
                <span class="text-sm font-bold">Rp</span> {{ number_format($totalExpense,0,',','.') }}
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
                Rp {{ number_format($balance,0,',','.') }}
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
                JUMLAH TRANSAKSI
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                {{ $totalTransactions }}
            </h2>

        </div>

    </div>

    <!-- FILTER -->
    <div class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] mb-[24px] no-print">

        <form method="GET" action="/admin/report-finance">

            <div class="flex items-center justify-between flex-wrap gap-[18px]">

                <!-- DATE -->
                <div class="flex items-center gap-[12px] flex-wrap">

                    <div>
                        <p class="text-[13px] text-neutral-500 mb-[6px]">
                            From
                        </p>

                        <input type="date" name="from_date" value="{{ request('from_date') }}" class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                    </div>

                    <div>
                        <p class="text-[13px] text-neutral-500 mb-[6px]">
                            To
                        </p>

                        <input type="date" name="to_date" value="{{ request('to_date') }}" class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                    </div>

                </div>

                <!-- SEARCH -->
                <div class="flex items-center gap-[10px]">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari keterangan transaksi..." class="w-[280px] max-[560px]:w-full px-[16px] py-[11px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                    <button type="submit" class="px-[20px] py-[11px] bg-primary-500 text-neutral-50 rounded-xl font-bold text-[13px] hover:bg-[#5928a7] transition-all duration-[250ms] cursor-pointer">
                        Cari
                    </button>

                    <a href="/admin/report-finance" class="px-[20px] py-[11px] border border-neutral-300 rounded-xl font-bold text-[13px] text-neutral-600 hover:bg-neutral-100 transition-all duration-[250ms]">
                        Reset
                    </a>

                </div>

            </div>

        </form>

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

                </tr>

            </thead>

            <tbody>

                @foreach($transactions as $transaction)

                <tr>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $transaction->date }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $transaction->description }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $transaction->category }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200">
                        {{ $transaction->type }}
                    </td>

                    <td class="px-[16px] py-[14px] border-t border-neutral-200 font-semibold">
                        Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- PRINT --}}
    <div id="print-report" class="hidden">

        <div class="p-10">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold">
                    REKAPS STORE
                </h1>

                <h2 class="text-xl font-semibold mt-2">
                    LAPORAN KEUANGAN
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
                    Ringkasan Keuangan
                </h3>

                <div class="space-y-2 text-sm">

                    <div class="flex justify-between">
                        <span>Total Pemasukan</span>
                        <span class="font-semibold">
                            Rp {{ number_format($totalIncome,0,',','.') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Total Pengeluaran</span>
                        <span class="font-semibold">
                            Rp {{ number_format($totalExpense,0,',','.') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Saldo Bersih</span>
                        <span class="font-semibold">
                            Rp {{ number_format($balance,0,',','.') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Jumlah Transaksi</span>
                        <span class="font-semibold">
                            {{ $totalTransactions }}
                        </span>
                    </div>

                </div>

            </div>

            <h3 class="text-lg font-bold mb-4">
                Detail Laporan Keuangan
            </h3>

            <table class="w-full border border-neutral-400 text-sm">

                <thead>

                    <tr class="bg-neutral-100">

                        <th class="border border-neutral-400 px-3 py-2">
                            Tanggal
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Keterangan
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Kategori
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Tipe
                        </th>

                        <th class="border border-neutral-400 px-3 py-2">
                            Jumlah
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($transactions as $transaction)

                    <tr>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $transaction->date }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $transaction->description }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $transaction->category }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            {{ $transaction->type }}
                        </td>

                        <td class="border border-neutral-300 px-3 py-2">
                            Rp {{ number_format($transaction->amount,0,',','.') }}
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