<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'menuIcon' => '',
    'menuIconHover' => '',
    'link' => '#'
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
    'menuIcon' => '',
    'menuIconHover' => '',
    'link' => '#'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<a href="<?php echo e($link); ?>"
   class="menu-box w-[40px] h-[40px] flex sm:hidden lg:flex justify-center items-center bg-neutral-200 rounded-lg sm:rounded-xl hover:bg-primary-500 transition-all duration-300 cursor-pointer">

    <img 
        src="<?php echo e($menuIcon); ?>"
        data-default="<?php echo e($menuIcon); ?>"
        data-hover="<?php echo e($menuIconHover); ?>"
        class="menu-icon"
        alt=""
    >
</a><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/menu.blade.php ENDPATH**/ ?>