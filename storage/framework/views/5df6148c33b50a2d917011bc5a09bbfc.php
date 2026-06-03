

<?php $__env->startSection('title', 'Detail Produk'); ?>
<?php $__env->startSection('page_title', 'Detail Produk'); ?>
<?php $__env->startSection('page_breadcrumb', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div
            class="bg-[#E5FFA1] border border-[#8DB524] text-[#4d660e] px-[16px] py-[12px] rounded-xl mb-[20px] font-bold text-[14px]">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div
            class="bg-red-100 border border-red-400 text-red-700 px-[16px] py-[12px] rounded-xl mb-[20px] font-bold text-[14px]">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

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
                class="flex items-center gap-[6px] px-[16px] py-[8px] bg-[#e7000b] text-neutral-50 rounded-xl text-[12px] font-semibold shadow-sm transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none"
                onclick="openModal('modalConfirmDelete')">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path
                        d="M7.5 5.833V4.065C7.5 3.333 9.337 3.333 10 3.333c.663 0 2.5 0 2.5.732v1.768M7.5 5.833h5M7.5 5.833H5m7.5 0h2.5M5 5.833H3.333m1.667 0v9.167C5 15.442 5.488 16.667 6.667 16.667h6.666c1.18 0 1.667-1.225 1.667-1.667V5.833h1.667" />
                </svg>
                Hapus
            </button>
            <a href="<?php echo e(url('/admin/product/' . $product->slug . '/edit')); ?>">
                <button
                    class="flex items-center gap-[6px] px-[16px] py-[8px] bg-primary-500 text-neutral-50 rounded-xl text-[12px] font-semibold shadow-sm transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path
                            d="M13.333 4.167L15.244 2.256c.156-.156.368-.244.589-.244s.433.088.59.244l1.321 1.322c.157.156.245.368.245.589s-.088.433-.244.59L15.833 6.667M13.333 4.167L8.577 8.923c-.156.156-.244.368-.244.589v1.321c0 .221.088.433.245.59.156.156.368.244.589.244h1.322c.22 0 .432-.088.588-.244l4.756-4.756M13.333 4.167l2.5 2.5M5 11.667H4.167c-.442 0-.866.176-1.179.488C2.676 12.468 2.5 12.891 2.5 13.333s.176.866.488 1.179c.313.312.737.488 1.179.488H15.833c.442 0 .866.176 1.179.488.313.312.488.736.488 1.179s-.175.866-.488 1.178c-.313.313-.737.488-1.179.488H12.5" />
                    </svg>
                    Edit
                </button>
            </a>
        </div>
    </div>

    <div
        class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-2xl p-[20px] min-[900px]:p-[32px] flex flex-col gap-[18px]">

        <div class="grid grid-cols-1 min-[900px]:grid-cols-[350px_1fr] gap-[32px] items-start">

            <div class="flex flex-col gap-[12px] w-full">
                <?php $mainImage = $product->images->first() ? asset('storage/'.$product->images->first()->image_path) : asset('assets/img/default-product.png'); ?>
                <img id="main-image-display" src="<?php echo e($mainImage); ?>" alt="<?php echo e($product->name); ?>"
                    class="w-full aspect-[4/5] bg-neutral-100 rounded-xl object-cover shadow-[0_2px_8px_rgba(0,0,0,0.05)] border border-neutral-200" />

                <div class="flex gap-[12px] overflow-x-auto custom-scrollbar pb-[8px]">
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset('storage/' . $img->image_path)); ?>"
                            onclick="document.getElementById('main-image-display').src=this.src"
                            class="w-[80px] h-[80px] shrink-0 bg-neutral-100 rounded-lg object-cover cursor-pointer border-2 border-transparent hover:border-primary-500 transition-colors duration-200"
                            alt="Thumb" />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="flex flex-col gap-[20px]">
                <div>
                    <h1 class="text-[24px] font-bold text-neutral-950 m-0 mb-[8px]"><?php echo e($product->name); ?></h1>

                    <div class="flex items-center gap-[8px] flex-wrap mb-[10px]">
                        <span
                            class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-primary-100 text-primary-500"><?php echo e($product->product_type); ?></span>
                        <span
                            class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-[#fefce8] text-[#d08700]"><?php echo e($product->category->name ?? 'Kategori'); ?></span>
                        <span
                            class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase <?php echo e($product->status == 'Aktif' ? 'bg-[#f0fdf4] text-[#16a34a]' : 'bg-neutral-200 text-neutral-500'); ?>"><?php echo e($product->status); ?></span>
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] bg-neutral-100 p-[16px] rounded-xl border border-neutral-200">
                    <div class="text-[30px] font-extrabold text-primary-500 leading-none">Rp
                        <?php echo e(number_format($product->selling_price, 0, ',', '.')); ?></div>
                    <div class="text-[13px] font-medium text-neutral-500">
                        <?php $margin = $product->selling_price - $product->cost_price; ?>
                        Modal: <strong>Rp <?php echo e(number_format($product->cost_price, 0, ',', '.')); ?></strong> &nbsp;|&nbsp;
                        Margin: <strong class="text-[#8DB524]">Rp <?php echo e(number_format($margin, 0, ',', '.')); ?></strong>
                    </div>
                    <div
                        class="text-[13px] font-medium text-neutral-700 bg-white p-[8px_12px] rounded-lg mt-[4px] border border-neutral-200 inline-flex items-start gap-[8px]">
                        <svg class="mt-[2px] text-primary-500 shrink-0" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span><strong>Info Pengambilan:</strong>
                            <?php echo e($product->pickup_info ?: 'Tidak ada instruksi khusus.'); ?></span>
                    </div>
                </div>

                <?php if($product->variants->count() > 0): ?>
                    <div class="flex flex-col gap-[8px]">
                        <div class="text-[14px] font-bold text-neutral-950 uppercase">Varian Tersedia</div>
                        <div class="flex flex-wrap gap-[8px]">
                            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="px-[16px] py-[6px] bg-neutral-200 rounded-full text-[13px] font-bold text-neutral-700 border border-neutral-300">
                                    <?php echo e($variant->variant_name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col gap-[12px] mt-[10px]">
                    <div class="text-[16px] font-bold text-neutral-950 border-b border-neutral-200 pb-[8px]">Manajemen Stok
                        Gudang</div>

                    <div class="grid grid-cols-1 min-[650px]:grid-cols-2 gap-[16px]">

                        <div
                            class="bg-white border-2 border-neutral-200 rounded-2xl p-[16px] flex flex-col gap-[12px] relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-[6px] h-full bg-primary-500"></div>

                            <div class="flex justify-between items-start pl-[8px]">
                                <div class="flex flex-col">
                                    <span class="text-[12px] font-bold text-neutral-500 uppercase tracking-wider">Total Stok
                                        Online</span>
                                    <span
                                        class="text-[32px] font-extrabold text-neutral-900 leading-none mt-[4px]"><?php echo e($product->variants->sum('stock_online') ?? ($product->inventory->main_stock ?? 0)); ?></span>
                                </div>
                                <div class="p-[8px] bg-primary-50 rounded-lg text-primary-500">
                                    <svg width="24" height="24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                        </path>
                                    </svg>
                                </div>
                            </div>

                            <?php if($product->variants->count() > 0): ?>
                                <div
                                    class="flex flex-col gap-[4px] pl-[8px] mt-[4px] max-h-[100px] overflow-y-auto custom-scrollbar pr-2">
                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="flex justify-between items-center text-[13px] border-b border-neutral-100 pb-[4px] last:border-0">
                                            <span class="text-neutral-600 font-medium"><?php echo e($variant->variant_name); ?></span>
                                            <span
                                                class="font-bold text-neutral-900 bg-neutral-100 px-[8px] py-[2px] rounded-md"><?php echo e($variant->stock_online ?? 0); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="flex gap-[8px] mt-auto pt-[12px] pl-[8px]">
                                <button onclick="openStockModal('modalStokMasuk', 'Online')"
                                    class="flex-1 py-[8px] bg-primary-500 text-white rounded-xl text-[12px] font-bold shadow-sm hover:bg-[#5928a7] transition-colors">+
                                    Masuk</button>
                                <button onclick="openStockModal('modalStokKeluar', 'Online')"
                                    class="flex-1 py-[8px] border-2 border-primary-500 text-primary-500 rounded-xl text-[12px] font-bold hover:bg-primary-50 transition-colors">-
                                    Keluar</button>
                            </div>
                        </div>

                        <div
                            class="bg-white border-2 border-neutral-200 rounded-2xl p-[16px] flex flex-col gap-[12px] relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-[6px] h-full bg-[#d08700]"></div>

                            <div class="flex justify-between items-start pl-[8px]">
                                <div class="flex flex-col">
                                    <span class="text-[12px] font-bold text-neutral-500 uppercase tracking-wider">Total Stok
                                        Bazar</span>
                                    <span
                                        class="text-[32px] font-extrabold text-neutral-900 leading-none mt-[4px]"><?php echo e($product->variants->sum('stock_bazar') ?? ($product->inventory->bazar_stock ?? 0)); ?></span>
                                </div>
                                <div class="p-[8px] bg-[#fefce8] text-[#d08700] rounded-lg">
                                    <svg width="24" height="24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </div>
                            </div>

                            <?php if($product->variants->count() > 0): ?>
                                <div
                                    class="flex flex-col gap-[4px] pl-[8px] mt-[4px] max-h-[100px] overflow-y-auto custom-scrollbar pr-2">
                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="flex justify-between items-center text-[13px] border-b border-neutral-100 pb-[4px] last:border-0">
                                            <span class="text-neutral-600 font-medium"><?php echo e($variant->variant_name); ?></span>
                                            <span
                                                class="font-bold text-neutral-900 bg-neutral-100 px-[8px] py-[2px] rounded-md"><?php echo e($variant->stock_bazar ?? 0); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="flex gap-[8px] mt-auto pt-[12px] pl-[8px]">
                                <button onclick="openStockModal('modalStokMasuk', 'Bazar')"
                                    class="flex-1 py-[8px] bg-[#d08700] text-white rounded-xl text-[12px] font-bold shadow-sm hover:bg-[#a16800] transition-colors">+
                                    Masuk</button>
                                <button onclick="openStockModal('modalStokKeluar', 'Bazar')"
                                    class="flex-1 py-[8px] border-2 border-[#d08700] text-[#d08700] rounded-xl text-[12px] font-bold hover:bg-[#fefce8] transition-colors">-
                                    Keluar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="mt-[32px]">
            <div class="flex border-b border-neutral-950/30 gap-[24px] overflow-x-auto mb-[24px] snap-x custom-scrollbar">
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-primary-500 cursor-pointer border-b-[3px] border-primary-500 whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-deskripsi')">Deskripsi</div>
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-neutral-400 hover:text-primary-500 cursor-pointer border-b-[3px] border-transparent whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-stok')">Riwayat Mutasi Stok</div>
            </div>

            <div class="p-0 min-[768px]:p-[16px]">

                <div id="tab-deskripsi" class="tab-content block animate-[fadeIn_0.4s_ease]">
                    <div class="text-[14px] text-neutral-700 leading-relaxed whitespace-pre-wrap">
                        <?php echo e($product->description ?: 'Belum ada deskripsi.'); ?></div>
                </div>

                <div id="tab-stok" class="tab-content hidden animate-[fadeIn_0.4s_ease]">
                    <div class="flex flex-col">
                        <?php $__empty_1 = true; $__currentLoopData = $product->stockHistories()->with('user', 'variant')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div
                                class="flex flex-col md:flex-row md:items-center justify-between py-[16px] border-b border-neutral-200 last:border-none gap-[12px] md:gap-0">
                                <div class="flex items-center gap-[16px]">
                                    <div
                                        class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 <?php echo e($history->type == 'Masuk' ? 'border-[#00c951] text-[#00c951]' : 'border-[#fb2c36] text-[#fb2c36]'); ?>">
                                        <?php if($history->type == 'Masuk'): ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="3">
                                                <line x1="12" y1="19" x2="12" y2="5">
                                                </line>
                                                <polyline points="5 12 12 5 19 12"></polyline>
                                            </svg>
                                        <?php else: ?>
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="3">
                                                <line x1="12" y1="5" x2="12" y2="19">
                                                </line>
                                                <polyline points="19 12 12 19 5 12"></polyline>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div class="text-[14px] font-bold text-neutral-950 mb-[2px]">
                                            <?php echo e($history->type == 'Masuk' ? '+' : '-'); ?><?php echo e($history->qty); ?> pcs -
                                            <?php echo e($history->note); ?>

                                        </div>
                                        <div class="text-[12px] text-neutral-500">
                                            <?php if($history->variant): ?>
                                                <span
                                                    class="font-bold text-primary-500">[<?php echo e($history->variant->name); ?>]</span>
                                                •
                                            <?php endif; ?>
                                            Lokasi: <?php echo e($history->location); ?> •

                                            Oleh: <span
                                                class="text-neutral-800 font-semibold"><?php echo e($history->user->name ?? 'System/Deleted'); ?></span>
                                            •

                                            <?php echo e(\Carbon\Carbon::parse($history->created_at)->format('d M Y, H:i')); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-left md:text-right ml-[52px] md:ml-0">
                                    <div
                                        class="text-[14px] font-bold <?php echo e($history->type == 'Masuk' ? 'text-[#00c951]' : 'text-[#fb2c36]'); ?>">
                                        <?php echo e($history->type == 'Masuk' ? '+' : '-'); ?><?php echo e($history->qty); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center text-neutral-500 py-[20px] text-[14px]">Belum ada riwayat pergerakan
                                stok.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div id="modalStokMasuk"
        class="modal fixed inset-0 bg-black/45 hidden items-center justify-center z-[9999] opacity-0 transition-all duration-300 p-[16px] [&.active]:flex [&.active]:opacity-100">
        <form action="<?php echo e(url('/admin/product/' . $product->slug . '/stock')); ?>" method="POST"
            class="w-full max-w-[500px] bg-white shadow-lg rounded-[20px] p-[24px_20px] sm:p-[32px] flex flex-col gap-[20px] transform translate-y-5 transition-transform duration-300 max-h-[90vh] overflow-y-auto [&.active_.modal-container]:translate-y-0">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="Masuk">
            <input type="hidden" name="location" id="inputLocationMasuk" value="Online">

            <div class="flex justify-between items-center border-b border-neutral-200 pb-[16px]">
                <div class="flex items-center gap-[10px]">
                    <div
                        class="w-[32px] h-[32px] rounded-full bg-[#00c951]/10 flex items-center justify-center text-[#00c951]">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3">
                            <line x1="12" y1="19" x2="12" y2="5"></line>
                            <polyline points="5 12 12 5 19 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="text-[18px] font-bold text-neutral-950 m-0">Tambah Stok <span id="labelLocationMasuk"
                            class="text-primary-500">Online</span></h3>
                </div>
                <button type="button" class="text-neutral-400 hover:text-red-500 transition-colors"
                    onclick="closeModal('modalStokMasuk')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <?php if($product->variants->count() > 0): ?>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[13px] font-bold text-neutral-800">Pilih Varian *</label>
                    <select name="variant_id" required
                        class="bg-neutral-50 border border-neutral-300 rounded-[10px] p-[10px_14px] text-[14px] w-full outline-none focus:border-primary-500">
                        <option value="" disabled selected hidden>Pilih varian produk...</option>
                        <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($variant->id); ?>"><?php echo e($variant->variant_name); ?> :
                                <?php echo e($variant->variant_value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>

            <div class="flex flex-col gap-[8px]">
                <label class="text-[13px] font-bold text-neutral-800">Jumlah (Pcs) *</label>
                <input type="number" name="qty" required min="1"
                    class="bg-neutral-50 border border-neutral-300 rounded-[10px] p-[10px_14px] text-[14px] w-full outline-none focus:border-primary-500"
                    placeholder="Contoh: 10" />
            </div>

            <div class="flex flex-col gap-[8px]">
                <label class="text-[13px] font-bold text-neutral-800">Catatan / Keterangan *</label>
                <input type="text" name="note" required
                    class="bg-neutral-50 border border-neutral-300 rounded-[10px] p-[10px_14px] text-[14px] w-full outline-none focus:border-primary-500"
                    placeholder="Contoh: Restok dari vendor" />
            </div>

            <button type="submit"
                class="w-full py-[12px] mt-[10px] bg-primary-500 shadow-md rounded-xl text-white text-[14px] font-bold hover:bg-[#5928a7] transition-colors">Simpan
                Stok Masuk</button>
        </form>
    </div>

    <div id="modalStokKeluar"
        class="modal fixed inset-0 bg-black/45 hidden items-center justify-center z-[9999] opacity-0 transition-all duration-300 p-[16px] [&.active]:flex [&.active]:opacity-100">
        <form action="<?php echo e(url('/admin/product/' . $product->id . '/stock')); ?>" method="POST"
            class="w-full max-w-[500px] bg-white shadow-lg rounded-[20px] p-[24px_20px] sm:p-[32px] flex flex-col gap-[20px] transform translate-y-5 transition-transform duration-300 max-h-[90vh] overflow-y-auto [&.active_.modal-container]:translate-y-0">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="Keluar">
            <input type="hidden" name="location" id="inputLocationKeluar" value="Online">

            <div class="flex justify-between items-center border-b border-neutral-200 pb-[16px]">
                <div class="flex items-center gap-[10px]">
                    <div class="w-[32px] h-[32px] rounded-full bg-red-100 flex items-center justify-center text-red-500">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <polyline points="19 12 12 19 5 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="text-[18px] font-bold text-neutral-950 m-0">Kurangi Stok <span id="labelLocationKeluar"
                            class="text-red-500">Online</span></h3>
                </div>
                <button type="button" class="text-neutral-400 hover:text-red-500 transition-colors"
                    onclick="closeModal('modalStokKeluar')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <?php if($product->variants->count() > 0): ?>
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[13px] font-bold text-neutral-800">Pilih Varian *</label>
                    <select name="variant_id" required
                        class="bg-neutral-50 border border-neutral-300 rounded-[10px] p-[10px_14px] text-[14px] w-full outline-none focus:border-primary-500">
                        <option value="" disabled selected hidden>Pilih varian produk...</option>
                        <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($variant->id); ?>"><?php echo e($variant->variant_name); ?> :
                                <?php echo e($variant->variant_value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>

            <div class="flex flex-col gap-[8px]">
                <label class="text-[13px] font-bold text-neutral-800">Jumlah (Pcs) *</label>
                <input type="number" name="qty" required min="1"
                    class="bg-neutral-50 border border-neutral-300 rounded-[10px] p-[10px_14px] text-[14px] w-full outline-none focus:border-primary-500"
                    placeholder="Contoh: 2" />
            </div>

            <div class="flex flex-col gap-[8px]">
                <label class="text-[13px] font-bold text-neutral-800">Catatan / Alasan *</label>
                <select name="note" required
                    class="bg-neutral-50 border border-neutral-300 rounded-[10px] p-[10px_14px] text-[14px] w-full outline-none focus:border-primary-500 mb-[5px]">
                    <option value="Terjual Offline">Terjual Offline / Kasir</option>
                    <option value="Barang Rusak">Barang Rusak / Cacat</option>
                    <option value="Sponsorship">Diberikan sbg Sponsorship</option>
                    <option value="Koreksi Audit">Koreksi (Selisih Audit)</option>
                </select>
            </div>

            <button type="submit"
                class="w-full py-[12px] mt-[10px] bg-red-500 shadow-md rounded-xl text-white text-[14px] font-bold hover:bg-red-600 transition-colors">Simpan
                Stok Keluar</button>
        </form>
    </div>

    <div id="modalConfirmDelete"
        class="modal fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] opacity-0 transition-opacity duration-300 [&.active]:flex [&.active]:opacity-100">
        <div class="flex flex-col items-center p-[20px_28px] gap-[24px] w-[355px] bg-neutral-50 shadow-lg rounded-[20px]">
            <div class="w-[114px] h-[114px] flex justify-center items-center">
                <svg width="114" height="114" viewBox="0 0 114 114" fill="none">
                    <circle cx="57" cy="57" r="46.5" stroke="#FB2C36" stroke-width="7" />
                    <path d="M57 30V65" stroke="#FB2C36" stroke-width="7" stroke-linecap="round" />
                    <circle cx="57" cy="84" r="5" fill="#FB2C36" />
                </svg>
            </div>
            <p class="font-normal text-[13px] text-center text-neutral-600 m-0">Anda yakin ingin menghapus produk <br>
                <strong class="text-black"><?php echo e($product->name); ?></strong>?
            </p>
            <form method="POST" action="<?php echo e(url('/admin/product/' . $product->slug)); ?>"
                class="flex flex-row justify-center items-center gap-[12px] w-full">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="button"
                    class="px-[16px] py-[8px] w-full h-[36px] bg-neutral-300 rounded-xl text-[#868686] font-bold text-[12px] cursor-pointer"
                    onclick="closeModal('modalConfirmDelete')">Batal</button>
                <button type="submit"
                    class="px-[16px] py-[8px] w-full h-[36px] bg-[#fb2c36] shadow-sm rounded-xl text-white font-bold text-[12px] cursor-pointer">Hapus</button>
            </form>
        </div>
    </div>

    <script>
        // Tab Switch Logic
        function switchTab(evt, tabId) {
            let tabContents = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
            }
            let tabs = document.getElementsByClassName("detail-tab");
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove("border-primary-500", "text-primary-500");
                tabs[i].classList.add("border-transparent", "text-neutral-400");
            }
            document.getElementById(tabId).classList.remove("hidden");
            document.getElementById(tabId).classList.add("block");
            evt.currentTarget.classList.remove("border-transparent", "text-neutral-400");
            evt.currentTarget.classList.add("border-primary-500", "text-primary-500");
        }

        // Modal Logic
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Dynamic Modal Injector untuk Stok Online/Bazar
        function openStockModal(modalId, location) {
            // Ubah text judul modal sesuai lokasi yang ditekan (Online atau Bazar)
            if (modalId === 'modalStokMasuk') {
                document.getElementById('labelLocationMasuk').innerText = location;
                document.getElementById('inputLocationMasuk').value = location;

                // Ubah warna text khusus judul Bazar agar seragam
                if (location === 'Bazar') {
                    document.getElementById('labelLocationMasuk').classList.replace('text-primary-500', 'text-[#d08700]');
                } else {
                    document.getElementById('labelLocationMasuk').classList.replace('text-[#d08700]', 'text-primary-500');
                }
            } else {
                document.getElementById('labelLocationKeluar').innerText = location;
                document.getElementById('inputLocationKeluar').value = location;
            }

            openModal(modalId);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/product-detail.blade.php ENDPATH**/ ?>