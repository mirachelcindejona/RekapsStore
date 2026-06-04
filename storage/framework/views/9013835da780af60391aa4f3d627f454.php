<nav class="flex flex-col shadow-md gap-2 px-2 sm:px-5 py-2 fixed bg-neutral-50 w-full box-border z-50">
    <div class="flex gap-2">
        
        <div class="hidden md:flex">
            <img src="<?php echo e(asset('assets/icons/logo-rekaps-text.svg')); ?>" width="180px" alt="">
        </div>
        
        <div class="flex flex-2 md:flex-6 justify-start sm:justify-end items-center flex-2">
            <form action="#" method="GET" class="h-[40px] flex w-full bg-neutral-200 items-center px-2 py-2 rounded-lg gap-2">
                <button type="submit" class="cursor-pointer">
                    <img src="<?php echo e(asset('assets/icons/search-line.svg')); ?>" alt="">
                </button>
                <input type="text" name="search" id="search" placeholder="Cari di Rekaps Store" class="outline-none w-full text-[12px]">
            </form>
        </div>
        
        <div class="flex flex-1 md:flex-1 justify-end items-center gap-1.5">
            <div class="w-[40px] h-[40px] flex cartbox p-2 items-center justify-center bg-neutral-200 rounded-lg sm:rounded-xl hover:bg-primary-500 cursor-pointer">
                <img class="cart cursor-pointer" src="<?php echo e(asset('assets/icons/cart-line.svg')); ?>" alt="">
            </div>
            <div class="w-[40px] h-[40px] historybox flex p-2 items-center justify-center bg-neutral-200 rounded-lg sm:rounded-xl hover:bg-primary-500 cursor-pointer">
                <img class="history cursor-pointer" src="<?php echo e(asset('assets/icons/history-home.svg')); ?>" alt="">
            </div>
            <div class="w-[40px] h-[40px] notifbox flex p-2 items-center justify-center bg-neutral-200 rounded-lg sm:rounded-xl hover:bg-primary-500 cursor-pointer">
                <img class="notif cursor-pointer" src="<?php echo e(asset('assets/icons/bell-nav.svg')); ?>" alt="">
            </div>
            <div class="text-neutral-50 w-[40px] h-[40px] text-sm font-medium historybox flex p-2 items-center justify-center bg-teal-600 rounded-lg sm:rounded-xl cursor-pointer">
                <span>GA</span>
            </div>
        </div>
    </div>
</nav>
<script>
    const cartbox = document.querySelector('.cartbox');
    const cart = document.querySelector('.cart');

    cartbox.addEventListener('mouseenter', () => {
        cart.src = 'assets/icons/cart-lw.svg';
        cart.style.cursor = 'pointer';
    });

    cartbox.addEventListener('mouseleave', () => {
        cart.src = 'assets/icons/cart-line.svg';
    });

    const historybox = document.querySelector('.historybox');
    const history = document.querySelector('.history');

    historybox.addEventListener('mouseenter', () => {
        history.src = 'assets/icons/history-home-lw.svg';
        history.style.cursor = 'pointer';
    });

    historybox.addEventListener('mouseleave', () => {
        history.src = 'assets/icons/history-home.svg';
    });

    const historybox = document.querySelector('.historybox');
    const history = document.querySelector('.history');

    notifbox.addEventListener('mouseenter', () => {
        notif.src = 'assets/icons/bell-nav-h.svg';
        notif.style.cursor = 'pointer';
    });

    notifbox.addEventListener('mouseleave', () => {
        notif.src = 'assets/icons/bell-nav.svg';
    });
</script>
<?php /**PATH C:\Users\x395\OneDrive\Desktop\RekapsStoreFinal\RekapsStore\resources\views/components/client/navbar-main.blade.php ENDPATH**/ ?>