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
<body class="bg-primary-50">
    <?php if (isset($component)) { $__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0 = $attributes; } ?>
<?php $component = App\View\Components\Client\NavbarMain::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client.navbar-main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client\NavbarMain::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0)): ?>
<?php $attributes = $__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0; ?>
<?php unset($__attributesOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0)): ?>
<?php $component = $__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0; ?>
<?php unset($__componentOriginal0b5b5b32a850d68bbeb0c17e6bab1ca0); ?>
<?php endif; ?>
    <main class="pt-14 sm:pt-19 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 h-full flex flex-col">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html><?php /**PATH C:\Users\x395\OneDrive\Desktop\RekapsStoreFinal\RekapsStore\resources\views/components/client/layout.blade.php ENDPATH**/ ?>