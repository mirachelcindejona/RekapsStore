@props(['active' => 'akun'])

@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="" />
@endsection

@section('content')
<div class="flex gap-3 items-start mt-2">

    {{-- ===== SIDEBAR ===== --}}
    <div class="w-64 shrink-0 flex flex-col gap-2">

        {{-- Menu --}}
        <div class="bg-white border border-neutral-100 rounded-2xl p-3 flex flex-col gap-1">
            <p class="text-xs font-bold text-neutral-400 px-3 py-1">Menu</p>

            <a href="/profile"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition
            {{ $active === 'akun' ? 'bg-primary-50 text-primary-300' : 'text-neutral-600 hover:bg-neutral-50' }}">
                <img src="{{ asset($active === 'akun' ? 'assets/icons/menu-profile-h.svg' : 'assets/icons/menu-profile.svg') }}" class="w-4 h-4">
                Akun Saya
            </a>

            <a href="/profile/notifications"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition
            {{ $active === 'notifikasi' ? 'bg-primary-50 text-primary-300' : 'text-neutral-600 hover:bg-neutral-50' }}">
                <img src="{{ asset($active === 'notifikasi' ? 'assets/icons/menu-bell-h.svg' : 'assets/icons/menu-bell.svg') }}" class="w-4 h-4">
                Notifikasi
            </a>

            <a href="/profile/orders"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition
            {{ $active === 'riwayat' ? 'bg-primary-50 text-primary-300' : 'text-neutral-600 hover:bg-neutral-50' }}">
                <img src="{{ asset($active === 'riwayat' ? 'assets/icons/menu-history-h.svg' : 'assets/icons/menu-history.svg') }}" class="w-4 h-4">
                Riwayat Pesanan
            </a>
            {{-- Logout --}}
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="group flex cursor-pointer items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-neutral-600 hover:bg-red-50 hover:text-red-500 transition w-full">
                    <img src="{{ asset('assets/icons/logout-half-circle-line.svg') }}" class="w-4 h-4 block group-hover:hidden">
                    <img src="{{ asset('assets/icons/logout-half-circle-line-h.svg') }}" class="w-4 h-4 hidden group-hover:block">
                    Logout
                </button>
            </form>
        </div>


    </div>

    {{-- ===== KONTEN ===== --}}
    <div class="flex-1 min-w-0">
        {{ $slot }}
    </div>

</div>
@endsection
