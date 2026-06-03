<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('page_title', 'Tambah Produk'); ?>

<?php $__env->startSection('page_breadcrumb', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
    <!-- HEADER -->
    <div class="flex items-center gap-[14px] mb-[24px]">
        <a href="<?php echo e(url('/admin/product')); ?>"
            class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-[20px] font-bold text-neutral-900 m-0">Form Tambah Produk Baru</h1>
    </div>

    <!-- FORM WRAPPER -->
    <form action="<?php echo e(url('/admin/product')); ?>" class="grid grid-cols-1 min-[900px]:grid-cols-2 gap-[20px] items-start">

        <!-- KOLOM KIRI -->
        <div class="flex flex-col">
            <!-- Card Foto Produk -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Foto Produk</h3>

                <div
                    class="bg-neutral-50 border border-dashed border-neutral-500 rounded-[10px] h-[330px] flex flex-col items-center justify-center gap-[10px] cursor-pointer transition-colors duration-200 hover:bg-[#f2ebfd]">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 30.0001V15.0001C5 14.116 5.35119 13.2682 5.97631 12.6431C6.60143 12.0179 7.44928 11.6667 8.33333 11.6667H9.88333C10.432 11.6668 10.9722 11.5315 11.4559 11.2727C11.9397 11.014 12.3522 10.6398 12.6567 10.1834L14.01 8.15008C14.3145 7.69369 14.7269 7.31952 15.2107 7.06076C15.6945 6.80201 16.2347 6.66667 16.7833 6.66675H23.2167C23.7653 6.66667 24.3055 6.80201 24.7893 7.06076C25.2731 7.31952 25.6855 7.69369 25.99 8.15008L27.3433 10.1834C27.6478 10.6398 28.0603 11.014 28.5441 11.2727C29.0278 11.5315 29.568 11.6668 30.1167 11.6667H31.6667C32.5507 11.6667 33.3986 12.0179 34.0237 12.6431C34.6488 13.2682 35 14.116 35 15.0001V30.0001C35 30.8841 34.6488 31.732 34.0237 32.3571C33.3986 32.9822 32.5507 33.3334 31.6667 33.3334H8.33333C7.44928 33.3334 6.60143 32.9822 5.97631 32.3571C5.35119 31.732 5 30.8841 5 30.0001Z"
                            stroke="#7D39EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M20 26.6667C22.7614 26.6667 25 24.4282 25 21.6667C25 18.9053 22.7614 16.6667 20 16.6667C17.2386 16.6667 15 18.9053 15 21.6667C15 24.4282 17.2386 26.6667 20 26.6667Z"
                            stroke="#7D39EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <div class="text-[12px] font-semibold text-neutral-400 text-center">
                        Drag & drop atau <span class="text-primary-500">klik untuk upload</span>
                    </div>
                    <div class="text-[10px] text-neutral-400 text-center">PNG, JPG max 5MB</div>
                </div>

                <div class="flex gap-[10px] mt-[10px] overflow-x-auto">
                    <div class="w-[80px] h-[80px] rounded-xl object-cover shrink-0 border border-[#ddd] bg-[#eee]"></div>
                    <div class="w-[80px] h-[80px] rounded-xl object-cover shrink-0 border border-[#ddd] bg-[#ddd]"></div>
                    <div
                        class="w-[80px] h-[80px] rounded-xl border border-dashed border-[#525252] flex items-center justify-center text-[30px] text-neutral-400 cursor-pointer shrink-0">
                        +
                    </div>
                </div>
            </div>

            <!-- Card Informasi Produk -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Informasi Produk</h3>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">NAMA PRODUK</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="Masukkan nama produk" />
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">DESKRIPSI PRODUK</label>
                    <textarea
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] resize-y min-h-[85px]"
                        placeholder="Deskripsi..."></textarea>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">KATEGORI</label>
                    <select
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                        <option>Pilih Kategori</option>
                        <option>Merchandise</option>
                        <option>Makanan</option>
                        <option>Produk Digital</option>
                        <option>Jasa</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">TIPE PRODUK</label>
                        <select
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                            <option>Ready Stok</option>
                            <option>PO</option>
                            <option>Jasa</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">KODE PRODUK</label>
                        <input type="text"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="cth: PRDK01" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">ESTIMASI SELESAI</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="cth: 7 hari kerja" />
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN -->
        <div class="flex flex-col">
            <!-- Card Harga -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Harga</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">HARGA MODAL</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">HARGA JUAL</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">MARGIN</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-100 text-neutral-800 cursor-not-allowed"
                        value="Otomatis" readonly />
                </div>
            </div>

            <!-- Card Stok Awal -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Stok Awal</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">JUMLAH STOK</label>
                        <input type="text"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">STOK MINIMUM (NOTIFIKASI)</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                </div>
            </div>

            <!-- Card Varian Produk -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <div class="flex justify-between items-center">
                    <h3 class="text-[16px] font-bold text-neutral-950 m-0">Varian Produk</h3>
                    <button type="button"
                        class="bg-primary-500 text-white px-[16px] py-[6px] rounded-[10px] text-[12px] font-semibold shadow-[0_0_8px_rgba(114,52,214,0.35)] cursor-pointer outline-none border-none">
                        + Tambah
                    </button>
                </div>

                <div class="bg-neutral-100 rounded-lg p-[15px] flex flex-col gap-[12px]">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-[14px]">Nama Varian</span>
                        <button type="button"
                            class="bg-gradient-to-br from-[#951806] to-[#fe6e4c] text-white px-[12px] py-[6px] rounded-[10px] text-[12px] font-semibold cursor-pointer outline-none border-none">
                            Hapus
                        </button>
                    </div>

                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="Contoh: Ukuran, Warna" />

                    <div class="text-[14px] font-normal text-neutral-950">PILIHAN</div>

                    <div class="flex flex-wrap gap-[8px]">
                        <div
                            class="bg-[#d7c2f9] text-primary-500 px-[10px] py-[4px] rounded-full text-[11px] font-bold flex items-center gap-[6px]">
                            S
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" class="cursor-pointer">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                        <div
                            class="bg-[#d7c2f9] text-primary-500 px-[10px] py-[4px] rounded-full text-[11px] font-bold flex items-center gap-[6px]">
                            M
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" class="cursor-pointer">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                        <div
                            class="bg-[#d7c2f9] text-primary-500 px-[10px] py-[4px] rounded-full text-[11px] font-bold flex items-center gap-[6px]">
                            L
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" class="cursor-pointer">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>

                    <div class="flex gap-[8px]">
                        <input type="text"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="Ketik pilihan varian lalu tekan +" />
                        <button type="button"
                            class="w-[40px] h-[40px] bg-primary-500 rounded-[10px] flex items-center justify-center text-white shrink-0 cursor-pointer outline-none border-none">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card Status & Diskon -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Status & Diskon</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">STATUS</label>
                        <select
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                            <option>Aktif</option>
                            <option>Non-Aktif</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">DISKON</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0%" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">KODE VOUCHER</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="cth: EKRAF10" />
                </div>
            </div>

            <!-- Tombol Simpan (Fixed pada form) -->
            <button type="submit"
                class="w-full bg-primary-500 text-white p-[14px] rounded-xl text-[16px] font-bold shadow-[0_0_8px_rgba(114,52,214,0.35)] flex items-center justify-center gap-[10px] mt-[10px] cursor-pointer outline-none border-none transition-all duration-200 hover:bg-[#5928a7]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 4H4V20H20V8L16 4H14M8 4V8H14V4M8 4H14M12 12C11.333 12 10 12.4 10 14C10 15.6 11.333 16 12 16C12.667 16 14 15.6 14 14C14 12.4 12.667 12 12 12Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Simpan Produk
            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\RekapsStore\resources\views/admin/product-add.blade.php ENDPATH**/ ?>