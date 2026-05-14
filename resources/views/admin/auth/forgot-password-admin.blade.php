@extends('admin.layouts.auth-layout')
@section('title', 'Forgot Password')
@section('content')
    <div class="flex min-h-screen w-full flex-col lg:flex-row">
        <div class="flex w-full flex-col p-8 lg:w-[40%] lg:p-12">
            <div class="mb-14 lg:mb-[60px]">
                <img src="{{ asset('assets/icons/rekaps-store-logo.svg') }}" alt="logo" class="w-auto h-12">
            </div>
            <div class="w-full max-w-sm self-start lg:max-w-[400px]">
                <h1 class="mb-2 text-4xl font-extrabold tracking-tighter lg:text-[40px]">
                    Lupa
                    <span class="text-secondary-500">
                        Password
                    </span>
                </h1>
                <p class="mb-6 text-sm text-neutral-50">
                    Masukkan email untuk menerima kode verifikasi
                </p>

                <form action="{{ route('admin.forgot.password.send') }}" method="POST">
                    @csrf
                    {{-- email --}}
                    <div class="mb-4">
                        <label class="mb-1.5 block text-sm font-medium">
                            Email
                        </label>

                        <input type="email" name="email" placeholder="Email" required
                            class="w-full rounded-lg border border-primary-500 bg-neutral-50 px-3 py-3 text-neutral-950">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- password --}}
                    <button type="submit" class="mt-4 w-full rounded-lg bg-primary-500 py-3 font-semibold">
                        Send
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
