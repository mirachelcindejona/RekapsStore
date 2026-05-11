@extends('admin.layouts.layout') 

@section('title', 'Keuangan')

@section('page_title', 'Keuangan')

@section('page_breadcrumb', 'Manajemen Keuangan') 

@section('content')

<!-- HEADER -->
<div
  class="mb-[20px] flex flex-wrap items-center justify-between gap-[12px] max-[900px]:flex-col max-[900px]:items-start"
>
  <!-- FILTER -->
  <section class="flex items-center justify-center">
    <div
      class="flex w-fit items-center gap-[4px] rounded-lg bg-neutral-50 p-[4px] shadow-[0_0_8px_rgba(0,0,0,0.25)]"
    >
      <button
        class="flex items-center justify-center rounded-md bg-primary-500 px-[14px] py-[4px] text-[14px] font-bold text-neutral-50 shadow-[0_0_8px_rgba(125,57,235,0.35)] transition-all duration-[250ms] outline-none border-none cursor-pointer max-[560px]:text-[13px]"
      >
        Jan 2026
      </button>

      <button
        class="flex items-center justify-center rounded-md bg-transparent px-[14px] py-[4px] text-[14px] font-bold text-neutral-500 transition-all duration-[250ms] outline-none border-none cursor-pointer hover:text-primary-500 max-[560px]:text-[13px]"
      >
        Feb 2026
      </button>

      <button
        class="flex items-center justify-center rounded-md bg-transparent px-[14px] py-[4px] text-[14px] font-bold text-neutral-500 transition-all duration-[250ms] outline-none border-none cursor-pointer hover:text-primary-500 max-[560px]:text-[13px]"
      >
        Mar 2026
      </button>

      <button
        class="flex items-center justify-center rounded-md bg-transparent px-[14px] py-[4px] text-[14px] font-bold text-neutral-500 transition-all duration-[250ms] outline-none border-none cursor-pointer hover:text-primary-500 max-[560px]:text-[13px]"
      >
        Apr 2026
      </button>
    </div>
  </section>

  <!-- ACTION -->
  <div class="flex items-center gap-[10px]">
    <button
      class="flex items-center justify-center gap-[6px] rounded-xl border border-primary-500 bg-transparent px-[16px] py-[8px] text-[12px] font-bold text-primary-500 transition-all duration-[250ms] cursor-pointer hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]"
    >
      Import
    </button>

    <button
      onclick="openModal('modalTransaction')"
      class="flex items-center justify-center gap-[6px] rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-neutral-50 shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-all duration-[250ms] border-none cursor-pointer whitespace-nowrap shrink-0 hover:bg-[#5928a7] hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]"
    >
      + Tambah Transaksi
    </button>
  </div>
</div>

<div
  id="overlay"
  class="overlay"
  onclick="closeModal('modalTransaction')"
></div>
<!-- MODAL TRANSACTION -->
<div
  id="modalTransaction"
  class="fixed inset-0 hidden items-center justify-center bg-black/50 z-[9999] [&.active]:flex"
>
  <div class="w-full max-w-[500px] rounded-[20px] bg-white p-[24px]">
    <h2 class="mb-[20px] text-[20px] font-bold">Tambah Transaksi</h2>

    <div class="flex flex-col gap-[14px]">
      <div>
        <label
          class="mb-[6px] block text-[13px] font-semibold text-neutral-600"
        >
          Jumlah
        </label>

        <input
          type="number"
          placeholder="Rp. 0"
          class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
        />
      </div>

      <div>
        <label
          class="mb-[6px] block text-[13px] font-semibold text-neutral-600"
        >
          Tipe
        </label>

        <select
          class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
        >
          <option>Pemasukan</option>
          <option>Pengeluaran</option>
        </select>
      </div>

      <div>
        <label
          class="mb-[6px] block text-[13px] font-semibold text-neutral-600"
        >
          Tanggal
        </label>

        <input
          type="date"
          class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
        />
      </div>

      <div>
        <label
          class="mb-[6px] block text-[13px] font-semibold text-neutral-600"
        >
          Program Kerja
        </label>

        <select
          class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
        >
          <option>Program Kerja 1</option>
          <option>Program Kerja 2</option>
        </select>
      </div>

      <div>
        <label
          class="mb-[6px] block text-[13px] font-semibold text-neutral-600"
        >
          Keterangan
        </label>

        <input
          type="text"
          placeholder="Contoh: Penjualan hari ini"
          class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
        />
      </div>
    </div>

    <div class="mt-[24px] flex justify-end gap-[10px]">
      <button
        onclick="closeModal('modalTransaction')"
        class="rounded-xl bg-neutral-300 px-[16px] py-[8px] text-[12px] font-bold text-neutral-700 cursor-pointer"
      >
        Batal
      </button>

      <button
        class="rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-white cursor-pointer"
      >
        Simpan
      </button>
    </div>
  </div>
</div>
<!-- CARDS -->
<div class="grid grid-cols-3 gap-[20px] max-[900px]:grid-cols-1">
  <!-- PEMASUKAN -->
  <div
    class="rounded-[20px] border-t-[4px] border-[#84cc16] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]"
  >
    <p class="text-[12px] font-bold text-neutral-500">TOTAL PEMASUKAN</p>

    <h2 class="mt-[10px] text-[28px] font-black text-[#84cc16]">
      Rp. 14.200.000
    </h2>

    <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800">
        ▲ 12.5% dari bulan lalu
      </span>
  </div>

  <!-- PENGELUARAN -->
  <div
    class="rounded-[20px] border-t-[4px] border-[#fb2c36] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]"
  >
    <p class="text-[12px] font-bold text-neutral-500">TOTAL PENGELUARAN</p>

    <h2 class="mt-[10px] text-[28px] font-black text-[#fb2c36]">
      Rp. 5.800.000
    </h2>

    <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800">
        ▲ 3.5% dari bulan lalu
      </span>
  </div>

  <!-- SALDO -->
  <div
    class="rounded-[20px] border-t-[4px] border-primary-500 bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]"
  >
    <p class="text-[12px] font-bold text-neutral-500">SALDO BERSIH</p>

    <h2 class="mt-[10px] text-[28px] font-black text-primary-500">
      Rp. 5.400.000
    </h2>

    <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800">
        Profit margin : 59.2% 
      </span>
  </div>
</div>

<!-- TABLE -->
<div
  class="mt-[24px] w-full overflow-x-auto rounded-[20px] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-neutral-300"
>
  <!-- HEADER -->
  <div class="mb-[16px] flex items-center justify-between">
    <h3 class="text-[18px] font-bold text-neutral-800">Riwayat Transaksi</h3>

    <button
      class="flex items-center justify-center gap-[6px] rounded-xl bg-[#84cc16] px-[16px] py-[8px] text-[12px] font-bold text-neutral-50 transition-all duration-[250ms] border-none cursor-pointer hover:opacity-90"
    >
      Export Excel
    </button>
  </div>

  <!-- TABLE -->
  <table
    class="w-full min-w-[900px] border-collapse overflow-hidden rounded-2xl"
  >
    <thead class="border-b-[0.2px] border-neutral-300 bg-neutral-100">
      <tr>
        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          TANGGAL
        </th>

        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          KETERANGAN
        </th>

        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          KATEGORI
        </th>

        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          TIPE
        </th>

        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          JUMLAH
        </th>

        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          SALDO
        </th>

        <th
          class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500"
        >
          AKSI
        </th>
      </tr>
    </thead>

    <tbody>
      <tr class="transition-colors duration-[250ms] hover:bg-primary-50">
        <td
          class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700"
        >
          30 Mar
        </td>

        <td
          class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700"
        >
          Penjualan Bazar Kampus
        </td>

        <td
          class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700"
        >
          <span
            class="rounded-full bg-primary-500/15 px-[10px] py-[4px] text-[10px] font-bold text-primary-500"
          >
            Proker Bazar
          </span>
        </td>

        <td
          class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700"
        >
          <span
            class="rounded-full bg-[rgba(0,200,83,0.15)] px-[10px] py-[4px] text-[10px] font-bold text-[#10b981]"
          >
            Pemasukan
          </span>
        </td>

        <td
          class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] font-bold text-[#84cc16]"
        >
          + Rp. 2.400.000
        </td>

        <td
          class="whitespace-nowrap border-t border-neutral-200 px-[16px] py-[14px] text-[13px] text-neutral-700"
        >
          Rp. 8.400.000
        </td>

        <!-- AKSI -->
        <td
          class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap"
        >
          <div class="flex gap-[6px]">
            <a href="{{ url('/admin/finance-edit') }}">
              <button
                class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]"
              >
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </button>
            </a>

            <button
              class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-[#fb2c36] text-[#fb2c36] hover:bg-[#fb2c36] hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)] outline-none"
              onclick="openModal('modalConfirmDelete')"
            >
              <svg
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<script>
  function openModal(modalId) {
    document.getElementById(modalId).classList.add("active");
  }

  function closeModal(modalId) {
    document.getElementById(modalId).classList.remove("active");
  }
</script>

@endsection @section('footer') 

@endsection
