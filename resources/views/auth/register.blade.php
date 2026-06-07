@extends('admin.layouts.auth-layout')
@section('title', 'Register')
@section('content')
    <div class="flex min-h-screen w-full flex-col lg:flex-row">
        <!-- kiri -->
        <div
            class="hidden lg:flex relative w-[60%] bg-primary-500 items-center justify-start p-12 [clip-path:polygon(0_0,70%_0,100%_100%,0%_100%)]">
            <div class="absolute top-12 left-11">
                <img src="{{ asset('assets/icons/rekaps-store-logo.svg') }}" alt="logo" class="h-12 w-auto">
            </div>
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
        <!-- kanan -->
        <div class="flex w-full flex-col justify-center p-8 lg:w-[40%] lg:p-12">
            <div class="w-full max-w-sm self-center lg:max-w-[320px]">
                <h1 class="mb-6 text-4xl font-extrabold tracking-tighter">
                    REGISTER
                </h1>
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf

                    {{-- Tampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-sm text-red-600">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- nama --}}
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required
                            class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 text-neutral-950">
                    </div>
                    <!-- username -->
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">
                            Username
                        </label>
                        <input type="text" name="username" placeholder="Username" required
                            class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 text-neutral-950">
                    </div>
                    <!-- email -->
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Email" required
                            class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 text-neutral-950">
                    </div>
                    <!-- password -->
                    <div class="mb-6">
                        <label class="mb-1.5 block text-sm font-medium">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="Password" required
                                class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 pr-12 text-neutral-950">
                            <button type="button" class="toggle-password absolute right-4 top-1/2 -translate-y-1/2">
                                <img src="{{ asset('assets/icons/eye-line.svg') }}" class="eye-icon h-5 w-5" alt="eye">
                            </button>
                        </div>
                    </div>
                    <!-- button -->
                    <button type="submit"
                        class="w-full rounded-lg bg-primary-500 py-3 font-semibold text-neutral-50 transition-all duration-300 hover:opacity-90">
                        Register
                    </button>
                    <p class="mt-6 text-center text-sm">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-bold text-secondary-500 hover:underline">
                            Login
                        </a>
                    </p>
                </form>
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
