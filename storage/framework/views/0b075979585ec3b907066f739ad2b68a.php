<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="icon" href="<?php echo e(asset('assets/icons/logo-rekaps.svg')); ?>">
    <title>Rekaps Store</title>
</head>
<body class="bg-primary-50 font-sans min-h-screen flex flex-col gap-10">
    
    <?php if (isset($component)) { $__componentOriginal5726d076a0da0eeb1697fbdaeaba9455 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5726d076a0da0eeb1697fbdaeaba9455 = $attributes; } ?>
<?php $component = App\View\Components\Client\NavbarIndex::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.navbar-index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\NavbarIndex::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5726d076a0da0eeb1697fbdaeaba9455)): ?>
<?php $attributes = $__attributesOriginal5726d076a0da0eeb1697fbdaeaba9455; ?>
<?php unset($__attributesOriginal5726d076a0da0eeb1697fbdaeaba9455); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5726d076a0da0eeb1697fbdaeaba9455)): ?>
<?php $component = $__componentOriginal5726d076a0da0eeb1697fbdaeaba9455; ?>
<?php unset($__componentOriginal5726d076a0da0eeb1697fbdaeaba9455); ?>
<?php endif; ?>
    
    <main class="pt-23 sm:pt-19 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 h-full">
        
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
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-2 items-stretch">
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
<?php $component->withAttributes(['link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('login')),'discount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['discount']),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['image']),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['name']),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['price']),'rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['rating']),'reviews' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['reviews']),'category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product['category'])]); ?>
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
    </main>
    <?php if (isset($component)) { $__componentOriginal3b4558293c8dc3f33d2069df2429bfc7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7 = $attributes; } ?>
<?php $component = App\View\Components\Client\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\Footer::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7)): ?>
<?php $attributes = $__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7; ?>
<?php unset($__attributesOriginal3b4558293c8dc3f33d2069df2429bfc7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b4558293c8dc3f33d2069df2429bfc7)): ?>
<?php $component = $__componentOriginal3b4558293c8dc3f33d2069df2429bfc7; ?>
<?php unset($__componentOriginal3b4558293c8dc3f33d2069df2429bfc7); ?>
<?php endif; ?>
</body>
</html><?php /**PATH C:\Users\x395\OneDrive\Desktop\rekapsstorefinal\RekapsStore\resources\views/index.blade.php ENDPATH**/ ?>