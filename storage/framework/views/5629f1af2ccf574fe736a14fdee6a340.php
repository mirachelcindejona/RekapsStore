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
<?php $component->withAttributes(['variant' => 'search']); ?> <?php echo $__env->renderComponent(); ?>
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
    
    <div class="hidden sm:flex"> 
        <?php if (isset($component)) { $__componentOriginala2dbae8b397db074762fae62c1a64ff6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala2dbae8b397db074762fae62c1a64ff6 = $attributes; } ?>
<?php $component = App\View\Components\Client\Carousel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala2dbae8b397db074762fae62c1a64ff6)): ?>
<?php $attributes = $__attributesOriginala2dbae8b397db074762fae62c1a64ff6; ?>
<?php unset($__attributesOriginala2dbae8b397db074762fae62c1a64ff6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala2dbae8b397db074762fae62c1a64ff6)): ?>
<?php $component = $__componentOriginala2dbae8b397db074762fae62c1a64ff6; ?>
<?php unset($__componentOriginala2dbae8b397db074762fae62c1a64ff6); ?>
<?php endif; ?>
    </div>
    
    <?php if (isset($component)) { $__componentOriginal3bf700ddcba76fe73d824a6d42a473cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bf700ddcba76fe73d824a6d42a473cc = $attributes; } ?>
<?php $component = App\View\Components\Client\CategoryFilter::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.category-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\CategoryFilter::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bf700ddcba76fe73d824a6d42a473cc)): ?>
<?php $attributes = $__attributesOriginal3bf700ddcba76fe73d824a6d42a473cc; ?>
<?php unset($__attributesOriginal3bf700ddcba76fe73d824a6d42a473cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf700ddcba76fe73d824a6d42a473cc)): ?>
<?php $component = $__componentOriginal3bf700ddcba76fe73d824a6d42a473cc; ?>
<?php unset($__componentOriginal3bf700ddcba76fe73d824a6d42a473cc); ?>
<?php endif; ?>
    
    <div class="product-grid grid grid-cols-2 min-[480px]:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 items-stretch">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal21690eb69dd50c2fa7753000ec364b19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal21690eb69dd50c2fa7753000ec364b19 = $attributes; } ?>
<?php $component = App\View\Components\Client\ProductCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\ProductCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('product-detail', $product->id)),'discount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->discount),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->images->first()->image_path ?? 'assets/images/placeholder.png'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->name),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->selling_price),'rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->reviews->avg('rating') ?? 0),'reviews' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->reviews->count()),'category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->category->name ?? '-')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal21690eb69dd50c2fa7753000ec364b19)): ?>
<?php $attributes = $__attributesOriginal21690eb69dd50c2fa7753000ec364b19; ?>
<?php unset($__attributesOriginal21690eb69dd50c2fa7753000ec364b19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21690eb69dd50c2fa7753000ec364b19)): ?>
<?php $component = $__componentOriginal21690eb69dd50c2fa7753000ec364b19; ?>
<?php unset($__componentOriginal21690eb69dd50c2fa7753000ec364b19); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.client.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/home.blade.php ENDPATH**/ ?>