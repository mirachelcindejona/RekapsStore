@extends('admin.layouts.layout') 

@section('title', 'Keuangan')

@section('page_title', 'Keuangan')

@section('page_breadcrumb', 'Manajemen Keuangan') 

@section('content')

<!-- HEADER -->
<div
  class="mb-[20px] flex flex-wrap items-center justify-end gap-[12px] max-[900px]:flex-col max-[900px]:items-start"
>

  
  <!-- ACTION -->
  <div class="flex items-center gap-[10px]">
    {{-- <button
      class="flex items-center justify-center gap-[6px] rounded-xl border border-primary-500 bg-transparent px-[16px] py-[8px] text-[12px] font-bold text-primary-500 transition-all duration-[250ms] cursor-pointer hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]"
    >
      Import
    </button> --}}

    <button
      onclick="openModal('modalTransaction')"
      class="flex items-center justify-center gap-[6px] rounded-xl bg-primary-500 px-[16px] py-[12px] text-[12px] font-bold text-neutral-50 shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-all duration-[250ms] border-none cursor-pointer whitespace-nowrap shrink-0 hover:bg-[#5928a7] hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]"
    >
      + Tambah Transaksi
    </button>
  </div>
</div>

<div
  id="overlay"
  class="overlay"
  onclick="closeModal('modalTransaction')"
>
</div>
<!-- MODAL TRANSACTION -->
<div id="modalTransaction" class="fixed inset-0 hidden items-center justify-center bg-black/50 backdrop-blur-sm z-[9999] [&.active]:flex">
  <div class="w-full max-w-[420px] rounded-[20px] bg-white px-[24px] py-[20px] shadow-[0_20px_50px_rgba(0,0,0,0.12)]">

    <h2 class="mb-[18px] text-[18px] font-bold">
      Tambah Transaksi
    </h2>

    <form action="/admin/finance/store" method="POST">

      @csrf

      <div class="flex flex-col gap-[10px]">

        <!-- JUMLAH -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Jumlah
          </label>

          <input
            type="number"
            name="amount"
            placeholder="Rp. 0"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          />
        </div>

        <!-- TIPE -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Tipe
          </label>

          <select
            name="type"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          >
            <option value="Pemasukan">Pemasukan</option>
            <option value="Pengeluaran">Pengeluaran</option>
          </select>
        </div>

        <!-- TANGGAL -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Tanggal
          </label>

          <input
            type="date"
            name="date"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          />
        </div>

        <!-- KATEGORI -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Program Kerja
          </label>

          <select
            name="category"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          >
            <option value="Program Kerja 1">Program Kerja 1</option>
            <option value="Program Kerja 2">Program Kerja 2</option>
            <option value="Sponsorship">Sponsorship</option>
            <option value="Operasional">Operasional</option>
          </select>
        </div>

        <!-- KETERANGAN -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Keterangan
          </label>

          <input
            type="text"
            name="description"
            placeholder="Contoh: Penjualan hari ini"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          />
        </div>

      </div>

      <div class="mt-[24px] flex justify-end gap-[10px]">

        <button
          type="button"
          onclick="closeModal('modalTransaction')"
          class="rounded-xl bg-neutral-300 px-[16px] py-[8px] text-[12px] font-bold text-neutral-700 cursor-pointer"
        >
          Batal
        </button>

        <button
          type="submit"
          class="rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-white cursor-pointer"
        >
          Simpan
        </button>

      </div>

    </form>

  </div>
</div>

<!-- MODAL EDIT TRANSACTION -->
<div id="modalEditTransaction" class="fixed inset-0 hidden items-center justify-center bg-black/50 backdrop-blur-sm z-[9999] [&.active]:flex">
  <div class="w-full max-w-[420px] rounded-[20px] bg-white p-[24px] shadow-[0_20px_50px_rgba(0,0,0,0.12)]">

    <h2 class="mb-[18px] text-[18px] font-bold">
      Edit Transaksi
    </h2>

    <form id="editForm" method="POST">

      @csrf

      <div class="flex flex-col gap-[10px]">

        <!-- JUMLAH -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Jumlah
          </label>

          <input
            type="number"
            name="amount"
            id="editAmount"
            placeholder="Rp. 0"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          />
        </div>

        <!-- TIPE -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Tipe
          </label>

          <select
            name="type"
            id="editType"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          >
            <option value="Pemasukan">Pemasukan</option>
            <option value="Pengeluaran">Pengeluaran</option>
          </select>
        </div>

        <!-- TANGGAL -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Tanggal
          </label>

          <input
            type="date"
            id="editDate"
            name="date"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          />
        </div>

        <!-- KATEGORI -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Program Kerja
          </label>

          <select
            name="category"
            id="editCategory"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          >
            <option value="Program Kerja 1">Program Kerja 1</option>
            <option value="Program Kerja 2">Program Kerja 2</option>
            <option value="Sponsorship">Sponsorship</option>
            <option value="Operasional">Operasional</option>
          </select>
        </div>

        <!-- KETERANGAN -->
        <div>
          <label class="mb-[6px] block text-[13px] font-semibold text-neutral-600">
            Keterangan
          </label>

          <input
            type="text"
            name="description"
            id="editDescription"
            placeholder="Contoh: Penjualan hari ini"
            class="w-full rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none"
            required
          />
        </div>

      </div>

      <div class="mt-[24px] flex justify-end gap-[10px]">

        <button
          type="button"
          onclick="closeModal('modalEditTransaction')"
          class="rounded-xl bg-neutral-300 px-[16px] py-[8px] text-[12px] font-bold text-neutral-700 cursor-pointer"
        >
          Batal
        </button>

        <button
          type="submit"
          class="rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-white cursor-pointer"
        >
          Update
        </button>

      </div>

    </form>

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
      Rp. {{ number_format($totalIncome, 0, ',', '.') }}
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
      Rp. {{ number_format($totalExpense, 0, ',', '.') }}
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
      Rp. {{ number_format($balance, 0, ',', '.') }}
    </h2>

    <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800">
        Profit margin : 59.2% 
      </span>
  </div>

  

</div>

  
  <!-- FILTER -->
<div class="mb-[20px] mt-[20px] rounded-[20px] border border-neutral-200 bg-white p-[20px] shadow-[0_4px_12px_rgba(0,0,0,0.04)]">

    <h3 class="mb-[16px] text-[16px] font-bold text-neutral-900">
        Filter Transaksi
    </h3>
    <form method="GET" action="/admin/finance" class="flex flex-wrap items-center gap-[12px]">

      <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari transaksi..." class="w-[250px] rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">

      <select name="type" class="rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">
          <option value="Semua">Semua</option>
          <option value="Pemasukan">Pemasukan</option>
          <option value="Pengeluaran">Pengeluaran</option>
      </select>

      <input type="date" name="from_date" value="{{ request('from_date') }}" class="rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">

      <input type="date" name="to_date" value="{{ request('to_date') }}" class="rounded-xl border border-neutral-300 px-[14px] py-[10px] outline-none">

      <button type="submit" class="rounded-xl bg-primary-500 px-[18px] py-[10px] text-white font-semibold cursor-pointer">
          Terapkan
      </button>

      <a href="/admin/finance" class="rounded-xl border border-neutral-300 px-[18px] py-[10px] text-neutral-600 font-semibold hover:bg-neutral-100">
          Reset
      </a>

    </form>
  

</div>
<!-- TABLE -->
<div
  class="mt-[24px] w-full overflow-x-auto rounded-[20px] bg-neutral-50 p-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-neutral-300"
>
  <!-- HEADER -->
  <div class="mb-[16px] flex items-center justify-between">

    <h3 class="text-[18px] font-bold text-neutral-800">
        Riwayat Transaksi
    </h3>



  </div>

  <!-- TABLE -->
  <table class="w-full min-w-[900px] border-collapse overflow-hidden rounded-2xl">
    <thead class="border-b-[0.2px] border-neutral-300 bg-neutral-100">
      <tr>
        <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          TANGGAL
        </th>

        <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          KETERANGAN
        </th>

        <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          KATEGORI
        </th>

        <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          TIPE
        </th>

        <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          JUMLAH
        </th>

        {{-- <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          SALDO
        </th> --}}

        <th class="whitespace-nowrap px-[16px] py-[14px] text-left text-[12px] font-bold text-neutral-500">
          AKSI
        </th>
      </tr>
    </thead>

    <tbody>

      @foreach($transactions as $transaction)

      <tr class="hover:bg-primary-50 transition-all duration-200">

          <td class="px-5 py-4 border-t border-neutral-200">
              {{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}
          </td>

          <td class="px-5 py-4 border-t border-neutral-200 font-medium">
              {{ $transaction->description }}
          </td>

          <td class="px-5 py-4 border-t border-neutral-200">

              <span
                  class="inline-flex items-center rounded-full bg-primary-500/15 px-3 py-1 text-[11px] font-bold text-primary-600">

                  {{ $transaction->category }}

              </span>

          </td>

          <td class="px-5 py-4 border-t border-neutral-200">

              @if($transaction->type == 'Pemasukan')

                  <span
                      class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-[11px] font-bold text-green-600">

                      Pemasukan

                  </span>

              @else

                  <span
                      class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-[11px] font-bold text-red-600">

                      Pengeluaran

                  </span>

              @endif

          </td>

          <td class="px-5 py-4 border-t border-neutral-200 font-bold">

              @if($transaction->type == 'Pemasukan')

                  <span class="text-green-500">
                      + Rp {{ number_format($transaction->amount,0,',','.') }}
                  </span>

              @else

                  <span class="text-red-500">
                      - Rp {{ number_format($transaction->amount,0,',','.') }}
                  </span>

              @endif

          </td>

          {{-- <td class="px-5 py-4 border-t border-neutral-200">
              Rp 8.400.000
          </td> --}}

          <td
          class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap"
        >
          <div class="flex gap-[6px]">
            <button
                type="button"
                onclick="openEditModal(
                    '{{ $transaction->id }}',
                    '{{ $transaction->amount }}',
                    '{{ $transaction->type }}',
                    '{{ $transaction->date }}',
                    '{{ $transaction->category }}',
                    '{{ $transaction->description }}'
                )"
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
            {{-- <a href="{{ url('/admin/finance-edit') }}">
              <button
                class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]"
              >
                
              </button>
            </a> --}}

            <button
              class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-[#fb2c36] text-[#fb2c36] hover:bg-[#fb2c36] hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)] outline-none"
              onclick="confirmDelete({{ $transaction->id }})"
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

      @endforeach

    </tbody>
  </table>
</div>

<div
    id="modalConfirmDelete"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] [&.active]:flex"
>
    <div
        class="flex flex-col items-center p-[20px_28px] gap-[24px] w-[355px] bg-neutral-50 rounded-[20px]"
    >

        <h2 class="text-[18px] font-bold">
            Hapus Transaksi?
        </h2>

        <p class="text-[12px] text-neutral-500 text-center">
            Anda yakin ingin menghapus transaksi ini?
        </p>

        <div class="flex gap-[12px]">

            <button
                type="button"
                onclick="closeModal('modalConfirmDelete')"
                class="px-[16px] py-[8px] bg-neutral-300 rounded-xl text-[12px] font-bold cursor-pointer"
            >
                Batal
            </button>

            <button
                type="button"
                onclick="deleteTransaction()"
                class="px-[16px] py-[8px] bg-[#fb2c36] rounded-xl text-[12px] font-bold text-white cursor-pointer"
            >
                Hapus
            </button>

        </div>

    </div>
</div>

<form
    id="deleteForm"
    method="POST"
    style="display:none"
>
    @csrf
    @method('DELETE')
</form>

<script>
  function openModal(modalId) {
    document.getElementById(modalId).classList.add("active");
  }

  function openEditModal(
    id,
    amount,
    type,
    date,
    category,
    description
  ){
    document.getElementById('editForm').action =  '/admin/finance/update/' + id;
    document.getElementById('editAmount').value = amount;
    document.getElementById('editType').value = type;
    document.getElementById('editDate').value = date;
    document.getElementById('editCategory').value = category;
    document.getElementById('editDescription').value = description;
    openModal('modalEditTransaction');
  }
  function closeModal(modalId) {
    document.getElementById(modalId).classList.remove("active");
  }


  function confirmDelete(id) {
      selectedTransactionId = id;
      openModal('modalConfirmDelete');


  }
  
  function deleteTransaction() {
      document.getElementById('deleteForm').action = '/admin/finance/delete/' + selectedTransactionId;
      document.getElementById('deleteForm').submit();
  }
</script>

@endsection @section('footer') 

@endsection
