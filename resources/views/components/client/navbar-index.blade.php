<nav class="flex flex-col shadow-md gap-2 px-2 sm:px-5 py-2 fixed bg-white w-full box-border z-50">
    <div class="flex gap-2">
        {{-- navbar-logo --}}
        <div class="hidden md:flex">
            <img src="{{ asset('assets/icons/logo-rekaps-text.svg') }}" width="180px" alt="">
        </div>
        {{-- navbar-searchbar --}}
        <div class="flex md:flex-6 justify-start sm:justify-end items-center flex-2">
            <form action="#" method="GET" class=" flex w-full h-[40px] bg-gray-200 items-center px-2 py-2 rounded-lg gap-2">
                <button type="submit" class="cursor-pointer">
                    <img src="{{ asset('assets/icons/search-line.svg') }}" alt="">
                </button>
                <input type="text" name="search" id="search" placeholder="Cari di Rekaps Store" class="outline-none w-full text-[12px]">
            </form>
        </div>
        {{-- navbar-menu --}}
        <div class="flex flex-1 justify-end sm:justify-center items-center gap-1">
            <div class="w-[40px] h-[40px] cartbox p-2 bg-gray-200 rounded-lg sm:rounded-xl hover:bg-[#7d39eb] cursor-pointer">
                <img class="cart cursor-pointer" src="{{ asset('assets/icons/cart-line.svg') }}" alt="">
            </div>
            <div class="w-[40px] h-[40px] historybox block md:hidden p-2 bg-gray-200 rounded-lg sm:rounded-xl hover:bg-[#7d39eb] cursor-pointer">
                <img class="history cursor-pointer" src="{{ asset('assets/icons/history-home.svg') }}" alt="">
            </div>
            <div class="w-[40px] h-[40px] accountbox block md:hidden p-2 bg-gray-200 rounded-lg sm:rounded-xl cursor-pointer">
                <img class="account cursor-pointer" src="{{ asset('assets/icons/user-anonymous.svg') }}" alt="">
            </div>
        </div>
        {{-- navbar-auth --}}
        <div class="flex-1 gap-2 justify-end items-center hidden sm:flex">
            <a href="/login" class="border-2 font-semibold text-[#7d39eb] border-[#7d39eb] pb-1 pt-0.5 px-5 rounded-xl transition delay-150 duration-300 ease-in-out hover:bg-purple-100">Login</a>
            <a href="/register" class="border-2 font-semibold bg-[#7d39eb] text-white border-[#7d39eb] pb-1 pt-0.5 px-5 rounded-xl transition delay-150 duration-300 ease-in-out hover:bg-purple-800">Register</a>
        </div>
    </div>
    <div class="flex items-center sm:hidden">
        <span class="flex-1 text-[9px] text-[#737373]">Masuk dulu yuk sebelum eksplor!</span>
        <div class="flex-1 flex justify-end gap-1">
            <a class="text-[10px] border-2 rounded-lg border-[#7d39eb] px-3 text-[#7d39eb] font-medium pb-1 pt-0.5 hover:bg-[#f2ebfd]" href="/login">Login</a>
            <a class="text-[10px] border-2 rounded-lg bg-[#7d39eb] border-[#7d39eb] px-3 text-[#fafafa] font-medium pb-1 pt-0.5 hover:bg-[#7234d6]" href="/login">Register</a>
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