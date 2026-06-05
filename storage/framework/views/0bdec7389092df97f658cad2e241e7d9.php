

<?php $__env->startSection('title', 'Kasir'); ?>

<?php $__env->startSection('page_title', 'Kasir'); ?>

<?php $__env->startSection('page_breadcrumb', 'Kasir'); ?>

<?php $__env->startSection('content'); ?>

    <div class="flex-1 bg-neutral-50 rounded-[16px] flex flex-col overflow-hidden shadow-sm border border-neutral-200">
        <div class="flex flex-col px-[16px] pt-[16px] shrink-0">
            <div class="flex items-center bg-neutral-200 rounded-[8px] px-[9px] py-[11px] mb-[16px] gap-[8px]">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#737373" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Cari..."
                    class="bg-transparent border-none outline-none text-[12px] w-full text-[#000] placeholder:text-neutral-500">
            </div>
            <div class="flex overflow-x-auto pos-scroll gap-[12px] pb-[16px] border-b border-black/10">
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold shrink-0">Semua
                    (9)</button>
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">Merchandise
                    (4)</button>
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">Makanan
                    (3)</button>
                <button
                    class="flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">Jasa
                    (2)</button>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pos-scroll p-[16px]">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-[16px]">

                <div
                    class="bg-neutral-50 border border-neutral-200 rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="w-full h-[150px] bg-neutral-100 relative flex justify-center items-center overflow-hidden">
                        <img src="<?php echo e(asset('assets/img/products/poster-jersey.png')); ?>" alt="Produk"
                            class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="flex flex-col p-[12px] gap-[8px]">
                        <div class="flex flex-col">
                            <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Basrengggg
                            </h3>
                            <span class="text-[18px] font-bold text-primary-500">Rp5.000</span>
                            <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 50</span>
                        </div>
                        <button
                            class="w-full bg-neutral-50 border border-primary-500 text-primary-500 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-primary-500 hover:text-white transition-colors">
                            Tambah
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div
        class="w-full lg:w-[357px] min-[900px]:w-[360px] bg-neutral-950 rounded-[16px] p-[16px] flex flex-col text-white shadow-xl h-full min-h-0 shrink-0">

        <div class="flex flex-col gap-[16px] pb-[16px] border-b border-white/20 shrink-0">
            <div class="flex flex-col gap-[4px]">
                <div class="flex items-center gap-[8px]">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6FF33" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <h2 class="text-[18px] font-extrabold text-white m-0">Keranjang</h2>
                </div>
                <span class="text-[12px] text-neutral-300">1 Item - Klik produk untuk menambah</span>
            </div>

            <div class="bg-neutral-950 border border-secondary-500 rounded-[10px] px-[15px] py-[10px] flex items-center">
                <input type="text" placeholder="Nama pembeli (opsional)"
                    class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-neutral-600">
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pos-scroll py-[16px] flex flex-col gap-[12px]">

            <div class="border border-neutral-50 rounded-[12px] p-[12px] flex flex-col gap-[10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-[10px] items-center">
                        <div
                            class="w-[45px] h-[45px] bg-neutral-100 rounded-[8px] flex items-center justify-center overflow-hidden shrink-0">
                            <img src="<?php echo e(asset('assets/img/products/poster-jersey.png')); ?>"
                                class="h-[40px] object-contain" />
                        </div>
                        <div class="flex flex-col justify-center gap-[2px]">
                            <span class="text-[12px] font-medium text-white leading-none">Basrengggg</span>
                            <span class="text-[12px] font-bold text-white leading-none">Rp5.000</span>
                            <span class="text-[10px] font-bold text-primary-500 cursor-pointer hover:underline mt-[2px]"
                                onclick="openModal('modalTambahCatatan')">Tambah
                                catatan</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-[12px]">
                        <button
                            class="w-[30px] h-[26px] border border-primary-500 rounded-[6px] text-secondary-500 flex items-center justify-center text-[16px] font-medium hover:bg-primary-500/20">-</button>
                        <span class="text-[12px] font-medium text-white w-[10px] text-center">1</span>
                        <button
                            class="w-[30px] h-[26px] border border-primary-500 rounded-[6px] text-secondary-500 flex items-center justify-center text-[16px] font-medium hover:bg-primary-500/20">+</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col pt-[16px] gap-[16px] border-t border-[#333] shrink-0">

            <div class="flex flex-col gap-[8px]">
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Subtotal</span>
                    <span>Rp10.000</span>
                </div>
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Diskon</span>
                    <span>—</span>
                </div>
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Voucher</span>
                    <span class="text-primary-500 font-bold cursor-pointer hover:underline"
                        onclick="openModal('modalPakaiVoucher')">+ Masukkan kode</span>
                </div>
                <div class="flex justify-between items-center mt-[4px]">
                    <span class="text-[16px] font-extrabold text-neutral-300">Total</span>
                    <span class="text-[16px] font-extrabold text-secondary-500" id="totalTagihan">Rp10.000</span>
                </div>
            </div>

            <div class="flex flex-col gap-[10px]">

                <div class="flex gap-[9px]">
                    <button id="btnTunai" onclick="switchMethod('tunai')"
                        class="flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors">
                        Tunai
                    </button>
                    <button id="btnQris" onclick="switchMethod('qris')"
                        class="flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors">
                        QRIS
                    </button>
                </div>

                <div id="areaTunai" class="flex flex-col gap-[10px]">
                    <div class="bg-neutral-950 border border-secondary-500 rounded-[10px] px-[15px] py-[10px]">
                        <input type="number" id="inputUang" oninput="hitungKembalian(); clearActiveNominal()"
                            placeholder="Uang diterima..."
                            class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-neutral-600">
                    </div>

                    <div class="flex gap-[7px] overflow-x-auto pos-scroll pb-[4px]">
                        <button onclick="setNominal(2000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">2rb</button>
                        <button onclick="setNominal(5000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">5rb</button>
                        <button onclick="setNominal(10000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">10rb</button>
                        <button onclick="setNominal(20000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">20rb</button>
                        <button onclick="setNominal(50000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">50rb</button>
                        <button onclick="setNominal(100000, this)"
                            class="btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent">100rb</button>
                    </div>

                    <div id="teksKembalian" class="text-[12px] font-semibold text-secondary-500 mt-[2px]">
                        Kembalian: Rp 0
                    </div>
                </div>

                <button
                    class="w-full bg-secondary-500 text-black shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] py-[12px] text-[16px] font-extrabold hover:bg-[#b0eb1e] transition-colors mt-[4px] cursor-pointer"
                    onclick="openModal('modalCheckout')">
                    Proses Pembayaran
                </button>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!-- KUMPULAN MODAL KASIR -->

    <!-- MODAL CHECKOUT -->
    <div id="modalCheckout" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-white w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[24px_37px] flex flex-col gap-[25px]">

            <!-- Header -->
            <div class="flex justify-between items-center w-full">
                <h2 class="font-['Montserrat'] text-[18px] font-bold text-black leading-[28px]">Checkout</h2>
                <button class="text-primary-500 hover:opacity-70 transition-opacity cursor-pointer"
                    onclick="closeModal('modalCheckout')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="flex flex-col items-end gap-[12px] w-full">
                <!-- Rincian Box -->
                <div class="bg-neutral-100 rounded-[12px] p-[12px_16px] flex flex-col gap-[8px] w-full">
                    <span class="font-['Montserrat'] text-[14px] font-bold text-black text-left">RINCIAN PESANAN</span>

                    <div class="flex flex-col gap-[4px] w-full">
                        <!-- Item 1 -->
                        <div class="flex flex-col w-full pb-[8px] border-b-[0.2px] border-black">
                            <div class="flex justify-between items-center w-full">
                                <span class="font-['Montserrat'] text-[12px] font-medium text-black">Basrenggg</span>
                                <span class="font-['Montserrat'] text-[12px] font-normal text-black">Rp 5.000 x 1</span>
                                <span
                                    class="font-['Montserrat'] text-[12px] font-bold text-black text-right min-w-[70px]">Rp
                                    5.000</span>
                            </div>
                            <span class="font-['Montserrat'] text-[10px] font-normal text-black">Catatan: pedesnya sedeng
                                dikit</span>
                        </div>
                        <!-- Item 2 -->
                        <div class="flex flex-col w-full pb-[8px] border-b-[0.2px] border-black mt-[4px]">
                            <div class="flex justify-between items-center w-full">
                                <span class="font-['Montserrat'] text-[12px] font-medium text-black">Basrenggg</span>
                                <span class="font-['Montserrat'] text-[12px] font-normal text-black">Rp 5.000 x 1</span>
                                <span
                                    class="font-['Montserrat'] text-[12px] font-bold text-black text-right min-w-[70px]">Rp
                                    5.000</span>
                            </div>
                            <span class="font-['Montserrat'] text-[10px] font-normal text-black">Catatan: pedesnya sedeng
                                dikit</span>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="flex flex-col w-full mt-[4px]">
                        <div class="flex justify-between items-center w-full">
                            <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Total pesanan</span>
                            <span class="font-['Montserrat'] text-[12px] font-bold text-black">Rp 10.000</span>
                        </div>
                        <div class="flex justify-between items-center w-full mb-[8px]">
                            <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Diskon</span>
                            <span class="font-['Montserrat'] text-[12px] font-semibold text-black">—</span>
                        </div>
                        <div class="flex justify-between items-center w-full border-t-[0.2px] border-black pt-[8px]">
                            <span class="font-['Montserrat'] text-[14px] font-bold text-black">Total</span>
                            <span class="font-['Montserrat'] text-[14px] font-bold text-primary-500">Rp 10.000</span>
                        </div>
                    </div>
                </div>

                <!-- Catatan Transaksi -->
                <div class="flex flex-col gap-[8px] w-full">
                    <span class="font-['Montserrat'] text-[14px] font-normal text-black uppercase text-left">Catatan
                        Transaksi</span>
                    <textarea placeholder="cth: Bayar 2 kali, atau titip barang"
                        class="w-full bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] font-['Montserrat'] text-[14px] text-black placeholder-neutral-400 h-[85px] focus:outline-none focus:border-primary-500"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex gap-[16px] w-full mt-[10px]">
                    <button
                        class="w-[150px] h-[48px] bg-neutral-300 rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-[#868686] flex justify-center items-center hover:bg-[#c4c4c4] transition-colors cursor-pointer"
                        onclick="closeModal('modalCheckout')">Batal</button>
                    <button
                        class="flex-1 h-[48px] bg-secondary-500 shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-black flex justify-center items-center hover:opacity-90 transition-opacity cursor-pointer"
                        onclick="proceedToPayment()">Konfirmasi
                        Pembayaran</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL TAMBAH CATATAN -->
    <div id="modalTambahCatatan" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col gap-[20px]">

            <div class="flex justify-between items-center w-full">
                <h2 class="font-['Montserrat'] text-[18px] font-bold text-black leading-[28px]">Masukkan catatan untuk
                    Basreng</h2>
                <button class="text-primary-500 hover:opacity-70 transition-opacity cursor-pointer"
                    onclick="closeModal('modalTambahCatatan')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <textarea placeholder="cth: Pedesnya sedeng dikit"
                class="w-full bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] font-['Montserrat'] text-[14px] text-black placeholder-neutral-400 h-[85px] focus:outline-none focus:border-primary-500"></textarea>

            <div class="flex gap-[12px] w-full">
                <button
                    class="flex-1 h-[48px] bg-neutral-300 rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-[#868686] flex justify-center items-center hover:bg-[#c4c4c4] transition-colors cursor-pointer"
                    onclick="closeModal('modalTambahCatatan')">Batal</button>
                <button
                    class="flex-1 h-[48px] bg-secondary-500 shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-black flex justify-center items-center hover:opacity-90 transition-opacity cursor-pointer">Tambah</button>
            </div>
        </div>
    </div>


    <!-- MODAL PAKAI VOUCHER (Pakai-Voucher) -->
    <div id="modalPakaiVoucher" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[391px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col gap-[20px]">

            <div class="flex justify-between items-center w-full">
                <h2 class="font-['Montserrat'] text-[18px] font-bold text-black leading-[28px]">Masukkan Kode Voucher</h2>
                <button class="text-primary-500 hover:opacity-70 transition-opacity cursor-pointer"
                    onclick="closeModal('modalPakaiVoucher')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <input type="text" placeholder="cth : EKRAF20"
                class="w-full h-[44px] bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] font-['Montserrat'] text-[14px] text-black placeholder-neutral-400 focus:outline-none focus:border-primary-500">

            <div class="flex gap-[12px] w-full">
                <button
                    class="flex-1 h-[48px] bg-neutral-300 rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-[#868686] flex justify-center items-center hover:bg-[#c4c4c4] transition-colors cursor-pointer"
                    onclick="closeModal('modalPakaiVoucher')">Batal</button>
                <button
                    class="flex-1 h-[48px] bg-secondary-500 shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-black flex justify-center items-center hover:opacity-90 transition-opacity cursor-pointer">Gunakan
                    voucher</button>
            </div>
        </div>
    </div>


    <!-- MODAL SCAN QRIS -->
    <div id="modalScanQRIS" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col items-center gap-[20px] max-h-[96dvh] overflow-y-auto">

            <div class="flex flex-col items-center gap-[18px] w-full max-w-[346px]">
                <h2 class="font-['Montserrat'] text-[24px] font-bold text-black text-center">Scan untuk membayar</h2>
                <span class="font-['Montserrat'] text-[16px] font-semibold text-black text-center">Batas waktu pembayaran:
                    <span class="text-red-600">10:00</span></span>

                <!-- Tempat QR Code image -->
                <div class="w-[220px] h-[220px] bg-primary-500 rounded-[16px] flex justify-center items-center overflow-hidden"
                    onclick="successPayment()">
                    <!-- Ganti img src ini dengan QR aslimu -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=contoh&color=ffffff&bgcolor=7D39EB"
                        alt="QR Code" class="w-full h-full object-cover">
                </div>

                <!-- Badge Rekaps Store -->
                <div class="flex items-center justify-center gap-[10px] w-[286px] h-[52px] bg-primary-500 rounded-[24px]">
                    <svg width="37" height="29" viewBox="0 0 37 29" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="12.8439" cy="15.2845" rx="2.07365" ry="2.07352" fill="#FAFAFA" />
                        <ellipse cx="17.7812" cy="26.7" rx="1.67867" ry="1.67856" fill="#FAFAFA" />
                        <ellipse cx="7.90669" cy="26.7" rx="1.67867" ry="1.67856" fill="#FAFAFA" />
                        <path
                            d="M7.89697 1.32227C11.3381 1.32236 14.1274 4.11182 14.1274 7.55273C14.1273 10.3704 12.2562 12.7497 9.68896 13.5195C9.6401 13.3637 9.59064 13.207 9.5376 13.0508C8.01343 8.56073 5.19723 5.23447 2.52588 4.39453C3.60923 2.55611 5.60858 1.32227 7.89697 1.32227Z"
                            fill="#FAFAFA" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.839914 4.79102C1.97121 4.9322 3.15464 5.5608 4.27839 6.56738L4.28034 6.56641C4.29744 6.58173 4.31406 6.59778 4.33112 6.61328C4.39996 6.67576 4.46787 6.74036 4.5362 6.80566C4.57068 6.83862 4.60538 6.87161 4.63972 6.90527C4.83789 7.09951 5.0338 7.3053 5.22663 7.52246C5.25016 7.54895 5.27351 7.57572 5.29695 7.60254C5.37228 7.68877 5.44721 7.77661 5.52155 7.86621C5.55042 7.901 5.57878 7.93639 5.60749 7.97168C5.67527 8.055 5.74278 8.13952 5.80964 8.22559C5.83804 8.26214 5.86638 8.2989 5.8946 8.33594C5.96946 8.43419 6.04368 8.53411 6.11726 8.63574C6.13609 8.66175 6.15516 8.68765 6.1739 8.71387C6.36014 8.97451 6.54199 9.24585 6.71882 9.52734C6.73916 9.55971 6.75916 9.59237 6.77937 9.625C6.84398 9.7294 6.90759 9.8353 6.97077 9.94238C6.99947 9.991 7.02832 10.0397 7.05671 10.0889C7.10344 10.1698 7.1495 10.2516 7.19538 10.334C7.2322 10.4001 7.26948 10.4662 7.30573 10.5332C7.36368 10.6403 7.42019 10.749 7.47663 10.8584C7.49982 10.9033 7.52402 10.9479 7.54695 10.9932C7.61699 11.1317 7.68546 11.2721 7.753 11.4141C7.78588 11.4832 7.81741 11.5531 7.84968 11.623C7.89618 11.7238 7.94218 11.8253 7.98737 11.9277C8.01099 11.9812 8.03444 12.0349 8.05769 12.0889C8.10414 12.1967 8.14946 12.3055 8.19441 12.415C8.22273 12.484 8.25068 12.5534 8.27839 12.623C8.30919 12.7005 8.34016 12.7782 8.37019 12.8564C8.40374 12.9439 8.43723 13.0317 8.4698 13.1201C8.52705 13.2756 8.58367 13.4323 8.63776 13.5908C8.64155 13.6019 8.64571 13.6129 8.64948 13.624C8.89902 14.3592 9.10089 15.0912 9.25886 15.8105C9.26287 15.8288 9.2676 15.847 9.27155 15.8652C9.31833 16.0812 9.35981 16.2963 9.39851 16.5098C9.4046 16.5434 9.41117 16.5768 9.41706 16.6104C9.45407 16.8211 9.4865 17.0305 9.51569 17.2383C9.51972 17.267 9.52353 17.2956 9.52741 17.3242C9.55568 17.5326 9.58019 17.7394 9.60066 17.9443C9.60371 17.975 9.60656 18.0056 9.60944 18.0361C9.62847 18.2376 9.64381 18.4372 9.65534 18.6348C9.65675 18.6589 9.65893 18.683 9.66023 18.707C9.67133 18.9132 9.67773 19.117 9.68073 19.3184C9.68112 19.3444 9.68146 19.3705 9.68171 19.3965C9.69586 20.844 9.50142 22.1594 9.11335 23.251C9.05822 23.4061 8.99849 23.5563 8.93562 23.7021C8.92077 23.7366 8.90597 23.7708 8.89069 23.8047C8.87494 23.8396 8.86003 23.8748 8.84382 23.9092L8.84187 23.9082C8.79493 24.0077 8.74806 24.1057 8.69734 24.2002C6.95031 23.4932 5.42244 22.3596 4.2403 20.9297C4.22318 20.9094 4.2066 20.8886 4.18952 20.8682C4.16264 20.8352 4.13498 20.8028 4.10847 20.7695C2.88128 19.2723 1.79664 17.3202 1.03523 15.0771C-0.317251 11.0925 -0.303828 7.21557 0.839914 4.79102Z"
                            fill="#FAFAFA" />
                        <path
                            d="M28.0994 0C31.2477 4.82451e-05 34.093 1.2953 36.1345 3.37988C35.7147 3.32738 35.2866 3.29786 34.8533 3.29785C29.1364 3.29835 24.4641 7.99887 24.155 13.9189C24.1387 15.1887 23.9133 16.4079 23.5095 17.543C23.4582 17.687 23.4024 17.8294 23.3455 17.9707C23.3286 18.0126 23.3101 18.0541 23.2927 18.0957C23.2494 18.1996 23.2063 18.3039 23.1599 18.4062C23.143 18.4435 23.1245 18.4805 23.1072 18.5176C23.0537 18.6323 22.9974 18.7458 22.9402 18.8584C22.9298 18.8788 22.9195 18.8996 22.9089 18.9199C21.041 22.5408 17.2682 25.0194 12.9128 25.0195C11.7099 25.0195 10.5513 24.8282 9.4646 24.4785C10.4229 21.7855 12.3784 19.5656 14.8865 18.2627C14.7956 18.3099 14.7044 18.3567 14.615 18.4062C15.2931 17.8589 15.8563 17.1916 16.2673 16.4082C16.838 15.32 17.057 14.1187 16.9714 12.8887C16.9773 12.9289 16.9856 12.9687 16.9919 13.0088C16.9014 12.4344 16.8523 11.8459 16.8523 11.2461C16.8524 8.67966 17.7137 6.31447 19.1609 4.42188C21.216 1.73464 24.455 0.00020784 28.0994 0ZM20.0613 17.0029C19.7598 17.0029 19.4612 17.0154 19.1658 17.0391C19.4612 17.0155 19.7598 17.003 20.0613 17.0029ZM17.9324 16.0557C17.9557 16.1048 17.9797 16.1534 18.0037 16.2021C17.9797 16.1534 17.9557 16.1048 17.9324 16.0557ZM17.5173 15.0635C17.5329 15.1064 17.5501 15.1487 17.5662 15.1914C17.5501 15.1487 17.5328 15.1064 17.5173 15.0635ZM17.196 14.0156C17.2066 14.0572 17.2192 14.0982 17.2302 14.1396C17.2155 14.0841 17.2002 14.0286 17.1863 13.9727L17.196 14.0156ZM23.7097 10.6143C23.6874 10.5375 23.6624 10.4618 23.6384 10.3857C23.6624 10.4617 23.6873 10.5376 23.7097 10.6143Z"
                            fill="#FAFAFA" />
                    </svg>

                    <span class="font-['Montserrat'] text-[24px] font-bold text-white tracking-wide">Rekaps Store</span>
                </div>
            </div>

            <div
                class="bg-neutral-50 border border-[#E5E5E5] shadow-[0_0_3px_rgba(0,0,0,0.25)] rounded-[24px] w-full p-[30px] flex flex-col gap-[20px]">
                <h3 class="font-['Montserrat'] text-[16px] font-bold text-black text-center">Langkah Pembayaran dengan QRIS
                </h3>
                <ol
                    class="list-decimal pl-[16px] font-['Montserrat'] text-[14px] font-medium text-black leading-[20px] space-y-[4px]">
                    <li>Scan QR code menggunakan aplikasi seperti GoPay, OVO, DANA, atau mobile banking</li>
                    <li>Pastikan nominal sesuai dengan total pembayaran</li>
                    <li>Konfirmasi dan masukkan PIN</li>
                    <li>Selesai</li>
                </ol>
            </div>

            <button
                class="w-full h-[48px] min-h-[48px] bg-neutral-50 border border-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-primary-500 flex justify-center items-center hover:bg-primary-500 hover:text-white transition-colors cursor-pointer"
                onclick="closeModal('modalScanQRIS')">
                Batal
            </button>
        </div>
    </div>


    <!-- MODAL TRANSAKSI BERHASIL -->
    <div id="modalTransaksiBerhasil" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="custom-scrollbar bg-neutral-50 w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col items-center gap-[20px] max-h-[96dvh] overflow-y-auto">

            <!-- Header Checkmark -->
            <div class="flex flex-col items-center gap-[13px] pt-[10px]">
                <div
                    class="w-[114px] h-[114px] rounded-full border-[7px] border-secondary-500 flex justify-center items-center bg-white">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                        stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <div class="flex flex-col items-center gap-[4px]">
                    <h2 class="font-['Montserrat'] text-[24px] font-bold text-black text-center">Transaksi Berhasil!</h2>
                    <span class="font-['Montserrat'] text-[14px] font-medium text-neutral-600 text-center">Pembayaran telah
                        dikonfirmasi</span>
                </div>
            </div>

            <!-- Receipt Box -->
            <div class="bg-neutral-100 rounded-[12px] p-[28px_20px] flex flex-col gap-[8px] w-full">
                <div class="flex flex-col items-center gap-[4px] w-full pb-[16px] border-b-[0.2px] border-black">
                    <span class="font-['Carattere'] text-[32px] text-primary-500 text-center leading-[1] italic">Rekaps
                        Store</span>
                    <span class="font-['Montserrat'] text-[12px] font-normal text-neutral-500 text-center">DEPARTEMEN
                        EKONOMI
                        KREATIF</span>
                    <div class="flex items-center gap-[12px]">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-neutral-500">@himarpl</span>
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-neutral-500">@rekaps.store</span>
                    </div>
                </div>

                <!-- Details Table -->
                <div class="flex flex-col gap-[4px] w-full py-[10px] border-b-[0.2px] border-dashed border-black">
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">No.Transaksi</span>
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">#TRX-0342</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">Kasir</span>
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">Admin Ekraf</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">Waktu</span>
                        <span class="font-['Montserrat'] text-[12px] font-medium text-black">3/4/2026, 09.04.00</span>
                    </div>
                </div>

                <!-- Items -->
                <div class="flex flex-col gap-[4px] w-full py-[10px] border-b-[0.2px] border-dashed border-black">
                    <div class="flex flex-col w-full pb-[8px]">
                        <div class="flex justify-between items-center w-full">
                            <span class="font-['Montserrat'] text-[12px] font-medium text-black">Basrenggg</span>
                            <span class="font-['Montserrat'] text-[12px] font-normal text-black">Rp 5.000 x 1</span>
                            <span class="font-['Montserrat'] text-[12px] font-bold text-black text-right min-w-[60px]">Rp
                                5.000</span>
                        </div>
                        <span class="font-['Montserrat'] text-[10px] font-normal text-black">Catatan: pedesnya sedeng
                            dikit</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex justify-between items-center w-full">
                            <span class="font-['Montserrat'] text-[12px] font-medium text-black">Basrenggg</span>
                            <span class="font-['Montserrat'] text-[12px] font-normal text-black">Rp 5.000 x 1</span>
                            <span class="font-['Montserrat'] text-[12px] font-bold text-black text-right min-w-[60px]">Rp
                                5.000</span>
                        </div>
                        <span class="font-['Montserrat'] text-[10px] font-normal text-black">Catatan: pedesnya sedeng
                            dikit</span>
                    </div>
                </div>

                <!-- Total Calculation -->
                <div class="flex flex-col gap-[4px] w-full py-[10px] border-b-[0.2px] border-black">
                    <div class="flex justify-between items-center w-full mb-[4px]">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Catatan Transaksi</span>
                        <span class="font-['Montserrat'] text-[12px] font-normal text-black">Nitip dulu barangnya</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Total pesanan</span>
                        <span class="font-['Montserrat'] text-[12px] font-bold text-black">Rp 10.000</span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">Diskon</span>
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-black">—</span>
                    </div>
                </div>

                <div class="flex justify-between items-center w-full pt-[8px]">
                    <span class="font-['Montserrat'] text-[14px] font-bold text-black">Total</span>
                    <span class="font-['Montserrat'] text-[14px] font-bold text-primary-500">Rp 10.000</span>
                </div>
                <div class="flex justify-between items-center w-full mt-[4px]">
                    <span class="font-['Montserrat'] text-[12px] font-medium text-black">Metode Bayar</span>
                    <span class="font-['Montserrat'] text-[12px] font-medium text-black">QRIS</span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-[12px] w-full mt-[10px]">
                <button
                    class="flex-1 h-[48px] bg-neutral-50 border border-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-primary-500 flex justify-center items-center gap-[8px] hover:bg-primary-500 hover:text-white transition-colors group cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Cetak Struk
                </button>
                <button
                    class="flex-1 h-[48px] bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-white flex justify-center items-center hover:opacity-90 transition-opacity cursor-pointer"
                    onclick="closeModal('modalTransaksiBerhasil')">Selesai</button>
            </div>
        </div>
    </div>

    <script>
        // Simulasi total harga di keranjang
        const TOTAL_HARGA = 10000;
        let currentMethod = 'tunai';


        /* ---- Switch Payment Method ---- */
        function switchMethod(method) {
            currentMethod = method;
            const btnTunai = document.getElementById('btnTunai');
            const btnQris = document.getElementById('btnQris');
            const areaTunai = document.getElementById('areaTunai');

            if (method === 'tunai') {
                // Style Aktif untuk Tunai
                btnTunai.className =
                    "flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";
                // Style Pasif untuk QRIS
                btnQris.className =
                    "flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";

                // Munculkan input uang & kembalian
                areaTunai.classList.remove('hidden');
                areaTunai.classList.add('flex');
            } else {
                // Style Aktif untuk QRIS
                btnQris.className =
                    "flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";
                // Style Pasif untuk Tunai
                btnTunai.className =
                    "flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors";

                // Sembunyikan input uang & kembalian
                areaTunai.classList.add('hidden');
                areaTunai.classList.remove('flex');
            }
        }

        /* ---- Set Cepat Nominal Uang ---- */
        function setNominal(amount, btnElement) {
            // Masukkan value ke input
            document.getElementById('inputUang').value = amount;

            // Hitung ulang kembalian
            hitungKembalian();

            // Reset semua tombol nominal agar tidak aktif
            const buttons = document.querySelectorAll('.btn-nominal');
            buttons.forEach(btn => {
                btn.className =
                    "btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent";
            });

            // Jadikan tombol yang di-klik aktif (Garis & Text Lime)
            btnElement.className =
                "btn-nominal px-[12px] py-[6px] bg-[#292524] border border-secondary-500 text-secondary-500 rounded-full text-[10px] font-bold shrink-0";
        }

        /* ---- Hitung Kembalian Otomatis ---- */
        function hitungKembalian() {
            const inputVal = parseInt(document.getElementById('inputUang').value) || 0;
            const kembalian = inputVal - TOTAL_HARGA;
            const tampilKembalian = kembalian > 0 ? kembalian : 0; // Jika minus, biarkan 0

            document.getElementById('teksKembalian').innerText = 'Kembalian: Rp ' + tampilKembalian.toLocaleString('id-ID');
        }

        /* ---- Hapus status aktif tombol nominal jika user ngetik manual ---- */
        function clearActiveNominal() {
            const buttons = document.querySelectorAll('.btn-nominal');
            buttons.forEach(btn => {
                btn.className =
                    "btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 hover:bg-[#3f3936] transition-colors border border-transparent";
            });
        }

        /* ---- Modal Scripts ---- */

        // Fungsi untuk membuka modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            }
        }

        // Fungsi untuk menutup modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        /* ---- Alur Transaksi Kasir ---- */

        // 1. Dari Checkout lanjut ke Pembayaran QRIS
        function proceedToPayment() {
            closeModal('modalCheckout'); // Tutup modal checkout
            openModal('modalScanQRIS'); // Buka modal scan QR

            // setTimeout(() => {
            //     successPayment();
            // }, 5000);
        }

        // 2. Simulasi Pembayaran Berhasil (Dari QRIS -> Sukses)
        function successPayment() {
            closeModal('modalScanQRIS');
            openModal('modalTransaksiBerhasil');

            // setTimeout(() => {
            //     closeModal('modalTransaksiBerhasil');
            // }, 3000);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pengurus.layouts.layout-cashier', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/pengurus/cashier.blade.php ENDPATH**/ ?>