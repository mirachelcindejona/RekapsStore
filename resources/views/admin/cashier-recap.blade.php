@extends('admin.layouts.layout-cashier')

@section('title', 'Rekap Bazar')
@section('page_title', 'Rekap Bazar')
@section('page_breadcrumb', 'Rekap Bazar')

@php
    // Helper untuk mengubah angka panjang menjadi format K/Jt (contoh: 14.5jt)
    function formatShort($n)
    {
        if ($n >= 1000000) {
            return rtrim(rtrim(number_format($n / 1000000, 1, '.', ''), '0'), '.') . 'jt';
        }
        if ($n >= 1000) {
            return rtrim(rtrim(number_format($n / 1000, 1, '.', ''), '0'), '.') . 'rb';
        }
        return number_format($n, 0, ',', '.');
    }
@endphp

@section('content')
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

    <div class="block w-full space-y-6 pb-[40px]">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center w-full gap-[16px]">

            <div class="flex flex-wrap gap-[12px]">
                <button onclick="applyFilter('today')"
                    class="px-[16px] py-[8px] rounded-full text-[14px] font-bold transition-colors {{ $filter == 'today' ? 'bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] text-white' : 'bg-[#E5E5E5] text-[#404040] hover:bg-[#d4d4d4]' }}">Hari
                    ini</button>
                <button onclick="applyFilter('7days')"
                    class="px-[16px] py-[8px] rounded-full text-[14px] font-bold transition-colors {{ $filter == '7days' ? 'bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] text-white' : 'bg-[#E5E5E5] text-[#404040] hover:bg-[#d4d4d4]' }}">7
                    hari</button>
                <button onclick="applyFilter('1month')"
                    class="px-[16px] py-[8px] rounded-full text-[14px] font-bold transition-colors {{ $filter == '1month' ? 'bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] text-white' : 'bg-[#E5E5E5] text-[#404040] hover:bg-[#d4d4d4]' }}">1
                    bulan</button>
                <button onclick="openModal('modalPilihTanggal')"
                    class="px-[16px] py-[8px] rounded-full text-[14px] font-bold transition-colors {{ $filter == 'custom' ? 'bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] text-white' : 'bg-[#E5E5E5] text-[#404040] hover:bg-[#d4d4d4]' }}">Pilih
                    tanggal</button>
            </div>

            <div class="flex items-center gap-[12px]">
                <button onclick="navigateDate('{{ $prevStart }}', '{{ $prevEnd }}')"
                    class="w-[36px] h-[36px] flex justify-center items-center hover:bg-gray-200 rounded-full transition-colors cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="text-[14px] text-black min-w-[150px] text-center leading-tight">
                    {!! $displayDate !!}
                </div>

                <button onclick="navigateDate('{{ $nextStart }}', '{{ $nextEnd }}')"
                    class="w-[36px] h-[36px] flex justify-center items-center hover:bg-gray-200 rounded-full transition-colors cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[16px] w-full">
            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-primary-100 opacity-80 rounded-bl-[100%] z-0"></div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">TOTAL PENJUALAN</span>
                    <div class="flex items-end gap-[4px]">
                        <span class="text-[12px] font-bold text-black mb-[4px]">Rp</span>
                        <span
                            class="text-[24px] font-black text-black leading-none">{{ formatShort($totalPenjualan) }}</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px] ml-[4px]">dari transaksi
                            selesai</span>
                    </div>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-secondary-200 opacity-80 rounded-bl-[100%] z-0">
                </div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">TRANSAKSI</span>
                    <div class="flex items-end gap-[6px]">
                        <span
                            class="text-[24px] font-black text-black leading-none">{{ number_format($totalTransaksi, 0, ',', '.') }}</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px]">pesanan selesai</span>
                    </div>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-[#FFC9C9] opacity-80 rounded-bl-[100%] z-0"></div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">ITEM TERJUAL</span>
                    <div class="flex items-end gap-[6px]">
                        <span
                            class="text-[24px] font-black text-black leading-none">{{ number_format($itemTerjual, 0, ',', '.') }}</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px]">total item</span>
                    </div>
                </div>
            </div>

            <div
                class="relative overflow-hidden bg-white rounded-[15px] p-[18px] flex flex-col justify-center h-[116px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)]">
                <div class="absolute right-0 top-0 w-[89px] h-[79px] bg-[#FEE685] opacity-80 rounded-bl-[100%] z-0"></div>
                <div class="relative z-10 flex flex-col gap-[8px]">
                    <span class="text-[14px] font-black text-neutral-400 uppercase tracking-wide">RATA-RATA</span>
                    <div class="flex items-end gap-[4px]">
                        <span class="text-[12px] font-bold text-black mb-[4px]">Rp</span>
                        <span class="text-[24px] font-black text-black leading-none">{{ formatShort($rataRata) }}</span>
                        <span class="text-[12px] font-bold text-secondary-700 mb-[2px] ml-[4px]">per transaksi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-[20px] w-full mt-[10px]">
            <h2 class="text-[18px] font-bold text-black whitespace-nowrap m-0">Top Item Terlaris</h2>
            <div class="h-[0.3px] bg-black flex-1"></div>
        </div>

        <div class="flex overflow-x-auto no-scrollbar pos-scroll gap-[16px] pb-[12px] w-full">
            @php $colors = ['#EFB100', '#94A3B8', '#B45309']; @endphp
            @forelse ($topItems as $index => $item)
                <div
                    class="relative overflow-hidden bg-white rounded-[15px] p-[18px_20px] flex items-center gap-[20px] min-w-[260px] filter drop-shadow-[0_4px_4px_rgba(215,194,249,0.4)] shrink-0">
                    <div
                        class="absolute right-0 top-0 w-[75px] h-[79px] bg-primary-100 opacity-[0.15] rounded-bl-[100%] z-0">
                    </div>
                    <span class="text-[36px] font-bold leading-none z-10"
                        style="color: {{ $colors[$index] ?? '#000' }}">#{{ $index + 1 }}</span>
                    <div class="flex flex-col z-10 gap-[2px]">
                        <span class="text-[16px] font-bold text-black leading-tight">{{ $item->product->name }}</span>
                        <span class="text-[14px] font-bold text-primary-500 leading-tight">{{ $item->total_qty }} terjual -
                            Rp {{ number_format($item->total_revenue, 0, ',', '.') }}</span>
                    </div>
                </div>
            @empty
                <div class="text-neutral-500 italic text-[14px]">Belum ada data penjualan pada rentang waktu ini.</div>
            @endforelse
        </div>

        <div class="flex items-center gap-[20px] w-full mt-[10px]">
            <h2 class="text-[18px] font-bold text-black whitespace-nowrap m-0">Riwayat Transaksi</h2>
            <div class="h-[0.3px] bg-black flex-1"></div>
        </div>

        <div
            class="w-full bg-white rounded-[16px] shadow-[0_0_8px_rgba(0,0,0,0.15)] overflow-hidden flex flex-col pb-[30px]">
            <div class="w-full overflow-x-auto pos-scroll">
                <table class="w-full min-w-[1000px] text-left border-collapse">
                    <thead>
                        <tr class="bg-neutral-50 border-b-[0.2px] border-neutral-600">
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                ID Transaksi</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Waktu</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Nama Pelanggan</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Metode</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap">
                                Total Belanja</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Status</th>
                            <th
                                class="py-[12px] px-[16px] text-[11px] font-extrabold text-neutral-500 uppercase whitespace-nowrap text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($historyOrders as $order)
                            <tr class="border-b-[0.1px] border-neutral-700 hover:bg-neutral-50 transition-colors">
                                <td class="py-[16px] px-[16px] text-[12px] font-bold text-primary-500 whitespace-nowrap">
                                    {{ $order->order_code }}</td>
                                <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('H:i') }}</td>
                                <td class="py-[16px] px-[16px] text-[12px] font-medium text-neutral-700 whitespace-nowrap">
                                    {{ $order->customer_name }}</td>
                                <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                    @if ($order->payment_method == 'QRIS')
                                        <span
                                            class="inline-flex justify-center items-center px-[10px] py-[4px] bg-primary-100 rounded-full text-[10px] font-bold text-primary-500">QRIS</span>
                                    @else
                                        <span
                                            class="inline-flex justify-center items-center px-[10px] py-[4px] bg-[#FEF3C6] rounded-full text-[10px] font-bold text-[#EFB100]">Tunai</span>
                                    @endif
                                </td>
                                <td class="py-[16px] px-[16px] text-[12px] font-bold text-black whitespace-nowrap">Rp
                                    {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                    @if ($order->status == 'Selesai')
                                        <span
                                            class="inline-flex justify-center items-center px-[10px] py-[4px] bg-secondary-200 bg-opacity-40 rounded-full text-[10px] font-bold text-secondary-700">Selesai</span>
                                    @elseif($order->status == 'Proses')
                                        <span
                                            class="inline-flex justify-center items-center px-[10px] py-[4px] bg-[#FEF3C6] rounded-full text-[10px] font-bold text-[#EFB100]">Proses</span>
                                    @else
                                        <span
                                            class="inline-flex justify-center items-center px-[10px] py-[4px] bg-red-100 rounded-full text-[10px] font-bold text-red-600">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="py-[16px] px-[16px] whitespace-nowrap text-center">
                                    <button onclick="viewReceipt({{ $order->id }})"
                                        class="w-[36px] h-[36px] mx-auto bg-neutral-50 border border-primary-500 rounded-[12px] shadow-[0_2px_4px_rgba(62,52,69,0.25)] flex justify-center items-center hover:bg-primary-500 hover:text-white text-primary-500 transition-colors group cursor-pointer">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-[20px] text-center text-neutral-500 text-[14px]">Tidak ada
                                    transaksi pada rentang waktu ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div id="modalPilihTanggal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div class="bg-white w-[90%] max-w-[400px] rounded-[20px] p-[24px] flex flex-col gap-[20px] shadow-lg">
            <h2 class="text-[18px] font-bold text-black text-center">Pilih Rentang Waktu</h2>
            <div class="flex flex-col gap-[10px]">
                <label class="text-[14px] font-bold text-neutral-700">Mulai Tanggal</label>
                <input type="date" id="customStart"
                    class="border border-neutral-300 rounded-[10px] p-[10px] text-[14px] w-full focus:outline-none focus:border-primary-500">

                <label class="text-[14px] font-bold text-neutral-700 mt-[10px]">Sampai Tanggal</label>
                <input type="date" id="customEnd"
                    class="border border-neutral-300 rounded-[10px] p-[10px] text-[14px] w-full focus:outline-none focus:border-primary-500">
            </div>
            <div class="flex gap-[12px] w-full mt-[10px]">
                <button class="flex-1 py-[12px] bg-neutral-300 rounded-[16px] text-[14px] font-bold text-[#868686]"
                    onclick="closeModal('modalPilihTanggal')">Batal</button>
                <button class="flex-1 py-[12px] bg-primary-500 rounded-[16px] text-[14px] font-bold text-white shadow-md"
                    onclick="submitCustomDate()">Terapkan</button>
            </div>
        </div>
    </div>

    <div id="modalDetailPesanan" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col items-center gap-[20px] max-h-[96dvh] overflow-y-auto">

            <div class="bg-white border border-neutral-200 rounded-[12px] p-[20px] w-full text-black font-['Montserrat'] text-[12px]"
                id="printReceiptContent">
            </div>

            <div class="flex gap-[12px] w-full mt-[10px]">
                <button
                    class="flex-1 h-[48px] bg-neutral-50 border border-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-primary-500 flex justify-center items-center hover:bg-primary-500 hover:text-white transition-colors cursor-pointer"
                    onclick="closeModal('modalDetailPesanan')">Kembali</button>
                <button
                    class="flex-1 h-[48px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-white flex justify-center items-center gap-[8px] hover:opacity-90 transition-opacity cursor-pointer"
                    onclick="printReceipt()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Cetak Struk
                </button>
            </div>
        </div>
    </div>

    <script>
        const ordersData = @json($historyOrders->keyBy('id'));
        const currentFilter = '{{ $filter }}';

        /* ---- Fungsi Filter Waktu & Navigasi ---- */
        function applyFilter(filterType) {
            window.location.href = `?filter=${filterType}`;
        }

        function submitCustomDate() {
            const start = document.getElementById('customStart').value;
            const end = document.getElementById('customEnd').value;
            if (!start || !end) return alert('Silakan isi kedua tanggal!');
            window.location.href = `?filter=custom&start_date=${start}&end_date=${end}`;
        }

        function navigateDate(newStart, newEnd) {
            if (!newStart) return;
            if (currentFilter === 'today') {
                window.location.href = `?filter=today&date=${newStart}`;
            } else if (currentFilter === '7days' || currentFilter === '1month') {
                window.location.href = `?filter=${currentFilter}&end_date=${newEnd}`;
            } else {
                window.location.href = `?filter=custom&start_date=${newStart}&end_date=${newEnd}`;
            }
        }

        /* ---- Fungsi Modal & Struk ---- */
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function viewReceipt(orderId) {
            const order = ordersData[orderId];
            if (!order) return;

            const printArea = document.getElementById('printReceiptContent');

            // Generate list barang
            let itemsHtml = '';
            order.items.forEach(item => {
                let namaProduk = item.product ? item.product.name : `Item #${item.product_id}`;
                itemsHtml +=
                    `
                <div style="display:flex; justify-content:space-between; margin-bottom:4px;">
                    <span style="max-width: 65%; word-wrap: break-word;">${namaProduk} x ${item.quantity}</span>
                    <span>Rp ${parseInt(item.subtotal).toLocaleString('id-ID')}</span>
                </div>
                ${item.notes ? `<div style="font-size:10px; color:#555; margin-bottom:4px;">↳ Catatan: ${item.notes}</div>` : ''}`;
            });

            // Waktu lokal struk
            let dateObj = new Date(order.created_at);
            let timeString = dateObj.toLocaleString('id-ID', {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            // Suntik Struk Asli
            printArea.innerHTML = `
                <div class="flex flex-col items-center gap-[4px] w-full pb-[16px]">
                    <span class="font-['Carattere'] text-[32px] text-primary-500 text-center leading-[1] italic">Rekaps
                        Store</span>
                    <span class="font-['Montserrat'] text-[12px] font-normal text-neutral-500 text-center">DEPARTEMEN EKONOMI KREATIF</span>
                    <div class="flex items-center gap-[12px]">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-neutral-500">@himarpl</span>
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-neutral-500">@rekaps.store</span>
                    </div>
                </div>
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="display:flex; justify-content:space-between;"><span>No. Transaksi:</span><span>${order.order_code}</span></div>
                <div style="display:flex; justify-content:space-between;"><span>Pelanggan:</span><span>${order.customer_name}</span></div>
                <div style="display:flex; justify-content:space-between;"><span>Waktu:</span><span>${timeString}</span></div>
                <div style="display:flex; justify-content:space-between;"><span>Metode Bayar:</span><span>${order.payment_method}</span></div>
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                ${itemsHtml}
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="display:flex; justify-content:space-between;"><span>Subtotal:</span><span>Rp ${parseInt(order.subtotal).toLocaleString('id-ID')}</span></div>
                ${parseInt(order.discount) > 0 ? `<div style="display:flex; justify-content:space-between; color:red;"><span>Diskon Produk:</span><span>-Rp ${parseInt(order.discount).toLocaleString('id-ID')}</span></div>` : ''}
                <div style="display:flex; justify-content:space-between; font-weight:bold; margin-top:3px;"><span>Total Akhir:</span><span>Rp ${parseInt(order.total).toLocaleString('id-ID')}</span></div>
                <div style="display:flex; justify-content:space-between;"><span>Dibayar:</span><span>Rp ${parseInt(order.paid_amount).toLocaleString('id-ID')}</span></div>
                <div style="display:flex; justify-content:space-between; color: green; font-weight:bold;"><span>Kembalian:</span><span>Rp ${parseInt(order.change_amount).toLocaleString('id-ID')}</span></div>
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="text-align:center; font-size:10px; color:#777; margin-top:5px;">Terima kasih telah berbelanja di Bazar Himarpl!</div>
            `;

            openModal('modalDetailPesanan');
        }

        // Fungsi Cetak Cepat
        function printReceipt() {
            const printContent = document.getElementById('printReceiptContent').innerHTML;
            const originalContent = document.body.innerHTML;
            document.body.innerHTML =
                `<div style="padding: 20px; max-width: 300px; margin: auto; font-family: monospace;">${printContent}</div>`;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
@endsection
