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
                                        <path d="M10.0674 7.37793C10.7062 7.57436 11.2837 7.93023 11.7754 8.42188C12.5648 9.21185 13.0049 10.25 13.0049 11.3623C13.0048 12.4745 12.5647 13.513 11.7764 14.3008C10.9878 15.09 9.94836 15.5303 8.83594 15.5303C7.93665 15.5307 7.06173 15.2371 6.34473 14.6943L6.1709 14.5625L6.0166 14.7168L4.95117 15.7803L4.77441 15.957L6.03906 17.2217L5.50098 17.7725L4.24121 16.5127L4.06445 16.6895L2.97852 17.7744L2.42383 17.2197L3.68652 15.957L3.50977 15.7803L2.42578 14.6973L2.97656 14.1582L4.06445 15.2471L4.24121 15.4238L4.41797 15.2471L5.48242 14.1816L5.63574 14.0283L5.50586 13.8555C4.96799 13.1375 4.66806 12.2721 4.66797 11.3623C4.66797 10.3198 5.05492 9.34076 5.75195 8.57324C5.74798 8.66075 5.7461 8.74865 5.74609 8.83691V8.83984C5.74884 9.16209 5.77902 9.48334 5.83398 9.80078C5.58274 10.2757 5.43077 10.7981 5.43066 11.3613C5.42978 11.8087 5.5175 12.252 5.68945 12.665C5.86121 13.0775 6.11411 13.4513 6.43164 13.7656V13.7666C7.07308 14.4093 7.9258 14.7675 8.83594 14.7676C9.74607 14.7676 10.6007 14.4108 11.2432 13.7656L11.2422 13.7646C11.8845 13.1226 12.2432 12.2708 12.2432 11.3613C12.2432 10.5085 11.9285 9.70485 11.3594 9.0791L11.2422 8.95605C10.7774 8.49135 10.2077 8.18597 9.58398 8.0498C9.66133 7.86695 9.76373 7.69788 9.89453 7.54688L9.97949 7.45508C10.0053 7.42926 10.0336 7.40419 10.0674 7.37793ZM18.0537 2.14453V6.0625H17.291V3.46484L16.8652 3.88672L14.7158 6.0166L14.5605 6.16992L14.6914 6.34375C15.2293 7.06171 15.5292 7.92714 15.5293 8.83691C15.5293 9.87943 15.1422 10.8561 14.4443 11.625C14.4483 11.5378 14.4512 11.4503 14.4512 11.3623C14.4512 11.0363 14.4161 10.7093 14.3623 10.3975C14.6135 9.92248 14.7666 9.40028 14.7666 8.83691C14.767 8.38976 14.6787 7.94698 14.5068 7.53418C14.3349 7.1212 14.0825 6.74641 13.7646 6.43164C13.1233 5.78955 12.271 5.43174 11.3613 5.43164C10.5081 5.43164 9.70367 5.74497 9.07812 6.31543L8.95605 6.43262C8.31351 7.07459 7.95517 7.9267 7.95508 8.83691C7.95508 9.74673 8.31225 10.6006 8.9541 11.2422C9.40972 11.7 9.98728 12.0131 10.6143 12.1494C10.5203 12.3698 10.3867 12.572 10.2178 12.7441C10.1919 12.77 10.1627 12.794 10.1289 12.8203C9.49054 12.6238 8.91327 12.2687 8.42188 11.7773L8.4209 11.7764L8.27832 11.6289C7.95572 11.2771 7.69619 10.8711 7.51172 10.4297C7.30103 9.92545 7.19246 9.38438 7.19238 8.83789C7.19233 8.29121 7.30101 7.74956 7.51172 7.24512C7.72239 6.74085 8.03117 6.28353 8.41992 5.89941L8.4209 5.89844C9.20933 5.10941 10.2482 4.66911 11.3604 4.66895C12.2601 4.6698 13.1355 4.96365 13.8535 5.50586L14.0283 5.6377L14.1816 5.48242L16.3115 3.33301L16.7344 2.90723H14.1357V2.14453H18.0537Z" fill="black" stroke="#5928A7" stroke-width="0.5"/>
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[12px] text-neutral-500">
                                            Gender
                                        </p>

                                        <p class="text-[15px] font-semibold text-neutral-800">
                                            {{-- {{ Auth::user()->created_at->format('d M Y') }} --}}
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

                            <p
                            class="text-[24px]
                            font-bold
                            text-primary-500">

                                Super Admin

                            </p>

                            <p
                            class="mt-1
                            text-[13px]
                            leading-5
                            text-neutral-500">

                                Memiliki akses penuh untuk semua fitur dan pengaturan sistem

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
                                $permissions = [
                                    'Akses Dashboard',
                                    'Kelola Produk',
                                    'Kelola Pesanan',
                                    'Kelola Diskon & Voucher',
                                    'Kelola Pengguna',
                                    'Kelola Keuangan',
                                    'Kelola Laporan',
                                    'Pengaturan Sistem'
                                ];
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

                                    <span
                                    class="text-[12px]
                                    text-neutral-600">

                                        {{ $permission }}

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




