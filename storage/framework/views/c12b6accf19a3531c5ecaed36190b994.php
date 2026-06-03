<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> — Rekaps Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carattere&family=Montserrat:wght@100..900&display=swap"
        rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="font-['Montserrat',sans-serif] bg-neutral-50 text-neutral-950 min-h-dvh overflow-x-hidden">
    <div class="flex min-h-dvh">
        <?php if (isset($component)) { $__componentOriginal328ebe7f743fb78c55a303c914bda3ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal328ebe7f743fb78c55a303c914bda3ba = $attributes; } ?>
<?php $component = App\View\Components\Admin\SidebarAdmin::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sidebar-admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Admin\SidebarAdmin::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal328ebe7f743fb78c55a303c914bda3ba)): ?>
<?php $attributes = $__attributesOriginal328ebe7f743fb78c55a303c914bda3ba; ?>
<?php unset($__attributesOriginal328ebe7f743fb78c55a303c914bda3ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal328ebe7f743fb78c55a303c914bda3ba)): ?>
<?php $component = $__componentOriginal328ebe7f743fb78c55a303c914bda3ba; ?>
<?php unset($__componentOriginal328ebe7f743fb78c55a303c914bda3ba); ?>
<?php endif; ?>

        <div
            class="flex-1 flex flex-col bg-primary-50 min-h-dvh min-w-0 min-[900px]:ml-[270px] w-full max-[900px]:max-w-[100vw]">

            <?php if (isset($component)) { $__componentOriginal1cb77c2992acc64d9cbe0bb454d47428 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cb77c2992acc64d9cbe0bb454d47428 = $attributes; } ?>
<?php $component = App\View\Components\Admin\NavbarAdmin::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.navbar-admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Admin\NavbarAdmin::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1cb77c2992acc64d9cbe0bb454d47428)): ?>
<?php $attributes = $__attributesOriginal1cb77c2992acc64d9cbe0bb454d47428; ?>
<?php unset($__attributesOriginal1cb77c2992acc64d9cbe0bb454d47428); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1cb77c2992acc64d9cbe0bb454d47428)): ?>
<?php $component = $__componentOriginal1cb77c2992acc64d9cbe0bb454d47428; ?>
<?php unset($__componentOriginal1cb77c2992acc64d9cbe0bb454d47428); ?>
<?php endif; ?>

            <main class="flex-1 p-[14px] min-[560px]:p-[30px] min-w-0 max-w-full">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    <div id="sidebarOverlay" onclick="closeSidebar()" class="hidden fixed inset-0 bg-black/45 z-[99]"></div>

    <?php echo $__env->yieldContent('footer'); ?>

    <script>
        /* ---- Sidebar Toggle ---- */
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("open");
            document.getElementById("sidebarOverlay").classList.toggle("show");
        }

        function closeSidebar() {
            document.getElementById("sidebar").classList.remove("open");
            document.getElementById("sidebarOverlay").classList.remove("show");
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.add('hidden');
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\RekapsStore\resources\views/admin/layouts/layout.blade.php ENDPATH**/ ?>