<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kasir — Rekaps Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carattere&family=Montserrat:wght@100..900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')

    <style>
        /* Custom Scrollbar untuk Area List Produk & Keranjang */
        .pos-scroll::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .pos-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .pos-scroll::-webkit-scrollbar-thumb {
            background: #d4d4d4;
            border-radius: 10px;
        }

        .pos-scroll:hover::-webkit-scrollbar-thumb {
            background: #a3a3a3;
        }
    </style>
</head>

<body class="font-['Montserrat',sans-serif] bg-[#F2EBFD] text-neutral-950 h-dvh w-full overflow-hidden flex">

    <aside class="w-[80px] h-full bg-black flex flex-col items-center justify-between py-[24px] shrink-0 z-20">
        <div class="flex flex-col items-center w-full">
            <div class="w-full flex justify-center pb-[18px] border-b border-[#1E293B] mb-[24px]">
                <div class="w-[48px] h-[35px] relative flex justify-center items-center">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2L2 9L16 16L30 9L16 2Z" fill="#7D39EB" />
                        <path d="M2 23L16 30L30 23V9L16 16L2 9V23Z" fill="#7D39EB" fill-opacity="0.8" />
                    </svg>
                </div>
            </div>

            <div class="flex flex-col gap-[10px] w-full px-[14px]">
                <a href="#"
                    class="w-[40px] h-[40px] bg-[#7D39EB] rounded-[8px] flex justify-center items-center relative mx-auto group">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </a>

                <a href="#"
                    class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto hover:bg-[#1f1f1f] transition-colors">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#D7C2F9"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </a>

                <a href="#"
                    class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto hover:bg-[#1f1f1f] transition-colors">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#D7C2F9"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-[10px] w-full px-[14px] pt-[14px] border-t border-[#1E293B]">
            <a href="#"
                class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto hover:bg-[#1f1f1f] transition-colors">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#D7C2F9" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
            </a>

            <a href="#"
                class="w-[40px] h-[40px] rounded-[8px] flex justify-center items-center mx-auto hover:bg-[#1f1f1f] transition-colors">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#D7C2F9"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 h-full relative z-10">

        <header
            class="h-[70px] bg-[#FAFAFA] shadow-[0px_1px_10px_rgba(0,0,0,0.25)] flex items-center justify-between px-[20px] shrink-0 z-10">
            <div class="flex items-center gap-[20px]">
                <div class="flex flex-col justify-center pb-[2px] border-b border-[#F8FAFC]">
                    <div class="font-['Carattere'] text-[24px] leading-none text-[#7D39EB]">Rekaps Store</div>
                    <div class="font-bold text-[9px] leading-[12px] tracking-[2px] text-black">REKAPS BAZAR</div>
                </div>

                <div class="h-[42px] border-l-[2px] border-black/20 mx-[5px]"></div>

                <div class="flex flex-col">
                    <div class="font-bold text-[18px] text-black leading-[28px] mt-[-2px]">Kasir</div>
                    <div class="flex items-center gap-[4px] text-[12px] font-medium leading-[16px]">
                        <span class="text-[#A1A1A1]">Rekaps Store /</span>
                        <span class="text-[#7D39EB]">Kasir</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-[11px]">
                <div class="font-bold text-[14px] text-black w-[58px] text-center">15:40</div>
                <button
                    class="w-[40px] h-[40px] bg-[#7D39EB] rounded-[8px] flex items-center justify-center text-white font-bold text-[12px] hover:bg-[#6b2fd1] transition-colors">
                    AR
                </button>
            </div>
        </header>

        <main
            class="flex-1 flex flex-col lg:flex-row gap-[20px] p-[20px] xl:p-[2s0px_20px_20px] overflow-hidden min-h-0">

            <div class="flex-1 bg-[#FAFAFA] rounded-[16px] flex flex-col overflow-hidden shadow-sm">
                <div class="flex flex-col px-[16px] pt-[16px] shrink-0">
                    <div class="flex items-center bg-[#E5E5E5] rounded-[8px] px-[9px] py-[11px] mb-[16px] gap-[8px]">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#737373"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" placeholder="Cari..."
                            class="bg-transparent border-none outline-none text-[12px] w-full text-[#000] placeholder:text-[#737373]">
                    </div>
                    <div class="flex flex-wrap gap-[12px] pb-[16px] border-b border-black/10">
                        <button
                            class="flex justify-center items-center px-[12px] py-[8px] bg-[#7D39EB] shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold">Semua
                            (9)</button>
                        <button
                            class="flex justify-center items-center px-[12px] py-[8px] bg-[#E5E5E5] rounded-full text-[#404040] text-[14px] font-bold hover:bg-[#d4d4d4] transition-colors">Merchandise
                            (4)</button>
                        <button
                            class="flex justify-center items-center px-[12px] py-[8px] bg-[#E5E5E5] rounded-full text-[#404040] text-[14px] font-bold hover:bg-[#d4d4d4] transition-colors">Makanan
                            (3)</button>
                        <button
                            class="flex justify-center items-center px-[12px] py-[8px] bg-[#E5E5E5] rounded-full text-[#404040] text-[14px] font-bold hover:bg-[#d4d4d4] transition-colors">Jasa
                            (2)</button>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto pos-scroll p-[16px]">
                    <div class="grid grid-cols-2 md:grid-cols-3 2xl:grid-cols-4 gap-[16px]">

                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <div
                                    class="absolute top-0 left-0 bg-[#C6FF33] rounded-br-[6px] flex items-center px-[4px] py-[2px] gap-[2px] z-10">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        stroke="#000" stroke-width="2">
                                        <path d="M15 5v14l-3-3-3 3-3-3-3 3V5c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2z"></path>
                                    </svg>
                                    <span class="text-[10px] font-medium text-black">-20%</span>
                                </div>
                                <div
                                    class="absolute top-[5px] right-[5px] w-[32px] h-[32px] rounded-full flex items-center justify-center border border-[#7D39EB] bg-white/50 z-10">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="#7D39EB" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Jersey RPL
                                        Premium</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp140.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 21</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Pin Custom
                                        Rekaps</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp10.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 107</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Pin Custom
                                        Rekaps</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp10.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 107</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Pin Custom
                                        Rekaps</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp10.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 107</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Pin Custom
                                        Rekaps</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp10.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 107</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Pin Custom
                                        Rekaps</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp10.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 107</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Pin Custom
                                        Rekaps</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp10.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 107</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <div
                            class="bg-[#FAFAFA] border border-[#E5E5E5] rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-shadow cursor-pointer group">
                            <div
                                class="w-full h-[150px] bg-[#F5F5F5] relative flex justify-center items-center overflow-hidden">
                                <img src="{{ asset('assets/img/products/poster-jersey.png') }}" alt="Produk"
                                    class="h-[120px] object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col p-[12px] gap-[8px]">
                                <div class="flex flex-col">
                                    <h3 class="text-[16px] font-semibold text-black leading-tight truncate">Keripik
                                        Cejeco</h3>
                                    <span class="text-[18px] font-bold text-[#7D39EB]">Rp15.000</span>
                                    <span class="text-[14px] font-medium text-[#171717] mt-[2px]">Stok: 42</span>
                                </div>
                                <button
                                    class="w-full bg-[#FAFAFA] border border-[#7D39EB] text-[#7D39EB] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0px_2px_4px_rgba(62,52,69,0.25)] hover:bg-[#7D39EB] hover:text-white transition-colors">
                                    Tambah
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div
                class="w-full lg:w-[357px] bg-[#000000] rounded-[16px] p-[16px] flex flex-col shrink-0 text-white shadow-lg overflow-hidden h-full">

                <div class="flex flex-col gap-[20px] pb-[16px] border-b border-white/20 shrink-0">
                    <div class="flex flex-col gap-[4px]">
                        <div class="flex items-center gap-[5px]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <h2 class="text-[18px] font-extrabold text-white m-0">Keranjang</h2>
                        </div>
                        <span class="text-[12px] text-[#D4D4D4]">0 Item - Klik produk untuk menambah</span>
                    </div>

                    <div
                        class="bg-[#000000] border border-[#C6FF33] rounded-[10px] px-[15px] py-[12px] flex items-center">
                        <input type="text" placeholder="Nama pembeli (opsional)"
                            class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-[#525252]">
                    </div>
                </div>

                <div class="flex-1 flex flex-col items-center justify-center gap-[12px] min-h-[150px]">
                    <div
                        class="w-[59px] h-[59px] rounded-full border-[4px] border-[#C6FF33] flex justify-center items-center opacity-80">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <p class="text-[12px] text-[#D4D4D4] m-0">Belum ada produk</p>
                </div>

                <div class="flex flex-col pt-[16px] gap-[24px] shrink-0">

                    <div class="flex flex-col gap-[8px]">
                        <div class="flex justify-between items-center text-[12px] font-semibold text-[#D4D4D4]">
                            <span>Subtotal</span>
                            <span>Rp0</span>
                        </div>
                        <div class="flex justify-between items-center text-[12px] font-semibold text-[#D4D4D4]">
                            <span>Diskon</span>
                            <span>—</span>
                        </div>
                        <div class="flex justify-between items-center text-[12px] font-semibold text-[#D4D4D4]">
                            <span>Voucher</span>
                            <span class="text-[#7D39EB] font-bold cursor-pointer hover:underline">+ Masukkan
                                kode</span>
                        </div>
                        <div class="flex justify-between items-center mt-[8px]">
                            <span class="text-[16px] font-extrabold text-[#D4D4D4]">Total</span>
                            <span class="text-[16px] font-extrabold text-[#C6FF33]">Rp0</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-[9px]">

                        <div class="flex gap-[9px]">
                            <button
                                class="flex-1 bg-[#C6FF33] text-black border border-[#B4E82E] rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)]">
                                Tunai
                            </button>
                            <button
                                class="flex-1 bg-black text-[#8DB524] border border-[#B4E82E] rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-[#1a1a1a] shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors">
                                QRIS
                            </button>
                        </div>

                        <div class="bg-[#000000] border border-[#C6FF33] rounded-[10px] px-[15px] py-[12px]">
                            <input type="text" placeholder="Uang diterima..."
                                class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-[#525252]">
                        </div>

                        <div class="flex gap-[10px] overflow-x-auto pos-scroll pb-[4px]">
                            <button
                                class="px-[12px] py-[8px] bg-[#292524] border border-[#C6FF33] text-[#C6FF33] rounded-full text-[10px] font-bold shrink-0 min-w-[40px]">Ready</button>
                            <button
                                class="px-[12px] py-[8px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 min-w-[40px] hover:bg-[#3f3936] transition-colors">10.000</button>
                            <button
                                class="px-[12px] py-[8px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 min-w-[48px] hover:bg-[#3f3936] transition-colors">20.000</button>
                            <button
                                class="px-[12px] py-[8px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 min-w-[48px] hover:bg-[#3f3936] transition-colors">50.000</button>
                            <button
                                class="px-[12px] py-[8px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 min-w-[48px] hover:bg-[#3f3936] transition-colors">100.000</button>
                        </div>

                        <div class="text-[12px] font-semibold text-[#C6FF33] mt-[3px]">
                            Kembalian: Rp 0
                        </div>

                        <button
                            class="w-full bg-[#C6FF33] text-black shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] py-[12px] text-[16px] font-extrabold hover:bg-[#b0eb1e] transition-colors mt-[3px]">
                            Proses Pembayaran
                        </button>

                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
