<?php $__env->startSection('title', 'Detail Produk'); ?>

<?php $__env->startSection('page_title', 'Detail Produk'); ?>

<?php $__env->startSection('page_breadcrumb', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Header Detail -->
    <div class="flex justify-between items-center mb-[24px] flex-wrap gap-[16px]">
        <div class="flex items-center gap-[14px]">
            <a href="<?php echo e(url('/admin/product')); ?>"
                class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
            </a>
        </div>

        <div class="flex items-center gap-[10px]">
            <button
                class="flex items-center gap-[6px] px-[16px] py-[8px] bg-[#e7000b] text-neutral-50 rounded-xl text-[12px] font-semibold shadow-[0_4px_12px_rgba(149,24,6,0.2)] transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none"
                onclick="openModal('modalConfirmDelete')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.49967 5.83325C7.49967 5.17021 7.76307 4.53433 8.23191 4.06549C8.70075 3.59664 9.33663 3.33325 9.99967 3.33325C10.6627 3.33325 11.2986 3.59664 11.7674 4.06549C12.2363 4.53433 12.4997 5.17021 12.4997 5.83325M7.49967 5.83325H12.4997M7.49967 5.83325H4.99967M12.4997 5.83325H14.9997M4.99967 5.83325H3.33301M4.99967 5.83325V14.9999C4.99967 15.4419 5.17527 15.8659 5.48783 16.1784C5.80039 16.491 6.22431 16.6666 6.66634 16.6666H13.333C13.775 16.6666 14.199 16.491 14.5115 16.1784C14.8241 15.8659 14.9997 15.4419 14.9997 14.9999V5.83325M14.9997 5.83325H16.6663"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Hapus
            </button>
            <a href="<?php echo e(url('/admin/product-edit')); ?>">
                <button
                    class="flex items-center gap-[6px] px-[16px] py-[8px] bg-primary-500 text-neutral-50 rounded-xl text-[12px] font-semibold shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.655 1.66669C14.9675 1.35424 15.3914 1.17871 15.8333 1.17871C16.2753 1.17871 16.6991 1.35424 17.0117 1.66669L18.3333 2.98835C18.6458 3.3009 18.8213 3.72475 18.8213 4.16669C18.8213 4.60863 18.6458 5.03248 18.3333 5.34502L17.0117 6.66669L13.3333 2.98835L14.655 1.66669ZM12.155 4.16669L7.98833 8.33336C7.67575 8.64584 7.50009 9.0697 7.5 9.51169V10.8334C7.5 11.2754 7.6756 11.6993 7.98816 12.0119C8.30072 12.3244 8.72464 12.5 9.16667 12.5H10.4883C10.9303 12.4999 11.3542 12.3243 11.6667 12.0117L15.8333 7.84502L12.155 4.16669Z"
                            fill="#FAFAFA" />
                        <path
                            d="M5 11.6667H4.16667C3.72464 11.6667 3.30072 11.8423 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3334C2.5 13.7754 2.67559 14.1994 2.98816 14.5119C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4882C17.3244 15.8008 17.5 16.2247 17.5 16.6667C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1578 16.2754 18.3334 15.8333 18.3334H12.5"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Edit
                </button>
            </a>
        </div>
    </div>

    <!-- Main Detail Card -->
    <div
        class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-2xl p-[20px] min-[900px]:p-[32px] flex flex-col gap-[18px]">

        <!-- Grid Atas -->
        <div class="grid grid-cols-1 min-[900px]:grid-cols-[350px_1fr] gap-[32px] items-start">

            <!-- Area Gambar -->
            <div class="flex flex-col gap-[12px]">
                <img src="../../assets/img/products/poster-jersey.png" alt="Produk"
                    class="w-full h-auto aspect-square min-[900px]:h-[350px] min-[900px]:aspect-auto bg-neutral-50 rounded-xl object-cover shadow-[0_2px_8px_rgba(0,0,0,0.05)]" />
                <div class="grid grid-cols-3 gap-[12px]">
                    <img src="../../assets/img/products/jersey.png"
                        class="w-full h-[90px] bg-neutral-50 rounded-lg object-cover cursor-pointer border-2 border-primary-500 transition-colors duration-200"
                        alt="Thumb" />
                    <img src="../../assets/img/products/jersey.png"
                        class="w-full h-[90px] bg-neutral-50 rounded-lg object-cover cursor-pointer border-2 border-transparent hover:border-primary-500 transition-colors duration-200"
                        alt="Thumb" />
                    <img src="../../assets/img/products/jersey.png"
                        class="w-full h-[90px] bg-neutral-50 rounded-lg object-cover cursor-pointer border-2 border-transparent hover:border-primary-500 transition-colors duration-200"
                        alt="Thumb" />
                </div>
            </div>

            <!-- Area Info -->
            <div class="flex flex-col gap-[20px]">
                <div>
                    <h1 class="text-[24px] font-bold text-neutral-950 m-0 mb-[8px]">Jersey RPL Super Premium</h1>

                    <div class="flex items-center gap-[16px] flex-wrap">
                        <div class="flex gap-[8px]">
                            <span
                                class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-primary-100 text-primary-500">Ready
                                Stok</span>
                            <span
                                class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-[#fefce8] text-[#d08700]">Merchandise</span>
                            <span
                                class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-[#f0fdf4] text-[#16a34a]">Aktif</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-[4px] text-[12px] font-medium text-neutral-900 mt-[18px]">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.83302 7.40458C7.14849 7.35265 7.42011 7.15301 7.56384 6.86743L9.11523 3.785C9.48556 3.0492 10.5369 3.05163 10.9038 3.78912L12.4415 6.87977C12.584 7.16626 12.8551 7.36724 13.1706 7.42041L16.0822 7.91109C16.8845 8.04632 17.1981 9.03216 16.6213 9.60608L13.984 12.2301C13.7153 12.4974 13.6209 12.8937 13.7401 13.2535L14.5534 15.7076C14.8337 16.5534 13.9514 17.3158 13.1552 16.9157L10.4319 15.5473C10.1509 15.4061 9.81974 15.4054 9.53804 15.5453L6.8076 16.9017C6.00976 17.2981 5.13096 16.532 5.41481 15.6876L6.23833 13.2375C6.3591 12.8783 6.26635 12.4816 5.9988 12.2131L3.37202 9.577C2.79782 9.00076 3.11527 8.01655 3.91795 7.88442L6.83302 7.40458Z"
                                fill="#FFDF20" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.83302 7.40458C7.14849 7.35265 7.42011 7.15301 7.56384 6.86743L9.11523 3.785C9.48556 3.0492 10.5369 3.05163 10.9038 3.78912L12.4415 6.87977C12.584 7.16626 12.8551 7.36724 13.1706 7.42041L16.0822 7.91109C16.8845 8.04632 17.1981 9.03216 16.6213 9.60608L13.984 12.2301C13.7153 12.4974 13.6209 12.8937 13.7401 13.2535L14.5534 15.7076C14.8337 16.5534 13.9514 17.3158 13.1552 16.9157L10.4319 15.5473C10.1509 15.4061 9.81974 15.4054 9.53804 15.5453L6.8076 16.9017C6.00976 17.2981 5.13096 16.532 5.41481 15.6876L6.23833 13.2375C6.3591 12.8783 6.26635 12.4816 5.9988 12.2131L3.37202 9.577C2.79782 9.00076 3.11527 8.01655 3.91795 7.88442L6.83302 7.40458Z"
                                fill="#FFDF20" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.83302 7.40458C7.14849 7.35265 7.42011 7.15301 7.56384 6.86743L9.11523 3.785C9.48556 3.0492 10.5369 3.05163 10.9038 3.78912L12.4415 6.87977C12.584 7.16626 12.8551 7.36724 13.1706 7.42041L16.0822 7.91109C16.8845 8.04632 17.1981 9.03216 16.6213 9.60608L13.984 12.2301C13.7153 12.4974 13.6209 12.8937 13.7401 13.2535L14.5534 15.7076C14.8337 16.5534 13.9514 17.3158 13.1552 16.9157L10.4319 15.5473C10.1509 15.4061 9.81974 15.4054 9.53804 15.5453L6.8076 16.9017C6.00976 17.2981 5.13096 16.532 5.41481 15.6876L6.23833 13.2375C6.3591 12.8783 6.26635 12.4816 5.9988 12.2131L3.37202 9.577C2.79782 9.00076 3.11527 8.01655 3.91795 7.88442L6.83302 7.40458Z"
                                fill="#FFDF20" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.83302 7.40458C7.14849 7.35265 7.42011 7.15301 7.56384 6.86743L9.11523 3.785C9.48556 3.0492 10.5369 3.05163 10.9038 3.78912L12.4415 6.87977C12.584 7.16626 12.8551 7.36724 13.1706 7.42041L16.0822 7.91109C16.8845 8.04632 17.1981 9.03216 16.6213 9.60608L13.984 12.2301C13.7153 12.4974 13.6209 12.8937 13.7401 13.2535L14.5534 15.7076C14.8337 16.5534 13.9514 17.3158 13.1552 16.9157L10.4319 15.5473C10.1509 15.4061 9.81974 15.4054 9.53804 15.5453L6.8076 16.9017C6.00976 17.2981 5.13096 16.532 5.41481 15.6876L6.23833 13.2375C6.3591 12.8783 6.26635 12.4816 5.9988 12.2131L3.37202 9.577C2.79782 9.00076 3.11527 8.01655 3.91795 7.88442L6.83302 7.40458Z"
                                fill="#FFDF20" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.9038 3.78912C10.5369 3.05162 9.48556 3.0492 9.11524 3.785L7.56384 6.86743C7.42011 7.15301 7.14849 7.35265 6.83302 7.40458L3.91795 7.88442C3.11527 8.01655 2.79782 9.00076 3.37202 9.577L5.9988 12.2131C6.26635 12.4816 6.3591 12.8783 6.23833 13.2375L5.41481 15.6876C5.13096 16.532 6.00976 17.2981 6.8076 16.9017L9.53804 15.5453C9.81974 15.4054 10.1509 15.4061 10.4319 15.5473L12 16.3352V5.9924L10.9038 3.78912Z"
                                fill="#FFDF20" />
                            <path
                                d="M16.6213 9.60608C17.1981 9.03216 16.8845 8.04632 16.0822 7.91109L13.1706 7.42041C12.8551 7.36724 12.584 7.16626 12.4415 6.87977L12 5.9924V16.3352L13.1552 16.9157C13.9514 17.3158 14.8337 16.5534 14.5534 15.7076L13.7401 13.2535C13.6209 12.8937 13.7153 12.4974 13.984 12.2301L16.6213 9.60608Z"
                                fill="#FFF085" />
                        </svg>
                        4.8 (3 Ulasan)
                    </div>
                </div>

                <div class="flex flex-col gap-[4px]">
                    <div class="text-[30px] font-extrabold text-primary-500">Rp 140.000</div>
                    <div class="text-[14px] font-medium text-neutral-500">
                        Modal : Rp 130.000 &nbsp; Margin : Rp 10.000
                    </div>
                </div>

                <!-- Statistik Grid -->
                <div class="flex flex-wrap gap-y-[24px] gap-x-[40px] py-[16px] border-y border-neutral-200">
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">STOK SAAT INI</span>
                        <span class="text-[20px] font-bold text-primary-500">21</span>
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">TOTAL PENJUALAN</span>
                        <span class="text-[20px] font-bold text-neutral-950">21</span>
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">MIN. STOK</span>
                        <span class="text-[20px] font-bold text-neutral-950">3</span>
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">KODE PRODUK</span>
                        <span class="text-[20px] font-bold text-neutral-950">JRSY-021</span>
                    </div>
                </div>

                <!-- Variant / Ukuran -->
                <div class="flex flex-col gap-[12px]">
                    <div class="text-[16px] font-bold text-neutral-950">UKURAN</div>
                    <div class="flex flex-wrap gap-[8px]">
                        <div
                            class="px-[16px] py-[6px] bg-neutral-200 rounded-full text-[14px] font-bold text-neutral-700 cursor-pointer transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50">
                            S (2)</div>
                        <div
                            class="px-[16px] py-[6px] bg-primary-500 text-neutral-50 rounded-full text-[14px] font-bold cursor-pointer transition-all duration-200">
                            M (10)</div>
                        <div
                            class="px-[16px] py-[6px] bg-neutral-200 rounded-full text-[14px] font-bold text-neutral-700 cursor-pointer transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50">
                            L (8)</div>
                        <div
                            class="px-[16px] py-[6px] bg-neutral-200 rounded-full text-[14px] font-bold text-neutral-700 cursor-pointer transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50">
                            XL (1)</div>
                    </div>
                </div>

                <!-- Kelola Stok -->
                <div class="bg-neutral-50 border border-neutral-200 rounded-2xl p-[20px] flex flex-col gap-[12px]">
                    <div class="text-[16px] font-bold text-neutral-950">Kelola Stok</div>
                    <div
                        class="bg-neutral-100 rounded-xl px-[20px] py-[16px] flex justify-between items-center flex-wrap gap-[16px]">
                        <div class="text-[36px] font-bold text-neutral-950">21</div>
                        <div class="flex flex-col gap-[10px]">
                            <button
                                class="flex items-center justify-center gap-[6px] px-[16px] py-[8px] bg-primary-500 text-neutral-50 rounded-xl text-[12px] font-semibold shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none"
                                onclick="openModal('modalStokMasuk')">
                                + Stok Masuk
                            </button>
                            <button
                                class="flex items-center justify-center gap-[6px] px-[16px] py-[8px] bg-transparent border border-primary-500 text-primary-500 rounded-xl text-[12px] font-semibold transition-transform duration-200 active:scale-95 cursor-pointer outline-none"
                                onclick="openModal('modalStokKeluar')">
                                - Stok Keluar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Bawah: Tabs Nav -->
        <div class="mt-[32px]">
            <div class="flex border-b border-neutral-950/30 gap-[24px] overflow-x-auto mb-[24px] snap-x">
                <!-- Gunakan class 'active' dari JS, atau berikan border-primary-500 text-primary-500 -->
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-primary-500 cursor-pointer border-b-[3px] border-primary-500 whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-deskripsi')">
                    Deskripsi
                </div>
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-neutral-400 hover:text-primary-500 cursor-pointer border-b-[3px] border-transparent whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-ulasan')">
                    Ulasan & Rating (3)
                </div>
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-neutral-400 hover:text-primary-500 cursor-pointer border-b-[3px] border-transparent whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-stok')">
                    Riwayat Stok
                </div>
            </div>

            <!-- Tab Contents -->
            <div class="p-0 min-[768px]:p-[16px]">

                <!-- TAB: Deskripsi -->
                <div id="tab-deskripsi" class="tab-content block animate-[fadeIn_0.4s_ease]">
                    <p class="mt-0 text-[14px] text-neutral-700 leading-relaxed mb-[16px]">
                        Jersey RPL Pink merupakan salah satu produk apparel unggulan
                        yang dirancang khusus untuk mahasiswa dan komunitas Rekayasa
                        Perangkat Lunak (RPL) yang ingin tampil lebih berani,
                        ekspresif, dan tetap profesional.
                    </p>
                    <p class="mb-[8px] font-bold text-[14px] text-neutral-900">
                        Spesifikasi Produk:
                    </p>
                    <ul class="pl-[20px] m-0 flex flex-col gap-[6px] text-[14px] text-neutral-700 list-disc">
                        <li><strong>Jenis:</strong> Jersey Custom (Atasan)</li>
                        <li><strong>Bahan:</strong> Dryfit Premium (adem, ringan, dan menyerap keringat)</li>
                        <li><strong>Metode Cetak:</strong> Full Printing Sublimasi</li>
                        <li><strong>Fit:</strong> Regular Fit</li>
                        <li><strong>Ukuran:</strong> S, M, L, XL, XXL</li>
                    </ul>
                </div>

                <!-- TAB: Ulasan -->
                <div id="tab-ulasan" class="tab-content hidden animate-[fadeIn_0.4s_ease]">
                    <!-- Stats Wrapper -->
                    <div class="flex flex-col md:flex-row gap-[20px] mb-[24px]">
                        <!-- Rating Big Card -->
                        <div
                            class="w-full md:w-[185px] py-[18px] md:py-0 md:h-[150px] bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl flex flex-col items-center justify-center gap-[4px] shrink-0">
                            <div class="text-[48px] font-bold text-primary-500 leading-none">4.8</div>
                            <div class="flex gap-[2px] text-[#ffdf20] text-[16px]">★★★★★</div>
                            <div class="text-[14px] font-medium text-neutral-400">5 Ulasan</div>
                        </div>

                        <!-- Bars Card -->
                        <div
                            class="flex-1 h-[150px] bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl py-[17px] px-[16px] flex flex-col justify-between">
                            <div class="flex items-center gap-[8px]">
                                <div class="flex items-center gap-[4px] w-[30px] text-[12px] font-medium text-[#ffdf20]">5
                                    ★</div>
                                <div class="flex-1 h-[7px] bg-neutral-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-secondary-500 rounded-full" style="width: 80%"></div>
                                </div>
                                <div class="w-[15px] text-[12px] text-neutral-400 text-right">4</div>
                            </div>
                            <div class="flex items-center gap-[8px]">
                                <div class="flex items-center gap-[4px] w-[30px] text-[12px] font-medium text-[#ffdf20]">4
                                    ★</div>
                                <div class="flex-1 h-[7px] bg-neutral-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-secondary-500 rounded-full" style="width: 20%"></div>
                                </div>
                                <div class="w-[15px] text-[12px] text-neutral-400 text-right">1</div>
                            </div>
                            <div class="flex items-center gap-[8px]">
                                <div class="flex items-center gap-[4px] w-[30px] text-[12px] font-medium text-[#ffdf20]">3
                                    ★</div>
                                <div class="flex-1 h-[7px] bg-neutral-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-secondary-500 rounded-full" style="width: 0%"></div>
                                </div>
                                <div class="w-[15px] text-[12px] text-neutral-400 text-right">0</div>
                            </div>
                            <div class="flex items-center gap-[8px]">
                                <div class="flex items-center gap-[4px] w-[30px] text-[12px] font-medium text-[#ffdf20]">2
                                    ★</div>
                                <div class="flex-1 h-[7px] bg-neutral-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-secondary-500 rounded-full" style="width: 0%"></div>
                                </div>
                                <div class="w-[15px] text-[12px] text-neutral-400 text-right">0</div>
                            </div>
                            <div class="flex items-center gap-[8px]">
                                <div class="flex items-center gap-[4px] w-[30px] text-[12px] font-medium text-[#ffdf20]">1
                                    ★</div>
                                <div class="flex-1 h-[7px] bg-neutral-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-secondary-500 rounded-full" style="width: 0%"></div>
                                </div>
                                <div class="w-[15px] text-[12px] text-neutral-400 text-right">0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Items -->
                    <div class="flex flex-col">
                        <div
                            class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl p-[16px] mb-[16px] flex flex-col gap-[12px]">
                            <div class="flex items-center gap-[10px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center text-neutral-50 text-[12px] font-bold bg-primary-500">
                                    MS</div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950">Muhammad Sumbul</div>
                                    <div class="flex gap-[2px] text-[#ffdf20] text-[12px]">★★★★★</div>
                                </div>
                            </div>
                            <p class="text-[12px] font-normal text-neutral-500 leading-[1.4] m-0">“Jerseynya bagus bangett
                                minn bikin lagi yang lebih gacorrrrr😍😍”</p>

                            <div class="bg-primary-50 border-l-2 border-primary-500 rounded-lg p-[12px] mt-[4px]">
                                <div class="flex items-center gap-[6px] text-primary-400 text-[12px] font-bold mb-[4px]">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <polyline points="9 17 4 12 9 7"></polyline>
                                        <path d="M20 18v-2a4 4 0 0 0-4-4H4"></path>
                                    </svg>
                                    Balasan Admin Rekaps
                                </div>
                                <p class="text-[12px] font-normal text-neutral-500 leading-[1.4] m-0">“Makasii udah memesan
                                    di rekaps store tunggu produk gacor lainnya yaaa”</p>
                            </div>
                        </div>

                        <div
                            class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl p-[16px] mb-[16px] flex flex-col gap-[12px]">
                            <div class="flex items-center gap-[10px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center text-neutral-50 text-[12px] font-bold bg-[#9ae600]">
                                    US</div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950">Uum Sarwenah</div>
                                    <div class="flex gap-[2px] text-[#ffdf20] text-[12px]">★★★★★</div>
                                </div>
                            </div>
                            <p class="text-[12px] font-normal text-neutral-500 leading-[1.4] m-0">“Kerennnnn bahannya adem
                                dan premium wakkk🔥🔥🔥🔥”</p>

                            <div class="flex flex-col items-end gap-[12px]">
                                <textarea
                                    class="w-full min-h-[60px] p-[8px] rounded-[10px] border border-neutral-500 bg-neutral-50 outline-none text-[14px] text-neutral-700 transition-all focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] resize-y"
                                    placeholder="Deskripsi.."></textarea>
                                <div class="flex gap-[12px]">
                                    <button
                                        class="px-[16px] py-[8px] bg-[#d4d4d4] text-[#868686] rounded-xl font-bold text-[12px] cursor-pointer outline-none border-none">Batal</button>
                                    <button
                                        class="px-[16px] py-[8px] bg-primary-500 text-white rounded-xl font-bold text-[12px] shadow-[0_0_8px_rgba(114,52,214,0.35)] cursor-pointer outline-none border-none">Kirim</button>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl p-[16px] mb-[16px] flex flex-col gap-[12px]">
                            <div class="flex items-center gap-[10px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center text-neutral-50 text-[12px] font-bold bg-[#00bc7d]">
                                    AS</div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950">Aku Siapa</div>
                                    <div class="flex gap-[2px] text-[#ffdf20] text-[12px]">★★★★★</div>
                                </div>
                            </div>
                            <p class="text-[12px] font-normal text-neutral-500 leading-[1.4] m-0">“Baguss bangetttt tapi
                                sayang PO nya aga lama yahhh”</p>

                            <button
                                class="inline-flex items-center gap-[6px] px-[16px] py-[8px] border border-primary-500 text-primary-500 rounded-xl text-[12px] font-bold bg-neutral-50 w-fit shadow-[0_2px_4px_rgba(62,52,69,0.15)] cursor-pointer">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <polyline points="9 17 4 12 9 7"></polyline>
                                    <path d="M20 18v-2a4 4 0 0 0-4-4H4"></path>
                                </svg>
                                Balas
                            </button>
                        </div>
                    </div>
                </div>

                <!-- TAB: Riwayat Stok -->
                <div id="tab-stok" class="tab-content hidden animate-[fadeIn_0.4s_ease]">
                    <div class="flex justify-between items-center pb-[16px] border-b border-neutral-950/30 mb-[16px]">
                        <h3 class="text-[16px] font-bold text-neutral-950 m-0">Riwayat Perubahan Stok</h3>
                        <button
                            class="inline-flex items-center gap-[6px] px-[16px] py-[8px] border border-primary-500 text-primary-500 rounded-xl text-[12px] font-bold bg-neutral-50 w-fit shadow-[0_2px_4px_rgba(62,52,69,0.15)] cursor-pointer">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Export
                        </button>
                    </div>

                    <div class="flex flex-col">
                        <!-- Entry Item 1 -->
                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between py-[16px] border-b border-neutral-200 last:border-none gap-[12px] md:gap-0">
                            <div class="flex items-center gap-[16px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 border-[#00c951] text-[#00c951]">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="3">
                                        <line x1="12" y1="19" x2="12" y2="5"></line>
                                        <polyline points="5 12 12 5 19 12"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950 mb-[2px]">+15 pcs - Restok dari
                                        Produksi</div>
                                    <div class="text-[12px] text-neutral-400">Oleh: Admin Ekraf 2 April 2026, 08:50</div>
                                </div>
                            </div>
                            <div class="text-left md:text-right ml-[52px] md:ml-0">
                                <div class="text-[14px] font-bold text-[#00c951]">+15</div>
                                <div class="text-[12px] text-[#a6a09b]">Saldo: 21</div>
                            </div>
                        </div>

                        <!-- Entry Item 2 -->
                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between py-[16px] border-b border-neutral-200 last:border-none gap-[12px] md:gap-0">
                            <div class="flex items-center gap-[16px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 border-[#fb2c36] text-[#fb2c36]">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="3">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <polyline points="19 12 12 19 5 12"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950 mb-[2px]">-3 pcs - Terjual</div>
                                    <div class="text-[12px] text-neutral-400">Otomatis: 1 April 2026, 08:30</div>
                                </div>
                            </div>
                            <div class="text-left md:text-right ml-[52px] md:ml-0">
                                <div class="text-[14px] font-bold text-[#fb2c36]">-3</div>
                                <div class="text-[12px] text-[#a6a09b]">Saldo: 16</div>
                            </div>
                        </div>

                        <!-- Entry Item 3 -->
                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between py-[16px] border-b border-neutral-200 last:border-none gap-[12px] md:gap-0">
                            <div class="flex items-center gap-[16px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 border-[#00c951] text-[#00c951]">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="3">
                                        <line x1="12" y1="19" x2="12" y2="5"></line>
                                        <polyline points="5 12 12 5 19 12"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950 mb-[2px]">+5 pcs - Restok Bazar
                                    </div>
                                    <div class="text-[12px] text-neutral-400">Oleh: Pengurus Ekraf 1 April 2026, 07:50
                                    </div>
                                </div>
                            </div>
                            <div class="text-left md:text-right ml-[52px] md:ml-0">
                                <div class="text-[14px] font-bold text-[#00c951]">+5</div>
                                <div class="text-[12px] text-[#a6a09b]">Saldo: 19</div>
                            </div>
                        </div>

                        <!-- Entry Item 4 -->
                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between py-[16px] border-b border-neutral-200 last:border-none gap-[12px] md:gap-0">
                            <div class="flex items-center gap-[16px]">
                                <div
                                    class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 border-primary-500 text-primary-500">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="3">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <polyline points="19 12 12 19 5 12"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-[14px] font-bold text-neutral-950 mb-[2px]">-1 Koreksi Stok - Audit
                                        Fisik</div>
                                    <div class="text-[12px] text-neutral-400">Oleh: Admin Ekraf 28 Maret 2026, 11:50 |
                                        Catatan: 1 produk rusak</div>
                                </div>
                            </div>
                            <div class="text-left md:text-right ml-[52px] md:ml-0">
                                <div class="text-[14px] font-bold text-primary-500">-1</div>
                                <div class="text-[12px] text-[#a6a09b]">Saldo: 20</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!-- MODAL STOK MASUK -->
    <div id="modalStokMasuk"
        class="modal fixed inset-0 bg-black/45 hidden items-center justify-center z-[9999] opacity-0 transition-all duration-300 p-[16px] [&.active]:flex [&.active]:opacity-100">
        <div
            class="w-full max-w-[630px] bg-neutral-50 shadow-[0_4px_16px_rgba(0,0,0,0.25)] rounded-[20px] p-[24px_20px] sm:p-[32px_36px] flex flex-col gap-[24px] transform translate-y-5 transition-transform duration-300 max-h-[90vh] overflow-y-auto [&.active_.modal-container]:translate-y-0">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-[8px]">
                    <div class="w-[24px] h-[24px] flex items-center justify-center text-[#00c951]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3">
                            <line x1="12" y1="19" x2="12" y2="5"></line>
                            <polyline points="5 12 12 5 19 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="text-[18px] font-bold text-neutral-950 m-0">Stok Masuk</h3>
                </div>
                <button
                    class="w-[32px] h-[32px] rounded-[4px] text-primary-500 flex items-center justify-center transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50 cursor-pointer outline-none border-none bg-transparent"
                    onclick="closeModal('modalStokMasuk')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="3">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="flex flex-col gap-[16px]">
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Pilih Produk</label>
                    <select
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none bg-[url('data:image/svg+xml;utf8,<svg width=\"12\" height=\"8\" viewBox=\"0 0 12 8\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1 1.5L6 6.5L11 1.5\" stroke=\"%23171717\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>')] bg-no-repeat bg-[position:right_15px_center]">
                        <option>Jersey RPL Super Premium</option>
                    </select>
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Kategori Stok Masuk</label>
                    <select
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none bg-[url('data:image/svg+xml;utf8,<svg width=\"12\" height=\"8\" viewBox=\"0 0 12 8\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1 1.5L6 6.5L11 1.5\" stroke=\"%23171717\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>')] bg-no-repeat bg-[position:right_15px_center]">
                        <option value="" disabled selected hidden>Pilih Kategori</option>
                        <option>Restok Produksi</option>
                        <option>Retur Pelanggan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Jumlah Stok Masuk</label>
                    <input type="number"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400"
                        placeholder="Masukkan jumlah" />
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Tanggal Masuk</label>
                    <input type="date"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]" />
                </div>
            </div>

            <div class="flex justify-end gap-[16px] mt-[8px]">
                <button
                    class="py-[8px] px-[16px] w-[80px] bg-[#d4d4d4] rounded-xl text-[#868686] text-[12px] font-bold text-center cursor-pointer outline-none border-none"
                    onclick="closeModal('modalStokMasuk')">Batal</button>
                <button
                    class="py-[8px] px-[16px] w-[157px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-xl text-white text-[12px] font-bold cursor-pointer outline-none border-none">Simpan
                    Stok Masuk</button>
            </div>
        </div>
    </div>

    <!-- MODAL STOK KELUAR -->
    <div id="modalStokKeluar"
        class="modal fixed inset-0 bg-black/45 hidden items-center justify-center z-[9999] opacity-0 transition-all duration-300 p-[16px] [&.active]:flex [&.active]:opacity-100">
        <div
            class="w-full max-w-[630px] bg-neutral-50 shadow-[0_4px_16px_rgba(0,0,0,0.25)] rounded-[20px] p-[24px_20px] sm:p-[32px_36px] flex flex-col gap-[24px] transform translate-y-5 transition-transform duration-300 max-h-[90vh] overflow-y-auto [&.active_.modal-container]:translate-y-0">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-[8px]">
                    <div class="w-[24px] h-[24px] flex items-center justify-center text-[#fb2c36]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <polyline points="19 12 12 19 5 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="text-[18px] font-bold text-neutral-950 m-0">Stok Keluar Manual</h3>
                </div>
                <button
                    class="w-[32px] h-[32px] rounded-[4px] text-primary-500 flex items-center justify-center transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50 cursor-pointer outline-none border-none bg-transparent"
                    onclick="closeModal('modalStokKeluar')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="3">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="flex flex-col gap-[16px]">
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Pilih Produk</label>
                    <select
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none bg-[url('data:image/svg+xml;utf8,<svg width=\"12\" height=\"8\" viewBox=\"0 0 12 8\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1 1.5L6 6.5L11 1.5\" stroke=\"%23171717\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>')] bg-no-repeat bg-[position:right_15px_center]">
                        <option>Jersey RPL Super Premium</option>
                    </select>
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Kategori Stok Keluar</label>
                    <select
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none bg-[url('data:image/svg+xml;utf8,<svg width=\"12\" height=\"8\" viewBox=\"0 0 12 8\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1 1.5L6 6.5L11 1.5\" stroke=\"%23171717\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>')] bg-no-repeat bg-[position:right_15px_center]">
                        <option value="" disabled selected hidden>Pilih Kategori</option>
                        <option>Terjual Offline</option>
                        <option>Barang Rusak/Cacat</option>
                        <option>Sampel/Sponsorship</option>
                    </select>
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Jumlah Stok Keluar</label>
                    <input type="number"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400"
                        placeholder="Masukkan jumlah" />
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Tanggal Keluar</label>
                    <input type="date"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]" />
                </div>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Catatan</label>
                    <textarea
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400 resize-y min-h-[85px]"
                        placeholder="Deskripsi.."></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-[16px] mt-[8px]">
                <button
                    class="py-[8px] px-[16px] w-[80px] bg-[#d4d4d4] rounded-xl text-[#868686] text-[12px] font-bold text-center cursor-pointer outline-none border-none"
                    onclick="closeModal('modalStokKeluar')">Batal</button>
                <button
                    class="py-[8px] px-[16px] w-[156px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-xl text-white text-[12px] font-bold cursor-pointer outline-none border-none">Simpan
                    Stok Keluar</button>
            </div>
        </div>
    </div>

    <!-- MODAL CONFIRM DELETE -->
    <div id="modalConfirmDelete"
        class="modal fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] opacity-0 transition-opacity duration-300 [&.active]:flex [&.active]:opacity-100">
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
                    class="px-[16px] py-[8px] w-[110px] h-[32px] bg-neutral-300 rounded-xl text-[#868686] font-bold text-[12px] cursor-pointer outline-none border-none"
                    onclick="closeModal('modalConfirmDelete')">
                    Batal
                </button>
                <button type="button"
                    class="px-[16px] py-[8px] w-[110px] h-[32px] bg-[#fb2c36] shadow-[0_40px_80px_-16px_rgba(62,52,69,0.16),0_2px_4px_rgba(62,52,69,0.25)] rounded-xl text-white font-bold text-[12px] cursor-pointer outline-none border-none"
                    onclick="successDelete()">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL SUCCESS ACTION -->
    <div id="modalSuccessAction"
        class="modal fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] opacity-0 transition-opacity duration-300 [&.active]:flex [&.active]:opacity-100">
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

    <script src="<?php echo e(asset('js/products.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\RekapsStore\resources\views/admin/product-detail.blade.php ENDPATH**/ ?>