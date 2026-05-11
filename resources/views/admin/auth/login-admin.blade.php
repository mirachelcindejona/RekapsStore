<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekaps Store Login Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-[#171717] text-[#fafafa] overflow-x-hidden">

    <div class="flex min-h-screen w-full flex-col lg:flex-row">
        
        <div class="flex w-full flex-col p-8 lg:w-[40%] lg:p-12">
            <div class="mb-14 lg:mb-[60px]">
                <img src="{{ asset('assets/icons/rekaps-store-logo.svg') }}" alt="logo" class="w-auto h-12">
            </div>

            <div class="w-full max-w-sm self-start lg:max-w-[320px]">
                <h1 class="mb-6 text-4xl font-extrabold tracking-tighter lg:text-[40px]">
                    LOGIN <span class="text-[#c6ff33]">ADMIN</span>
                </h1>

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">Username</label>
                        <input 
                            type="text" 
                            name="username"
                            placeholder="Username" 
                            required
                            class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium text-[#fafafa]">Password</label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password"
                                placeholder="Password" 
                                required
                                class="w-full rounded-lg border border-[#7d39eb] bg-[#fafafa] px-3 py-3 text-[#171717] outline-none transition-all focus:border-[#d7c2f9]"
                            >
                            <span class="absolute right-3 top-3 cursor-pointer text-gray-400">
                                </span>
                        </div>
                    </div>

                    <a href="#" class="mb-5 block text-right text-sm font-bold text-[#c6ff33] hover:underline transition-all">
                        Lupa Password?
                    </a>

                    <button type="submit" class="w-full rounded-lg bg-[#7d39eb] py-3 font-semibold text-[#fafafa] transition-all duration-300 hover:-translate-y-0.5 hover:opacity-90 active:scale-95">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <div class="hidden w-[60%] bg-[#7d39eb] lg:flex items-center justify-center [clip-path:polygon(20%_0,100%_0,100%_100%,0%_100%)]">
            <div class="max-w-[450px] px-12 text-left">
                <h1 class="text-5xl font-extrabold leading-[1.2] text-[#fafafa]">
                    WELCOME TO<br>
                    <span class="text-[#c6ff33]">REKAPS</span> STORE
                </h1>
                <p class="mt-4 text-center text-sm font-bold text-[#fafafa]">
                    Berkarya, berkolaborasi, dan berkembang bersama
                </p>
            </div>
        </div>

    </div>

</body>
</html>