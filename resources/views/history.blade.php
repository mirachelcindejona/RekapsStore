@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="Riwayat Pesanan" />
@endsection

@section('content')

<a href="{{ url()->previous() }}" class="hidden sm:flex w-fit items-center gap-2 text-sm font-semibold text-neutral-500 mb-2"> <img src="{{ asset('assets/icons/back.svg') }}" alt="">
Kembali
</a>

<div class="flex flex-col lg:flex-row gap-2">

{{-- SIDEBAR --}}
<div class="hidden lg:flex flex-col w-[260px] bg-white border border-neutral-200 rounded-xl overflow-hidden h-[720px]">

    <div class="p-5">
        <h3 class="font-semibold text-base text-neutral-600">
            Menu
        </h3>
    </div>

    <ul class="flex-1">
        <li>
            <a href="/profile"
                class="flex items-center gap-3 px-5 py-4 hover:bg-neutral-50 text-neutral-600">
                <img src="{{ asset('assets/icons/menu-profile.svg') }}" class="w-5 h-5">
                Akun Saya
            </a>
        </li>

        <li>
            <a href="/notification"
                class="flex items-center gap-3 px-5 py-4 hover:bg-neutral-50 text-neutral-600">
                <img src="{{ asset('assets/icons/menu-bell.svg') }}" class="w-5 h-5">
                Notifikasi
            </a>
        </li>

        <li>
            <a href="/order-history"
                class="flex items-center gap-3 px-5 py-4 bg-primary-50 text-primary-500 font-semibold border-l-4 border-primary-500">
                <img src="{{ asset('assets/icons/menu-history.svg') }}" class="w-5 h-5">
                Riwayat Pesanan
            </a>
        </li>
    </ul>

    <form method="POST" action="/logout" class="p-5 border-t">
        @csrf

        <button
            class="flex items-center gap-2 text-neutral-500 cursor-pointer hover:text-red-500">
            <img src="{{ asset('assets/icons/logout.svg') }}" class="w-4 h-4">
            Logout
        </button>
    </form>

</div>

{{-- CONTENT --}}
<div class="flex-1 bg-white border border-neutral-200 rounded-xl overflow-hidden">

    <div class="p-5 border-b">
        <h1 class="text-2xl font-semibold text-neutral-800">
            Riwayat Pesanan
        </h1>
    </div>

    <div class="p-4">
        <div class="relative mb-4">

            <img
                src="{{ asset('assets/icons/search.svg') }}"
                class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4">

            <input
                type="text"
                placeholder="Cari pesananmu"
                class="w-full border border-neutral-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-300">
        </div>

        <div class="flex flex-col gap-4">

            {{-- nanti foreach order di sini --}}

            <div class="bg-neutral-50 rounded-xl p-4">
                Card Pesanan
            </div>

        </div>

    </div>

</div>

</div>

@endsection
