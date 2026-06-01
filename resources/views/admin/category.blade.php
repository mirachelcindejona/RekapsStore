@extends('admin.layouts.layout')

@section('title', 'Kelola Kategori')

@section('page_title', 'Kelola Kategori Produk')

@section('page_breadcrumb', 'Kelola Kategori Produk')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px]">

        <div class="md:col-span-1 bg-white shadow-sm rounded-xl p-[20px] h-fit border border-neutral-200">
            <h3 class="font-bold text-[16px] mb-[15px]">Tambah Kategori Baru</h3>

            <form action="{{ url('/admin/categories') }}" method="POST" class="flex flex-col gap-3">
                @csrf
                <div>
                    <label class="text-[13px] text-neutral-700">Nama Kategori</label>
                    <input type="text" name="name" required
                        class="mt-1 px-[12px] py-[10px] w-full rounded-[8px] border border-neutral-400 focus:border-[#7D39EB] outline-none"
                        placeholder="cth: Pakaian, Makanan">
                </div>
                <button type="submit"
                    class="bg-[#7D39EB] text-white py-[10px] rounded-[8px] font-bold hover:bg-[#5928a7]">Simpan
                    Kategori</button>
            </form>
        </div>

        <div class="md:col-span-2 bg-white shadow-sm rounded-xl p-[20px] border border-neutral-200">
            <h3 class="font-bold text-[16px] mb-[15px]">Daftar Kategori</h3>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-neutral-300">
                        <th class="py-3 px-2 text-[14px]">No</th>
                        <th class="py-3 px-2 text-[14px]">Nama Kategori</th>
                        <th class="py-3 px-2 text-[14px]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr class="border-b border-neutral-200 hover:bg-neutral-50">
                            <td class="py-3 px-2 text-[14px]">{{ $index + 1 }}</td>
                            <td class="py-3 px-2 text-[14px] font-semibold">{{ $category->name }}</td>
                            <td class="py-3 px-2">
                                <form action="{{ url('/admin/categories/' . $category->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-[13px] font-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
