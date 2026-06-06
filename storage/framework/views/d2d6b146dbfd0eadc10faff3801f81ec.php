<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['product', 'qty' => 1, 'variantId' => null]));

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

foreach (array_filter((['product', 'qty' => 1, 'variantId' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $finalPrice = $product->selling_price - ($product->selling_price * $product->discount / 100);
?>

<div class="checkout-item flex items-center bg-neutral-50 rounded-xl pl-3 py-3 pr-6 gap-3"
     data-price="<?php echo e($finalPrice); ?>"
     data-qty="<?php echo e($qty); ?>"
     data-product-id="<?php echo e($product->id); ?>">
    <div class="flex-1 max-w-40 max-h-40 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
        <img src="<?php echo e($product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('assets/images/placeholder.png')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-contain">
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-bold text-neutral-800 truncate"><?php echo e($product->name); ?></p>
        <p class="text-xs text-neutral-400">
            Variasi: <?php echo e(optional($product->variants->firstWhere('id', $variantId))->variant_value ?? '-'); ?>

        </p>
        <p class="text-xs text-neutral-400 qty-label">Jumlah: <?php echo e($qty); ?></p>
    </div>
    <div class="flex flex-col items-end gap-2 shrink-0">
        <p class="item-total text-sm font-bold text-neutral-800">
            Rp<?php echo e(number_format($finalPrice * $qty, 0, ',', '.')); ?>

        </p>
        <?php if (isset($component)) { $__componentOriginal6014e2372eca4dd8cb8da8101fa224e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6014e2372eca4dd8cb8da8101fa224e5 = $attributes; } ?>
<?php $component = App\View\Components\Client\Quantity::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.quantity'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\Quantity::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['qty' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($qty)]); ?>
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
</div><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/checkout-item.blade.php ENDPATH**/ ?>