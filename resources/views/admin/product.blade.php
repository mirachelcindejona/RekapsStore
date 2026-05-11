@extends('admin.layouts.layout')

@section('title', 'Daftar Produk')

@section('page_title', 'Daftar Produk')

@section('page_breadcrumb', 'Daftar Produk')

@section('content')
    <!-- HEADER -->
    <div
        class="flex items-center justify-between mb-[20px] gap-[12px] flex-wrap max-[900px]:flex-col max-[900px]:items-start">
        <div class="flex items-center gap-[4px] bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-lg p-[4px]">
            <button
                class="flex items-center justify-center px-[14px] py-[4px] rounded-md text-[14px] max-[560px]:text-[13px] font-bold text-neutral-50 cursor-pointer transition-all duration-[250ms] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] outline-none border-none">Semua
                (9)</button>
            <button
                class="flex items-center justify-center px-[14px] py-[4px] rounded-md text-[14px] max-[560px]:text-[13px] font-bold text-neutral-500 cursor-pointer transition-all duration-[250ms] hover:text-primary-500 bg-transparent outline-none border-none">Ready
                (5)</button>
            <button
                class="flex items-center justify-center px-[14px] py-[4px] rounded-md text-[14px] max-[560px]:text-[13px] font-bold text-neutral-500 cursor-pointer transition-all duration-[250ms] hover:text-primary-500 bg-transparent outline-none border-none">PO
                (3)</button>
            <button
                class="flex items-center justify-center px-[14px] py-[4px] rounded-md text-[14px] max-[560px]:text-[13px] font-bold text-neutral-500 cursor-pointer transition-all duration-[250ms] hover:text-primary-500 bg-transparent outline-none border-none">Jasa
                (1)</button>
        </div>

        <a href="{{ url('/admin/product-add') }}">
            <button
                class="flex items-center justify-center gap-[6px] px-[16px] py-[8px] bg-primary-500 text-neutral-50 rounded-xl text-[12px] font-bold shadow-[0_0_8px_rgba(114,52,214,0.35)] border-none cursor-pointer transition-all duration-[250ms] whitespace-nowrap shrink-0 hover:bg-[#5928a7] hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)] max-[900px]:hidden">
                + Tambah Produk
            </button>
        </a>
    </div>

    <!-- TABLE -->
    <div
        class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full">
        <div>
            <table
                class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1000px]">
                <thead class="bg-neutral-100 border-b-[0.2px] border-neutral-600">
                    <tr>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            PRODUK</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            KATEGORI</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            HARGA JUAL</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            MODAL</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            STOK</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            RATING</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            STATUS</th>
                        <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                            AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Baris Produk 1 -->
                    <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <a href="{{ url('/admin/product-detail') }}" class="block">
                                <div class="flex items-center gap-[10px]">
                                    <img src="{{ asset('assets/img/products/jersey.png') }}"
                                        class="w-[42px] h-[42px] rounded-lg object-cover" />
                                    <div>
                                        <div class="text-[13px] font-bold text-neutral-900">Kaos Rekaps</div>
                                        <div class="text-[11px] text-neutral-400">Kaos Rekaps</div>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">Ready</span>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap font-bold">
                            Rp75.000</td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            Rp45.000</td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#fb2c36]/12 text-[#fb2c36]">2
                                pcs</span>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <div class="flex gap-[4px] font-semibold items-center">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75343 4.16996C4.0689 4.11803 4.34052 3.91839 4.48425 3.63281L6.03565 0.550385C6.40597 -0.185415 7.45726 -0.182994 7.8242 0.554505L9.36191 3.64515C9.50445 3.93164 9.77549 4.13262 10.091 4.18579L13.0026 4.67647C13.8049 4.8117 14.1185 5.79754 13.5417 6.37146L10.9044 8.99544C10.6357 9.2628 10.5413 9.6591 10.6605 10.0189L11.4738 12.473C11.7541 13.3187 10.8718 14.0811 10.0756 13.6811L7.35233 12.3127C7.07127 12.1715 6.74015 12.1707 6.45845 12.3107L3.72801 13.6671C2.93017 14.0635 2.05137 13.2974 2.33522 12.4529L3.15874 10.0029C3.27951 9.64364 3.18676 9.24696 2.91921 8.97846L0.292428 6.34238C-0.281774 5.76615 0.0356802 4.78193 0.83836 4.6498L3.75343 4.16996Z"
                                        fill="#FFDF20" />
                                </svg>
                                4.8
                            </div>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[rgba(0,200,83,0.15)] text-[#10b981]">Aktif</span>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <div class="flex gap-[6px]">
                                <a href="{{ url('/admin/product-edit') }}">
                                    <button
                                        class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>

                                <button
                                    class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-[#fb2c36] text-[#fb2c36] hover:bg-[#fb2c36] hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)] outline-none"
                                    onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Baris Produk 2 -->
                    <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <a href="{{ url('/admin/product-detail') }}" class="block">
                                <div class="flex items-center gap-[10px]">
                                    <img src="{{ asset('assets/img/products/jersey.png') }}"
                                        class="w-[42px] h-[42px] rounded-lg object-cover" />
                                    <div>
                                        <div class="text-[13px] font-bold text-neutral-900">Kaos Rekaps</div>
                                        <div class="text-[11px] text-neutral-400">Kaos Rekaps</div>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-primary-500/15 text-primary-500">Ready</span>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap font-bold">
                            Rp75.000</td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            Rp45.000</td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#fb2c36]/12 text-[#fb2c36]">2
                                pcs</span>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <div class="flex gap-[4px] font-semibold items-center">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75343 4.16996C4.0689 4.11803 4.34052 3.91839 4.48425 3.63281L6.03565 0.550385C6.40597 -0.185415 7.45726 -0.182994 7.8242 0.554505L9.36191 3.64515C9.50445 3.93164 9.77549 4.13262 10.091 4.18579L13.0026 4.67647C13.8049 4.8117 14.1185 5.79754 13.5417 6.37146L10.9044 8.99544C10.6357 9.2628 10.5413 9.6591 10.6605 10.0189L11.4738 12.473C11.7541 13.3187 10.8718 14.0811 10.0756 13.6811L7.35233 12.3127C7.07127 12.1715 6.74015 12.1707 6.45845 12.3107L3.72801 13.6671C2.93017 14.0635 2.05137 13.2974 2.33522 12.4529L3.15874 10.0029C3.27951 9.64364 3.18676 9.24696 2.91921 8.97846L0.292428 6.34238C-0.281774 5.76615 0.0356802 4.78193 0.83836 4.6498L3.75343 4.16996Z"
                                        fill="#FFDF20" />
                                </svg>
                                4.8
                            </div>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[rgba(0,200,83,0.15)] text-[#10b981]">Aktif</span>
                        </td>
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <div class="flex gap-[6px]">
                                <a href="{{ url('/admin/product-edit') }}">
                                    <button
                                        class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>

                                <button
                                    class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-[#fb2c36] text-[#fb2c36] hover:bg-[#fb2c36] hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)] outline-none"
                                    onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <!-- MODAL CONFIRM DELETE -->
    <div id="modalConfirmDelete"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] [&.active]:flex">
        <div
            class="flex flex-col items-center p-[20px_28px] gap-[24px] w-[355px] bg-neutral-50 shadow-[0_4px_4px_rgba(0,0,0,0.25)] rounded-[20px]">
            <div class="w-[114px] h-[114px] flex justify-center items-center">
                <svg width="114" height="114" viewBox="0 0 114 114" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="57" cy="57" r="46.5" stroke="#FB2C36" stroke-width="7" />
                    <path d="M57 30V65" stroke="#FB2C36" stroke-width="7" stroke-linecap="round" />
                    <circle cx="57" cy="84" r="5" fill="#FB2C36" />
                </svg>
            </div>

            <p class="font-normal text-[12px] leading-[16px] text-center text-neutral-500 m-0">
                Anda yakin ingin menghapus produk Jersey RPL?
            </p>

            <div class="flex flex-row justify-center items-center gap-[12px] w-full">
                <button type="button"
                    class="px-[16px] py-[8px] w-[110px] h-[32px] bg-neutral-300 rounded-xl text-[#868686] font-bold text-[12px] cursor-pointer"
                    onclick="closeModal('modalConfirmDelete')">
                    Batal
                </button>
                <button type="button"
                    class="px-[16px] py-[8px] w-[110px] h-[32px] bg-[#fb2c36] shadow-[0_40px_80px_-16px_rgba(62,52,69,0.16),0_2px_4px_rgba(62,52,69,0.25)] rounded-xl text-white font-bold text-[12px] cursor-pointer"
                    onclick="successDelete()">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL SUCCESS ACTION -->
    <div id="modalSuccessAction"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] [&.active]:flex">
        <div
            class="flex flex-col items-center p-[32px_20px] gap-[20px] w-[391px] bg-neutral-50 shadow-[0_4px_4px_rgba(0,0,0,0.25)] rounded-[20px]">
            <div class="w-[114px] h-[114px] flex justify-center items-center">
                <svg width="114" height="114" viewBox="0 0 114 114" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M104.5 57C104.5 83.2335 83.2335 104.5 57 104.5C30.7665 104.5 9.5 83.2335 9.5 57C9.5 30.7665 30.7665 9.5 57 9.5C83.2335 9.5 104.5 30.7665 104.5 57Z"
                        stroke="#C6FF33" stroke-width="7" stroke-miterlimit="1.50916" />
                    <path d="M42.75 57L52.25 66.5L71.25 47.5" stroke="#C6FF33" stroke-width="7" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>

            <h2 class="font-bold text-[18px] text-center text-[#404040] m-0">Produk berhasil dihapus!</h2>
        </div>
    </div>

    <!-- BUTTON ADD MOBILE (Hanya Tampil di Mobile) -->
    <a href="{{ url('/admin/product-add') }}"
        class="hidden max-[900px]:flex fixed bottom-[30px] right-[30px] w-[56px] h-[56px] rounded-full bg-primary-500 text-neutral-50 shadow-[0_4px_12px_rgba(125,57,235,0.4)] items-center justify-center z-[90] cursor-pointer transition-all duration-200 hover:bg-[#5928a7] active:scale-95">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </a>

    <!-- SCRIPT -->
    <script>
        /* ---- Sidebar Toggle ---- */
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("open");
            document.getElementById("sidebarOverlay").classList.toggle("show");
        }

        function closeSidebar() {
            document.getElementById("sidebar").classList.remove("open");
            document.getElementById("sidebarOverlay").classList.remove("show");
        }

        /* ---- Modal Scripts ---- */
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function successDelete() {
            closeModal('modalConfirmDelete');
            openModal('modalSuccessAction');

            setTimeout(() => {
                closeModal('modalSuccessAction');
            }, 2000);
        }
    </script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection
