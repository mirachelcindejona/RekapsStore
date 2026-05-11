@extends('admin.layouts.layout') 

@section('content')
<div class="space-y-6">
  <!-- WELCOME BANNER -->
  <div
    class="relative overflow-hidden rounded-3xl bg-neutral-950 px-8 py-7 flex items-center justify-between">
    <!-- LEFT -->
    <div class="relative z-10">
      <p
        class="text-[11px] font-semibold uppercase tracking-[1px] text-neutral-400 mb-1">
        Selamat Datang Kembali 👋
      </p>

      <h1 class="text-[26px] font-black text-white leading-tight mb-1">
        Halo, <span class="text-lime-400">Admin!</span>
      </h1>

      <p class="text-[12px] font-medium text-neutral-400">
        Pantau performa toko kamu hari ini.
      </p>
    </div>

    <!-- RIGHT STATS -->
    <div class="relative z-10 hidden md:flex gap-5">
      <div
        class="text-center rounded-2xl border border-white/10 bg-white/5 px-5 py-4"
      >
        <div class="text-[22px] font-black text-lime-400 leading-none">12</div>
        <div
          class="mt-1 text-[10px] uppercase tracking-[1px] font-semibold text-neutral-400"
        >
          Pesanan Baru
        </div>
      </div>

      <div
        class="text-center rounded-2xl border border-white/10 bg-white/5 px-5 py-4">
        <div class="text-[22px] font-black text-white leading-none">
          Rp4.2jt
        </div>
        <div
          class="mt-1 text-[10px] uppercase tracking-[1px] font-semibold text-neutral-400">
          Pendapatan Hari Ini
        </div>
      </div>

      <div
        class="text-center rounded-2xl border border-white/10 bg-white/5 px-5 py-4">
        <div class="text-[22px] font-black text-white leading-none">3</div>
        <div
          class="mt-1 text-[10px] uppercase tracking-[1px] font-semibold text-neutral-400">
          Stok Kritis
        </div>
      </div>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
    <!-- CARD -->
    <div
      class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">
      <div
        class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-violet-500/15"></div>

      <div
        class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-100 text-violet-600">
        💰
      </div>

      <p
        class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
        Pendapatan Bulan Ini
      </p>

      <h2 class="text-3xl font-black text-neutral-950">
        <span class="text-sm font-bold">Rp</span>18.4jt
      </h2>

      <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800">
        ▲ 12.5% dari bulan lalu
      </span>
    </div>

    <!-- CARD -->
    <div
      class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all"
    >
      <div
        class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-lime-500/15"
      ></div>

      <div
        class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-lime-100 text-lime-700"
      >
        📦
      </div>

      <p
        class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400"
      >
        Total Pesanan
      </p>

      <h2 class="text-3xl font-black text-neutral-950">247</h2>

      <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800"
      >
        ▲ 8.3% dari bulan lalu
      </span>
    </div>

    <!-- CARD -->
    <div
      class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all"
    >
      <div
        class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-red-500/15"
      ></div>

      <div
        class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-red-100 text-red-600"
      >
        🏷️
      </div>

      <p
        class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400"
      >
        Total Produk
      </p>

      <h2 class="text-3xl font-black text-neutral-950">58</h2>

      <span
        class="mt-3 inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-[10px] font-bold text-red-700"
      >
        ▼ 2 produk
      </span>
    </div>

    <!-- CARD -->
    <div
      class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all"
    >
      <div
        class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-teal-500/15"
      ></div>

      <div
        class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-teal-100 text-teal-600"
      >
        👥
      </div>

      <p
        class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400"
      >
        Pembeli Aktif
      </p>

      <h2 class="text-3xl font-black text-neutral-950">134</h2>

      <span
        class="mt-3 inline-flex items-center rounded-full bg-lime-100 px-2 py-1 text-[10px] font-bold text-lime-800"
      >
        ▲ 5.1% dari bulan lalu
      </span>
    </div>
  </div>

  <!-- GRID -->
  <div class="grid grid-cols-1 xl:grid-cols-[1fr_340px] gap-5">
    <!-- CHART -->
    <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
      <div class="flex items-start justify-between px-5 pt-5 mb-4">
        <div>
          <h3 class="text-sm font-extrabold text-neutral-950">
            Grafik Penjualan
          </h3>

          <p class="mt-1 text-[11px] text-neutral-400">
            Perbandingan pendapatan & pesanan
          </p>
        </div>

        <a
          href="{{ url('/admin/reports') }}"
          class="rounded-lg px-3 py-1 text-[11px] font-bold text-violet-600 hover:bg-violet-100"
        >
          Lihat Laporan →
        </a>
      </div>

      <!-- Tabs -->
      <div class="flex gap-1 px-5 mb-4">
        <button
          class="rounded-lg bg-violet-600 px-4 py-1 text-[11px] font-bold text-white"
        >
          Minggu
        </button>

        <button
          class="rounded-lg px-4 py-1 text-[11px] font-bold text-neutral-400"
        >
          Bulan
        </button>

        <button
          class="rounded-lg px-4 py-1 text-[11px] font-bold text-neutral-400"
        >
          Tahun
        </button>
      </div>

      <!-- Chart -->
      <div class="px-5 pb-5">
        <div class="flex h-[155px] items-end gap-2">
          @php $data = [ 
            ['Sen',55,40], 
            ['Sel',75,55], 
            ['Rab',60,45],
            ['Kam',90,70], 
            ['Jum',80,60], 
            ['Sab',100,85], 
            ['Min',50,38], 
            ];
          @endphp @foreach ($data as [$hari, $pendapatan, $pesanan])
          <div class="flex flex-1 flex-col items-center gap-2 h-full">
            <div class="flex flex-1 items-end gap-1 w-full">
              <div
                class="w-full rounded-t-md bg-violet-600"
                style="height: {{ $pendapatan }}%; opacity: .9"
              ></div>

              <div
                class="w-full rounded-t-md bg-lime-400"
                style="height: {{ $pesanan }}%"
              ></div>
            </div>

            <span class="text-[9px] font-bold text-neutral-400">
              {{ $hari }}
            </span>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Legend -->
      <div class="flex gap-4 px-5 pb-5">
        <div
          class="flex items-center gap-2 text-[11px] font-semibold text-neutral-500"
        >
          <div class="h-2 w-2 rounded-full bg-violet-600"></div>
          Pendapatan
        </div>

        <div
          class="flex items-center gap-2 text-[11px] font-semibold text-neutral-500"
        >
          <div class="h-2 w-2 rounded-full bg-lime-400"></div>
          Pesanan
        </div>
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="flex flex-col gap-5">
      <!-- QUICK ACTION -->
      <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
        <div class="px-5 pt-5">
          <h3 class="text-sm font-extrabold text-neutral-950">Aksi Cepat</h3>
        </div>

        <div class="grid grid-cols-2 gap-3 p-5">
          <button
            class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100"
          >
            <div
              class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm"
            >
              ➕
            </div>

            <p class="text-[11px] font-bold text-neutral-950">Tambah Produk</p>
          </button>

          <button
            class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100"
          >
            <div
              class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm"
            >
              🧾
            </div>

            <p class="text-[11px] font-bold text-neutral-950">Buat Pesanan</p>
          </button>

          <button
            class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100"
          >
            <div
              class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm"
            >
              💰
            </div>

            <p class="text-[11px] font-bold text-neutral-950">Catat Keuangan</p>
          </button>

          <button
            class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100"
          >
            <div
              class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm"
            >
              📦
            </div>

            <p class="text-[11px] font-bold text-neutral-950">Tambah Stok</p>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- PESANAN TERBARU -->
  <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <!-- Header -->
    <div class="flex items-start justify-between px-5 pt-5 mb-4">
      <div>
        <h3 class="text-sm font-extrabold text-neutral-950">Pesanan Terbaru</h3>

        <p class="text-[11px] font-medium text-neutral-400 mt-0.5">
          5 transaksi terakhir hari ini
        </p>
      </div>

      <a
        href="{{ url('/admin/orders') }}"
        class="text-[11px] font-bold text-violet-600 hover:bg-violet-100 px-2.5 py-1 rounded-md transition"
      >
        Lihat Semua →
      </a>
    </div>

    <!-- Orders -->
    <div class="px-5 pb-5">
      <!-- ITEM -->
      <div class="flex items-center gap-3 py-3 border-b border-neutral-100">
        <!-- Avatar -->
        <div
          class="w-9 h-9 rounded-md bg-violet-100 text-violet-600 flex items-center justify-center text-xs font-extrabold flex-shrink-0"
        >
          RF
        </div>

        <!-- Info -->
        <div class="flex-1 min-w-0">
          <div class="text-[12px] font-bold text-neutral-950">
            Rizki Fadillah
          </div>

          <div class="text-[10px] text-neutral-400 font-medium truncate">
            Kaos Ekraf Navy × 2
          </div>
        </div>

        <!-- Meta -->
        <div class="text-right flex-shrink-0">
          <div class="text-[12px] font-extrabold text-neutral-950">
            Rp180.000
          </div>

          <span
            class="inline-flex items-center text-[9px] font-bold px-2 py-0.5 rounded-full mt-1 bg-amber-100 text-amber-800"
          >
            ⏳ Pending
          </span>
        </div>
      </div>

      <!-- ITEM -->
      <div class="flex items-center gap-3 py-3 border-b border-neutral-100">
        <div
          class="w-9 h-9 rounded-md bg-green-100 text-green-700 flex items-center justify-center text-xs font-extrabold flex-shrink-0"
        >
          SA
        </div>

        <div class="flex-1 min-w-0">
          <div class="text-[12px] font-bold text-neutral-950">Siti Aisyah</div>

          <div class="text-[10px] text-neutral-400 font-medium truncate">
            Totebag Canvas × 1
          </div>
        </div>

        <div class="text-right flex-shrink-0">
          <div class="text-[12px] font-extrabold text-neutral-950">
            Rp75.000
          </div>

          <span
            class="inline-flex items-center text-[9px] font-bold px-2 py-0.5 rounded-full mt-1 bg-lime-100 text-lime-800"
          >
            ✅ Valid
          </span>
        </div>
      </div>

      <!-- ITEM -->
      <div class="flex items-center gap-3 py-3 border-b border-neutral-100">
        <div
          class="w-9 h-9 rounded-md bg-amber-100 text-amber-700 flex items-center justify-center text-xs font-extrabold flex-shrink-0"
        >
          BH
        </div>

        <div class="flex-1 min-w-0">
          <div class="text-[12px] font-bold text-neutral-950">Budi Hartono</div>

          <div class="text-[10px] text-neutral-400 font-medium truncate">
            Mug Custom × 3
          </div>
        </div>

        <div class="text-right flex-shrink-0">
          <div class="text-[12px] font-extrabold text-neutral-950">
            Rp225.000
          </div>

          <span
            class="inline-flex items-center text-[9px] font-bold px-2 py-0.5 rounded-full mt-1 bg-violet-100 text-violet-600"
          >
            🔧 Proses
          </span>
        </div>
      </div>

      <!-- ITEM -->
      <div class="flex items-center gap-3 py-3 border-b border-neutral-100">
        <div
          class="w-9 h-9 rounded-md bg-teal-100 text-teal-700 flex items-center justify-center text-xs font-extrabold flex-shrink-0"
        >
          NR
        </div>

        <div class="flex-1 min-w-0">
          <div class="text-[12px] font-bold text-neutral-950">Nadia Rahayu</div>

          <div class="text-[10px] text-neutral-400 font-medium truncate">
            Topi Snapback × 1
          </div>
        </div>

        <div class="text-right flex-shrink-0">
          <div class="text-[12px] font-extrabold text-neutral-950">
            Rp95.000
          </div>

          <span
            class="inline-flex items-center text-[9px] font-bold px-2 py-0.5 rounded-full mt-1 bg-teal-100 text-teal-700"
          >
            ✔ Selesai
          </span>
        </div>
      </div>

      <!-- ITEM -->
      <div class="flex items-center gap-3 py-3">
        <div
          class="w-9 h-9 rounded-md bg-red-100 text-red-600 flex items-center justify-center text-xs font-extrabold flex-shrink-0"
        >
          DP
        </div>

        <div class="flex-1 min-w-0">
          <div class="text-[12px] font-bold text-neutral-950">Dika Pratama</div>

          <div class="text-[10px] text-neutral-400 font-medium truncate">
            Kaos Ekraf Navy × 1, Totebag × 1
          </div>
        </div>

        <div class="text-right flex-shrink-0">
          <div class="text-[12px] font-extrabold text-neutral-950">
            Rp165.000
          </div>

          <span
            class="inline-flex items-center text-[9px] font-bold px-2 py-0.5 rounded-full mt-1 bg-amber-100 text-amber-800"
          >
            ⏳ Pending
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
