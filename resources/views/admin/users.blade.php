@extends('admin.layouts.layout')

@section('content')
<!-- CONTENT -->
<main class="p-6 max-w-7xl mx-auto">

  <!-- HEADER -->
  <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-5 mb-6">
    <div>
      <h1 class="text-2xl font-bold text-gray-900 mb-4">Manajemen Pengguna</h1>

      <!-- TABS -->
      <div class="flex gap-3">
        <button 
          id="tabPengurus"
          class="tab-btn bg-purple-600 text-gray-700 px-[18px] py-3 rounded-[14px] font-semibold text-sm shadow-[0_8px_20px_rgba(125,57,235,0.25)] hover:bg-[#6b2fd4] hover:-translate-y-0.5 transition-all active:scale-95"
          onclick="filterUsers('Pengurus', this)">
          Pengurus
        </button>
        <button 
          id="tabPembeli"
          class="tab-btn bg-purple-600 text-gray-700 px-[18px] py-3 rounded-[14px] font-semibold text-sm shadow-[0_8px_20px_rgba(125,57,235,0.25)] hover:bg-[#6b2fd4] hover:-translate-y-0.5 transition-all active:scale-95"
          onclick="filterUsers('Pembeli', this)">
          Pembeli
        </button>
      </div>
    </div>

    <!-- BUTTON TAMBAH -->
    <button 
      class="w-full md:w-auto h-12 px-6 rounded-2xl bg-[#7d39eb] text-gray-700 font-semibold text-sm shadow-[0_8px_20px_rgba(125,57,235,0.25)] hover:bg-[#6b2fd4] hover:-translate-y-0.5 transition-all active:scale-95"
      id="addUserBtn" 
      onclick="openAddModal()">
      + Tambah Pengurus

    </button>
  </div>

  <!-- TABLE -->
  <div class="bg-white rounded-[24px] p-6 overflow-x-auto shadow-sm border border-gray-100">
    <table class="w-full border-collapse">
      <thead>
        <tr class="text-left border-b border-gray-100">
          <th class="p-4 text-sm font-semibold text-gray-500">Nama</th>
          <th class="p-4 text-sm font-semibold text-gray-500">Email</th>
          <th class="p-4 text-sm font-semibold text-gray-500">Role</th>
          <th class="p-4 text-sm font-semibold text-gray-500">Bergabung</th>
          <th class="p-4 text-sm font-semibold text-gray-500">Status</th>
          <th class="p-4 text-sm font-semibold text-gray-500 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody id="userTableBody" class="divide-y divide-gray-100">
        <!-- Baris akan diisi oleh JS, contoh row: -->
        <tr class="hover:bg-gray-50 transition">
          <td class="p-4 text-sm text-gray-800">Budi Santoso</td>
          <td class="p-4 text-sm text-gray-800">budi@example.com</td>
          <td class="p-4 text-sm">
             <span class="px-3.5 py-1.5 rounded-full text-[12px] font-bold bg-blue-100 text-blue-700">Pengurus</span>
          </td>
          <td class="p-4 text-sm text-gray-800">12 Mei 2024</td>
          <td class="p-4 text-sm">
             <span class="px-3.5 py-1.5 rounded-full text-[12px] font-bold bg-green-100 text-green-700">Aktif</span>
          </td>
          <td class="p-4 flex items-center justify-center gap-3">
             <button class="w-10 h-10 flex items-center justify-center rounded-[14px] bg-blue-50 text-blue-600 hover:bg-blue-100 transition">✏️</button>
             <button class="w-10 h-10 flex items-center justify-center rounded-[14px] bg-red-50 text-red-600 hover:bg-red-100 transition">🗑️</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</main>

<!-- MODAL INPUT -->
<div id="userModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-[9999] p-4">
  <div class="bg-white w-full max-w-[420px] rounded-[24px] p-7 shadow-xl">
    <h3 id="modalTitle" class="text-xl font-bold mb-6">Tambah Pengurus</h3>
    
    <div class="space-y-4">
      <div>
        <label class="block mb-2 text-sm font-semibold">Nama</label>
        <input type="text" id="namaInput" placeholder="Nama lengkap" class="w-full h-12 px-4 border border-gray-300 rounded-[14px] text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold">Email</label>
        <input type="email" id="emailInput" placeholder="Email" class="w-full h-12 px-4 border border-gray-300 rounded-[14px] text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold">Password</label>
        <input type="password" id="passwordInput" placeholder="Password" class="w-full h-12 px-4 border border-gray-300 rounded-[14px] text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
      </div>
    </div>

    <div class="flex justify-end gap-3 mt-6">
      <button onclick="closeModal()" class="h-11 px-5 bg-gray-200 text-gray-950 font-bold rounded-[14px] hover:bg-gray-300 transition">Batal</button>
      <button onclick="submitForm()" class="h-11 px-5 bg-purple-600 text-gray-950 font-bold rounded-[14px] hover:bg-gray-300 transition">Simpan</button>
    </div>
  </div>
</div>

<!-- MODAL KONFIRMASI -->
<div id="confirmModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-[9999] p-4">
  <div class="bg-white w-full max-w-[360px] rounded-[24px] p-7 shadow-xl text-center">
    <h3 id="confirmTitle" class="text-xl font-bold mb-2">Konfirmasi</h3>
    <p id="confirmText" class="text-gray-600 mb-6">Apakah yakin?</p>
    <div class="flex justify-center gap-3">
      <button onclick="closeConfirmModal()" class="h-11 px-6 bg-gray-950 text-gray-700 font-bold rounded-[14px] hover:bg-gray-300 transition">Batal</button>
      <button id="confirmBtn" class="h-11 px-6 bg-red-600 text-gray-950 font-bold rounded-[14px] hover:bg-red-700 transition">Ya</button>
    </div>
  </div>
</div>

<script src="{{ asset('js/users.js') }}"></script>
@endsection