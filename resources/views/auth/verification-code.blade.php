@extends('admin.layouts.auth-layout')
@section('title', 'Verification Code')
@section('content')
    <div class="flex min-h-screen w-full flex-col lg:flex-row">
        {{-- kiri --}}
        <div class="flex w-full flex-col p-8 lg:w-[40%] lg:p-12">
            <div class="mb-14 lg:mb-[60px]">
                <img src="{{ asset('assets/icons/rekaps-store-logo.svg') }}" alt="logo" class="h-12 w-auto">
            </div>
            <div class="w-full max-w-sm self-start lg:max-w-[420px]">
                <h1 class="mb-2 text-4xl font-extrabold tracking-tighter whitespace-nowrap">
                    Masukkan Kode
                    <span class="text-secondary-500">
                        Verifikasi
                    </span>
                </h1>
                <p class="mb-6 text-sm text-neutral-50">
                    Kode verifikasi dikirim ke email
                    <span class="font-semibold text-secondary-500">
                        {{ session('reset_email') }}
                    </span>
                </p>
                <form action="{{ route('verification.code.verify') }}" method="POST">
                    @csrf
                    {{-- OTP --}}
                    <div class="mb-4 flex gap-3">

                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" name="code[]" maxlength="1" inputmode="numeric" autocomplete="off"
                                class="otp-input h-14 w-14 rounded-lg border border-primary-500 bg-neutral-50 text-center text-xl font-bold text-neutral-950 outline-none focus:border-secondary-500">
                        @endfor

                    </div>

                    {{-- error --}}
                    @if ($errors->any())
                        <p class="mb-4 text-sm text-red-500">
                            {{ $errors->first() }}
                        </p>
                    @endif

                    {{-- button --}}
                    <button type="submit"
                        class="w-full rounded-lg bg-primary-500 py-3 font-semibold text-neutral-50 transition-all duration-300 hover:opacity-90">
                        Send
                    </button>
                </form>
            </div>
        </div>

        {{-- kanan --}}
        <div
            class="hidden w-[60%] bg-primary-500 lg:flex items-center justify-center [clip-path:polygon(20%_0,100%_0,100%_100%,0%_100%)]">
            <div class="max-w-[450px]">
                <h1 class="text-5xl font-extrabold leading-[1.2] text-neutral-50">
                    WELCOME TO <br>
                    <span class="text-secondary-500">
                        REKAPS
                    </span>
                    STORE
                </h1>
                <p class="mt-4 text-sm font-bold text-neutral-50">
                    Berkarya, berkolaborasi, dan berkembang bersama.
                </p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs =
                document.querySelectorAll('.otp-input');
            otpInputs.forEach((input, index) => {
                // pindah otomatis
                input.addEventListener('input', function() {
                    // hanya angka
                    this.value =
                        this.value.replace(/[^0-9]/g, '');
                    // fokus ke next input
                    if (
                        this.value.length === 1 &&
                        index < otpInputs.length - 1
                    ) {
                        otpInputs[index + 1].focus();
                    }
                });

                // backspace ke sebelumnya
                input.addEventListener('keydown', function(e) {
                    if (
                        e.key === 'Backspace' &&
                        this.value === '' &&
                        index > 0
                    ) {
                        otpInputs[index - 1].focus();
                    }
                });

                // paste OTP sekaligus
                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pastedData =
                        (e.clipboardData || window.clipboardData)
                        .getData('text')
                        .replace(/\D/g, '')
                        .slice(0, 6);

                    pastedData.split('').forEach((char, i) => {
                        if (otpInputs[i]) {
                            otpInputs[i].value = char;
                        }
                    });

                    // fokus ke input terakhir terisi
                    const nextIndex =
                        Math.min(pastedData.length, otpInputs.length - 1);
                    otpInputs[nextIndex].focus();
                });
            });
        });
    </script>

@endsection
