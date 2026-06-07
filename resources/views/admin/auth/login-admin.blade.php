@extends('admin.layouts.auth-layout')
@section('title', 'Login Admin')

@section('content')
    <div class="flex min-h-screen w-full flex-col lg:flex-row">
        <div class="flex w-full flex-col p-8 lg:w-[40%] lg:p-12">
            <div class="mb-14 lg:mb-[60px]">
                <img src="{{ asset('assets/icons/rekaps-store-logo.svg') }}" alt="logo" class="w-auto h-12">
            </div>
            <div class="w-full max-w-sm self-start lg:max-w-[320px]">
                <h1 class="mb-6 text-4xl font-extrabold tracking-tighter lg:text-[40px]">
                    LOGIN
                    <span class="text-secondary-500">
                        ADMIN
                    </span>
                </h1>

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    {{-- username --}}
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">
                            Username
                        </label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required
                            class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 text-neutral-950 outline-none">
                        @error('username')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    {{-- password --}}
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Password" required
                                class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 pr-12 text-neutral-950 outline-none">
                            <button type="button" class="toggle-password absolute right-4 top-1/2 -translate-y-1/2">
                                <img src="{{ asset('assets/icons/eye-line.svg') }}" class="eye-icon h-5 w-5" alt="eye">
                            </button>
                        </div>

                        @error('password')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>
                    <div class="mb-5 flex justify-end">
                        <a href="{{ route('admin.forgot.password') }}"
                            class="text-sm font-bold text-secondary-500 transition-all hover:underline">
                            Lupa Password?
                        </a>
                    </div>
                    <button type="submit" class="mt-4 w-full rounded-lg bg-primary-500 py-3 font-semibold">
                        Login
                    </button>
                </form>
            </div>
        </div>

        {{-- kanan --}}
        <div
            class="hidden w-[60%] bg-primary-500 lg:flex items-center justify-center [clip-path:polygon(20%_0,100%_0,100%_100%,0%_100%)]">
            <div class="max-w-[450px]">
                <h1 class="text-5xl font-extrabold leading-[1.2]">
                    WELCOME TO <br>
                    <span class="text-secondary-500">
                        REKAPS
                    </span>
                    STORE
                </h1>
                <p class="mt-4 text-sm font-bold">
                    Berkarya, berkolaborasi, dan berkembang bersama
                </p>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        document.querySelectorAll('.toggle-password')
            .forEach(function(button) {
                button.addEventListener('click', function() {
                    const input =
                        this.parentElement.querySelector('input');
                    const icon =
                        this.querySelector('.eye-icon');
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.src =
                            "{{ asset('assets/icons/eye-off-line.svg') }}";
                    } else {
                        input.type = 'password';
                        icon.src =
                            "{{ asset('assets/icons/eye-line.svg') }}";
                    }
                });
            });
    </script>
@endsection
