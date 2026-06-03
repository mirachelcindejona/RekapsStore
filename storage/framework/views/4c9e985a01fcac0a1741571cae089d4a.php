<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekaps Store — Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-[#171717] text-[#fafafa] overflow-x-hidden">

    <div class="flex min-h-screen w-full flex-col lg:flex-row">
        
        <div class="hidden lg:flex relative w-[60%] bg-[#7d39eb] items-center justify-start p-12 [clip-path:polygon(0_0,70%_0,100%_100%,0%_100%)]">
            <div class="absolute top-12 left-11">
                <img src="<?php echo e(asset('assets/icons/rekaps-store-logo.svg')); ?>" alt="logo" class="h-12 w-auto">
            </div>

            <div class="max-w-[450px] text-left">
                <h1 class="text-5xl font-extrabold leading-[1.2] text-[#fafafa]">
                    WELCOME TO<br>
                    <span class="text-[#c6ff33]">REKAPS</span> STORE
                </h1>
                <p class="mt-4 text-center text-sm font-bold text-[#fafafa]">
                    Berkarya, berkolaborasi, dan berkembang bersama
                </p>
            </div>
        </div>

        <div class="flex w-full flex-col justify-center p-8 lg:w-[40%] lg:p-12">
            <div class="w-full max-w-sm self-center lg:max-w-[320px] lg:self-start">
                <h1 class="mb-6 text-4xl font-extrabold tracking-tighter">
                    REGISTER
                </h1>

                <form action="<?php echo e(route('register')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">Username</label>
                        <input 
                            type="text" 
                            name="name"
                            placeholder="Username" 
                            required
                            class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                            oninvalid="this.setCustomValidity('Username tidak boleh kosong')"
                            oninput="this.setCustomValidity('')"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium text-[#fafafa]">Email</label>
                        <input 
                            type="email" 
                            name="email"
                            placeholder="Email" 
                            required
                            class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                            oninvalid="this.setCustomValidity('Masukkan email dengan benar')"
                            oninput="this.setCustomValidity('')"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">Password</label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password"
                                placeholder="Password" 
                                required
                                class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                                oninvalid="this.setCustomValidity('Password tidak boleh kosong')"
                                oninput="this.setCustomValidity('')"
                            >
                        </div>
                    </div>

                    <button type="submit" class="w-full rounded-lg bg-[#7d39eb] py-3 font-semibold text-[#fafafa] transition-all duration-300 hover:-translate-y-0.5 hover:opacity-90 active:scale-95 shadow-[0_4px_10px_rgba(125,57,235,0.3)] mt-2">
                        Register
                    </button>

                    <p class="mt-6 text-center text-sm text-gray-400">
                        Sudah punya akun? 
                        <a href="<?php echo e(route('login')); ?>" class="font-bold text-[#c6ff33] hover:underline transition-all">Login</a>
                    </p>
                </form>
            </div>
        </div>

    </div>

</body>
</html><?php /**PATH C:\Users\x395\OneDrive\Desktop\RekapsStoreFinal\RekapsStore\resources\views/auth/register.blade.php ENDPATH**/ ?>