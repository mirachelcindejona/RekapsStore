<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => '',
    'selectClass' => 'cart-item'
]));

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

foreach (array_filter(([
    'variant' => '',
    'selectClass' => 'cart-item'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if($variant == 'selectAll'): ?>
    <input type="checkbox" id="selectAll" class="w-4 h-4 accent-primary-500 rounded cursor-pointer" onchange="toggleAll(this)">
<?php elseif($variant == 'select'): ?>
    <input type="checkbox" class="<?php echo e($selectClass); ?> w-4 h-4 accent-primary-500 rounded cursor-pointer" onchange="syncSelectAll()">
<?php endif; ?>

<?php if (! $__env->hasRenderedOnce('a74a958f-009c-459e-9a1b-ca18d6d2c0b4')): $__env->markAsRenderedOnce('a74a958f-009c-459e-9a1b-ca18d6d2c0b4'); ?>
<script>
function toggleAll(source) {
    document.querySelectorAll('.cart-item').forEach(cb => cb.checked = source.checked);
    updateTotal();
}

function syncSelectAll() {
    const items = document.querySelectorAll('.cart-item');
    document.getElementById('selectAll').checked = Array.from(items).every(cb => cb.checked);
}
</script>
<?php endif; ?><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/select.blade.php ENDPATH**/ ?>