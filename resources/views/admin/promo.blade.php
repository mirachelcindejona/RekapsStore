@extends('admin.layouts.layout')

@section('title', 'Promo')
@section('page_title', 'Promo')
@section('page_breadcrumb', 'Promo')

@section('content')
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif

    <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold text-gray-800">
                Daftar Voucher
            </h2>

            <button onclick="openModal()"
                class="bg-[#7d39eb] text-white px-4 py-2 rounded-xl text-sm font-semibold hover:opacity-90">
                + Buat Voucher
            </button>
        </div>

        <div class="w-full overflow-x-auto touch-pan-x custom-scrollbar pb-[10px]">
            <table
                class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1050px]">
                <thead class="bg-neutral-100 border-b-[0.2px] border-neutral-600">
                    <tr>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            KODE VOUCHER</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            TIPE</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            NILAI</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            MIN. PEMBELIAN</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            PERIODE</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            KUOTA</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            STATUS</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($vouchers as $voucher)
                        <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                {{ $voucher->code }}
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                {{ $voucher->type }}
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                @if ($voucher->type == 'Persentase')
                                    {{ $voucher->value }}%
                                @else
                                    Rp{{ number_format($voucher->value, 0, ',', '.') }}
                                @endif
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                Rp{{ number_format($voucher->min_purchase, 0, ',', '.') }}
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($voucher->start_date)->format('Y-m-d') }}
                                -
                                {{ \Carbon\Carbon::parse($voucher->end_date)->format('Y-m-d') }}
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                {{ $voucher->quota }}
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                <span class="bg-emerald-100 text-emerald-500 px-3 py-1 rounded-full text-xs">
                                    {{ $voucher->status }}
                                </span>
                            </td>

                            <td
                                class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                                <div class="flex gap-[6px]">

                                    {{-- EDIT --}}
                                    <button
                                        onclick="editVoucher(
                                    '{{ $voucher->id }}',
                                    '{{ $voucher->code }}',
                                    '{{ $voucher->type }}',
                                    '{{ $voucher->value }}',
                                    '{{ $voucher->min_purchase }}',
                                    '{{ $voucher->quota }}',
                                    '{{ $voucher->end_date }}',
                                    '{{ $voucher->status }}'
                                    )"
                                        class="flex items-center justify-center w-[36px] h-[36px]
                                        rounded-xl bg-neutral-50 border border-primary-500
                                        text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)]
                                        hover:bg-primary-500 hover:text-white
                                        hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]
                                        transition-all duration-300">

                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                    {{-- DELETE --}}
                                    <form id="deleteForm{{ $voucher->id }}"
                                        action="{{ route('admin.voucher.destroy', $voucher->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="button" onclick="openDeleteModal({{ $voucher->id }})"
                                            class="flex items-center justify-center w-[36px] h-[36px]
                                        rounded-xl bg-red-50 border border-red-600
                                        text-red-600
                                        hover:bg-red-600 hover:text-white
                                        hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)]
                                        transition-all duration-300">

                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">

                                                <path
                                                    d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-[40px] text-neutral-500 font-semibold text-[14px]">
                                Belum ada voucher yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('footer')
    <div id="overlay"
        class="fixed inset-0 bg-black/40 backdrop-blur-sm invisible opacity-0 z-[50] transition-all duration-300 [&.active]:visible [&.active]:opacity-100"
        onclick="closeAll()">
    </div>

    <div id="modal"
        class="fixed inset-0 z-[100] invisible opacity-0 flex items-center justify-center p-4 transition-all duration-300 [&.active]:visible [&.active]:opacity-100">

        <div
            class="bg-white w-[90%] max-w-[600px] rounded-[20px] p-[24px] max-h-[85vh] overflow-y-auto shadow-2xl transform scale-[0.9] transition-transform duration-300 [.active_&]:scale-100">
            <div class="modal-header flex justify-between items-center mb-[20px]">
                <h2 class="text-[18px] font-bold text-gray-900">
                    Buat Voucher Baru
                </h2>

                <span class="close cursor-pointer text-[20px] text-gray-400 hover:text-gray-600" onclick="closeAll()">
                    ✕
                </span>
            </div>

            <form action="{{ route('admin.voucher.store') }}" method="POST">

                @csrf

                <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-[20px]">

                    <div class="form-group flex flex-col gap-1.5">
                        <label>
                            Kode Voucher
                        </label>

                        <input type="text" name="code" placeholder="CTH : EKRAF20" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div class="form-group flex flex-col gap-1.5">
                        <label>
                            Tipe Voucher
                        </label>

                        <select name="type" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">

                            <option value="Nominal">Nominal</option>
                            <option value="Persentase">Persentase</option>
                        </select>
                    </div>

                    <div class="form-group flex flex-col gap-1.5">
                        <label>
                            Nilai Diskon
                        </label>

                        <input type="number" name="value" min="0" placeholder="10" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div class="form-group flex flex-col gap-1.5">
                        <label>
                            Min. Pembelian
                        </label>

                        <input type="number" name="min_purchase" min="0" placeholder="10000" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div class="form-group flex flex-col gap-1.5">
                        <label>
                            Kuota Penggunaan
                        </label>

                        <input type="number" name="quota" min="1" placeholder="50" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div class="form-group flex flex-col gap-1.5">
                        <label>
                            Berlaku Hingga
                        </label>

                        <input type="date" name="end_date" min="{{ now()->format('Y-m-d') }}" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>
                </div>

                <div class="modal-footer flex justify-end gap-[12px] mt-[24px]">

                    <button type="button" class="bg-neutral-100 px-[20px] py-[10px] rounded-[12px] font-medium"
                        onclick="closeAll()">
                        Batal
                    </button>

                    <button type="submit"
                        class="bg-secondary-500 text-neutral-900 px-[20px] py-[10px] rounded-[12px] font-bold">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="editVoucherModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">

        <div class="bg-neutral-50 w-[90%] max-w-[600px] rounded-[20px] p-[24px]">

            <div class="flex justify-between items-center mb-5">
                <h2 class="text-lg font-bold">
                    Edit Voucher
                </h2>

                <span onclick="closeAll()" class="cursor-pointer text-xl">
                    ✕
                </span>
            </div>

            <form id="editVoucherForm" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label>Kode Voucher</label>
                        <input id="edit_code" name="code" type="text"
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div>
                        <label>Tipe Voucher</label>
                        <select id="edit_type" name="type"
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                            <option value="Nominal">
                                Nominal
                            </option>

                            <option value="Persentase">
                                Persentase
                            </option>

                        </select>
                    </div>

                    <div>
                        <label>Nilai Voucher</label>
                        <input id="edit_value" type="number" name="value" min="0" required
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div>
                        <label>Min Pembelian</label>
                        <input id="edit_min_purchase" type="number" name="min_purchase" min="0" required
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div>
                        <label>Kuota</label>
                        <input id="edit_quota" type="number" name="quota" min="1" required
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div>
                        <label>Berlaku Hingga</label>
                        <input id="edit_end_date" type="date" name="end_date" min="{{ now()->format('Y-m-d') }}"
                            required
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                    </div>

                    <div>
                        <label>Status</label>
                        <select id="edit_status" name="status"
                            class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                            <option value="Aktif">
                                Aktif
                            </option>

                            <option value="Non-Aktif">
                                Nonaktif
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-5">
                    <button type="button" onclick="closeAll()" class="px-4 py-2 bg-neutral-100 rounded-xl">
                        Batal
                    </button>

                    <button type="submit" class="px-4 py-2 bg-primary-500 text-neutral-50 rounded-xl">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="deleteVoucherModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/30">

        <div class="w-[420px] rounded-[24px] border border-black bg-white p-[32px] shadow-xl">
            <h2 class="text-[28px] font-bold text-neutral-900">
                Hapus Voucher
            </h2>
            <p class="mt-[16px] text-[18px] text-neutral-700">
                Apakah Anda yakin ingin menghapus voucher ini?
            </p>

            <div class="mt-[32px] flex justify-end gap-[12px]">
                <button type="button" onclick="closeDeleteModal()"
                    class="rounded-xl bg-neutral-200 px-[20px] py-[10px] font-bold text-neutral-600">
                    Batal
                </button>

                <button type="button" onclick="submitDelete()"
                    class="rounded-xl bg-red-500 px-[20px] py-[10px] font-bold text-neutral-50">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('overlay')
                .classList.add('active');

            document.getElementById('modal')
                .classList.add('active');
        }

        function closeAll() {

            document.getElementById('overlay')
                .classList.remove('active');

            document.getElementById('modal')
                .classList.remove('active');

            document.getElementById('diskon')
                ?.classList.remove('active');

            document.getElementById('editVoucherModal')
                ?.classList.add('hidden');
        }

        function editVoucher(
            id,
            code,
            type,
            value,
            minPurchase,
            quota,
            endDate,
            status
        ) {
            document
                .getElementById('edit_code')
                .value = code;

            document
                .getElementById('edit_type')
                .value = type;

            document
                .getElementById('edit_value')
                .value = value;

            document
                .getElementById('edit_min_purchase')
                .value = minPurchase;

            document
                .getElementById('edit_quota')
                .value = quota;

            document
                .getElementById('edit_end_date')
                .value = endDate;

            document
                .getElementById('edit_status')
                .value = status;

            document
                .getElementById('editVoucherForm')
                .action =
                '/admin/voucher/' + id;

            document
                .getElementById('overlay')
                .classList.add('active');

            document
                .getElementById('editVoucherModal')
                .classList.remove('hidden');
        }

        let deleteVoucherId = null;

        function openDeleteModal(id) {
            deleteVoucherId = id;
            const modal = document.getElementById('deleteVoucherModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteVoucherModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function submitDelete() {
            document.getElementById('deleteForm' + deleteVoucherId).submit();
        }
    </script>
@endsection
