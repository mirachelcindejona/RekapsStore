<?php $__env->startSection('navbar'); ?>
<?php if (isset($component)) { $__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0 = $attributes; } ?>
<?php $component = App\View\Components\Client\NavbarMain::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.navbar-main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\NavbarMain::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'page','title' => 'Detail Produk']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0)): ?>
<?php $attributes = $__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0; ?>
<?php unset($__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0)): ?>
<?php $component = $__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0; ?>
<?php unset($__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url()->previous()); ?>" class="hidden w-fit sm:flex font-semibold text-neutral-500 gap-2 items-center pb-2 cursor-pointer mt-2">
    <img src="<?php echo e(asset('assets/icons/back.svg')); ?>" alt="">
    Kembali
</a>
<div class="grid grid-cols-1 lg:grid-cols-[1.5fr_0.5fr_1fr] gap-2 mt-1 sm:mt-0">

    
    <div class="bg-neutral-50 rounded-xl p-4 flex-3">
        <div class="w-full aspect-square overflow-hidden rounded-xl">
            <img src="<?php echo e(asset($product->images->first()->image_path ?? 'assets/images/placeholder.png')); ?>" class="product-image w-full h-full object-contain cursor-zoom-in">
        </div>
    </div>

    
    <div class="flex flex-row lg:flex-col flex-1 gap-2 h-full w-full">
        <?php $__currentLoopData = $product->images->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="w-full aspect-square rounded-xl bg-neutral-50 overflow-hidden">
            <img class="product-image w-full h-full object-cover cursor-zoom-in" src="<?php echo e(asset($image->image_path)); ?>" alt="">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="flex flex-col flex-2 bg-neutral-50 rounded-xl p-4 gap-5">

        <div class="flex-5 flex flex-col gap-3">
            <div class="flex flex-col gap-2">

                
                <h1 class="text-lg sm:text-xl font-bold"><?php echo e($product->name); ?></h1>

                
                <div class="flex flex-col">
                    <?php if($product->discount > 0): ?>
                    <span class="text-sm sm:text-lg font-medium text-neutral-500 line-through">
                        Rp<?php echo e(number_format($product->selling_price, 0, ',', '.')); ?>

                    </span>
                    <?php endif; ?>
                    <span class="text-lg sm:text-2xl font-bold text-primary-500">
                        Rp<?php echo e(number_format($product->selling_price - ($product->selling_price * $product->discount / 100), 0, ',', '.')); ?>

                    </span>
                </div>

                
                <div class="flex text-sm items-center gap-1 text-neutral-700">
                    <span class="text-lg text-yellow-400">★</span>
                    <span><?php echo e($product->reviews->avg('rating') ? number_format($product->reviews->avg('rating'), 1) : '0.0'); ?></span>
                    <span>|</span>
                    <span><?php echo e($product->reviews->count()); ?> Ulasan</span>
                </div>

                <div class="flex flex-wrap gap-2">

                    
                    <div class="flex items-center gap-1 text-xs sm:text-sm font-semibold text-teal-500 bg-teal-100 rounded-full whitespace-nowrap px-3 py-1">
                        <img src="<?php echo e(asset('assets/icons/box.svg')); ?>" class="w-4 h-4 object-contain">
                        <span class="leading-none"><?php echo e($product->product_type); ?></span>
                    </div>

                    
                    <div class="flex items-center gap-1 text-xs sm:text-sm font-semibold text-yellow-500 bg-yellow-100 rounded-full whitespace-nowrap px-3 py-1">
                        <span class="leading-none"><?php echo e($product->category->name ?? '-'); ?></span>
                    </div>

                </div>
            </div>

            
            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex gap-5 items-center">
                <span class="font-semibold text-[14px]"><?php echo e($variant->variant_name); ?></span>
                <ul class="flex gap-2 text-[14px] text-neutral-500 font-semibold w-full sm:w-auto">
                    <?php $__currentLoopData = json_decode($variant->variant_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="size min-w-7 max-w-max h-7 flex items-center justify-center px-2 <?php echo e($loop->first ? 'active' : ''); ?>"><?php echo e($value); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="flex flex-row gap-5 items-center">
                <span class="font-semibold text-[14px]">Jumlah</span>
                <?php if (isset($component)) { $__componentOriginal6014e2372eca4dd8cb8da8101fa224e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6014e2372eca4dd8cb8da8101fa224e5 = $attributes; } ?>
<?php $component = App\View\Components\Client\Quantity::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.quantity'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\Quantity::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['qty' => 1]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6014e2372eca4dd8cb8da8101fa224e5)): ?>
<?php $attributes = $__attributesOriginal6014e2372eca4dd8cb8da8101fa224e5; ?>
<?php unset($__attributesOriginal6014e2372eca4dd8cb8da8101fa224e5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6014e2372eca4dd8cb8da8101fa224e5)): ?>
<?php $component = $__componentOriginal6014e2372eca4dd8cb8da8101fa224e5; ?>
<?php unset($__componentOriginal6014e2372eca4dd8cb8da8101fa224e5); ?>
<?php endif; ?>
            </div>

        </div>

        <div class="flex-1 w-full flex flex-col items-end justify-end gap-2 text-sm font-medium">
            <button class="bg-neutral-50 border-2 text-primary-500 py-2 rounded-xl w-full flex justify-center items-center gap-2 hover:bg-primary-50 cursor-pointer transition-all duration-300 ease-in-out">
                <img src="<?php echo e(asset('assets/icons/cart-ill.svg')); ?>" alt="">
                Masukan Keranjang
            </button>
            <button class="bg-primary-500 border-2 border-primary-500 text-neutral-50 py-2 rounded-xl w-full flex justify-center items-center gap-2 hover:bg-primary-600 cursor-pointer transition-all duration-300 ease-in-out">
                <img src="<?php echo e(asset('assets/icons/buy-ill.svg')); ?>" alt="">
                Beli Sekarang
            </button>
        </div>

    </div>

</div>


<div class="flex flex-col gap-2 bg-neutral-50 rounded-xl mt-1">
    <div>
        <button id="detailToggle" class="w-full flex sm:text-lg cursor-pointer gap-1 text-neutral-800 font-semibold text-sm items-center p-2">
            <img id='detailIcon' src="<?php echo e(asset('assets/icons/dropdown.svg')); ?>" class="transition duration-300" alt="">
            Detail Produk
        </button>
        <div id="detailContent" class="hidden text-neutral-500 text-sm leading-6 px-4 pb-4 whitespace-pre-line">
            <?php echo e($product->description); ?>

        </div>
    </div>
</div>


<section class="bg-white rounded-[18px] p-5 shadow-sm mt-1">

    <h2 class="text-lg font-semibold text-gray-800 mb-5">Rating Produk</h2>

    
    <div class="border border-gray-200 rounded-[16px] p-5 flex gap-6 mb-5">

        <div class="min-w-[140px] flex flex-col items-center justify-center border border-gray-200 rounded-[14px] px-5 py-4">
            <h1 class="text-[52px] font-bold text-primary-500 leading-none">
                <?php echo e($product->reviews->avg('rating') ? number_format($product->reviews->avg('rating'), 1) : '0.0'); ?>

            </h1>
            <div class="flex gap-[2px] text-yellow-400 text-[16px] mt-2">★ ★ ★ ★ ★</div>
            <p class="text-[13px] text-gray-400 mt-1"><?php echo e($product->reviews->count()); ?> Ulasan</p>
        </div>

        <div class="flex-1 flex flex-col justify-center gap-2">
            <?php $__currentLoopData = [5,4,3,2,1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $count = $product->reviews->where('rating', $star)->count();
                $total = $product->reviews->count();
                $percent = $total > 0 ? ($count / $total) * 100 : 0;
            ?>
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm w-6">★ <?php echo e($star); ?></span>
                <div class="flex-1 h-[8px] bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-lime-400 rounded-full" style="width: <?php echo e($percent); ?>%"></div>
                </div>
                <span class="text-gray-400 text-sm"><?php echo e($count); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="flex flex-col gap-4">
        <?php $__empty_1 = true; $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="border border-gray-200 rounded-[16px] p-4">
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white font-semibold text-sm shrink-0">
                        <?php echo e(strtoupper(substr($review->user->name ?? 'U', 0, 2))); ?>

                    </div>
                    <div class="flex flex-col">
                        <h3 class="font-semibold text-[14px] text-gray-800 leading-none"><?php echo e($review->user->name ?? 'Pengguna'); ?></h3>
                        <div class="text-yellow-400 text-sm mt-1 leading-none">
                            <?php for($i = 0; $i < $review->rating; $i++): ?>★<?php endfor; ?>
                        </div>
                    </div>
                </div>
                <p class="text-[13px] text-gray-500 leading-relaxed">"<?php echo e($review->comment); ?>"</p>
                <?php if($review->reply): ?>
                <div class="bg-purple-50 border border-purple-100 rounded-[12px] p-3">
                    <p class="text-[12px] font-semibold text-primary-500 mb-1">↳ Balasan Admin Rekaps</p>
                    <p class="text-[13px] text-gray-500 leading-relaxed">"<?php echo e($review->reply); ?>"</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-sm text-neutral-400 text-center py-4">Belum ada ulasan untuk produk ini.</p>
        <?php endif; ?>
    </div>

</section>


<div id="imageModal" class="fixed inset-0 bg-black/80 z-[999] hidden items-center justify-center p-4">
    <div id="closeImageModal" class="absolute inset-0 p-10"></div>
    <div class="relative max-w-5xl w-full">
        <button id="closeBtn" class="absolute -top-12 right-0 text-neutral-100 text-5xl cursor-pointer">&times;</button>
        <img id="modalImage" src="" class="w-full max-h-[90vh] object-contain rounded-xl">
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php if (isset($component)) { $__componentOriginal3b4558293c8dc3f33d2069df2429bfc7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7 = $attributes; } ?>
<?php $component = App\View\Components\Client\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\Footer::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7)): ?>
<?php $attributes = $__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7; ?>
<?php unset($__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b4558293c8dc3f33d2069df2429bfc7)): ?>
<?php $component = $__componentOriginal3b4558293c8dc3f33d2069df2429bfc7; ?>
<?php unset($__componentOriginal3b4558293c8dc3f33d2069df2429bfc7); ?>
<?php endif; ?>

<style>
    .size {
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
        flex-shrink: 0;
    }
    .size:hover {
        background: var(--color-primary-100);
        color: var(--color-primary-500);
    }
    .size.active {
        background: var(--color-primary-500);
        color: var(--color-neutral-50);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        // SIZE
        const sizes = document.querySelectorAll(".size");
        sizes.forEach(size => {
            size.addEventListener("click", function () {
                sizes.forEach(item => item.classList.remove("active"));
                this.classList.add("active");
            });
        });

        // DETAIL TOGGLE
        const detailToggle = document.getElementById("detailToggle");
        const detailContent = document.getElementById("detailContent");
        const detailIcon = document.getElementById("detailIcon");

        detailToggle.addEventListener("click", () => {
            detailContent.classList.toggle("hidden");
            detailIcon.classList.toggle("rotate-180");
        });

    });

    // IMAGE MODAL
    const productImages = document.querySelectorAll(".product-image");
    const imageModal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeImageModal = document.getElementById("closeImageModal");
    const closeBtn = document.getElementById("closeBtn");

    productImages.forEach(image => {
        image.addEventListener("click", () => {
            modalImage.src = image.src;
            imageModal.classList.remove("hidden");
            imageModal.classList.add("flex");
        });
    });

    function closeModal() {
        imageModal.classList.add("hidden");
        imageModal.classList.remove("flex");
    }

    closeImageModal.addEventListener("click", closeModal);
    closeBtn.addEventListener("click", closeModal);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.client.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/product-detail.blade.php ENDPATH**/ ?>