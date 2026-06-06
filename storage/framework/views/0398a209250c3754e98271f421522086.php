<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'search',
    'title' => ''
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
    'variant' => 'search',
    'title' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<nav class="shadow-md px-2 sm:px-5 py-2 fixed bg-neutral-50 w-full box-border z-50">

    
    
    
    <?php if($variant === 'page'): ?>

        <div class="flex sm:hidden items-center justify-between gap-3">

            
            <div class="flex items-center gap-3">
                <a href="<?php echo e(url()->previous()); ?>" class="flex items-center justify-center">
                    <img src="<?php echo e(asset('assets/icons/back-big.svg')); ?>" alt="">
                </a>
                <h1 class="font-semibold leading-4 text-sm text-neutral-700"> <?php echo e($title); ?> </h1>
            </div>

            
            <div class="flex flex-1 justify-end items-center gap-1.5">

                <a href="#" class="searchbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="search" src="<?php echo e(asset('assets/icons/search-line.svg')); ?>" alt="">
                </a>

                <a href="#" class="historybox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="history" src="<?php echo e(asset('assets/icons/history-home.svg')); ?>" alt="">
                </a>

                <a href="#" class="notifbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                    <img class="notif" src="<?php echo e(asset('assets/icons/bell-nav.svg')); ?>" alt="">
                </a>

                <a href="#" class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium flex items-center justify-center bg-teal-600 rounded-lg">
                    <span>GA</span>
                </a>

            </div>

        </div>

    <?php endif; ?>

    
    
    
    <div class="<?php echo e($variant === 'page' ? 'hidden sm:flex' : 'flex'); ?> gap-2">

        
        <div class="hidden md:flex">
            <img src="<?php echo e(asset('assets/icons/logo-rekaps-text.svg')); ?>" width="180px" alt="">
        </div>

        
        <div class="flex flex-2 md:flex-6 justify-start sm:justify-end items-center">

            <form action="#" method="GET" class="h-[40px] flex w-full bg-neutral-200 items-center px-2 py-2 rounded-lg gap-2">

                <button type="submit">
                    <img src="<?php echo e(asset('assets/icons/search-line.svg')); ?>" alt="">
                </button>

                <input type="text" placeholder="Cari di Rekaps Store" class="outline-none w-full text-[12px] bg-transparent">

            </form>

        </div>

        
        <div class="flex flex-1 justify-end items-center gap-1.5">

            <a href="/cart" class="cartbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="cart" src="<?php echo e(asset('assets/icons/cart-line.svg')); ?>" alt="">
            </a>

            <a href="#" class="historybox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="history" src="<?php echo e(asset('assets/icons/history-home.svg')); ?>" alt="">
            </a>

            <a href="#" class="notifbox w-[40px] h-[40px] flex items-center justify-center bg-neutral-200 rounded-lg hover:bg-primary-500 transition-all duration-300 ease-in-out cursor-pointer">
                <img class="notif" src="<?php echo e(asset('assets/icons/bell-nav.svg')); ?>" alt="">
            </a>

            <a href="#" class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium flex items-center justify-center bg-teal-600 rounded-lg">
                <span>GA</span>
            </a>

        </div>

    </div>

</nav>
<script>
    // CART
    document.querySelectorAll('.cartbox').forEach((box) => {
        const icon = box.querySelector('.cart');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/cart-lw.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/cart-line.svg';
            }, 200);
        });
    });

    // HISTORY
    document.querySelectorAll('.historybox').forEach((box) => {
        const icon = box.querySelector('.history');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/history-home-lw.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/history-home.svg';
            }, 200);
        });
    });

    // NOTIFICATION
    document.querySelectorAll('.notifbox').forEach((box) => {
        const icon = box.querySelector('.notif');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/bell-nav-h.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/bell-nav.svg';
            }, 200);
        });
    });

    // ACCOUNT
    document.querySelectorAll('.accountbox').forEach((box) => {
        const icon = box.querySelector('.account');

        box.addEventListener('mouseenter', () => {
            icon.src = '/assets/icons/user-anonymous-lw.svg';
        });

        box.addEventListener('mouseleave', () => {
            setTimeout(() => {
                icon.src = '/assets/icons/user-anonymous.svg';
            }, 200);
        });
    });
</script><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/components/client/navbar-main.blade.php ENDPATH**/ ?>