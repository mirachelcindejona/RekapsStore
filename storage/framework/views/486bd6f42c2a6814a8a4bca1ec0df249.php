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
<?php $component->withAttributes(['variant' => 'page','title' => 'Keranjang Belanja']); ?>
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

<?php if(session('error')): ?>
<div class="bg-red-50 border border-red-200 text-red-500 text-sm font-semibold px-4 py-2 rounded-xl">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<form id="cartForm" method="POST" action="/checkout" class="flex flex-col gap-2 pb-17">
    <?php echo csrf_field(); ?>

    
    <div class="flex items-center px-3 py-3 bg-neutral-50 rounded-xl">
        <label class="flex items-center gap-2 cursor-pointer select-none w-8">
            <?php if (isset($component)) { $__componentOriginal633783f7f53c1de6511f692fc257cef5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal633783f7f53c1de6511f692fc257cef5 = $attributes; } ?>
<?php $component = App\View\Components\Client\Select::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\Select::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'selectAll']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal633783f7f53c1de6511f692fc257cef5)): ?>
<?php $attributes = $__attributesOriginal633783f7f53c1de6511f692fc257cef5; ?>
<?php unset($__attributesOriginal633783f7f53c1de6511f692fc257cef5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal633783f7f53c1de6511f692fc257cef5)): ?>
<?php $component = $__componentOriginal633783f7f53c1de6511f692fc257cef5; ?>
<?php unset($__componentOriginal633783f7f53c1de6511f692fc257cef5); ?>
<?php endif; ?>
        </label>
        <span class="flex-1 text-neutral-700 text-sm font-semibold md:hidden">Pilih Semua</span>
        <div class="hidden md:grid grid-cols-[2fr_1fr_1fr_1fr_2rem] flex-1 text-neutral-700 text-sm font-semibold">
            <span>Produk</span>
            <span class="text-center">Varian</span>
            <span class="text-center">Harga</span>
            <span class="text-center">Jumlah</span>
            <span></span>
        </div>
    </div>

    
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginal386ef8c704d7676dfbfde779d2cadd36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal386ef8c704d7676dfbfde779d2cadd36 = $attributes; } ?>
<?php $component = App\View\Components\Client\CartItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.cart-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\CartItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->selling_price - ($product->selling_price * $product->discount / 100))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal386ef8c704d7676dfbfde779d2cadd36)): ?>
<?php $attributes = $__attributesOriginal386ef8c704d7676dfbfde779d2cadd36; ?>
<?php unset($__attributesOriginal386ef8c704d7676dfbfde779d2cadd36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal386ef8c704d7676dfbfde779d2cadd36)): ?>
<?php $component = $__componentOriginal386ef8c704d7676dfbfde779d2cadd36; ?>
<?php unset($__componentOriginal386ef8c704d7676dfbfde779d2cadd36); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <div class="flex fixed bottom-2 left-1/2 -translate-x-1/2 w-full max-w-7xl px-2 z-10">
        <div class="flex w-full bg-white border border-neutral-100 rounded-xl px-6 py-3 shadow-lg items-center justify-between">
            <p class="text-xs sm:text-sm font-semibold text-neutral-700">Total Harga : 
                <span id="totalHarga" class="text-sm sm:text-lg font-semibold text-neutral-800">Rp0</span>
            </p>
            <button type="submit" class="bg-primary-500 cursor-pointer hover:bg-primary-600 active:scale-95 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition">
                Checkout
            </button>
        </div>
    </div>

</form>

<script>
function updateTotal() {
    const items = document.querySelectorAll('.cart-item:checked');
    let total = 0;
    items.forEach(cb => {
        total += parseFloat(cb.dataset.price);
    });
    document.getElementById('totalHarga').textContent = 'Rp' + total.toLocaleString('id-ID');
}

document.addEventListener('DOMContentLoaded', updateTotal);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.client.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/cart.blade.php ENDPATH**/ ?>