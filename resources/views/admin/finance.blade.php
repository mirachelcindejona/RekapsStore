@extends('admin.layouts.layout')

@section('content')

<!-- HEADER -->
<div
    class="mb-[20px] flex flex-wrap items-center justify-between gap-[12px] max-[900px]:flex-col max-[900px]:items-start">

    <!-- FILTER -->
    <section class="flex items-center justify-center">
        <div
            class="flex w-fit items-center gap-[4px] rounded-lg bg-neutral-50 p-[4px] shadow-[0_0_8px_rgba(0,0,0,0.25)]">

            <button
                class="flex items-center justify-center rounded-md bg-primary-500 px-[14px] py-[4px] text-[14px] font-bold text-neutral-50 shadow-[0_0_8px_rgba(125,57,235,0.35)] transition-all duration-[250ms] outline-none border-none cursor-pointer max-[560px]:text-[13px]">
                Jan 2026
            </button>

            <button
                class="flex items-center justify-center rounded-md bg-transparent px-[14px] py-[4px] text-[14px] font-bold text-neutral-500 transition-all duration-[250ms] outline-none border-none cursor-pointer hover:text-primary-500 max-[560px]:text-[13px]">
                Feb 2026
            </button>

            <button
                class="flex items-center justify-center rounded-md bg-transparent px-[14px] py-[4px] text-[14px] font-bold text-neutral-500 transition-all duration-[250ms] outline-none border-none cursor-pointer hover:text-primary-500 max-[560px]:text-[13px]">
                Mar 2026
            </button>

            <button
                class="flex items-center justify-center rounded-md bg-transparent px-[14px] py-[4px] text-[14px] font-bold text-neutral-500 transition-all duration-[250ms] outline-none border-none cursor-pointer hover:text-primary-500 max-[560px]:text-[13px]">
                Apr 2026
            </button>
        </div>
    </section>

    <!-- ACTION -->
    <div class="flex items-center gap-[10px]">

        <button
            class="flex items-center justify-center gap-[6px] rounded-xl border border-primary-500 bg-transparent px-[16px] py-[8px] text-[12px] font-bold text-primary-500 transition-all duration-[250ms] cursor-pointer hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]">
            Import
        </button>

        <button onclick="openModal('modalTransaction')"
            class="flex items-center justify-center gap-[6px] rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-neutral-50 shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-all duration-[250ms] border-none cursor-pointer whitespace-nowrap shrink-0 hover:bg-[#5928a7] hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]">
            + Tambah Transaksi
        </button>

    </div>
</div>

<div id="overlay" class="overlay" onclick="closeModal('modalTransaction')"></div>
<!-- MODAL TRANSACTION -->
<div id="modalTransaction"
    class="fixed inset-0 hidden items-center justify-center bg-black/50 z-[9999] [&.active]:flex">

    <div class="w-full max-w-[500px] rounded-[20px] bg-white p-[24px]">

        <h2 class="mb-[20px] text-[20px] font-bold">
            Tambah Transaksi
        </h2>

        <div class="flex flex-col gap-[14px]">

            <div>
                <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
                    Jumlah
                </label>

                <input type="number"
                    placeholder="Rp. 0"
                    class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">
            </div>

            <div>
                <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
                    Tipe
                </label>

                <select
                    class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">
                    <option>Pemasukan</option>
                    <option>Pengeluaran</option>
                </select>
            </div>

            <div>
                <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
                    Tanggal
                </label>

                <input type="date"
                    class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">
            </div>

            <div>
                <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
                    Program Kerja
                </label>

                <select
                    class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">
                    <option>Program Kerja 1</option>
                    <option>Program Kerja 2</option>
                </select>
            </div>

            <div>
                <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
                    Keterangan
                </label>

                <input type="text"
                    placeholder="Contoh: Penjualan hari ini"
                    class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">
            </div>

        </div>

        <div class="mt-[24px] flex justify-end gap-[10px]">

            <button onclick="closeModal('modalTransaction')"
                class="rounded-xl bg-neutral-300 px-[16px] py-[8px] text-[12px] font-bold text-neutral-700 cursor-pointer">
                Batal
            </button>

            <button
                class="rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-white cursor-pointer">
                Simpan
            </button>

        </div>

    </div>
</div>
<!-- CARDS -->
<div class="grid grid-cols-3 gap-[20px] max-[900px]:grid-cols-1">

    <!-- PEMASUKAN -->
    <div
        class="rounded-[20px] border-t-[4px] border-[#84cc16] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]">
        <p class="text-[12px] font-bold text-neutral-500">
            TOTAL PEMASUKAN
        </p>

        <h2 class="mt-[10px] text-[28px] font-black text-[#84cc16]">
            Rp. 14.200.000
        </h2>

        <span class="text-[12px] text-neutral-400">
            +12.5% vs Bulan Lalu
        </span>
    </div>

    <!-- PENGELUARAN -->
    <div
        class="rounded-[20px] border-t-[4px] border-[#fb2c36] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]">
        <p class="text-[12px] font-bold text-neutral-500">
            TOTAL PENGELUARAN
        </p>

        <h2 class="mt-[10px] text-[28px] font-black text-[#fb2c36]">
            Rp. 5.800.000
        </h2>

        <span class="text-[12px] text-neutral-400">
            +3.2% vs Bulan Lalu
        </span>
    </div>

    <!-- SALDO -->
    <div
        class="rounded-[20px] border-t-[4px] border-primary-500 bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]">
        <p class="text-[12px] font-bold text-neutral-500">
            SALDO BERSIH
        </p>

        <h2 class="mt-[10px] text-[28px] font-black text-primary-500">
            Rp. 5.400.000
        </h2>

        <span class="text-[12px] text-neutral-400">
            Profit margin : 59.2%
        </span>
    </div>
</div>

<!-- TABLE -->
<div
    class="mt-[24px] w-full overflow-x-auto rounded-[20px] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-neutral-300">

    <!-- HEADER -->
    <div class="mb-[16px] flex items-center justify-between">
        <h3 class="text-[18px] font-bold text-neutral-800">
            Riwayat Transaksi
        </h3>

        <button
            class="flex items-center justify-center gap-[6px] rounded-xl bg-[#84cc16] px-[16px] py-[8px] text-[12px] font-bold text-neutral-50 transition-all duration-[250ms] border-none cursor-pointer hover:opacity-90">
            Export Excel
        </button>
    </div>

    <!-- TABLE -->
    <table class="w-full min-w-[900px] border-collapse overflow-hidden rounded-2xl">

        <thead class="border-b-[0.2px] border-neutral-300 bg-neutral-100">
            <tr>
                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    TANGGAL
                </th>

                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    KETERANGAN
                </th>

                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    KATEGORI
                </th>

                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    TIPE
                </th>

                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    JUMLAH
                </th>

                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    SALDO
                </th>

                <th
                    class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
                    AKSI
                </th>
            </tr>
        </thead>

        <tbody>

            <tr class="transition-colors duration-[250ms] hover:bg-primary-50">

                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700">
                    30 Mar
                </td>

                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700">
                    Penjualan Bazar Kampus
                </td>

                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700">
                    <span
                        class="rounded-full bg-primary-500/15 px-[10px] py-[4px] text-[10px] font-bold text-primary-500">
                        Proker Bazar
                    </span>
                </td>

                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700">
                    <span
                        class="rounded-full bg-[rgba(0,200,83,0.15)] px-[10px] py-[4px] text-[10px] font-bold text-[#10b981]">
                        Pemasukan
                    </span>
                </td>

                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] font-bold text-[#84cc16]">
                    + Rp. 2.400.000
                </td>

                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700">
                    Rp. 8.400.000
                </td>

                <!-- AKSI -->
                <td
                    class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700">

                    <div class="flex gap-[6px]">

                        <!-- EDIT -->
                        <button
                            class="flex h-[36px] w-[36px] items-center justify-center rounded-xl border border-primary-500 bg-neutral-50 text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]">
                            ✏️
                        </button>

                        <!-- DELETE -->
                        <button onclick="openModal('modalConfirmDelete')"
                            class="flex h-[36px] w-[36px] items-center justify-center rounded-xl border border-[#fb2c36] bg-neutral-50 text-[#fb2c36] transition-all duration-[250ms] hover:bg-[#fb2c36] hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)]">
                            🗑️
                        </button>

                    </div>

                </td>

            </tr>

        </tbody>

    </table>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }
</script>

@endsection

@section('footer')
@endsection
