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
        Halo, <span class="text-lime-400">{{ auth()->user()->name }}</span>
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
        <div class="text-[22px] font-black text-lime-400 leading-none">{{ $newOrdersToday }}</div>
        <div
          class="mt-1 text-[10px] uppercase tracking-[1px] font-semibold text-neutral-400"
        >
          Pesanan Baru
        </div>
      </div>

      <div
        class="text-center rounded-2xl border border-white/10 bg-white/5 px-5 py-4">
        <div class="text-[22px] font-black text-white leading-none">
          Rp{{ number_format($todayRevenue,0,',','.') }}
        </div>
        <div
          class="mt-1 text-[10px] uppercase tracking-[1px] font-semibold text-neutral-400">
          Pendapatan Hari Ini
        </div>
      </div>

      <div
        class="text-center rounded-2xl border border-white/10 bg-white/5 px-5 py-4">
        <div class="text-[22px] font-black text-white leading-none">{{ $criticalStock }}</div>
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
        <span class="text-sm font-bold">Rp</span>Rp{{ number_format($totalRevenue,0,',','.') }}
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

      <h2 class="text-3xl font-black text-neutral-950">
        {{ $totalOrders }}
      </h2>

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

      <h2 class="text-3xl font-black text-neutral-950">
        {{ $totalProducts }}
      </h2>

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

      <h2 class="text-3xl font-black text-neutral-950">{{ $activeBuyers }}</h2>

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

        <a
            href="{{ route('admin.dashboard', ['period' => 'week']) }}"
            class="rounded-lg px-4 py-1 text-[11px] font-bold transition
            {{ $period == 'week' ? 'bg-violet-600 text-white' : 'text-neutral-400 hover:bg-neutral-100' }}"
        >
            Minggu
        </a>

        <a
            href="{{ route('admin.dashboard', ['period' => 'month']) }}"
            class="rounded-lg px-4 py-1 text-[11px] font-bold transition
            {{ $period == 'month' ? 'bg-violet-600 text-white' : 'text-neutral-400 hover:bg-neutral-100' }}"
        >
            Bulan
        </a>

        <a
            href="{{ route('admin.dashboard', ['period' => 'year']) }}"
            class="rounded-lg px-4 py-1 text-[11px] font-bold transition
            {{ $period == 'year' ? 'bg-violet-600 text-white' : 'text-neutral-400 hover:bg-neutral-100' }}"
        >
            Tahun
        </a>

      </div>

      <!-- Chart -->
      <div class="px-5 pb-5">
        <div class="flex h-[155px] items-end gap-2">
          @foreach ($charData as $item)
          <div class="flex flex-1 flex-col items-center gap-2 h-full">
            <div class="flex flex-1 items-end gap-1 w-full">
              <div
                class="w-full rounded-t-md bg-violet-600"
                style="height: {{ $maxRevenue > 0 ? ($item['revenue'] / $maxRevenue) * 100 : 0 }}%; opacity:.9">
              </div>

              <div
                class="w-full rounded-t-md bg-lime-400"
                style=" height: {{ $maxOrders > 0 ? ($item['orders'] / $maxOrders) * 100 : 0 }}%">
              </div>
            </div>

            <span class="text-[9px] font-bold text-neutral-400">
              {{ $item['day'] }}
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
          <a href="{{ url('/admin/product') }}"
              class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100">

              <div class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm">
                  ➕
              </div>

              <p class="text-[11px] font-bold text-neutral-950">
                  Tambah Produk
              </p>

          </a>

          <a
            href="{{ url('/admin/finance') }}"
            class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100">

            <div class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm">
                💰
            </div>

            <p class="text-[11px] font-bold text-neutral-950">
                Catat Keuangan
            </p>

          </a>

          <a
             href="{{ url('/admin/reports') }}"
            class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100">

            <div class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm">
                🧾
            </div>

            <p class="text-[11px] font-bold text-neutral-950">
                Cetak Laporan
            </p>

        </a>

          <a
              href="{{ url('/admin/report-stock-history') }}"
              class="rounded-2xl border-2 border-transparent bg-neutral-100 p-4 text-left transition hover:border-violet-600 hover:bg-violet-100">

              <div class="mb-3 flex h-8 w-8 items-center justify-center rounded-xl bg-white shadow-sm">
                  📦
              </div>

              <p class="text-[11px] font-bold text-neutral-950">
                  Riwayat Stok
              </p>

          </a>
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
      @foreach($latestOrders as $order)
      <div
          class="flex items-center justify-between px-6 py-4 border-b border-neutral-100">

          <div class="flex items-center gap-3">

              <div
                  class="flex h-9 w-9 items-center justify-center rounded-xl bg-violet-100 font-bold text-violet-600">

                  {{ strtoupper(substr($order['customer'],0,1)) }}

              </div>

              <div>

                  <h4
                      class="text-[14px] font-bold text-neutral-900">

                      {{ $order['customer'] }}

                  </h4>

                  <p
                      class="text-[12px] text-neutral-500">

                      {{ $order['product'] }}
                      ×
                      {{ $order['qty'] }}

                  </p>

              </div>

          </div>

          <div class="text-right">

              <p
                  class="font-bold text-neutral-900">

                  Rp{{ number_format($order['total'],0,',','.') }}

              </p>

              <span
                  class="inline-flex mt-1 rounded-full px-2 py-1 text-[10px] font-bold bg-violet-100 text-violet-600">

                  {{ $order['status'] }}

              </span>

          </div>

      </div>

      @endforeach
      
    </div>
  </div>
</div>
@endsection 
