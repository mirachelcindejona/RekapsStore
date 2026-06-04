<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name' => '',
    'desc' => '',
    'off' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
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
    'name' => '',
    'desc' => '',
    'off' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<label class="voucher-label flex items-center justify-between rounded-xl px-3 py-2 cursor-pointer transition
    <?php echo e($disabled ? 'border border-neutral-200 bg-neutral-100 opacity-60 cursor-not-allowed' : 'border border-primary-300 bg-primary-50'); ?>">
    <div class="flex flex-col">
        <div class="flex gap-2">
            <img src="<?php echo e(asset('assets/icons/tag.svg')); ?>" class="w-4 h-4 <?php echo e($disabled ? 'grayscale' : ''); ?>">
            <p class="text-xs font-bold voucher-text <?php echo e($disabled ? 'text-neutral-400' : 'text-primary-300'); ?>"><?php echo e($name); ?></p>
        </div>
        <div>
            <p class="text-[10px] voucher-text <?php echo e($disabled ? 'text-neutral-400' : 'text-primary-300'); ?>"><?php echo e($desc); ?></p>
            <p class="text-sm font-extrabold voucher-text <?php echo e($disabled ? 'text-neutral-400' : 'text-primary-300'); ?>"><?php echo e($off); ?></p>
        </div>
    </div>
    <input type="radio" name="voucher" value="<?php echo e($value); ?>"
        class="w-4 h-4 accent-white cursor-pointer"
        <?php echo e($checked ? 'checked' : ''); ?>

        <?php echo e($disabled ? 'disabled' : ''); ?>

        <?php if(!$disabled): ?> onchange="selectVoucher(this)" <?php endif; ?>>
</label>

<?php if (! $__env->hasRenderedOnce('a9b8e3bd-0839-4da2-868d-8ae1a11eb333')): $__env->markAsRenderedOnce('a9b8e3bd-0839-4da2-868d-8ae1a11eb333'); ?>
<script>
function selectVoucher(radio) {
    document.querySelectorAll('.voucher-label').forEach(label => {
        label.classList.remove('bg-primary-500', 'border-primary-500');
        label.classList.add('bg-primary-50', 'border-primary-300');
        label.querySelectorAll('.voucher-text').forEach(t => {
            t.classList.remove('text-white');
            t.classList.add('text-primary-300');
        });
    });

    const label = radio.closest('.voucher-label');
    label.classList.remove('bg-primary-50', 'border-primary-300');
    label.classList.add('bg-primary-500', 'border-primary-500');
    label.querySelectorAll('.voucher-text').forEach(t => {
        t.classList.remove('text-primary-300');
        t.classList.add('text-white');
    });
}
</script>
<?php endif; ?><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/voucher-item.blade.php ENDPATH**/ ?>