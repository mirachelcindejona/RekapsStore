<nav class="flex flex-col shadow-md gap-2 px-2 sm:px-5 py-2 fixed bg-neutral-50 w-full box-border z-50">
    <div class="flex gap-2">
        {{-- navbar-logo --}}
        <div class="hidden flex-2 md:flex">
            <img src="{{ asset('assets/icons/logo-rekaps-text.svg') }}" width="200px" alt="">
        </div>
        {{-- navbar-searchbar --}}
        <div class="flex flex-2 sm:flex-50 md:flex-6 justify-start sm:justify-end items-center">
            <form action="/login" method="GET" class=" flex w-full h-[40px] bg-neutral-200 items-center px-2 py-2 rounded-lg gap-2">
                <button type="submit" class="cursor-pointer">
                    <img src="{{ asset('assets/icons/search-line.svg') }}" alt="">
                </button>
                <input type="text" name="search" id="search" placeholder="Cari di Rekaps Store" class="outline-none w-full text-[12px]">
            </form>
        </div>
        {{-- navbar-menu --}}
        <div class="flex flex-1 justify-end sm:justify-center items-center gap-1">
            <a href="/login" class="w-[40px] h-[40px] flex sm:hidden lg:flex  justify-center items-center cartbox bg-neutral-200 rounded-lg sm:rounded-xl hover:bg-primary-500 cursor-pointer">
                <img class="cart cursor-pointer" src="{{ asset('assets/icons/cart-line.svg') }}" alt="">
            </a>
            <a href="/login" class="w-[40px] h-[40px] flex justify-center items-center historybox sm:hidden bg-neutral-200 rounded-lg sm:rounded-xl hover:bg-primary-500 cursor-pointer">
                <img class="history cursor-pointer" src="{{ asset('assets/icons/history-home.svg') }}" alt="">
            </a>
            <a href="/login" class="w-[40px] h-[40px] flex justify-center items-center accountbox sm:hidden bg-neutral-200 rounded-lg sm:rounded-xl cursor-pointer">
                <img class="account cursor-pointer" src="{{ asset('assets/icons/user-anonymous.svg') }}" alt="">
            </a>
        </div>
        {{-- navbar-auth --}}
        <div class="flex-1 gap-1 md:gap-2 justify-end items-center hidden sm:flex">
            <a href="/login" class="border-2 text-[12px] min-[480px]:text-[13px] font-semibold text-primary-500 border-primary-500 pb-1 pt-1 px-3 md:px-5 rounded-xl transition duration-300 ease-in-out hover:bg-primary-100">Login</a>
            <a href="/register" class="border-2 text-[12px] min-[480px]:text-[13px] font-semibold bg-primary-500 text-neutral-50 border-primary-500 pb-1 pt-1 px-3 md:px-5 rounded-xl transition duration-300 ease-in-out hover:bg-primary-600">Register</a>
        </div>
    </div>
    <div class="flex items-center sm:hidden">
        <span class="flex-1 text-[9px] text-neutral-500">Masuk dulu yuk sebelum eksplor!</span>
        <div class="flex-1 flex justify-end gap-1">
            <a class="text-[10px] border-2 rounded-lg border-primary-500 px-3 text-primary-500 font-medium pb-1 pt-0.5 hover:bg-primary-50 transition duration-300 ease-in-out" href="/login">Login</a>
            <a class="text-[10px] border-2 rounded-lg bg-primary-500 border-primary-500 px-3 text-neutral-50 font-medium pb-1 pt-0.5 hover:bg-primary-600 transition duration-300 ease-in-out" href="/register">Register</a>
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
</script>