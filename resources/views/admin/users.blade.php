@extends('admin.layouts.layout')

@section('title', 'Manajemen Pengguna')
@section('page_title', 'Manajemen Pengguna')
@section('page_breadcrumb', 'Pengguna')

@section('content')
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg font-medium shadow-sm">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg font-medium shadow-sm">
            {{ session('error') }}
        </div>
    @endif
    <!-- HEADER -->
    <div class="flex items-center justify-between mb-[20px] gap-[12px]">
        <!-- TAB -->
        <div class="flex items-center gap-[12px]">

            <!-- PENGURUS -->
            <button id="tabPengurus" onclick="filterUsers('Pengurus')"
                class="flex items-center justify-center gap-[6px] rounded-xl border border-primary-500 bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-white transition-all duration-[250ms] cursor-pointer shadow-[0_4px_14px_rgba(125,57,235,0.45)]">
                Pengurus
            </button>

            <!-- PEMBELI -->
            <button id="tabPembeli" onclick="filterUsers('Pembeli')"
                class="flex items-center justify-center gap-[6px] rounded-xl border border-primary-500 bg-transparent px-[16px] py-[8px] text-[12px] font-bold text-primary-500 transition-all duration-[250ms] cursor-pointer">
                Pembeli
            </button>
        </div>

        <!-- BUTTON TAMBAH -->
        <button id="addUserBtn" onclick="openAddModal()"
            class="flex items-center justify-center gap-[6px] rounded-xl bg-primary-500 px-[16px] py-[8px] text-[12px] font-bold text-neutral-50 shadow-[0_0_8px_rgba(114,52,214,0.35)] transition-all duration-[250ms] border-none cursor-pointer whitespace-nowrap shrink-0 hover:bg-[#5928a7] hover:shadow-[0_4px_14px_rgba(125,57,235,0.45)]">
            + Tambah Pengurus
        </button>
    </div>

    <!-- TABLE -->
    <div class="w-full overflow-x-auto touch-pan-x custom-scrollbar pb-[10px]">
        <table
            class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1050px]">
            <thead class="bg-neutral-100 border-b-[0.2px] border-neutral-600">
                <tr>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        NAMA
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        EMAIL
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        ROLE
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        BERGABUNG
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        STATUS
                    </th>
                    <th class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        AKSI
                    </th>
                </tr>
            </thead>

            <!-- PENGURUS -->
            <tbody id="pengurusTable">

                @foreach ($pengurus as $user)
                    <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <p class="text-[14px] font-semibold text-neutral-900">
                                {{ $user->name }}
                            </p>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <p class="text-[13px] text-neutral-700">
                                {{ $user->email }}
                            </p>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">

                            @php
                                $role = $user->getRoleNames()->first();
                            @endphp

                            <span
                                class="px-3 py-1 rounded-full text-[11px] font-bold
                            {{ $role == 'admin' ? 'bg-[#efe4ff] text-primary-500' : 'bg-[#ffe4e6] text-[#f43f5e]' }}">
                                {{ ucfirst($role) }}
                            </span>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <p class="text-[13px] text-neutral-700">
                                {{ $user->created_at ? $user->created_at->format('F Y') : '-' }}
                            </p>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span
                                class="px-3 py-1 rounded-full text-[11px] font-bold
                            {{ $user->status == 'active' ? 'bg-[#ecfccb] text-[#65a30d]' : 'bg-[#ffe4e6] text-[#f43f5e]' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>

                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <div class="flex gap-[6px]">
                                <!-- EDIT -->
                                <button onclick="openEditModal(this)" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                    data-status="{{ $user->status }}" data-permissions='@json($user->getAllPermissions()->pluck('name'))'
                                    class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(125,57,235,0.3)]">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>

                                <!-- DELETE -->
                                <button type="button" onclick="openDeleteModal('{{ $user->id }}')"
                                    class="flex items-center justify-center w-[36px] h-[36px] rounded-xl cursor-pointer transition-all duration-[250ms] shrink-0 bg-neutral-50 border border-[#fb2c36] text-[#fb2c36] hover:bg-[#fb2c36] hover:text-neutral-50 hover:shadow-[0_4px_12px_rgba(231,0,11,0.3)] outline-none"
                                    onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <!-- PEMBELI -->
            <tbody id="pembeliTable" class="hidden">

                @foreach ($customers as $user)
                    <tr class="hover:bg-primary-50 transition-colors duration-[250ms]">

                        <!-- NAMA -->
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <p class="text-[14px] font-semibold text-neutral-900">
                                {{ $user->name }}
                            </p>
                        </td>

                        <!-- EMAIL -->
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <p class="text-[13px] text-neutral-700">
                                {{ $user->email }}
                            </p>
                        </td>

                        <!-- ROLE -->
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-[#cffafe] text-[#0891b2]">
                                Pengguna
                            </span>
                        </td>

                        <!-- BERGABUNG -->
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <p class="text-[13px] text-neutral-700">
                                {{ $user->created_at ? $user->created_at->format('F Y') : '-' }}
                            </p>
                        </td>

                        <!-- STATUS -->
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">

                            @if ($user->status == 'active')
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-[#ecfccb] text-[#65a30d]">
                                    Active
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-[#ffe4e6] text-[#f43f5e]">
                                    Banned
                                </span>
                            @endif

                        </td>

                        <!-- AKSI -->
                        <td
                            class="px-[16px] py-[14px] text-[13px] text-neutral-700 border-t border-neutral-200 align-middle whitespace-nowrap">
                            <form id="toggleForm{{ $user->id }}"
                                action="{{ route('admin.users.toggleStatus', ['user' => $user->id, 'tab' => 'pembeli']) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                @if ($user->status == 'active')
                                    <!-- ICON MATA -->

                                    <button type="button" onclick="openUnblockModal({{ $user->id }})"
                                        class="w-10 h-10 rounded-[12px] bg-neutral-50 border border-primary-500 flex items-center justify-center shadow-[0px_2px_4px_rgba(62,52,69,0.25)] transition-all duration-200 hover:bg-primary-500 group">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            class="text-primary-500 group-hover:text-white">

                                            <circle cx="12" cy="12" r="9" />

                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 8l8 8" />
                                        </svg>
                                    </button>
                                @else
                                    <!-- ICON BLOCK -->
                                    <button type="button" onclick="openUnblockModal({{ $user->id }})"
                                        class="w-10 h-10 rounded-[12px] bg-neutral-50 border border-red-500 flex items-center justify-center shadow-[0px_2px_4px_rgba(62,52,69,0.25)] transition-all duration-200 hover:bg-red-500 group">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            class="text-red-500 group-hover:text-white">

                                            <circle cx="12" cy="12" r="9" />

                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 8l8 8" />
                                        </svg>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- MODAL EDIT -->
        <div id="overlay"
            class="fixed inset-0 bg-black/40 backdrop-blur-sm invisible opacity-0 z-[50] transition-all duration-300 [&.active]:visible [&.active]:opacity-100"
            onclick="closeAll()">
        </div>
        <div id="editModal"
            class="fixed inset-0 z-[100] invisible opacity-0 flex items-center justify-center p-4 transition-all duration-300 [&.active]:visible [&.active]:opacity-100">
            <div
                class="bg-neutral-50 w-[90%] max-w-[600px]
    rounded-[20px] p-[24px]
    shadow-2xl
    transform scale-[0.9]
    transition-transform duration-300
    [.active_&]:scale-100">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-lg font-bold">
                        Edit Pengurus
                    </h2>

                    <span onclick="closeEditModal()" class="cursor-pointer text-xl">
                        ✕
                    </span>
                </div>

                <form id="editForm" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- NAMA -->
                        <div>
                            <label>Nama Pengguna</label>
                            <input type="text" name="name" id="editName"
                                class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                        </div>

                        <!-- EMAIL -->
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" id="editEmail"
                                class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">
                        </div>

                        <!-- STATUS -->
                        <div>
                            <label>Status Pengguna</label>
                            <select name="status" id="editStatus"
                                class="w-full border rounded-xl p-2 border-gray-200 outline-none focus:border-primary-500 transition-all">

                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>

                            </select>
                        </div>

                        <!-- HAK AKSES -->
                        <div class="md:col-span-2">
                            <label class="block mb-2">
                                Hak Akses
                            </label>

                            <div class="border border-gray-200 rounded-xl p-3 max-h-[180px] overflow-y-auto">

                                @php
                                    $permissions = [
                                        'dashboard',
                                        'produk',
                                        'pesanan',
                                        'keuangan',
                                        'diskon',
                                        'pengguna',
                                        'laporan',
                                        'kasir',
                                    ];
                                @endphp

                                <div class="grid grid-cols-2 gap-3">

                                    @foreach ($permissions as $permission)
                                        <label class="flex items-center gap-2">

                                            <input type="checkbox" name="permissions[]" value="{{ $permission }}"
                                                class="accent-primary-500">

                                            <span class="text-sm">
                                                {{ ucfirst($permission) }}
                                            </span>

                                        </label>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="flex justify-end gap-3 mt-5">

                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-neutral-100 rounded-xl">
                            Batal
                        </button>

                        <button type="submit" class="px-4 py-2 bg-primary-500 text-neutral-50 rounded-xl">
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>
        </div>

        <!-- MODAL HAPUS -->
        <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30">
            <div class="w-[420px] rounded-[24px] border border-black bg-neutral-50 p-[32px] shadow-xl">

                <!-- TITLE -->
                <h2 class="text-[28px] font-bold text-neutral-900">
                    Hapus Pengurus
                </h2>

                <!-- DESC -->
                <p class="mt-[16px] text-[18px] leading-[32px] text-neutral-700">
                    Apakah Anda yakin ingin menghapus pengguna ini?
                </p>

                <!-- FORM -->
                <form id="deleteForm" method="POST" class="mt-[32px] flex justify-end gap-[12px]">
                    @csrf
                    @method('DELETE')
                    <!-- BATAL -->
                    <button type="button" onclick="closeDeleteModal()"
                        class="rounded-xl bg-neutral-200 px-[20px] py-[10px] font-bold text-neutral-600">
                        Batal
                    </button>

                    <!-- HAPUS -->
                    <button type="submit"
                        class="rounded-xl bg-red-500 px-[20px] py-[10px] font-bold text-white shadow-lg">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH PENGURUS -->
    <div id="userModal"
        class="fixed inset-0 z-[100] invisible opacity-0 flex items-center justify-center p-4 transition-all duration-300 [&.active]:visible [&.active]:opacity-100">

        <div
            class="bg-white w-[90%] max-w-[600px] rounded-[20px] p-[24px] max-h-[85vh] overflow-y-auto shadow-2xl transform scale-[0.9] transition-transform duration-300 [.active_&]:scale-100">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-[20px]">

                <h2 class="text-[18px] font-bold text-gray-900">
                    Tambah Pengurus
                </h2>

                <span onclick="closeModal()" class="cursor-pointer text-[20px] text-gray-400 hover:text-gray-600">
                    ✕
                </span>

            </div>

            <form action="{{ route('admin.pengurus.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">

                    <!-- NAMA -->
                    <div class="flex flex-col gap-1.5">

                        <label>Nama Pengguna</label>

                        <input type="text" name="name" placeholder="Nama Lengkap" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">

                    </div>

                    <!-- USERNAME -->
                    <div class="flex flex-col gap-1.5">

                        <label>Username</label>

                        <input type="text" name="username" placeholder="Username" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">

                    </div>

                    <!-- EMAIL -->
                    <div class="flex flex-col gap-1.5">

                        <label>Email</label>

                        <input type="email" name="email" placeholder="Email" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">

                    </div>

                    <!-- PASSWORD -->
                    <div class="flex flex-col gap-1.5">

                        <label>Password</label>

                        <input type="password" name="password" placeholder="Password" required
                            class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-primary-500 transition-all">

                    </div>

                    <!-- HAK AKSES -->
                    <div class="md:col-span-2">

                        <label class="block mb-2">
                            Hak Akses
                        </label>

                        <div class="border border-gray-200 rounded-[10px] p-4">

                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="dashboard">
                                    Dashboard
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="produk">
                                    Produk
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="pesanan">
                                    Pesanan
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="keuangan">
                                    Keuangan
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="diskon">
                                    Diskon
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="pengguna">
                                    Pengguna
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="laporan">
                                    Laporan
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="kasir">
                                    Kasir
                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="flex justify-end gap-[12px] mt-[24px]">

                    <button type="button" onclick="closeModal()"
                        class="bg-neutral-100 px-[20px] py-[10px] rounded-[12px] font-medium">
                        Batal
                    </button>

                    <button type="submit"
                        class="bg-secondary-500 text-neutral-900 px-[20px] py-[10px] rounded-[12px] font-bold">
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- MODAL BLOCK -->
    <div id="blockModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center">
        <div class="w-[420px] rounded-[24px] border border-black bg-neutral-50 p-[32px] shadow-xl">

            <h2 class="text-[18px] font-bold mb-[16px]">
                Blokir akun pengguna
            </h2>

            <p class="text-[14px] text-neutral-700 leading-[28px]">
                Apakah Anda yakin akan memblokir akun ini?
                Jika Anda memblokir akun ini, maka pengguna
                tidak akan bisa mengakses apapun di website ini
            </p>

            <div class="flex justify-end gap-[12px] mt-[28px]">

                <button onclick="closeBlockModal()"
                    class="px-[18px] py-[9px] rounded-[14px] bg-neutral-200 text-neutral-500 font-bold">
                    Tidak
                </button>

                <button id="confirmBlockBtn"
                    class="px-[18px] py-[9px] rounded-[14px] bg-primary-500 text-white font-bold shadow-[0_4px_14px_rgba(125,57,235,0.45)]">
                    Ya
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL UNBLOCK -->
    <div id="unblockModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center">
        <div class="w-[420px] rounded-[24px] border border-black bg-neutral-50 p-[32px] shadow-xl">
            <h2 class="text-[20px] font-bold mb-[18px]">
                Buka blokir akun pengguna
            </h2>

            <p class="text-[15px] text-neutral-800 leading-[28px]">
                Apakah Anda yakin akan membuka blokir akun ini?
                Jika Anda membuka blokir, maka pengguna
                bisa mengakses kembali website ini
            </p>

            <div class="flex justify-end gap-[16px] mt-[30px]">

                <button onclick="closeUnblockModal()"
                    class="px-[18px] py-[10px] rounded-[14px] bg-neutral-200 text-neutral-500 font-bold">
                    Tidak
                </button>

                <button id="confirmUnblockBtn"
                    class="px-[18px] py-[10px] rounded-[14px] bg-primary-500 text-white font-bold shadow-[0_4px_14px_rgba(125,57,235,0.45)]">
                    Ya
                </button>
            </div>
        </div>
    </div>

    <script>
        // edit pengurus
        function openEditModal(button) {

            const id = button.dataset.id;
            const name = button.dataset.name;
            const email = button.dataset.email;
            const status = button.dataset.status;

            const permissions =
                JSON.parse(button.dataset.permissions || '[]');

            console.log('Permissions:', permissions);

            // buka modal
            const modal = document.getElementById('editModal');
            //overlay
            const overlay = document.getElementById('overlay');

            overlay.classList.add('active');

            modal.classList.remove('invisible', 'opacity-0');
            modal.classList.add('active');

            // isi form
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editStatus').value = status;

            // reset semua checkbox edit modal
            document
                .querySelectorAll('#editModal input[name="permissions[]"]')
                .forEach(checkbox => {
                    checkbox.checked = false;
                });

            // centang permission yg dimiliki user
            document
                .querySelectorAll('#editModal input[name="permissions[]"]')
                .forEach(checkbox => {

                    if (permissions.includes(checkbox.value)) {
                        checkbox.checked = true;
                    }

                });

            // action form update
            document.getElementById('editForm').action =
                `/admin/pengurus/${id}`;
        }



        function closeEditModal() {

            const modal = document.getElementById('editModal');
            const overlay = document.getElementById('overlay');

            modal.classList.remove('active');
            modal.classList.add('invisible', 'opacity-0');

            overlay.classList.remove('active');
        }


        // delete

        function openDeleteModal(id) {

            const modal =
                document.getElementById('deleteModal');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.getElementById('deleteForm').action =
                `/admin/pengurus/${id}`;
        }

        function closeDeleteModal() {

            const modal =
                document.getElementById('deleteModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }


        //   tambah pengurus
        function openAddModal() {

            const modal = document.getElementById('userModal');
            const overlay = document.getElementById('overlay');

            overlay.classList.add('active');

            modal.classList.remove('invisible', 'opacity-0');
            modal.classList.add('active');
        }

        function closeModal() {

            const modal = document.getElementById('userModal');
            const overlay = document.getElementById('overlay');

            overlay.classList.remove('active');

            modal.classList.remove('active');
            modal.classList.add('invisible', 'opacity-0');
        }

        function closeAll() {

            document.getElementById('overlay')
                .classList.remove('active');

            document.getElementById('userModal')
                .classList.remove('active');

            document.getElementById('userModal')
                .classList.add('invisible', 'opacity-0');

            document.getElementById('editModal')
                .classList.add('hidden');

            document.getElementById('deleteModal')
                .classList.add('hidden');
        }

        // filter table

        function filterUsers(type) {

            const pengurusTable =
                document.getElementById('pengurusTable');

            const pembeliTable =
                document.getElementById('pembeliTable');

            const tabPengurus =
                document.getElementById('tabPengurus');

            const tabPembeli =
                document.getElementById('tabPembeli');

            const addButton =
                document.getElementById('addUserBtn');

            [tabPengurus, tabPembeli].forEach(btn => {

                btn.classList.remove(
                    'bg-primary-500',
                    'text-white',
                    'shadow-[0_4px_14px_rgba(125,57,235,0.45)]'
                );

                btn.classList.add(
                    'bg-transparent',
                    'text-primary-500'
                );
            });

            if (type === 'Pengurus') {

                pengurusTable.classList.remove('hidden');
                pembeliTable.classList.add('hidden');

                addButton.classList.remove('hidden');

                tabPengurus.classList.remove(
                    'bg-transparent',
                    'text-primary-500'
                );

                tabPengurus.classList.add(
                    'bg-primary-500',
                    'text-white',
                    'shadow-[0_4px_14px_rgba(125,57,235,0.45)]'
                );

            } else {

                pembeliTable.classList.remove('hidden');
                pengurusTable.classList.add('hidden');

                addButton.classList.add('hidden');

                tabPembeli.classList.remove(
                    'bg-transparent',
                    'text-primary-500'
                );

                tabPembeli.classList.add(
                    'bg-primary-500',
                    'text-white',
                    'shadow-[0_4px_14px_rgba(125,57,235,0.45)]'
                );
            }
        }

        // default tab

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const currentTab =
                    "{{ request('tab', 'pengurus') }}";

                if (currentTab === 'pembeli') {

                    filterUsers('Pembeli');

                } else {

                    filterUsers('Pengurus');
                }
            }
        );

        // block/unblck user

        let selectedUserId = null;

        function openBlockModal(userId) {

            selectedUserId = userId;

            document
                .getElementById('blockModal')
                .classList.remove('hidden');
        }

        function closeBlockModal() {

            document
                .getElementById('blockModal')
                .classList.add('hidden');
        }

        function openUnblockModal(userId) {

            selectedUserId = userId;

            document
                .getElementById('unblockModal')
                .classList.remove('hidden');
        }

        function closeUnblockModal() {

            document
                .getElementById('unblockModal')
                .classList.add('hidden');
        }

        document
            .getElementById('confirmBlockBtn')
            ?.addEventListener('click', function() {

                document
                    .getElementById(
                        'toggleForm' + selectedUserId
                    )
                    .submit();
            });

        document
            .getElementById('confirmUnblockBtn')
            ?.addEventListener('click', function() {

                document
                    .getElementById(
                        'toggleForm' + selectedUserId
                    )
                    .submit();
            });

        // dropdown permision

        function togglePermissionDropdown() {

            document
                .getElementById('permissionDropdown')
                .classList.toggle('hidden');
        }
    </script>

@endsection
