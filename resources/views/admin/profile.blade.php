@extends('admin.layouts.layout')

@section('title', 'Profile Admin')

@section('content')

<div class="space-y-6">

    <!-- PAGE HEADER -->
    <div class="flex items-start justify-between">

        <!-- KIRI -->
        <div>

            <h1 class="text-[32px] font-bold">
                Profile Admin
            </h1>

            <p class="mt-1 text-[14px] text-neutral-500">
                Kelola informasi profil dan akun Anda
            </p>

        </div>

        <!-- KANAN -->
        <a
            href="{{ route('admin.profile.edit') }}"
            class="rounded-xl border border-primary-500 px-4 py-2 text-primary-500 transition hover:bg-primary-500 hover:text-white">

            Edit Profil

        </a>

    </div>

    <!-- CARD -->
    <div
        class="rounded-[24px]
        border
        border-[#ece7f7]
        bg-white
        p-6
        shadow-sm">

        <div
            class="grid
            grid-cols-1
            xl:grid-cols-[1fr_320px]
            gap-6">

                <!-- KIRI -->
                <div
                class="rounded-[24px] border border-[#ece7f7] bg-white p-7 shadow-[0_4px_18px_rgba(0,0,0,0.05)]">

                    <div class="flex gap-5">

                        <!-- AVATAR -->
                        <div>

                            <div
                            class="w-[120px]
                            h-[120px]
                            rounded-[24px]
                            bg-primary-400
                            text-white
                            flex
                            items-center
                            justify-center
                            text-[42px]
                            font-bold">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                        </div>

                        <!-- INFO -->
                        <div class="flex-1">

                            <h2 class="text-[30px] font-bold text-neutral-800">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="text-[15px] text-neutral-500">
                                @ {{ Auth::user()->username ?? 'adminrekaps' }}
                            </p>

                            <p class="mt-2 text-[15px] text-neutral-600">
                                Administrator utama Rekaps Store dengan akses penuh
                            </p>

                            <div class="mt-5 border-t border-neutral-200"></div>

                            <div class="mt-5 grid grid-cols-2 gap-x-8 gap-y-5">
                               
                                <div class="flex items-center gap-2">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-100 text-primary-500">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                        <path d="M5.89157 2.52344H4.20848C3.7621 2.52344 3.334 2.70076 3.01836 3.0164C2.70272 3.33204 2.52539 3.76014 2.52539 4.20653V5.88962M2.52539 14.3051V15.9882C2.52539 16.4345 2.70272 16.8626 3.01836 17.1783C3.334 17.4939 3.7621 17.6712 4.20848 17.6712H5.89157M14.307 17.6712H15.9901C16.4365 17.6712 16.8646 17.4939 17.1802 17.1783C17.4959 16.8626 17.6732 16.4345 17.6732 15.9882V14.3051M17.6732 5.88962V4.20653C17.6732 3.76014 17.4959 3.33204 17.1802 3.0164C16.8646 2.70076 16.4365 2.52344 15.9901 2.52344H14.307" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.0989 10.0961C11.4932 10.0961 12.6235 8.96583 12.6235 7.57151C12.6235 6.17719 11.4932 5.04688 10.0989 5.04688C8.70454 5.04688 7.57422 6.17719 7.57422 7.57151C7.57422 8.96583 8.70454 10.0961 10.0989 10.0961Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.3061 13.4638C14.3061 11.604 12.4219 10.0977 10.0983 10.0977C7.77484 10.0977 5.89062 11.604 5.89062 13.4638" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[12px] text-neutral-500">
                                            Username
                                        </p>

                                        <p class="text-[15px] font-semibold text-neutral-800">
                                            {{ Auth::user()->username ?? '-' }}
                                        </p>

                                    </div>

                                </div>
                                
                                <div class="flex items-center gap-2">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-100 text-primary-500">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                        <path d="M5.89157 7.57321L9.04736 10.0978C9.34588 10.3368 9.71689 10.4671 10.0993 10.4671C10.4817 10.4671 10.8527 10.3368 11.1512 10.0978L14.307 7.57321M17.6732 14.3056V5.89012C17.6732 5.44374 17.4959 5.01564 17.1802 4.7C16.8646 4.38436 16.4365 4.20703 15.9901 4.20703H4.20848C3.7621 4.20703 3.334 4.38436 3.01836 4.7C2.70272 5.01564 2.52539 5.44374 2.52539 5.89012V14.3056C2.52539 14.7519 2.70272 15.18 3.01836 15.4957C3.334 15.8113 3.7621 15.9887 4.20848 15.9887H15.9901C16.4365 15.9887 16.8646 15.8113 17.1802 15.4957C17.4959 15.18 17.6732 14.7519 17.6732 14.3056Z" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[12px] text-neutral-500">
                                           Email
                                        </p>

                                        <p class="text-[12px] font-semibold text-neutral-800">
                                             {{ Auth::user()->email }}
                                        </p>

                                    </div>

                                </div>

                                
                                <div class="flex items-center gap-2">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-100 text-primary-500">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18" fill="none">
                                        <path d="M12.7816 6.89081C12.7816 10.2368 6.89081 16.1478 6.89081 16.1478C6.89081 16.1478 1 10.2368 1 6.89081C1 3.54483 3.6374 1 6.89081 1C10.1442 1 12.7816 3.54483 12.7816 6.89081Z" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[12px] text-neutral-500">
                                            Bergabung Sejak
                                        </p>

                                        <p class="text-[15px] font-semibold text-neutral-800">
                                            {{ Auth::user()->created_at->format('d M Y') }}
                                        </p>

                                    </div>

                                </div>
                                

                            </div>

                        </div>

                    </div>

                </div>

                <!-- KANAN -->
                <div
                    class="rounded-[20px]
                    border
                    border-[#ece7f7]
                    bg-white
                    p-6">

                        <h3
                        class="text-[24px]
                        font-bold
                        text-neutral-800">

                            Role & Hak Akses

                        </h3>

                        <div
                        class="mt-3
                        border-b
                        border-neutral-200
                        pb-4">

                            <p class="text-[24px] font-bold text-primary-500">
                                {{ Auth::user()->getRoleNames()->first() ?? 'Pengurus' }}
                            </p>


                        </div>

                        <!-- LIST HAK AKSES -->
                        <div
                        class="mt-5
                        grid
                        grid-cols-2
                        gap-x-4
                        gap-y-3">

                            @php
                                $permissions = Auth::user()->getAllPermissions();
                            @endphp

                            @foreach($permissions as $permission)

                                <div class="flex items-center gap-2">

                                    <div
                                    class="flex
                                    h-5
                                    w-5
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-primary-100">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="10"
                                            height="10"
                                            viewBox="0 0 24 24"
                                            fill="none">

                                            <path
                                                d="M20 6L9 17L4 12"
                                                stroke="#7C3AED"
                                                stroke-width="3"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>

                                        </svg>

                                    </div>
                                    <span class="text-[12px] text-neutral-600">
                                        {{ ucfirst($permission->name) }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    </div>

            </div>

    </div>

</div>
    @endsection
@section('footer')

<script>

function openProfileModal()
{
    document
        .getElementById('profileModal')
        .classList
        .add('active');
}

function closeProfileModal()
{
    document
        .getElementById('profileModal')
        .classList
        .remove('active');
}

</script>




