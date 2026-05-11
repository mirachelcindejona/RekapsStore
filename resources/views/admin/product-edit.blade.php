@extends('admin.layouts.layout')

@section('title', 'Edit Produk')

@section('page_title', 'Edit Produk')

@section('page_breadcrumb', 'Edit Produk')

@section('content')
    <!-- HEADER -->
    <div class="flex items-center gap-[14px] mb-[24px]">
        <a href="{{ url('/admin/product') }}"
            class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-[20px] font-bold text-neutral-900 m-0">Form Edit Produk</h1>
    </div>

    <!-- FORM WRAPPER -->
    <form action="{{ url('/admin/product-detail') }}"
        class="grid grid-cols-1 min-[900px]:grid-cols-2 gap-[20px] items-start">

        <!-- KOLOM KIRI -->
        <div class="flex flex-col">
            <!-- Card Foto Produk -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Foto Produk</h3>

                <div class="w-full">
                    <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt=""
                        class="w-full h-auto rounded-[10px] object-cover border border-neutral-200" />
                </div>

                <div class="flex gap-[10px] mt-[10px] overflow-x-auto">
                    <div class="w-[80px] h-[80px] rounded-xl object-cover shrink-0 border border-[#ddd] bg-[#eee]"></div>
                    <div class="w-[80px] h-[80px] rounded-xl object-cover shrink-0 border border-[#ddd] bg-[#ddd]"></div>
                    <div
                        class="w-[80px] h-[80px] rounded-xl border border-dashed border-neutral-600 flex items-center justify-center text-[30px] text-neutral-400 cursor-pointer shrink-0 transition-colors hover:bg-neutral-100">
                        +
                    </div>
                </div>
            </div>

            <!-- Card Informasi Produk -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Informasi Produk</h3>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">NAMA PRODUK</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        value="Jersey RPL Premium" />
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">DESKRIPSI PRODUK</label>
                    <textarea
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] resize-y min-h-[120px]">Jersey RPL Pink merupakan salah satu produk apparel unggulan yang dirancang khusus untuk mahasiswa dan komunitas Rekayasa Perangkat Lunak (RPL) yang ingin tampil lebih berani, ekspresif, dan tetap profesional.</textarea>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">KATEGORI</label>
                    <select
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                        <option selected>Merchandise</option>
                        <option>Makanan</option>
                        <option>Produk Digital</option>
                        <option>Jasa</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">TIPE PRODUK</label>
                        <select
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                            <option selected>Ready Stok</option>
                            <option>PO</option>
                            <option>Jasa</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">KODE PRODUK</label>
                        <input type="text"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            value="JRSY-021" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">ESTIMASI SELESAI</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        value="7 hari kerja" />
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN -->
        <div class="flex flex-col">
            <!-- Card Harga -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Harga</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">HARGA MODAL</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            value="130000" />
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">HARGA JUAL</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            value="140000" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">MARGIN</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-100 text-neutral-800 cursor-not-allowed"
                        value="10.000" readonly />
                </div>
            </div>

            <!-- Card Stok -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Stok</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">JUMLAH STOK</label>
                        <input type="text"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            value="21" />
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">STOK MINIMUM (NOTIFIKASI)</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            value="3" />
                    </div>
                </div>
            </div>

            <!-- Card Varian Produk -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <div class="flex justify-between items-center">
                    <h3 class="text-[16px] font-bold text-neutral-950 m-0">Varian Produk</h3>
                    <button type="button"
                        class="bg-primary-500 text-white px-[16px] py-[6px] rounded-[10px] text-[12px] font-semibold shadow-[0_0_8px_rgba(114,52,214,0.35)] cursor-pointer outline-none border-none hover:bg-[#6c2bd9] transition-colors">
                        + Tambah
                    </button>
                </div>

                <div class="bg-neutral-100 rounded-lg p-[15px] flex flex-col gap-[12px]">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-[14px]">Nama Varian</span>
                        <button type="button"
                            class="bg-gradient-to-br from-[#951806] to-[#fe6e4c] text-white px-[12px] py-[6px] rounded-[10px] text-[12px] font-semibold cursor-pointer outline-none border-none hover:opacity-90 transition-opacity">
                            Hapus
                        </button>
                    </div>

                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        value="Ukuran" />

                    <div class="text-[14px] font-normal text-neutral-950">PILIHAN</div>

                    <div class="flex flex-wrap gap-[8px]">
                        <div
                            class="bg-primary-100 text-primary-500 px-[10px] py-[4px] rounded-full text-[11px] font-bold flex items-center gap-[6px]">
                            S
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" class="cursor-pointer hover:text-red-500 transition-colors">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                        <div
                            class="bg-primary-100 text-primary-500 px-[10px] py-[4px] rounded-full text-[11px] font-bold flex items-center gap-[6px]">
                            M
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" class="cursor-pointer hover:text-red-500 transition-colors">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                        <div
                            class="bg-primary-100 text-primary-500 px-[10px] py-[4px] rounded-full text-[11px] font-bold flex items-center gap-[6px]">
                            L
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" class="cursor-pointer hover:text-red-500 transition-colors">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>

                    <div class="flex gap-[8px]">
                        <input type="text"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="Ketik pilihan varian lalu tekan +" />
                        <button type="button"
                            class="w-[40px] h-[40px] bg-primary-500 rounded-[10px] flex items-center justify-center text-white shrink-0 cursor-pointer outline-none border-none hover:bg-[#6c2bd9] transition-colors">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card Status & Diskon -->
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Status & Diskon</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">STATUS</label>
                        <select
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                            <option selected>Aktif</option>
                            <option>Non-Aktif</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">DISKON</label>
                        <input type="number"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0%" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">KODE VOUCHER</label>
                    <input type="text"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-primary-500 focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="cth: EKRAF10" />
                </div>
            </div>

            <!-- Tombol Simpan Perubahan -->
            <button type="submit"
                class="w-full bg-primary-500 text-white p-[14px] rounded-xl text-[16px] font-bold shadow-[0_0_8px_rgba(114,52,214,0.35)] flex items-center justify-center gap-[10px] mt-[10px] cursor-pointer outline-none border-none transition-all duration-200 hover:bg-[#5928a7]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 4H4V20H20V8L16 4H14M8 4V8H14V4M8 4H14M12 12C11.333 12 10 12.4 10 14C10 15.6 11.333 16 12 16C12.667 16 14 15.6 14 14C14 12.4 12.667 12 12 12Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
@endsection

@section('footer')
@endsection
