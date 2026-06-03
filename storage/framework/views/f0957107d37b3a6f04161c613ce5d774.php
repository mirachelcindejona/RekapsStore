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
<?php $component->withAttributes(['variant' => 'page','title' => 'Checkout']); ?>
<?php echo $__env->renderComponent(); ?>
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

<div class="flex flex-col md:flex-row gap-3 items-start">

    
    <div class="flex flex-col gap-2 w-full md:flex-1">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal04522b17b40375c29741876437db56a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal04522b17b40375c29741876437db56a7 = $attributes; } ?>
<?php $component = App\View\Components\Client\CheckoutItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.checkout-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\CheckoutItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal04522b17b40375c29741876437db56a7)): ?>
<?php $attributes = $__attributesOriginal04522b17b40375c29741876437db56a7; ?>
<?php unset($__attributesOriginal04522b17b40375c29741876437db56a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal04522b17b40375c29741876437db56a7)): ?>
<?php $component = $__componentOriginal04522b17b40375c29741876437db56a7; ?>
<?php unset($__componentOriginal04522b17b40375c29741876437db56a7); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="w-full md:w-80 md:sticky md:top-15">
        <div class="flex flex-col w-full bg-white border border-neutral-200 rounded-xl px-4 py-3 gap-3">

            
            <div class="flex items-center justify-end">
                <p id="toggleDetailBtn" class="text-xs text-neutral-400 cursor-pointer hover:text-primary-500 transition"
                   onclick="toggleDetail()">
                   Lihat Detail Transaksi
                </p>
            </div>

            
            <div id="detailTransaksi" class="hidden flex-col gap-2 border-t border-neutral-100 pt-3">
                <p class="text-xs font-semibold text-neutral-500 mb-1">Detail Transaksimu</p>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center justify-between">
                    <p class="text-xs text-neutral-600 truncate max-w-[60%]"><?php echo e($product->name); ?></p>
                    <p class="text-xs font-semibold text-neutral-800">Rp<?php echo e(number_format($product->selling_price - ($product->selling_price * $product->discount / 100), 0, ',', '.')); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="border-t border-neutral-100 pt-2 mt-1">
                    <button type="button"
                        onclick="document.getElementById('voucherModal').classList.remove('hidden')"
                        class="flex items-center gap-1 text-xs font-semibold bg-neutral-100 hover:bg-neutral-200 text-neutral-400 border rounded-lg border-neutral-300 cursor-pointer py-1 px-2 transition">
                        <span class="text-base leading-none">+</span> Pakai Voucher
                    </button>
                </div>
            </div>

            
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-neutral-700">Total Harga</p>
                <p class="text-sm font-semibold text-primary-500">Rp<?php echo e(number_format($products->sum(fn($p) => $p->selling_price - ($p->selling_price * $p->discount / 100)), 0, ',', '.')); ?></p>
            </div>
            <form method="POST" action="/payment">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full flex items-center justify-center gap-2 cursor-pointer bg-primary-500 hover:bg-primary-600 text-white text-sm font-bold py-3 rounded-xl transition">
                    <img src="<?php echo e(asset('assets/icons/secure-payment.svg')); ?>" alt="" class="w-4 h-4">
                    Bayar Sekarang
                </button>
            </form>

        </div>
    </div>

</div>


<div id="voucherModal" class="hidden fixed inset-0 z-50 flex items-end md:items-center justify-center">
    <div class="absolute inset-0 bg-black/30" onclick="document.getElementById('voucherModal').classList.add('hidden')"></div>
    <div class="relative z-10 w-full max-w-md bg-white rounded-t-2xl md:rounded-2xl p-5 flex flex-col gap-4">
        <div class="flex items-center justify-between">
            <p class="text-sm font-bold text-neutral-800">Pilih Vouchermu</p>
            <button onclick="document.getElementById('voucherModal').classList.add('hidden')"
                class="flex items-center justify-center rounded-full transition text-neutral-500 text-xl cursor-pointer leading-none">
                &times;
            </button>
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-xs font-semibold text-neutral-600">Kode Voucher</p>
            <input type="text" placeholder="Masukan kode vouchermu disini"
                class="w-full border border-neutral-200 rounded-xl px-3 py-2 text-sm text-neutral-700 placeholder:text-neutral-300 focus:outline-none focus:border-primary-400 transition">
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-xs font-semibold text-neutral-600">Diskon</p>
            <div class="flex flex-col gap-2">
                <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal5607d3bd2426900c5e8dcd08e67cdcd1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5607d3bd2426900c5e8dcd08e67cdcd1 = $attributes; } ?>
<?php $component = App\View\Components\Client\VoucherItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.voucher-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\VoucherItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($voucher->code),'desc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Minimal pembelian Rp' . number_format($voucher->min_purchase, 0, ',', '.')),'off' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($voucher->value . '% OFF'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($voucher->code),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5607d3bd2426900c5e8dcd08e67cdcd1)): ?>
<?php $attributes = $__attributesOriginal5607d3bd2426900c5e8dcd08e67cdcd1; ?>
<?php unset($__attributesOriginal5607d3bd2426900c5e8dcd08e67cdcd1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5607d3bd2426900c5e8dcd08e67cdcd1)): ?>
<?php $component = $__componentOriginal5607d3bd2426900c5e8dcd08e67cdcd1; ?>
<?php unset($__componentOriginal5607d3bd2426900c5e8dcd08e67cdcd1); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <button class="w-full bg-primary-500 hover:bg-primary-600 active:scale-95 text-white text-sm font-bold py-3 rounded-xl transition">
            Pakai Voucher
        </button>
    </div>
</div>

<script>
function toggleDetail() {
    const detail = document.getElementById('detailTransaksi');
    const btn = document.getElementById('toggleDetailBtn');
    const isHidden = detail.classList.contains('hidden');

    if (isHidden) {
        detail.classList.remove('hidden');
        detail.classList.add('flex');
        btn.textContent = 'Sembunyikan Detail';
    } else {
        detail.classList.add('hidden');
        detail.classList.remove('flex');
        btn.textContent = 'Lihat Detail Transaksi';
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.client.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/checkout.blade.php ENDPATH**/ ?>