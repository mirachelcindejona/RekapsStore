<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'link',
    'discount',
    'image',
    'name',
    'price',
    'rating',
    'reviews',
    'category'
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
    'link',
    'discount',
    'image',
    'name',
    'price',
    'rating',
    'reviews',
    'category'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<a href="<?php echo e($link); ?>" data-category="<?php echo e($category); ?>" class="product-card flex h-full bg-neutral-50 border border-neutral-200 rounded-[12px] hover:border-neutral-300 hover:cursor-pointer flex-col overflow-hidden transition-all duration-300">

  
  <div class="discountframe flex bg-neutral-50 justify-end h-[20px]">
    <?php if($discount > 0): ?>
    <div class="discount bg-secondary-500 px-2 py-1 text-neutral-950 rounded-bl-[6px] flex items-center gap-1">
      <img src="<?php echo e(asset('assets/icons/discount.svg')); ?>" class="w-4 sm:w-5" />
      <span class="disctxt text-[12px] sm:text-md font-semibold">-<?php echo e($discount); ?>%</span>
    </div>
    <?php endif; ?>
  </div>

  
  <div class="imgcont bg-neutral-100 aspect-square w-full flex items-center justify-center overflow-hidden">
      <img src="<?php echo e(asset($image)); ?>" class="productimg w-full h-full object-contain" />
  </div>

  
  <div class="productdetails flex flex-col p-2 flex-1 min-[480px]:gap-1">

    
    <span class="name line-clamp-1 text-sm xl:text-[17px] lg:text-[15px] font-semibold"><?php echo e($name); ?></span>

    
    <div class="flex flex-col">
      <?php if($discount > 0): ?>
      <span class="price font-medium text-[12px] md:text-[15px] text-neutral-500 line-through">Rp<?php echo e(number_format($price, 0, ',', '.')); ?></span>
      <?php endif; ?>
      <span class="price font-bold text-[14px] sm:text-lg text-primary-500">Rp<?php echo e(number_format($price - ($price * $discount / 100), 0, ',', '.')); ?></span>
    </div>

    
    <div class="rating flex gap-1 items-center text-neutral-600 text-sm">
      <img src="<?php echo e(asset('assets/icons/star.svg')); ?>" class="star w-4" />
      <span class="ratingvalue font-medium text-[12px]"><?php echo e($rating ? number_format($rating, 1) : '0.0'); ?></span>
      <span>|</span>
      <span class="reviewcount font-medium text-[12px]"><?php echo e($reviews); ?> Ulasan</span>
    </div>

  </div>
</a><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/product-card.blade.php ENDPATH**/ ?>