<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="icon" href="<?php echo e(asset('assets/icons/logo-rekaps.svg')); ?>">
    <title>Rekaps Store</title>
</head>
<body class="bg-primary-50 font-sans min-h-screen flex flex-col gap-10">
    <?php echo $__env->yieldContent('navbar'); ?>
    <main class="pt-24 sm:pt-16 max-w-7xl mx-auto px-2 flex-1 w-full flex flex-col gap-2">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/layout-index.blade.php ENDPATH**/ ?>