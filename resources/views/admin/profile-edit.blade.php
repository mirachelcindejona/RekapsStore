@extends('admin.layouts.layout')

@section('title', 'Edit Profil')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->
    <div>

        <h1 class="text-[30px] font-bold">
            Edit Profil
        </h1>

        <p class="text-[14px] text-neutral-500">
            Perbarui informasi akun administrator
        </p>

    </div>

    <!-- CARD -->
    <div
        class="mx-auto max-w-[800px]
        rounded-[24px]
        border border-[#ece7f7]
        bg-white
        p-6
        shadow-sm">

        <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <!-- FOTO -->
            <div class="mb-6 flex flex-col items-center">

                <div
                    class="flex
                    h-[120px]
                    w-[120px]
                    items-center
                    justify-center
                    rounded-[24px]
                    bg-primary-400
                    text-[42px]
                    font-bold
                    text-white">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>

                <label
                    class="mt-3 cursor-pointer rounded-xl bg-primary-100 px-3 py-2 text-[12px] font-semibold text-primary-600">

                    Ganti Foto

                    <input
                        type="file"
                        name="photo"
                        class="hidden">

                </label>

            </div>

            <!-- FORM -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- NAMA -->
                <div>

                    <label
                        class="mb-2 block text-[13px] font-semibold">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ Auth::user()->name }}"
                        class="w-full h-[42px] rounded-xl border border-neutral-300 px-4 text-[14px] outline-none focus:border-primary-500">

                </div>

                <!-- USERNAME -->
                <div>

                    <label
                        class="mb-2 block text-[13px] font-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ Auth::user()->username }}"
                        class="w-full h-[42px] rounded-xl border border-neutral-300 px-4 text-[14px] outline-none focus:border-primary-500">

                </div>

                <!-- EMAIL -->
                <div class="md:col-span-2">

                    <label
                        class="mb-2 block text-[13px] font-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ Auth::user()->email }}"
                        class="w-full h-[42px] rounded-xl border border-neutral-300 px-4 text-[14px] outline-none focus:border-primary-500">

                </div>

                <!-- GENDER -->
                {{-- <div>

                    <label
                        class="mb-2 block text-[13px] font-semibold">
                        Jenis Kelamin
                    </label>

                    <select
                        name="gender"
                        class="w-full h-[42px] rounded-xl border border-neutral-300 px-4 text-[14px] outline-none focus:border-primary-500">

                        <option>Laki-laki</option>
                        <option>Perempuan</option>

                    </select>

                </div> --}}

                <!-- PASSWORD -->
                <div>

                    <label
                        class="mb-2 block text-[13px] font-semibold">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Kosongkan jika tidak diganti"
                        class="w-full h-[42px] rounded-xl border border-neutral-300 px-4 text-[14px] outline-none focus:border-primary-500">

                </div>

                <!-- KONFIRMASI -->
                <div class="md:col-span-2">

                    <label
                        class="mb-2 block text-[13px] font-semibold">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password baru"
                        class="w-full h-[42px] rounded-xl border border-neutral-300 px-4 text-[14px] outline-none focus:border-primary-500">

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-8 flex justify-end gap-3">

                <a
                    href="{{ route('admin.profile') }}"
                    class="flex items-center rounded-xl bg-neutral-200 px-4 h-[40px] text-[13px] font-semibold">

                    Batal

                </a>

                <button
                    type="submit"
                    class="h-[40px] rounded-xl bg-primary-500 px-4 text-[13px] font-semibold text-white">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection