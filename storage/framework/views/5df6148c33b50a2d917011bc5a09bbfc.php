

<?php $__env->startSection('title', 'Detail Produk - ' . $product->name); ?>

<?php $__env->startSection('page_title', 'Detail Produk'); ?>

<?php $__env->startSection('page_breadcrumb', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $hasVariants = $product->variants && $product->variants->count() > 0;

        $onlineStock = $hasVariants ? $product->variants->sum('stock_online') : $product->inventory->main_stock ?? 0;
        $bazarStock = $hasVariants ? $product->variants->sum('stock_bazar') : $product->inventory->bazar_stock ?? 0;
        $totalStock = $onlineStock + $bazarStock;

        $discountValue = $product->discount ?? 0;
        $finalPrice = $product->selling_price;
        if ($discountValue > 0) {
            $finalPrice = $product->selling_price - $product->selling_price * ($discountValue / 100);
        }
        $margin = $finalPrice - $product->cost_price;

        $reviews = $product->reviews ?? collect();
        $totalReviews = $reviews->count();
        $avgRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 0;

        $starCounts = [
            5 => $reviews->where('rating', 5)->count(),
            4 => $reviews->where('rating', 4)->count(),
            3 => $reviews->where('rating', 3)->count(),
            2 => $reviews->where('rating', 2)->count(),
            1 => $reviews->where('rating', 1)->count(),
        ];

        $starPercentages = [];
        foreach ($starCounts as $star => $count) {
            $starPercentages[$star] = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
        }
    ?>

    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg font-medium shadow-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg font-medium shadow-sm">
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
                class="flex items-center gap-[6px] px-[16px] py-[8px] bg-[#e7000b] text-neutral-50 rounded-xl text-[12px] font-semibold shadow-[0_4px_12px_rgba(149,24,6,0.2)] transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none"
                onclick="openModal('modalConfirmDelete')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.49967 5.83325C7.49967 5.17021 7.76307 4.53433 8.23191 4.06549C8.70075 3.59664 9.33663 3.33325 9.99967 3.33325C10.6627 3.33325 11.2986 3.59664 11.7674 4.06549C12.2363 4.53433 12.4997 5.17021 12.4997 5.83325M7.49967 5.83325H12.4997M7.49967 5.83325H4.99967M12.4997 5.83325H14.9997M4.99967 5.83325H3.33301M4.99967 5.83325V14.9999C4.99967 15.4419 5.17527 15.8659 5.48783 16.1784C5.80039 16.491 6.22431 16.6666 6.66634 16.6666H13.333C13.775 16.6666 14.199 16.491 14.5115 16.1784C14.8241 15.8659 14.9997 15.4419 14.9997 14.9999V5.83325M14.9997 5.83325H16.6663"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Hapus
            </button>
            <a href="<?php echo e(url('/admin/product/' . $product->slug . '/edit')); ?>">
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

    <div
        class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-2xl p-[20px] min-[900px]:p-[32px] flex flex-col gap-[18px]">

        <div class="grid grid-cols-1 min-[900px]:grid-cols-[350px_1fr] gap-[32px] items-start">

            <div class="flex flex-col gap-[12px]">
                <div
                    class="w-full aspect-[3/4] bg-neutral-100 rounded-xl overflow-hidden shadow-[0_2px_8px_rgba(0,0,0,0.05)] border border-neutral-200 flex items-center justify-center p-2">
                    <?php if($product->images && $product->images->count() > 0): ?>
                        <img id="mainProductImage" src="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>"
                            alt="<?php echo e($product->name); ?>" class="w-full h-full object-contain" />
                    <?php else: ?>
                        <div class="font-bold text-neutral-400">No Image</div>
                    <?php endif; ?>
                </div>

                <?php if($product->images && $product->images->count() > 0): ?>
                    <div class="grid grid-cols-5 gap-[8px]">
                        <?php $__currentLoopData = $product->images->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="aspect-square bg-neutral-100 rounded-lg overflow-hidden border-2 border-transparent hover:border-primary-500 cursor-pointer transition-colors p-1 flex items-center justify-center"
                                onclick="document.getElementById('mainProductImage').src = '<?php echo e(asset('storage/' . $img->image_path)); ?>'">
                                <img src="<?php echo e(asset('storage/' . $img->image_path)); ?>" class="w-full h-full object-contain"
                                    alt="Thumb" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex flex-col gap-[20px]">
                <div>
                    <h1 class="text-[24px] font-bold text-neutral-950 m-0 mb-[8px]"><?php echo e($product->name); ?></h1>

                    <div class="flex items-center gap-[16px] flex-wrap">
                        <div class="flex gap-[8px]">
                            <span
                                class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-primary-100 text-primary-500"><?php echo e($product->product_type); ?></span>
                            <span
                                class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-[#fefce8] text-[#d08700]"><?php echo e($product->category->name ?? 'Kategori'); ?></span>
                            <span
                                class="px-[12px] py-[4px] rounded-full text-[10px] font-bold uppercase bg-[#f0fdf4] text-[#16a34a]"><?php echo e($product->status); ?></span>
                        </div>
                    </div>

                    <div class="flex items-center gap-[4px] text-[12px] font-medium text-neutral-900 mt-[18px]">
                        <span class="text-[#FFDF20] text-[16px]">★</span>
                        <?php echo e($avgRating); ?> (<?php echo e($totalReviews); ?> Ulasan)
                    </div>
                </div>

                <div class="flex flex-col gap-[4px]">
                    <?php if($discountValue > 0): ?>
                        <div class="flex items-center gap-[8px] mb-[2px]">
                            <span class="text-[14px] font-medium text-neutral-400 line-through decoration-neutral-400">Rp
                                <?php echo e(number_format($product->selling_price, 0, ',', '.')); ?></span>
                            <span class="px-[8px] py-[2px] bg-[#fefce8] text-[#d08700] rounded text-[10px] font-bold">Diskon
                                <?php echo e($discountValue); ?>%</span>
                        </div>
                    <?php endif; ?>

                    <div class="text-[30px] font-extrabold text-primary-500 leading-none">Rp
                        <?php echo e(number_format($finalPrice, 0, ',', '.')); ?></div>

                    <div class="text-[14px] font-medium text-neutral-500 mt-[4px]">
                        Modal : Rp <?php echo e(number_format($product->cost_price, 0, ',', '.')); ?> &nbsp;|&nbsp; Margin : Rp
                        <?php echo e(number_format($margin, 0, ',', '.')); ?>

                    </div>

                    <div class="text-[14px] font-medium text-neutral-500 mt-[4px]">
                        Info Pengambilan: <span
                            class="text-neutral-700 font-semibold"><?php echo e($product->pickup_info ?: 'Belum ada informasi'); ?></span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-y-[24px] gap-x-[40px] py-[16px] border-y border-neutral-200">
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">STOK SAAT INI</span>
                        <span class="text-[20px] font-bold text-primary-500"><?php echo e($totalStock); ?></span>
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">TOTAL PENJUALAN</span>
                        <span class="text-[20px] font-bold text-neutral-950">0</span>
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">MIN. STOK</span>
                        <span class="text-[20px] font-bold text-neutral-950">3</span>
                    </div>
                    <div class="flex flex-col gap-[4px]">
                        <span class="text-[12px] font-semibold text-neutral-500 uppercase">KODE PRODUK</span>
                        <span class="text-[20px] font-bold text-neutral-950"><?php echo e($product->product_code); ?></span>
                    </div>
                </div>

                <?php if($hasVariants): ?>
                    <div class="flex flex-col gap-[12px]">
                        <div class="text-[16px] font-bold text-neutral-950">UKURAN & STOK VARIANT</div>
                        <div class="flex flex-wrap gap-[8px]">
                            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="px-[16px] py-[6px] bg-neutral-200 rounded-full text-[14px] font-bold text-neutral-700 transition-all duration-200 cursor-default hover:bg-primary-500 hover:text-white">
                                    <?php echo e($var->variant_value); ?> <span
                                        class="font-normal opacity-80 text-[12px] ml-1">(Online: <?php echo e($var->stock_online); ?> |
                                        Bazar: <?php echo e($var->stock_bazar); ?>)</span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="bg-neutral-50 border border-neutral-200 rounded-2xl p-[20px] flex flex-col gap-[16px]">
                    <div class="text-[16px] font-bold text-neutral-950">Kelola Stok</div>

                    <div class="flex flex-col sm:flex-row items-stretch gap-[16px]">

                        <div class="flex flex-row gap-[16px] w-full flex-1">
                            <div
                                class="flex-1 bg-neutral-100 rounded-xl p-[16px] flex flex-col gap-[4px] justify-center border border-neutral-200/60 relative overflow-hidden">
                                <span class="text-[12px] font-semibold text-neutral-500 uppercase relative z-10">Stok
                                    Online</span>
                                <span
                                    class="text-[36px] font-bold text-neutral-950 leading-none relative z-10"><?php echo e($onlineStock); ?></span>
                            </div>

                            <div
                                class="flex-1 bg-neutral-100 rounded-xl p-[16px] flex flex-col gap-[4px] justify-center border border-neutral-200/60 relative overflow-hidden">
                                <span class="text-[12px] font-semibold text-neutral-500 uppercase relative z-10">Stok
                                    Bazar</span>
                                <span
                                    class="text-[36px] font-bold text-neutral-950 leading-none relative z-10"><?php echo e($bazarStock); ?></span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-[8px] w-full sm:w-[150px] shrink-0 justify-center">
                            <button
                                class="flex items-center justify-center gap-[6px] px-[16px] py-[8px] bg-primary-500 text-neutral-50 rounded-xl text-[12px] font-semibold shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none w-full"
                                onclick="openModal('modalStokMasuk')">
                                + Stok Masuk
                            </button>
                            <button
                                class="flex items-center justify-center gap-[6px] px-[16px] py-[8px] bg-transparent border border-primary-500 text-primary-500 rounded-xl text-[12px] font-semibold transition-transform duration-200 active:scale-95 cursor-pointer outline-none w-full"
                                onclick="openModal('modalStokKeluar')">
                                - Stok Keluar
                            </button>
                            <button
                                class="flex items-center justify-center gap-[6px] px-[16px] py-[8px] bg-neutral-800 text-neutral-50 rounded-xl text-[12px] font-semibold shadow-[0_4px_12px_rgba(0,0,0,0.15)] transition-transform duration-200 active:scale-95 cursor-pointer outline-none border-none w-full mt-[4px]"
                                onclick="openModal('modalPindahStok')">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 3l4 4-4 4"></path>
                                    <path d="M3 7h18"></path>
                                    <path d="M7 21l-4-4 4-4"></path>
                                    <path d="M21 17H3"></path>
                                </svg>
                                Pindah Stok
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="mt-[32px]">
            <div class="flex border-b border-neutral-950/30 gap-[24px] overflow-x-auto mb-[24px] snap-x">
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-primary-500 cursor-pointer border-b-[3px] border-primary-500 whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-deskripsi')">
                    Deskripsi
                </div>
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-neutral-400 hover:text-primary-500 cursor-pointer border-b-[3px] border-transparent whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-ulasan')">
                    Ulasan & Rating (<?php echo e($totalReviews); ?>)
                </div>
                <div class="detail-tab px-[16px] py-[12px] text-[16px] font-bold text-neutral-400 hover:text-primary-500 cursor-pointer border-b-[3px] border-transparent whitespace-nowrap transition-all duration-200"
                    onclick="switchTab(event, 'tab-stok')">
                    Riwayat Stok
                </div>
            </div>

            <div class="p-0 min-[768px]">

                <div id="tab-deskripsi" class="tab-content block animate-[fadeIn_0.4s_ease]">
                    <div
                        class="bg-neutral-50 shadow-[0_2px_8px_rgba(0,0,0,0.08)] border border-neutral-100 rounded-2xl p-[24px]">
                        <p class="text-[15px] text-neutral-700 leading-[1.8] m-0">
                            <?php echo nl2br(e($product->description)); ?>

                        </p>
                    </div>
                </div>

                <div id="tab-ulasan" class="tab-content hidden animate-[fadeIn_0.4s_ease]">
                    <div class="flex flex-col md:flex-row gap-[20px] mb-[24px]">
                        <div
                            class="w-full md:w-[185px] py-[18px] md:py-0 md:h-[150px] bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl flex flex-col items-center justify-center gap-[4px] shrink-0">
                            <div class="text-[48px] font-bold text-primary-500 leading-none"><?php echo e($avgRating); ?></div>
                            <div class="flex gap-[2px] text-[#ffdf20] text-[16px]">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php echo e($i <= round($avgRating) ? '★' : '☆'); ?>

                                <?php endfor; ?>
                            </div>
                            <div class="text-[14px] font-medium text-neutral-400"><?php echo e($totalReviews); ?> Ulasan</div>
                        </div>

                        <div
                            class="flex-1 h-[150px] bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl py-[17px] px-[16px] flex flex-col justify-between">
                            <?php $__currentLoopData = [5, 4, 3, 2, 1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center gap-[8px]">
                                    <div
                                        class="flex items-center gap-[4px] w-[30px] text-[12px] font-medium text-[#ffdf20]">
                                        <?php echo e($star); ?> ★</div>
                                    <div class="flex-1 h-[7px] bg-neutral-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-secondary-500 rounded-full"
                                            style="width: <?php echo e($starPercentages[$star]); ?>%"></div>
                                    </div>
                                    <div class="w-[15px] text-[12px] text-neutral-400 text-right"><?php echo e($starCounts[$star]); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div
                                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.25)] rounded-xl p-[16px] mb-[16px] flex flex-col gap-[12px]">
                                <div class="flex items-center gap-[10px]">
                                    <?php
                                        $initials = strtoupper(substr($review->user->name ?? 'U', 0, 2));
                                        $bgColors = [
                                            'bg-primary-500',
                                            'bg-[#9ae600]',
                                            'bg-[#00bc7d]',
                                            'bg-[#fb2c36]',
                                            'bg-[#d08700]',
                                        ];
                                        $color = $bgColors[$review->id % count($bgColors)];
                                    ?>
                                    <div
                                        class="w-[36px] h-[36px] rounded-full flex items-center justify-center text-neutral-50 text-[12px] font-bold <?php echo e($color); ?>">
                                        <?php echo e($initials); ?>

                                    </div>
                                    <div>
                                        <div class="text-[14px] font-bold text-neutral-950">
                                            <?php echo e($review->user->name ?? 'Anonim'); ?></div>
                                        <div class="flex gap-[2px] text-[#ffdf20] text-[12px]">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php echo e($i <= $review->rating ? '★' : '☆'); ?>

                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[12px] font-normal text-neutral-500 leading-[1.4] m-0">
                                    “<?php echo e($review->comment); ?>”</p>

                                <?php if($review->admin_reply): ?>
                                    <div class="bg-primary-50 border-l-2 border-primary-500 rounded-lg p-[12px] mt-[4px]">
                                        <div
                                            class="flex items-center gap-[6px] text-primary-400 text-[12px] font-bold mb-[4px]">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <polyline points="9 17 4 12 9 7"></polyline>
                                                <path d="M20 18v-2a4 4 0 0 0-4-4H4"></path>
                                            </svg>
                                            Balasan Admin Rekaps
                                        </div>
                                        <p class="text-[12px] font-normal text-neutral-500 leading-[1.4] m-0">
                                            “<?php echo e($review->admin_reply); ?>”</p>
                                    </div>
                                <?php else: ?>
                                    <div class="flex flex-col items-end gap-[12px] mt-[4px]">
                                        <textarea
                                            class="w-full min-h-[60px] p-[8px] rounded-[10px] border border-neutral-500 bg-neutral-50 outline-none text-[14px] text-neutral-700 transition-all focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] resize-y"
                                            placeholder="Balas ulasan ini..."></textarea>
                                        <div class="flex gap-[12px]">
                                            <button type="button"
                                                class="px-[16px] py-[8px] bg-[#d4d4d4] text-[#868686] rounded-xl font-bold text-[12px] cursor-pointer outline-none border-none">Batal</button>
                                            <button type="button"
                                                class="px-[16px] py-[8px] bg-primary-500 text-white rounded-xl font-bold text-[12px] shadow-[0_0_8px_rgba(114,52,214,0.35)] cursor-pointer outline-none border-none">Kirim</button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center text-neutral-400 text-[14px] py-[20px]">Belum ada ulasan untuk produk
                                ini.</div>
                        <?php endif; ?>
                    </div>
                </div>

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
                        <?php $__empty_1 = true; $__currentLoopData = $product->stockHistories()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div
                                class="flex flex-col md:flex-row md:items-center justify-between py-[16px] border-b border-neutral-200 last:border-none gap-[12px] md:gap-0">
                                <div class="flex items-center gap-[16px]">
                                    <?php if($history->type == 'Masuk'): ?>
                                        <div
                                            class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 border-[#00c951] text-[#00c951]">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="3">
                                                <line x1="12" y1="19" x2="12" y2="5">
                                                </line>
                                                <polyline points="5 12 12 5 19 12"></polyline>
                                            </svg>
                                        </div>
                                    <?php else: ?>
                                        <div
                                            class="w-[36px] h-[36px] rounded-full flex items-center justify-center shrink-0 border-2 border-[#fb2c36] text-[#fb2c36]">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="3">
                                                <line x1="12" y1="5" x2="12" y2="19">
                                                </line>
                                                <polyline points="19 12 12 19 5 12"></polyline>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <div class="text-[14px] font-bold text-neutral-950 mb-[2px]">
                                            <?php echo e($history->type == 'Masuk' ? '+' : '-'); ?><?php echo e($history->qty); ?> pcs -
                                            <?php echo e($history->note ?? 'Perubahan Stok'); ?>

                                        </div>
                                        <div class="text-[12px] text-neutral-400">
                                            Oleh: <?php echo e($history->user->name ?? 'Sistem'); ?> | Lokasi:
                                            <?php echo e($history->location); ?> | <?php echo e($history->created_at->format('d M Y, H:i')); ?>

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
                            <div class="text-center text-neutral-400 text-[14px] py-[20px]">Belum ada riwayat pergerakan
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
                <button type="button"
                    class="w-[32px] h-[32px] rounded-[4px] text-primary-500 flex items-center justify-center transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50 cursor-pointer outline-none border-none bg-transparent"
                    onclick="closeModal('modalStokMasuk')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="3">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <form action="<?php echo e(url('/admin/product/' . $product->slug . '/stock')); ?>" method="POST"
                class="flex flex-col gap-[16px]" onsubmit="disableSubmitButton(this)">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" value="Masuk">

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Lokasi Stok</label>
                    <select name="location" required
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none">
                        <option value="Online">Stok Online</option>
                        <option value="Bazar">Stok Bazar</option>
                    </select>
                </div>

                <?php if($hasVariants): ?>
                    <div class="flex flex-col gap-[8px]">
                        <label class="text-[14px] font-normal text-neutral-950">Pilih Varian</label>
                        <select name="variant_id" required
                            class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none">
                            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($var->id); ?>"><?php echo e($var->variant_value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Jumlah Stok Masuk</label>
                    <input type="number" name="qty" min="1"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400"
                        placeholder="Masukkan jumlah" required />
                </div>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Catatan</label>
                    <textarea name="note"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400 resize-y min-h-[85px]"
                        placeholder="Misal: Restok Produksi" required></textarea>
                </div>

                <div class="flex justify-end gap-[16px] mt-[8px]">
                    <button type="button"
                        class="py-[8px] px-[16px] w-[80px] bg-[#d4d4d4] rounded-xl text-[#868686] text-[12px] font-bold text-center cursor-pointer outline-none border-none"
                        onclick="closeModal('modalStokMasuk')">Batal</button>
                    <button type="submit"
                        class="py-[8px] px-[16px] w-[157px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-xl text-white text-[12px] font-bold cursor-pointer outline-none border-none">Simpan
                        Stok Masuk</button>
                </div>
            </form>
        </div>
    </div>

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
                <button type="button"
                    class="w-[32px] h-[32px] rounded-[4px] text-primary-500 flex items-center justify-center transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50 cursor-pointer outline-none border-none bg-transparent"
                    onclick="closeModal('modalStokKeluar')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="3">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <form action="<?php echo e(url('/admin/product/' . $product->slug . '/stock')); ?>" method="POST"
                class="flex flex-col gap-[16px]" onsubmit="disableSubmitButton(this)">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" value="Keluar">

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Lokasi Stok</label>
                    <select name="location" required
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none">
                        <option value="Online">Stok Online</option>
                        <option value="Bazar">Stok Bazar</option>
                    </select>
                </div>

                <?php if($hasVariants): ?>
                    <div class="flex flex-col gap-[8px]">
                        <label class="text-[14px] font-normal text-neutral-950">Pilih Varian</label>
                        <select name="variant_id" required
                            class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none">
                            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($var->id); ?>"><?php echo e($var->variant_value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Jumlah Stok Keluar</label>
                    <input type="number" name="qty" min="1"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400"
                        placeholder="Masukkan jumlah" required />
                </div>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Catatan</label>
                    <textarea name="note"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400 resize-y min-h-[85px]"
                        placeholder="Misal: Barang Rusak/Cacat" required></textarea>
                </div>

                <div class="flex justify-end gap-[16px] mt-[8px]">
                    <button type="button"
                        class="py-[8px] px-[16px] w-[80px] bg-[#d4d4d4] rounded-xl text-[#868686] text-[12px] font-bold text-center cursor-pointer outline-none border-none"
                        onclick="closeModal('modalStokKeluar')">Batal</button>
                    <button type="submit"
                        class="py-[8px] px-[16px] w-[156px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-xl text-white text-[12px] font-bold cursor-pointer outline-none border-none">Simpan
                        Stok Keluar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalPindahStok"
        class="modal fixed inset-0 bg-black/45 hidden items-center justify-center z-[9999] opacity-0 transition-all duration-300 p-[16px] [&.active]:flex [&.active]:opacity-100">
        <div
            class="w-full max-w-[630px] bg-neutral-50 shadow-[0_4px_16px_rgba(0,0,0,0.25)] rounded-[20px] p-[24px_20px] sm:p-[32px_36px] flex flex-col gap-[24px] transform translate-y-5 transition-transform duration-300 max-h-[90vh] overflow-y-auto [&.active_.modal-container]:translate-y-0">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-[8px]">
                    <div class="w-[24px] h-[24px] flex items-center justify-center text-neutral-800">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 3l4 4-4 4"></path>
                            <path d="M3 7h18"></path>
                            <path d="M7 21l-4-4 4-4"></path>
                            <path d="M21 17H3"></path>
                        </svg>
                    </div>
                    <h3 class="text-[18px] font-bold text-neutral-950 m-0">Mutasi / Pindah Stok</h3>
                </div>
                <button type="button"
                    class="w-[32px] h-[32px] rounded-[4px] text-primary-500 flex items-center justify-center transition-all duration-200 hover:bg-primary-500 hover:text-neutral-50 cursor-pointer outline-none border-none bg-transparent"
                    onclick="closeModal('modalPindahStok')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="3">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <form action="<?php echo e(url('/admin/product/' . $product->slug . '/stock-transfer')); ?>" method="POST"
                class="flex flex-col gap-[16px]" onsubmit="disableSubmitButton(this)">
                <?php echo csrf_field(); ?>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Arah Perpindahan</label>
                    <select name="transfer_direction" required
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none">
                        <option value="online_to_bazar">Dari ONLINE ➔ Pindah ke BAZAR</option>
                        <option value="bazar_to_online">Dari BAZAR ➔ Pindah ke ONLINE</option>
                    </select>
                </div>

                <?php if($hasVariants): ?>
                    <div class="flex flex-col gap-[8px]">
                        <label class="text-[14px] font-normal text-neutral-950">Pilih Varian</label>
                        <select name="variant_id" required
                            class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] appearance-none">
                            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($var->id); ?>"><?php echo e($var->variant_value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Jumlah Dipindah</label>
                    <input type="number" name="qty" min="1"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400"
                        placeholder="Masukkan jumlah" required />
                </div>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[14px] font-normal text-neutral-950">Catatan Tambahan</label>
                    <textarea name="note"
                        class="bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-neutral-700 w-full outline-none transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] placeholder:text-neutral-400 resize-y min-h-[60px]"
                        placeholder="Misal: Persiapan display event besok" required></textarea>
                </div>

                <div class="flex justify-end gap-[16px] mt-[8px]">
                    <button type="button"
                        class="py-[8px] px-[16px] w-[80px] bg-[#d4d4d4] rounded-xl text-[#868686] text-[12px] font-bold text-center cursor-pointer outline-none border-none"
                        onclick="closeModal('modalPindahStok')">Batal</button>
                    <button type="submit"
                        class="py-[8px] px-[16px] bg-neutral-800 shadow-[0_4px_12px_rgba(0,0,0,0.15)] rounded-xl text-white text-[12px] font-bold cursor-pointer outline-none border-none">Proses
                        Pindah Stok</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalConfirmDelete"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[9999] [&.active]:flex">
        <div class="flex flex-col items-center p-[20px_28px] gap-[24px] w-[355px] bg-neutral-50 shadow-lg rounded-[20px]">
            <div class="w-[114px] h-[114px] flex justify-center items-center">
                <svg width="114" height="114" viewBox="0 0 114 114" fill="none">
                    <circle cx="57" cy="57" r="46.5" stroke="#FB2C36" stroke-width="7" />
                    <path d="M57 30V65" stroke="#FB2C36" stroke-width="7" stroke-linecap="round" />
                    <circle cx="57" cy="84" r="5" fill="#FB2C36" />
                </svg>
            </div>

            <p class="font-normal text-[13px] leading-[18px] text-center text-neutral-600 m-0">
                Data produk akan terhapus secara permanen! <br>Anda yakin ingin menghapus produk <br> <strong
                    id="deleteProductName" class="text-black text-[14px]"><?php echo e($product->name); ?></strong>?
            </p>

            <form id="deleteForm" method="POST" action="<?php echo e(url('/admin/product/' . $product->slug)); ?>"
                class="flex flex-row justify-center items-center gap-[12px] w-full">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button type="button" onclick="closeModal('modalConfirmDelete')"
                    class="px-[16px] py-[8px] w-full h-[36px] bg-neutral-300 rounded-xl text-[#868686] font-bold text-[12px] cursor-pointer hover:bg-neutral-400">
                    Batal
                </button>
                <button type="submit"
                    class="px-[16px] py-[8px] w-full h-[36px] bg-[#fb2c36] shadow-sm rounded-xl text-white font-bold text-[12px] cursor-pointer hover:bg-red-700">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>

    <script src="<?php echo e(asset('js/products.js')); ?>"></script>

    <script>
        function disableSubmitButton(form) {
            // Cari tombol submit di dalam form yang sedang dikirim
            let submitBtn = form.querySelector('button[type="submit"]');

            if (submitBtn) {
                // Matikan tombol agar tidak bisa diklik lagi
                submitBtn.disabled = true;

                // Ubah teks dan gaya tombol agar terlihat sedang loading
                submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...
            `;
                submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/product-detail.blade.php ENDPATH**/ ?>