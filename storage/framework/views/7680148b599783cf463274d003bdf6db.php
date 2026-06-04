<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekaps Store — Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-[#171717] text-[#fafafa] overflow-x-hidden">

    <div class="flex min-h-screen w-full flex-col lg:flex-row">

        <div class="flex w-full flex-col p-8 lg:w-[40%] lg:p-12">
            <div class="mb-14 lg:mb-[60px]">
                <img src="<?php echo e(asset('assets/icons/rekaps-store-logo.svg')); ?>" alt="logo" class="w-auto h-12">
            </div>

            <div class="w-full max-w-sm self-start lg:max-w-[320px]">
                <h1 class="mb-6 text-4xl font-extrabold tracking-tighter">
                    LOGIN
                </h1>

                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">Username</label>
                        <input type="text" name="username" placeholder="Username" required
                            class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                            oninvalid="this.setCustomValidity('Username tidak boleh kosong')"
                            oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">Password</label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="Password" required
                                class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                                oninvalid="this.setCustomValidity('Password tidak boleh kosong')"
                                oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    <a href="#"
                        class="mb-5 block text-right text-sm font-bold text-[#c6ff33] hover:underline transition-all">
                        Lupa Password?
                    </a>

                    <button type="submit"
                        class="w-full rounded-lg bg-[#7d39eb] py-3 font-semibold text-[#fafafa] transition-all duration-300 hover:-translate-y-0.5 hover:opacity-90 active:scale-95 shadow-[0_4px_10px_rgba(125,57,235,0.3)]">
                        Login
                    </button>

                    <p class="mt-6 text-center text-sm">
                        Belum punya akun?
                        <a href="<?php echo e(route('register')); ?>"
                            class="font-bold text-[#c6ff33] hover:underline transition-all">Register</a>
                    </p>
                </form>
            </div>
        </div>

        <div
            class="hidden w-[60%] bg-[#7d39eb] lg:flex items-center justify-center [clip-path:polygon(20%_0,100%_0,100%_100%,0%_100%)] p-12">
            <div class="max-w-[450px] w-full flex flex-col items-start justify-center">
                <h1 class="text-5xl font-extrabold leading-[1.2] text-[#fafafa] uppercase tracking-tighter">
                    WELCOME TO<br>
                    <span class="text-[#c6ff33]">REKAPS</span> STORE
                </h1>
                <p class="mt-4 text-left text-sm font-bold text-[#fafafa]">
                    Berkarya, berkolaborasi, dan berkembang bersama
                </p>
            </div>
        </div>

    </div>

</body>

</html>
<?php /**PATH C:\Users\x395\OneDrive\Desktop\RekapsStoreFinal\RekapsStore\resources\views/auth/login.blade.php ENDPATH**/ ?>