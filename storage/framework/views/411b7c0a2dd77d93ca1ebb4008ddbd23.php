

<?php $__env->startSection('title', 'Daftar Produk'); ?>
<?php $__env->startSection('page_title', 'Daftar Produk'); ?>
<?php $__env->startSection('page_breadcrumb', 'Daftar Produk'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div
            class="bg-[#E5FFA1] border border-[#8DB524] text-[#4d660e] px-[16px] py-[12px] rounded-xl mb-[20px] font-bold text-[14px]">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div
        class="flex items-center justify-between mb-[20px] gap-[12px] flex-wrap max-[900px]:flex-col max-[900px]:items-start w-full">

        <div class="flex overflow-x-auto custom-scrollbar gap-[12px] pb-[10px] w-full max-w-full">
            <a href="<?php echo e(url('/admin/product')); ?>"
                class="flex justify-center items-center px-[16px] py-[8px] rounded-full text-[14px] font-bold shrink-0 transition-colors duration-200 
               <?php echo e(!request('category') ? 'bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] text-white' : 'bg-neutral-200 text-neutral-700 hover:bg-neutral-300'); ?>">
                Semua (<?php echo e($totalProducts); ?>)
            </a>

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('/admin/product?category=' . $cat->id)); ?>"
                    class="flex justify-center items-center px-[16px] py-[8px] rounded-full text-[14px] font-bold shrink-0 transition-colors duration-200 
                   <?php echo e(request('category') == $cat->id ? 'bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] text-white' : 'bg-neutral-200 text-neutral-700 hover:bg-neutral-300'); ?>">
                    <?php echo e($cat->name); ?> (<?php echo e($cat->products_count); ?>)
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <a href="<?php echo e(url('/admin/product/create')); ?>" class="shrink-0 max-[900px]:hidden mt-[10px]">
            <button
                class="flex items-center justify-center gap-[6px] px-[16px] py-[10px] bg-primary-500 text-neutral-50 rounded-xl text-[13px] font-bold shadow-[0_0_8px_rgba(114,52,214,0.35)] border-none cursor-pointer transition-all duration-[250ms] whitespace-nowrap hover:bg-[#5928a7]">
                + Tambah Produk
            </button>
        </a>
    </div>

    <div class="w-full overflow-x-auto touch-pan-x custom-scrollbar pb-[10px]">
        <table
            class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1050px]">
            <thead class="bg-neutral-100 border-b-[0.2px] border-neutral-600">
                <tr>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        PRODUK</th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        KATEGORI</th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">TIPE
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">HARGA
                        JUAL</th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">STOK
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        STATUS</th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">AKSI
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <a href="<?php echo e(url('/admin/product/' . $product->slug)); ?>" class="block group cursor-pointer">
                                <div class="flex items-center gap-[10px]">
                                    <?php
                                        $mainImage = $product->images->first();
                                        $imgPath = $mainImage
                                            ? asset('storage/' . $mainImage->image_path)
                                            : asset('assets/img/default-product.png');
                                    ?>
                                    <img src="<?php echo e($imgPath); ?>"
                                        class="w-[42px] h-[42px] rounded-lg object-cover bg-neutral-200 transition-all duration-200 group-hover:shadow-md" />
                                    <div>
                                        <div
                                            class="text-[13px] font-bold text-neutral-900 transition-colors duration-200 group-hover:text-primary-500">
                                            <?php echo e($product->name); ?></div>
                                        <div class="text-[11px] text-neutral-400"><?php echo e($product->product_code); ?></div>
                                    </div>
                                </div>
                            </a>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span class="font-semibold"><?php echo e($product->category->name ?? '-'); ?></span>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <?php if($product->product_type == 'Ready Stok'): ?>
                                <span
                                    class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-green-100 text-green-700">Ready</span>
                            <?php elseif($product->product_type == 'PO'): ?>
                                <span
                                    class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-orange-100 text-orange-700">PO</span>
                            <?php else: ?>
                                <span
                                    class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-blue-100 text-blue-700">Jasa</span>
                            <?php endif; ?>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap font-bold text-[#8DB524]">
                            Rp<?php echo e(number_format($product->selling_price, 0, ',', '.')); ?>

                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap font-bold">
                            <?php echo e($product->inventory->main_stock ?? 0); ?> pcs
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <?php if($product->status == 'Aktif'): ?>
                                <span
                                    class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[rgba(0,200,83,0.15)] text-[#10b981]">Aktif</span>
                            <?php else: ?>
                                <span
                                    class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-neutral-200 text-neutral-500">Non-Aktif</span>
                            <?php endif; ?>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <div class="flex gap-[6px]">
                                <a href="<?php echo e(url('/admin/product/' . $product->slug . '/edit')); ?>"
                                    class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-primary-500 text-primary-500 shadow-sm hover:bg-primary-500 hover:text-neutral-50">
                                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal('<?php echo e($product->slug); ?>', '<?php echo e(addslashes($product->name)); ?>')"
                                    class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-[#fb2c36] text-[#fb2c36] shadow-sm hover:bg-[#fb2c36] hover:text-neutral-50 outline-none">
                                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M7.5 5.833V4.065C7.5 3.333 9.337 3.333 10 3.333c.663 0 2.5 0 2.5.732v1.768M7.5 5.833h5M7.5 5.833H5m7.5 0h2.5M5 5.833H3.333m1.667 0v9.167C5 15.442 5.488 16.667 6.667 16.667h6.666c1.18 0 1.667-1.225 1.667-1.667V5.833h1.667" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-[40px] text-neutral-500 font-semibold text-[14px]">
                            Belum ada produk yang ditambahkan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <a href="<?php echo e(url('/admin/product/create')); ?>"
        class="hidden max-[900px]:flex fixed bottom-[30px] right-[30px] w-[56px] h-[56px] rounded-full bg-primary-500 text-neutral-50 shadow-lg items-center justify-center z-[90] cursor-pointer transition-all duration-200 hover:bg-[#5928a7]">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 5V19M5 12H19" />
        </svg>
    </a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
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
                Anda yakin ingin menghapus produk <br> <strong id="deleteProductName" class="text-black text-[14px]">Nama
                    Produk</strong>?
            </p>

            <form id="deleteForm" method="POST" action=""
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

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function openDeleteModal(productSlug, productName) {
            document.getElementById('deleteProductName').innerText = productName;
            document.getElementById('deleteForm').action = "<?php echo e(url('/admin/product')); ?>/" + productSlug;
            openModal('modalConfirmDelete');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/product.blade.php ENDPATH**/ ?>