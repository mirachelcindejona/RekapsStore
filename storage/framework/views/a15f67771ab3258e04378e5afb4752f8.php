<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['product', 'price' => 0]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['product', 'price' => 0]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex items-center bg-neutral-50 px-3 py-5 rounded-xl gap-3">

    
    <div class="flex justify-center shrink-0">
        <input 
            type="checkbox" 
            class="cart-item w-4 h-4 accent-primary-500 rounded cursor-pointer"
            name="selected_products[]"
            value="<?php echo e($product->id); ?>"
            data-price="<?php echo e($price); ?>"
            onchange="syncSelectAll(); updateTotal();"
        >
    </div>

    
    <div class="flex flex-1 gap-3 md:hidden items-center">
        <div class="flex-1 max-w-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
            <img src="<?php echo e(asset($product->images->first()->image_path ?? 'assets/images/placeholder.png')); ?>" alt="<?php echo e($product->name); ?>" class="object-contain">
        </div>
        <div class="flex-1 min-w-0 flex flex-col gap-3">
            <div class="flex flex-col">
                <p class="text-sm font-bold text-neutral-800 truncate"><?php echo e($product->name); ?></p>
                <p class="text-xs text-neutral-400 mb-0.5">
                    <?php echo e($product->variants->first()->variant_name ?? '-'); ?>:
                    <?php echo e(implode(', ', json_decode($product->variants->first()->variant_values ?? '[]', true))); ?>

                </p>
                <p class="text-sm text-neutral-500 line-through">Rp<?php echo e(number_format($product->selling_price, 0, ',', '.')); ?></p>
                <p class="text-[16px] font-semibold text-primary-500">Rp<?php echo e(number_format($price, 0, ',', '.')); ?></p>
                <div class="flex w-fit items-center gap-1 text-xs font-semibold text-teal-500 bg-teal-100 rounded-full whitespace-nowrap pl-1 pr-2 py-1">
                    <img src="<?php echo e(asset('assets/icons/box.svg')); ?>" class="w-3 h-3 object-contain">
                    <span class="leading-none"><?php echo e($product->product_type); ?></span>
                </div>
            </div>
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
        <div class="flex items-center justify-between">
            <button type="button" class="group w-7 h-7 flex items-center justify-center rounded-lg bg-neutral-100 border cursor-pointer border-neutral-300 hover:border-red-500 hover:bg-red-100 transition">
                <img src="<?php echo e(asset('assets/icons/delete-bin-line.svg')); ?>" alt="" class="block group-hover:hidden">
                <img src="<?php echo e(asset('assets/icons/delete-bin-line-h.svg')); ?>" alt="" class="hidden group-hover:block">
            </button>
        </div>
    </div>

    
    <div class="hidden md:grid grid-cols-[2fr_1fr_1fr_1fr_2rem] flex-1 items-center">
        <div class="flex items-center gap-3">
            <div class="flex-1 max-w-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
                <img src="<?php echo e(asset($product->images->first()->image_path ?? 'assets/images/placeholder.png')); ?>" alt="<?php echo e($product->name); ?>" class="object-contain">
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-[16px] font-bold text-neutral-800"><?php echo e($product->name); ?></p>
                <div class="flex w-fit items-center gap-1 text-xs font-semibold text-teal-500 bg-teal-100 rounded-full whitespace-nowrap pl-1 pr-2 py-1">
                    <img src="<?php echo e(asset('assets/icons/box.svg')); ?>" class="w-3 h-3 object-contain">
                    <span class="leading-none"><?php echo e($product->product_type); ?></span>
                </div>
            </div>
        </div>
        <p class="text-sm text-neutral-500 text-center">
            <?php echo e($product->variants->first()->variant_name ?? '-'); ?>:
            <?php echo e(implode(', ', json_decode($product->variants->first()->variant_values ?? '[]', true))); ?>

        </p>
        <div class="text-center">
            <p class="text-[10px] text-neutral-400">-</p>
            <p class="text-sm text-neutral-500 line-through">Rp<?php echo e(number_format($product->selling_price, 0, ',', '.')); ?></p>
            <p class="text-lg font-semibold text-primary-500">Rp<?php echo e(number_format($price, 0, ',', '.')); ?></p>
        </div>
        <div class="flex justify-center">
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
        <button type="button" class="group w-7 h-7 flex items-center justify-center rounded-lg bg-neutral-100 border cursor-pointer border-neutral-300 hover:border-red-500 hover:bg-red-100 transition">
            <img src="<?php echo e(asset('assets/icons/delete-bin-line.svg')); ?>" alt="" class="block group-hover:hidden">
            <img src="<?php echo e(asset('assets/icons/delete-bin-line-h.svg')); ?>" alt="" class="hidden group-hover:block">
        </button>
    </div>

</div><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/cart-item.blade.php ENDPATH**/ ?>