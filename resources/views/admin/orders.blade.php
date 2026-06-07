@extends('admin.layouts.layout')

@section('title', 'Manajemen Pesanan')
@section('page_title', 'Manajemen Pesanan')
@section('page_breadcrumb', 'Manajemen Pesanan')

@section('content')
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="block w-full space-y-6 pb-[40px]">

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg font-medium shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg font-medium shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-start items-center w-full">
            <div class="flex gap-[10px]">
                <a href="{{ route('admin.orders', ['tab' => 'online']) }}"
                    class="px-[18px] py-[10px] rounded-xl font-bold text-[13px] transition-colors duration-200
                   {{ $tab == 'online' ? 'bg-primary-500 text-white shadow-[0_4px_14px_rgba(125,57,235,0.35)]' : 'bg-white border border-neutral-200 text-neutral-600 hover:bg-neutral-50' }}">
                    Pesanan Online
                </a>
                <a href="{{ route('admin.orders', ['tab' => 'bazar']) }}"
                    class="px-[18px] py-[10px] rounded-xl font-bold text-[13px] transition-colors duration-200
                   {{ $tab == 'bazar' ? 'bg-primary-500 text-white shadow-[0_4px_14px_rgba(125,57,235,0.35)]' : 'bg-white border border-neutral-200 text-neutral-600 hover:bg-neutral-50' }}">
                    Pesanan Bazar
                </a>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.orders') }}">
            <input type="hidden" name="tab" value="{{ $tab }}">
            <div class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)]">
                <div class="flex items-center justify-between flex-wrap gap-[18px]">
                    <div class="flex items-center gap-[12px] flex-wrap">
                        <div>
                            <p class="text-[13px] text-neutral-500 mb-[6px]">Dari Tanggal</p>
                            <input type="date" name="from_date" value="{{ request('from_date') }}"
                                class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px] focus:border-primary-500">
                        </div>
                        <div>
                            <p class="text-[13px] text-neutral-500 mb-[6px]">Sampai Tanggal</p>
                            <input type="date" name="to_date" value="{{ request('to_date') }}"
                                class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px] focus:border-primary-500">
                        </div>
                        <div>
                            <p class="text-[13px] text-neutral-500 mb-[6px]">Status</p>
                            <select name="status"
                                class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px] focus:border-primary-500">
                                <option value="">Semua Status</option>
                                @if ($tab == 'online')
                                    <option value="Menunggu Proses Produksi"
                                        {{ request('status') == 'Menunggu Proses Produksi' ? 'selected' : '' }}>Menunggu
                                        Proses Produksi</option>
                                    <option value="Sedang Diproduksi"
                                        {{ request('status') == 'Sedang Diproduksi' ? 'selected' : '' }}>Sedang Diproduksi
                                    </option>
                                    <option value="Siap Diambil"
                                        {{ request('status') == 'Siap Diambil' ? 'selected' : '' }}>Siap Diambil</option>
                                    <option value="Pesanan Selesai"
                                        {{ request('status') == 'Pesanan Selesai' ? 'selected' : '' }}>Pesanan Selesai
                                    </option>
                                @else
                                    <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses
                                    </option>
                                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="flex items-end gap-[10px]">
                        <div>
                            <p class="text-[13px] text-neutral-500 mb-[6px] hidden md:block">&nbsp;</p>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari Order Code..."
                                class="w-[280px] max-[560px]:w-full px-[16px] py-[11px] rounded-xl border border-neutral-200 outline-none text-[13px] focus:border-primary-500">
                        </div>
                        <button type="submit"
                            class="px-[20px] py-[11px] bg-primary-500 text-neutral-50 rounded-xl font-bold text-[13px] hover:bg-[#5928a7] transition-all duration-[250ms]">Cari</button>
                        <a href="{{ route('admin.orders', ['tab' => $tab]) }}"
                            class="px-[20px] py-[11px] border border-neutral-200 rounded-xl font-bold text-[13px] hover:bg-neutral-100">Reset</a>
                    </div>
                </div>
            </div>
        </form>

        <div class="w-full bg-white rounded-[20px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] overflow-hidden block h-auto">
            <div class="w-full overflow-x-auto block no-scrollbar">
                <table class="w-full min-w-[1100px] text-left border-collapse table-auto">
                    <thead>
                        <tr class="bg-neutral-100 border-b border-neutral-200">
                            <th
                                class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                ID Pesanan</th>
                            <th
                                class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Tanggal</th>
                            <th
                                class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Pelanggan</th>
                            <th
                                class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Produk</th>
                            <th
                                class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Total</th>
                            @if ($tab == 'online')
                                <th
                                    class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                    Pembayaran</th>
                                <th
                                    class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                    Status</th>
                            @else
                                <th
                                    class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                    Metode</th>
                                <th
                                    class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                    Status</th>
                            @endif
                            <th
                                class="px-[16px] py-[14px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100">
                        @forelse($orders as $order)
                            <tr class="hover:bg-primary-50/50 transition-colors duration-[250ms]">
                                <td class="px-[16px] py-[16px] text-[13px] font-bold text-primary-600 whitespace-nowrap">
                                    {{ $order->order_code }}</td>
                                <td class="px-[16px] py-[16px] text-[13px] font-medium text-neutral-700 whitespace-nowrap">
                                    {{ $order->created_at->format('d M Y, H:i') }}</td>

                                <td class="px-[16px] py-[16px] text-[13px] font-medium text-neutral-700 whitespace-nowrap">
                                    {{ $tab == 'online' ? $order->user->name ?? 'Unknown' : $order->customer_name ?? 'Umum' }}
                                </td>

                                <td class="px-[16px] py-[16px] text-[12px] text-neutral-600 min-w-[200px]">
                                    <div class="flex flex-col gap-[2px]">
                                        @foreach ($order->items->take(2) as $item)
                                            <span class="truncate block max-w-[220px]"
                                                title="{{ $item->product->name ?? 'Item' }}">
                                                {{ $item->quantity }}x {{ $item->product->name ?? 'Item' }}
                                            </span>
                                        @endforeach
                                        @if ($order->items->count() > 2)
                                            <span
                                                class="text-[11px] text-primary-500 font-bold mt-[2px]">+{{ $order->items->count() - 2 }}
                                                produk lainnya</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-[16px] py-[16px] text-[13px] font-bold text-neutral-900 whitespace-nowrap">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </td>

                                @if ($tab == 'online')
                                    <td class="px-[16px] py-[16px] whitespace-nowrap text-center">
                                        @if ($order->payment_status == 'Lunas')
                                            <span
                                                class="inline-flex justify-center items-center px-[10px] py-[4px] bg-green-100 rounded-full text-[10px] font-bold text-green-600">Lunas</span>
                                        @else
                                            <span
                                                class="inline-flex justify-center items-center px-[10px] py-[4px] bg-yellow-100 rounded-full text-[10px] font-bold text-yellow-600">{{ $order->payment_status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-[16px] py-[16px] whitespace-nowrap text-center">
                                        @php
                                            $statusColors = [
                                                'Menunggu Proses Produksi' => 'bg-orange-100 text-orange-600',
                                                'Sedang Diproduksi' => 'bg-blue-100 text-blue-600',
                                                'Siap Diambil' => 'bg-teal-100 text-teal-600',
                                                'Pesanan Selesai' => 'bg-green-100 text-green-600',
                                            ];
                                            $badgeClass =
                                                $statusColors[$order->status] ?? 'bg-neutral-100 text-neutral-600';
                                        @endphp
                                        <span
                                            class="inline-flex justify-center items-center px-[10px] py-[4px] rounded-full text-[10px] font-bold {{ $badgeClass }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-[16px] py-[16px] whitespace-nowrap text-center">
                                        @if ($order->payment_method == 'QRIS')
                                            <span
                                                class="inline-flex justify-center items-center px-[10px] py-[4px] bg-primary-100 rounded-full text-[10px] font-bold text-primary-600">QRIS</span>
                                        @else
                                            <span
                                                class="inline-flex justify-center items-center px-[10px] py-[4px] bg-[#FEF3C6] rounded-full text-[10px] font-bold text-[#EFB100]">Tunai</span>
                                        @endif
                                    </td>
                                    <td class="px-[16px] py-[16px] whitespace-nowrap text-center">
                                        @if ($order->status == 'Selesai')
                                            <span
                                                class="inline-flex justify-center items-center px-[10px] py-[4px] bg-green-100 rounded-full text-[10px] font-bold text-green-600">Selesai</span>
                                        @else
                                            <span
                                                class="inline-flex justify-center items-center px-[10px] py-[4px] bg-[#FEF3C6] rounded-full text-[10px] font-bold text-[#EFB100]">Proses</span>
                                        @endif
                                    </td>
                                @endif

                                <td class="px-[16px] py-[16px] whitespace-nowrap text-center">
                                    <button
                                        onclick="{{ $tab == 'online' ? 'viewOnlineDetail' : 'viewBazarReceipt' }}({{ $order->id }})"
                                        class="inline-flex items-center gap-[6px] px-[12px] py-[6px] bg-neutral-50 border border-primary-500 text-primary-600 rounded-lg text-[11px] font-bold hover:bg-primary-500 hover:text-white transition-colors cursor-pointer shadow-[0_2px_4px_rgba(62,52,69,0.15)]">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-[40px] text-center text-neutral-400 text-[13px]">Tidak ada
                                    pesanan ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if (method_exists($orders, 'links'))
            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection

@section('footer')
    <div id="printReceiptContent" class="hidden"></div>

    <div id="modalDetailOnline" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-white w-[95%] max-w-[500px] max-h-[90vh] overflow-y-auto rounded-[20px] shadow-lg flex flex-col relative no-scrollbar">

            <div
                class="sticky top-0 bg-white z-10 px-[24px] py-[20px] border-b border-neutral-100 flex justify-between items-center">
                <div>
                    <h2 class="text-[18px] font-bold text-black" id="ol-modal-title">Detail Pesanan</h2>
                    <p class="text-[12px] font-medium text-primary-500" id="ol-modal-code"></p>
                </div>
                <button onclick="closeModal('modalDetailOnline')"
                    class="text-neutral-400 hover:text-red-500 cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="p-[24px] flex flex-col gap-[20px]">
                <div class="bg-neutral-50 rounded-[12px] p-[16px] flex flex-col gap-[8px] text-[13px]">
                    <div class="flex justify-between"><span class="text-neutral-500">Pelanggan:</span> <strong
                            id="ol-customer"></strong></div>
                    <div class="flex justify-between"><span class="text-neutral-500">Waktu:</span> <strong
                            id="ol-time"></strong></div>
                    <div class="flex justify-between"><span class="text-neutral-500">Metode Bayar:</span> <strong
                            id="ol-pay-method"></strong></div>
                    <div class="flex justify-between"><span class="text-neutral-500">Status Bayar:</span> <strong
                            id="ol-pay-status" class="text-primary-600"></strong></div>
                </div>

                <div>
                    <h3 class="text-[14px] font-bold text-black mb-[10px]">Daftar Produk</h3>
                    <div id="ol-items-container" class="flex flex-col gap-[12px] border-b border-neutral-200 pb-[16px]">
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] text-[13px]">
                    <div class="flex justify-between"><span class="text-neutral-500">Subtotal</span> <strong
                            id="ol-subtotal"></strong></div>
                    <div class="flex justify-between text-red-500"><span class="">Voucher / Diskon</span> <strong
                            id="ol-discount"></strong></div>
                    <div class="flex justify-between text-[16px] mt-[4px]"><span class="font-bold text-black">Total
                            Akhir</span> <strong class="text-primary-600 font-black" id="ol-total"></strong></div>
                </div>

                <form id="formUpdateStatusOnline" method="POST" action=""
                    class="bg-primary-50 rounded-[12px] p-[16px] mt-[10px]">
                    @csrf
                    @method('PUT')
                    <h3 class="text-[14px] font-bold text-black mb-[10px]">Update Status Produksi</h3>
                    <select name="status" id="ol-status-select" onchange="toggleEstimasi(this.value)"
                        class="w-full px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px] mb-[10px]">
                        <option value="Menunggu Proses Produksi">Menunggu Proses Produksi</option>
                        <option value="Sedang Diproduksi">Sedang Diproduksi</option>
                        <option value="Siap Diambil">Siap Diambil</option>
                        <option value="Pesanan Selesai">Pesanan Selesai</option>
                    </select>

                    <div id="estimasiContainer" class="hidden mb-[10px]">
                        <input type="number" name="estimasi_hari" placeholder="Estimasi Selesai (Contoh: 3 Hari)"
                            min="1"
                            class="w-full px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                        <span class="text-[11px] text-neutral-400 mt-1 block">*Akan dikirimkan ke notifikasi
                            pelanggan</span>
                    </div>

                    <button type="submit" id="btn-update-status"
                        class="w-full py-[12px] bg-primary-500 rounded-[12px] text-[13px] font-bold text-white shadow-md hover:bg-[#5928a7] transition-colors">Simpan
                        & Kirim Notif</button>
                </form>

                <button id="btn-print-online" onclick="printReceipt()"
                    class="hidden w-full py-[12px] bg-neutral-800 rounded-[12px] text-[13px] font-bold text-white shadow-md hover:bg-black transition-colors flex justify-center items-center gap-[8px]">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Cetak Invoice Online
                </button>
            </div>
        </div>
    </div>

    <div id="modalDetailBazar" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[400px] rounded-[20px] shadow-lg p-[20px] flex flex-col items-center gap-[20px] max-h-[96dvh] overflow-y-auto no-scrollbar">

            <div class="bg-white border border-neutral-200 rounded-[12px] p-[20px] w-full text-black font-mono text-[12px]"
                id="bazar-receipt-content">
            </div>

            <div class="flex gap-[12px] w-full mt-[10px]">
                <button
                    class="flex-1 h-[48px] bg-neutral-50 border border-primary-500 shadow-sm rounded-[16px] text-[14px] font-bold text-primary-500 hover:bg-primary-500 hover:text-white transition-colors"
                    onclick="closeModal('modalDetailBazar')">Kembali</button>
                <button
                    class="flex-1 h-[48px] bg-primary-500 shadow-md rounded-[16px] text-[14px] font-bold text-white flex justify-center items-center gap-[8px] hover:bg-[#5928a7]"
                    onclick="printReceipt()">
                    Cetak Struk
                </button>
            </div>
        </div>
    </div>

    <script>
        const ordersData = @json($orders->keyBy('id'));

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        // FORMAT RUPIAH
        function formatRp(angka) {
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        // ==========================================
        // 1. LOGIKA MODAL ONLINE
        // ==========================================
        function viewOnlineDetail(id) {
            const order = ordersData[id];
            if (!order) return;

            // Set Data Dasar
            document.getElementById('ol-modal-code').innerText = order.order_code;
            document.getElementById('ol-customer').innerText = order.user ? order.user.name : 'Unknown';
            document.getElementById('ol-pay-method').innerText = order.payment_method || '-';
            document.getElementById('ol-pay-status').innerText = order.payment_status;

            let dateObj = new Date(order.created_at);
            document.getElementById('ol-time').innerText = dateObj.toLocaleString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            // Set Items
            let itemsHtml = '';
            order.items.forEach(item => {
                let pName = item.product ? item.product.name : `Item #${item.product_id}`;
                itemsHtml += `
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col max-w-[70%]">
                            <span class="font-bold text-black">${pName} <span class="font-normal text-neutral-500">x${item.quantity}</span></span>
                            ${item.notes ? `<span class="text-[11px] text-primary-500 italic">Catatan: ${item.notes}</span>` : ''}
                        </div>
                        <span class="font-bold text-neutral-700">Rp ${formatRp(item.subtotal)}</span>
                    </div>
                `;
            });
            document.getElementById('ol-items-container').innerHTML = itemsHtml;

            // Set Total
            document.getElementById('ol-subtotal').innerText = `Rp ${formatRp(order.subtotal)}`;
            document.getElementById('ol-discount').innerText = `-Rp ${formatRp(order.discount)}`;
            document.getElementById('ol-total').innerText = `Rp ${formatRp(order.total)}`;

            // Form Update Status
            document.getElementById('formUpdateStatusOnline').action = `/admin/orders/online/${order.id}/status`;
            document.getElementById('ol-status-select').value = order.status;
            toggleEstimasi(order.status);

            // Tampilkan Tombol Print HANYA JIKA SELESAI
            const btnPrint = document.getElementById('btn-print-online');
            const formUpdate = document.getElementById('formUpdateStatusOnline');

            if (order.status === 'Pesanan Selesai') {
                btnPrint.classList.remove('hidden');
                formUpdate.classList.add('hidden'); 
                preparePrintContent(order, 'ONLINE');
            } else {
                btnPrint.classList.add('hidden');
                formUpdate.classList.remove('hidden');
            }

            document.getElementById('modalDetailOnline').classList.remove('hidden');
        }

        function toggleEstimasi(status) {
            const container = document.getElementById('estimasiContainer');
            if (status === 'Sedang Diproduksi') container.classList.remove('hidden');
            else container.classList.add('hidden');
        }

        // ==========================================
        // 2. LOGIKA MODAL BAZAR
        // ==========================================
        function viewBazarReceipt(id) {
            const order = ordersData[id];
            if (!order) return;

            preparePrintContent(order, 'BAZAR');

            // Masukkan ke modal bazar
            document.getElementById('bazar-receipt-content').innerHTML = document.getElementById('printReceiptContent')
                .innerHTML;
            document.getElementById('modalDetailBazar').classList.remove('hidden');
        }

        // ==========================================
        // 3. LOGIKA RENDER CETAK STRUK (SHARED)
        // ==========================================
        function preparePrintContent(order, type) {
            const printArea = document.getElementById('printReceiptContent');

            let itemsHtml = '';
            order.items.forEach(item => {
                let pName = item.product ? item.product.name : `Item #${item.product_id}`;
                itemsHtml +=
                    `
                <div style="display:flex; justify-content:space-between; margin-bottom:4px;">
                    <span style="max-width: 65%; word-wrap: break-word;">${pName} x ${item.quantity}</span>
                    <span>Rp ${formatRp(item.subtotal)}</span>
                </div>
                ${item.notes ? `<div style="font-size:10px; color:#555; margin-bottom:4px;">↳ Catatan: ${item.notes}</div>` : ''}`;
            });

            let dateObj = new Date(order.created_at);
            let timeString = dateObj.toLocaleString('id-ID', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            let customerName = type === 'ONLINE' ? (order.user ? order.user.name : 'Unknown') : (order.customer_name ||
                'Umum');

            let paymentSection = '';
            if (type === 'ONLINE') {
                paymentSection = `
                    <div style="display:flex; justify-content:space-between;"><span>Metode:</span><span>${order.payment_method || '-'}</span></div>
                    <div style="display:flex; justify-content:space-between;"><span>Status:</span><span>${order.payment_status}</span></div>
                `;
            } else {
                paymentSection = `
                    <div style="display:flex; justify-content:space-between;"><span>Metode:</span><span>${order.payment_method}</span></div>
                    <div style="display:flex; justify-content:space-between;"><span>Dibayar:</span><span>Rp ${formatRp(order.paid_amount)}</span></div>
                    <div style="display:flex; justify-content:space-between; font-weight:bold;"><span>Kembali:</span><span>Rp ${formatRp(order.change_amount)}</span></div>
                `;
            }

            printArea.innerHTML = `
                <div style="text-align:center; font-weight:bold; font-size:16px; color:black;">REKAPS STORE</div>
                <div style="text-align:center; font-size:10px; color:#666;">DEPARTEMEN EKONOMI KREATIF</div>
                <div style="text-align:center; font-size:10px; color:black; font-weight:bold; margin-top:5px; border:1px solid black; display:inline-block; padding:2px 8px; border-radius:10px;">${type === 'ONLINE' ? 'INVOICE ONLINE' : 'STRUK BAZAR'}</div>
                
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="display:flex; justify-content:space-between;"><span>No. Transaksi:</span><span>${order.order_code}</span></div>
                <div style="display:flex; justify-content:space-between;"><span>Pelanggan:</span><span>${customerName}</span></div>
                <div style="display:flex; justify-content:space-between;"><span>Waktu:</span><span>${timeString}</span></div>
                
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                ${itemsHtml}
                
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="display:flex; justify-content:space-between;"><span>Subtotal:</span><span>Rp ${formatRp(order.subtotal)}</span></div>
                ${parseInt(order.discount) > 0 ? `<div style="display:flex; justify-content:space-between; color:red;"><span>Voucher/Diskon:</span><span>-Rp ${formatRp(order.discount)}</span></div>` : ''}
                <div style="display:flex; justify-content:space-between; font-weight:bold; font-size:14px; margin-top:5px;"><span>TOTAL:</span><span>Rp ${formatRp(order.total)}</span></div>
                
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                ${paymentSection}
                
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="text-align:center; font-size:10px; color:#777; margin-top:5px;">Terima kasih atas pesanan Anda!</div>
            `;
        }

        function printReceipt() {
            const printContent = document.getElementById('printReceiptContent').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = `
                <style>
                    @page { margin: 0; size: auto; }
                    html, body { height: 100%; margin: 0; padding: 0; background-color: #ffffff; }
                    .print-wrapper { padding: 20px; max-width: 300px; margin: 0 auto; font-family: monospace; font-size: 12px; }
                    hr { border-top: 1px dashed black !important; margin: 10px 0 !important; }
                </style>
                <div class="print-wrapper">${printContent}</div>
            `;

            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
@endsection
