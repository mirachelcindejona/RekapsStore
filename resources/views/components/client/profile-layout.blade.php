@props(['active' => 'akun'])

@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="" />
@endsection

@section('content')
<div class="flex flex-col lg:flex-row gap-2 lg:gap-4 items-start mt-1 lg:mt-2">

    {{-- sidebar --}}
    <div class="w-full lg:w-60 shrink-0 flex flex-col gap-1 lg:gap-3">

        {{-- Mobile Tabs --}}
        <div class="lg:hidden bg-white border border-neutral-100 rounded-2xl p-2">
            <div class="grid grid-cols-3 gap-2">

                <a href="/profile"
                    class="flex flex-col items-center justify-center gap-1 py-3 rounded-xl text-xs font-semibold transition
                    {{ $active === 'akun'
                        ? 'bg-primary-50 text-primary-500'
                        : 'text-neutral-500' }}">
                    <img src="{{ asset('assets/icons/user.svg') }}" class="hidden lg:flex w-4 h-4">
                    <span>Akun</span>
                </a>

                <a href="/profile/notifications"
                    class="flex flex-col items-center justify-center gap-1 py-3 rounded-xl text-xs font-semibold transition
                    {{ $active === 'notifikasi'
                        ? 'bg-primary-50 text-primary-500'
                        : 'text-neutral-500' }}">
                    <img src="{{ asset('assets/icons/bell.svg') }}" class="hidden lg:flex w-4 h-4">
                    <span>Notifikasi</span>
                </a>

                <a href="/profile/orders"
                    class="flex flex-col items-center justify-center gap-1 py-3 rounded-xl text-xs font-semibold transition
                    {{ $active === 'riwayat'
                        ? 'bg-primary-50 text-primary-500'
                        : 'text-neutral-500' }}">
                    <img src="{{ asset('assets/icons/order.svg') }}" class="hidden lg:flex w-4 h-4">
                    <span>Pesanan</span>
                </a>

            </div>
        </div>

        {{-- Desktop Sidebar --}}
        <div class="hidden lg:flex bg-white border border-neutral-100 rounded-2xl p-3 flex-col gap-1">

            <p class="text-xs font-bold text-neutral-400 px-3 py-1">
                Menu
            </p>

            <a href="/profile"
                class="flex items-center gap-2 px-3 py-3 rounded-xl text-sm font-semibold transition
                {{ $active === 'akun'
                    ? 'bg-primary-50 text-primary-500'
                    : 'text-neutral-600 hover:bg-neutral-50' }}">
                <img src="{{ asset('assets/icons/user.svg') }}" class="w-4 h-4">
                <span>Akun Saya</span>
            </a>

            <a href="/profile/notifications"
                class="flex items-center gap-2 px-3 py-3 rounded-xl text-sm font-semibold transition
                {{ $active === 'notifikasi'
                    ? 'bg-primary-50 text-primary-500'
                    : 'text-neutral-600 hover:bg-neutral-50' }}">
                <img src="{{ asset('assets/icons/bell.svg') }}" class="w-4 h-4">
                <span>Notifikasi</span>
            </a>

            <a href="/profile/orders"
                class="flex items-center gap-2 px-3 py-3 rounded-xl text-sm font-semibold transition
                {{ $active === 'riwayat'
                    ? 'bg-primary-50 text-primary-500'
                    : 'text-neutral-600 hover:bg-neutral-50' }}">
                <img src="{{ asset('assets/icons/order.svg') }}" class="w-4 h-4">
                <span>Riwayat Pesanan</span>
            </a>

        </div>

        {{-- Logout --}}
        <div class="hidden lg:flex bg-white border border-neutral-100 rounded-2xl p-3">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center lg:justify-start gap-2 px-3 py-3 rounded-xl text-sm font-semibold text-neutral-600 hover:bg-red-50 hover:text-red-500 transition w-full cursor-pointer">
                    <img src="{{ asset('assets/icons/logout.svg') }}" class="w-4 h-4">
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </div>

    {{-- content --}}
    <div class="flex-1 w-full min-w-0">
        {{ $slot }}
    </div>

</div>
@endsection