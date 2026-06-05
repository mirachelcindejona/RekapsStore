<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('page_title', 'Tambah Produk'); ?>

<?php $__env->startSection('page_breadcrumb', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex items-center gap-[14px] mb-[24px]">
        <a href="<?php echo e(url('/admin/product')); ?>"
            class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-[#7D39EB] text-[#7D39EB] shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-[#7D39EB] hover:text-neutral-50">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-[20px] font-bold text-neutral-900 m-0">Form Tambah Produk Baru</h1>
    </div>

    <form action="<?php echo e(url('/admin/product')); ?>" method="POST" enctype="multipart/form-data"
        class="grid grid-cols-1 min-[900px]:grid-cols-2 gap-[20px] items-start">
        <?php echo csrf_field(); ?>

        <div class="flex flex-col">
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <div class="flex justify-between items-center border-b border-neutral-200 pb-[10px]">
                    <h3 class="text-[16px] font-bold text-neutral-950 m-0">Foto Produk</h3>
                    <span id="photo_counter"
                        class="text-[12px] font-bold text-neutral-500 bg-neutral-200 px-[8px] py-[2px] rounded-full">0/6</span>
                </div>

                <div class="grid grid-cols-[1fr_80px] gap-[15px]">

                    <label id="main_upload_area" for="image_trigger"
                        class="w-full aspect-[4/5] bg-neutral-50 border border-dashed border-neutral-500 rounded-[10px] flex flex-col items-center justify-center gap-[10px] cursor-pointer transition-colors duration-200 hover:bg-[#f2ebfd] relative overflow-hidden group">

                        <div id="upload_prompt" class="flex flex-col items-center gap-[10px] p-[10px]">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 30.0001V15.0001C5 14.116 5.35119 13.2682 5.97631 12.6431C6.60143 12.0179 7.44928 11.6667 8.33333 11.6667H9.88333C10.432 11.6668 10.9722 11.5315 11.4559 11.2727C11.9397 11.014 12.3522 10.6398 12.6567 10.1834L14.01 8.15008C14.3145 7.69369 14.7269 7.31952 15.2107 7.06076C15.6945 6.80201 16.2347 6.66667 16.7833 6.66675H23.2167C23.7653 6.66667 24.3055 6.80201 24.7893 7.06076C25.2731 7.31952 25.6855 7.69369 25.99 8.15008L27.3433 10.1834C27.6478 10.6398 28.0603 11.014 28.5441 11.2727C29.0278 11.5315 29.568 11.6668 30.1167 11.6667H31.6667C32.5507 11.6667 33.3986 12.0179 34.0237 12.6431C34.6488 13.2682 35 14.116 35 15.0001V30.0001C35 30.8841 34.6488 31.732 34.0237 32.3571C33.3986 32.9822 32.5507 33.3334 31.6667 33.3334H8.33333C7.44928 33.3334 6.60143 32.9822 5.97631 32.3571C5.35119 31.732 5 30.8841 5 30.0001Z"
                                    stroke="#7D39EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M20 26.6667C22.7614 26.6667 25 24.4282 25 21.6667C25 18.9053 22.7614 16.6667 20 16.6667C17.2386 16.6667 15 18.9053 15 21.6667C15 24.4282 17.2386 26.6667 20 26.6667Z"
                                    stroke="#7D39EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="text-[12px] font-semibold text-neutral-400 text-center">
                                Drag & drop atau <br><span class="text-[#7D39EB]">klik untuk upload</span>
                            </div>
                            <div class="text-[10px] text-neutral-400 text-center">PNG, JPG max 5MB & 6 Foto</div>
                        </div>

                        <img id="main_image_preview"
                            class="hidden absolute inset-0 w-full h-full object-contain bg-[#EAEAEA]" />

                        <button type="button" id="delete_main_image" onclick="removeActiveImage(event)"
                            class="hidden absolute top-[10px] right-[10px] bg-red-500/90 text-white rounded-full p-[6px] hover:bg-red-600 shadow-[0_4px_4px_rgba(0,0,0,0.25)] transition-opacity opacity-0 group-hover:opacity-100 backdrop-blur-sm z-10 cursor-pointer">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            </svg>
                        </button>
                    </label>

                    <div id="thumbnails_wrapper" class="hidden w-full h-full relative">
                        <div id="thumbnails_container"
                            class="absolute inset-0 flex flex-col gap-[10px] overflow-y-auto custom-scrollbar pr-[4px]">
                        </div>
                    </div>
                </div>

                <input type="file" id="image_trigger" class="hidden" accept="image/png, image/jpeg" multiple
                    onchange="handleImageSelect(event)">

                <input type="file" name="images[]" id="image_upload" class="hidden" multiple>
            </div>

            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Informasi Produk</h3>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">NAMA PRODUK *</label>
                    <input type="text" name="name" required
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="Masukkan nama produk" />
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">DESKRIPSI PRODUK</label>
                    <textarea name="description"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] resize-y min-h-[85px]"
                        placeholder="Deskripsi..."></textarea>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <div class="flex justify-between items-center">
                        <label class="text-[14px] font-normal text-neutral-950">KATEGORI *</label>

                        <a href="<?php echo e(url('/admin/categories')); ?>" target="_blank"
                            class="text-[#7D39EB] text-[12px] font-bold hover:underline flex items-center gap-[4px]">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            Kelola Kategori
                        </a>
                    </div>

                    <select name="category_product_id" required
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 focus:border-[#7D39EB]">
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <span class="text-[11px] text-neutral-500">Jika kategori baru ditambahkan di tab sebelah, refresh
                        halaman ini.</span>
                </div>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">TIPE PRODUK *</label>
                        <select name="product_type" required
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                            <option value="Ready Stok">Ready Stok</option>
                            <option value="PO">PO</option>
                            <option value="Jasa">Jasa</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">KODE PRODUK *</label>
                        <input type="text" name="product_code" required
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="cth: PRDK01" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">ESTIMASI SELESAI (PO/Jasa)</label>
                    <input type="text" name="estimation"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                        placeholder="cth: 7 hari kerja" />
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">INFO PENGAMBILAN BARANG</label>
                    <textarea name="pickup_info"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)] resize-y min-h-[60px]"
                        placeholder="cth: Diambil di sekretariat jam 15.00"></textarea>
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Harga</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">HARGA MODAL</label>
                        <input type="number" name="cost_price" id="cost_price"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">HARGA JUAL *</label>
                        <input type="number" name="selling_price" id="selling_price" required
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                </div>

                <div class="flex flex-col gap-[8px] w-full">
                    <label class="text-[14px] font-normal text-neutral-950">MARGIN (OTOMATIS)</label>
                    <input type="text" id="margin_display"
                        class="px-[15px] py-[12px] rounded-[10px] border border-neutral-300 text-[14px] font-bold w-full outline-none bg-neutral-200 text-neutral-600 cursor-not-allowed"
                        value="Otomatis" readonly />
                </div>
            </div>

            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Stok Utama (Jika tidak ada varian)</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">JUMLAH STOK</label>
                        <input type="number" name="main_stock" id="main_stock_input"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">STOK MINIMUM (NOTIFIKASI)</label>
                        <input type="number" name="min_stock"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" />
                    </div>
                </div>
            </div>

            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <div class="flex justify-between items-center border-b border-neutral-300 pb-[10px]">
                    <div class="flex flex-col">
                        <h3 class="text-[16px] font-bold text-neutral-950 m-0">Varian Produk</h3>
                        <span class="text-[12px] text-neutral-500">Tambah tipe varian (cth: Ukuran, Warna)</span>
                    </div>
                    <button type="button" onclick="addVariantGroup()"
                        class="bg-[#E5FFA1] text-black px-[16px] py-[8px] rounded-[10px] text-[12px] font-bold shadow-[0_2px_4px_rgba(0,0,0,0.1)] cursor-pointer outline-none border-none hover:bg-[#C6FF33] transition-colors">
                        + Tambah Tipe Varian
                    </button>
                </div>

                <div id="variant_groups_container" class="flex flex-col gap-[15px]">
                </div>

                <div id="variant_combinations_wrapper"
                    class="hidden flex-col gap-[10px] mt-[10px] pt-[15px] border-t border-neutral-300">
                    <h4 class="text-[14px] font-bold text-neutral-950">Atur Stok per Kombinasi Varian</h4>

                    <div
                        class="flex justify-between items-center bg-[#7D39EB] text-white px-[15px] py-[10px] rounded-t-[10px]">
                        <span class="text-[12px] font-bold">KOMBINASI VARIAN</span>
                        <span class="text-[12px] font-bold w-[120px] text-center">STOK</span>
                    </div>

                    <div id="variant_combinations_list" class="flex flex-col gap-[8px]">
                    </div>
                </div>
            </div>

            <div
                class="bg-neutral-50 shadow-[0_0_8px_rgba(0,0,0,0.1)] rounded-xl p-[20px] flex flex-col gap-[15px] mb-[20px]">
                <h3 class="text-[16px] font-bold text-neutral-950 m-0">Status & Diskon</h3>

                <div class="grid grid-cols-1 min-[560px]:grid-cols-2 gap-[15px]">
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">STATUS</label>
                        <select name="status"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]">
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[8px] w-full">
                        <label class="text-[14px] font-normal text-neutral-950">DISKON (%)</label>
                        <input type="number" name="discount"
                            class="px-[15px] py-[12px] rounded-[10px] border border-neutral-500 text-[14px] w-full outline-none bg-neutral-50 text-neutral-800 transition-all duration-200 placeholder:text-neutral-400 focus:border-[#7D39EB] focus:shadow-[0_0_0_3px_rgba(125,57,235,0.15)]"
                            placeholder="0" min="0" max="100" />
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-[#7D39EB] text-white p-[14px] rounded-xl text-[16px] font-bold shadow-[0_0_8px_rgba(114,52,214,0.35)] flex items-center justify-center gap-[10px] mt-[10px] cursor-pointer outline-none border-none transition-all duration-200 hover:bg-[#5928a7]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 4H4V20H20V8L16 4H14M8 4V8H14V4M8 4H14M12 12C11.333 12 10 12.4 10 14C10 15.6 11.333 16 12 16C12.667 16 14 15.6 14 14C14 12.4 12.667 12 12 12Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Simpan Produk
            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        // 1. FITUR HITUNG MARGIN OTOMATIS
        const costInput = document.getElementById('cost_price');
        const sellInput = document.getElementById('selling_price');
        const marginDisplay = document.getElementById('margin_display');

        function calculateMargin() {
            const cost = parseFloat(costInput.value) || 0;
            const sell = parseFloat(sellInput.value) || 0;

            if (sell > 0) {
                const margin = sell - cost;
                const percentage = (margin / sell) * 100;
                marginDisplay.value = `Rp ${margin.toLocaleString('id-ID')} (${percentage.toFixed(1)}%)`;
                marginDisplay.classList.replace('text-neutral-600', 'text-[#8DB524]');
            } else {
                marginDisplay.value = 'Otomatis';
                marginDisplay.classList.replace('text-[#8DB524]', 'text-neutral-600');
            }
        }
        costInput.addEventListener('input', calculateMargin);
        sellInput.addEventListener('input', calculateMargin);


        // 2. FITUR MULTI-VARIAN & MATRIKS KOMBINASI STOK
        // State penyimpanan data varian
        let variantGroups = [{
            id: generateId(),
            name: '',
            options: []
        }];
        let storedStocks = {}; // Menyimpan inputan stok sementara agar tidak hilang saat di-render ulang

        function generateId() {
            return Math.random().toString(36).substr(2, 9);
        }

        function addVariantGroup() {
            variantGroups.push({
                id: generateId(),
                name: '',
                options: []
            });
            renderVariantGroups();
        }

        function removeVariantGroup(id) {
            variantGroups = variantGroups.filter(g => g.id !== id);
            renderVariantGroups();
        }

        function updateGroupName(id, value) {
            const group = variantGroups.find(g => g.id === id);
            if (group) group.name = value;
            renderCombinations(); // Update kombinasi jika nama grup berubah
        }

        function addOption(id) {
            const input = document.getElementById(`input_option_${id}`);
            const val = input.value.trim();
            if (!val) return;

            const group = variantGroups.find(g => g.id === id);
            if (group && !group.options.includes(val)) {
                group.options.push(val);
                input.value = '';
                renderVariantGroups();
            }
        }

        function handleOptionEnter(event, id) {
            if (event.key === 'Enter') {
                event.preventDefault();
                addOption(id);
            }
        }

        function removeOption(groupId, optionIndex) {
            const group = variantGroups.find(g => g.id === groupId);
            if (group) {
                group.options.splice(optionIndex, 1);
                renderVariantGroups();
            }
        }

        // Fungsi menyimpan sementara nilai stok yang diketik
        function saveStockValue(key, value) {
            storedStocks[key] = value;
        }

        // Fungsi kalkulasi Cartesian Product (Menyilangkan array)
        function cartesianProduct(arrays) {
            if (arrays.length === 0) return [];
            return arrays.reduce((a, b) => a.flatMap(d => b.map(e => [d, e].flat())));
        }

        function renderVariantGroups() {
            const container = document.getElementById('variant_groups_container');
            container.innerHTML = '';

            variantGroups.forEach((group, index) => {
                // Render Pills
                const pillsHTML = group.options.map((opt, optIdx) => `
                <div class="bg-[#D7C2F9] text-[#7D39EB] px-[12px] py-[6px] rounded-full text-[12px] font-bold flex items-center gap-[8px]">
                    ${opt}
                    <svg onclick="removeOption('${group.id}', ${optIdx})" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="cursor-pointer hover:text-red-500 transition-colors">
                        <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            `).join('');

                // Render Group Box
                container.innerHTML += `
                <div class="bg-neutral-100 rounded-lg p-[15px] border border-neutral-300 flex flex-col gap-[12px] relative">
                    ${variantGroups.length > 1 ? `
                                                                                                    <button type="button" onclick="removeVariantGroup('${group.id}')" class="absolute top-[15px] right-[15px] text-red-500 hover:text-red-700 text-[12px] font-bold flex items-center gap-[4px]">
                                                                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                                                                        Hapus
                                                                                                    </button>
                                                                                                ` : ''}

                    <div class="flex flex-col gap-[4px] pr-[70px]">
                        <span class="font-bold text-[13px] text-neutral-800">Nama Tipe Varian ${index + 1}</span>
                        <input type="text" value="${group.name}" onblur="updateGroupName('${group.id}', this.value)"
                            class="px-[12px] py-[8px] rounded-[8px] border border-neutral-400 text-[13px] w-full outline-none focus:border-[#7D39EB]"
                            placeholder="Contoh: Ukuran, Warna, Rasa" />
                    </div>

                    <div class="flex flex-col gap-[8px] mt-[5px]">
                        <span class="font-bold text-[13px] text-neutral-800">Pilihan Varian</span>
                        <div class="flex flex-wrap gap-[8px] mb-[4px]">
                            ${pillsHTML}
                        </div>
                        <div class="flex gap-[8px]">
                            <input type="text" id="input_option_${group.id}" onkeydown="handleOptionEnter(event, '${group.id}')"
                                class="px-[12px] py-[8px] rounded-[8px] border border-neutral-400 text-[13px] flex-1 outline-none focus:border-[#7D39EB]"
                                placeholder="Ketik pilihan (cth: S, Merah) lalu tekan + atau Enter" />
                            <button type="button" onclick="addOption('${group.id}')"
                                class="w-[38px] h-[38px] bg-[#7D39EB] rounded-[8px] flex items-center justify-center text-white shrink-0 hover:bg-[#5928a7] transition-colors">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            });

            renderCombinations();
        }

        function renderCombinations() {
            const wrapper = document.getElementById('variant_combinations_wrapper');
            const listContainer = document.getElementById('variant_combinations_list');

            // Filter grup yang memiliki minimal 1 pilihan
            const validGroups = variantGroups.filter(g => g.options.length > 0);

            if (validGroups.length === 0) {
                wrapper.classList.add('hidden');
                wrapper.classList.remove('flex');
                listContainer.innerHTML = '';
                calculateTotalVariantStock(); // Panggil saat kosong agar form stok utama kembali normal
                return;
            }

            // Tampilkan wrapper kombinasi
            wrapper.classList.remove('hidden');
            wrapper.classList.add('flex');

            const optionsArrays = validGroups.map(g => g.options);
            const combinedTitle = validGroups.map(g => g.name || 'Varian').join(' - ');
            const combinations = cartesianProduct(optionsArrays);

            listContainer.innerHTML = '';
            listContainer.innerHTML += `<input type="hidden" name="variant_master_name" value="${combinedTitle}">`;

            combinations.forEach((combo, index) => {
                const comboName = Array.isArray(combo) ? combo.join(' - ') : combo;
                const savedStock = storedStocks[comboName] || '';

                // Tambahkan event oninput untuk kalkulasi otomatis: saveStockValue(...) dan calculateTotalVariantStock()
                listContainer.innerHTML += `
                <div class="flex justify-between items-center bg-white p-[10px_15px] rounded-[10px] border border-neutral-300 shadow-sm hover:border-[#7D39EB] transition-colors">
                    <span class="text-[14px] font-semibold text-neutral-800">${comboName}</span>
                    
                    <div class="flex items-center gap-[10px]">
                        <input type="hidden" name="variant_combo_names[]" value="${comboName}">
                        
                        <input type="number" name="variant_combo_stocks[]" value="${savedStock}" 
                            oninput="saveStockValue('${comboName}', this.value); calculateTotalVariantStock()" required
                            class="w-[100px] px-[12px] py-[6px] border border-neutral-400 rounded-[8px] text-[14px] font-bold text-center outline-none focus:border-[#7D39EB] focus:ring-2 focus:ring-[#D7C2F9]"
                            placeholder="0" min="0">
                    </div>
                </div>
            `;
            });

            // Hitung ulang total setiap kali kombinasi di-render ulang (misal saat nambah ukuran baru)
            calculateTotalVariantStock();
        }

        // Menghitung total stok varian dan menguncinya di Stok Utama
        function calculateTotalVariantStock() {
            const variantStockInputs = document.querySelectorAll('input[name="variant_combo_stocks[]"]');
            const mainStockInput = document.getElementById('main_stock_input');

            if (!mainStockInput) return;

            // Cek apakah tabel kombinasi varian sedang ada isinya
            if (variantStockInputs.length > 0) {
                let total = 0;
                variantStockInputs.forEach(input => {
                    const val = parseInt(input.value) || 0;
                    total += val;
                });

                // Set nilai total dan kunci inputannya agar jadi Readonly
                mainStockInput.value = total;
                mainStockInput.setAttribute('readonly', true);
                mainStockInput.classList.add('bg-neutral-200', 'cursor-not-allowed');
                mainStockInput.classList.remove('bg-neutral-50');

                // ganti placeholder agar memperjelas statusnya
                mainStockInput.placeholder = "Otomatis dari varian";
            } else {
                // Jika semua varian dihapus, kembalikan input Stok Utama agar bisa diketik manual
                mainStockInput.removeAttribute('readonly');
                mainStockInput.classList.remove('bg-neutral-200', 'cursor-not-allowed');
                mainStockInput.classList.add('bg-neutral-50');
                mainStockInput.placeholder = "0";
            }
        }

        // 3. FITUR GALERI FOTO (MAX 6 FOTO)
        let productImages = [];
        let activeImageIndex = 0;

        function handleImageSelect(event) {
            let files = Array.from(event.target.files);
            if (files.length === 0) return;

            // Cek Limit Maksimal 6 Foto
            const availableSlots = 6 - productImages.length;
            if (files.length > availableSlots) {
                alert(`Peringatan: Maksimal 6 foto! Kami hanya mengambil ${availableSlots} foto.`);
                files = files.slice(0, availableSlots);
            }

            if (files.length > 0) {
                productImages = productImages.concat(files);

                // Masukkan file ke input rahasia (image_upload) agar terbaca oleh form Laravel
                syncFileInput();

                // Tampilkan fotonya di layar
                renderImageGallery();
            }

            // KOSONGKAN TRIGGER, agar kita bisa klik file yang sama 2x tanpa nge-bug
            event.target.value = '';
        }

        function syncFileInput() {
            const dataTransfer = new DataTransfer();
            productImages.forEach(file => dataTransfer.items.add(file));

            // Masukkan data ke input dengan id "image_upload" (yang ada name="images[]")
            document.getElementById('image_upload').files = dataTransfer.files;
        }

        function renderImageGallery() {
            const mainUploadArea = document.getElementById('main_upload_area');
            const uploadPrompt = document.getElementById('upload_prompt');
            const mainImagePreview = document.getElementById('main_image_preview');
            const deleteBtn = document.getElementById('delete_main_image');
            const thumbnailsWrapper = document.getElementById('thumbnails_wrapper');
            const thumbnailsContainer = document.getElementById('thumbnails_container');
            const photoCounter = document.getElementById('photo_counter');

            photoCounter.innerText = `${productImages.length}/6`;

            if (productImages.length === 0) {
                uploadPrompt.classList.remove('hidden');
                mainImagePreview.classList.add('hidden');
                mainImagePreview.src = '';
                deleteBtn.classList.add('hidden');
                thumbnailsWrapper.classList.add('hidden');

                // Jika kosong, klik area besar memicu 'image_trigger'
                mainUploadArea.setAttribute('for', 'image_trigger');
                return;
            }

            mainUploadArea.removeAttribute('for');
            uploadPrompt.classList.add('hidden');
            mainImagePreview.classList.remove('hidden');
            deleteBtn.classList.remove('hidden');
            thumbnailsWrapper.classList.remove('hidden');

            const fileURL = URL.createObjectURL(productImages[activeImageIndex]);
            mainImagePreview.src = fileURL;

            let thumbsHTML = '';
            productImages.forEach((file, index) => {
                const isActive = index === activeImageIndex;
                const borderStyle = isActive ?
                    'border-[#7D39EB] border-[3px] shadow-[0_0_8px_rgba(125,57,235,0.4)]' :
                    'border-[#ddd] border opacity-60 hover:opacity-100';

                const thumbURL = URL.createObjectURL(file);

                thumbsHTML += `
                <div onclick="setActiveImage(${index})" class="w-full aspect-square rounded-[10px] object-cover shrink-0 cursor-pointer overflow-hidden transition-all duration-200 ${borderStyle} bg-white">
                    <img src="${thumbURL}" class="w-full h-full object-contain bg-[#EAEAEA]">
                </div>`;
            });

            if (productImages.length < 6) {
                // Tombol plus dinamis juga diarahkan ke 'image_trigger'
                thumbsHTML += `
                <label for="image_trigger" class="w-full aspect-square rounded-[10px] border border-dashed border-[#525252] flex items-center justify-center text-[24px] text-neutral-400 cursor-pointer shrink-0 hover:bg-[#f2ebfd] transition-colors m-0">
                    +
                </label>`;
            }

            thumbnailsContainer.innerHTML = thumbsHTML;
        }

        function setActiveImage(index) {
            activeImageIndex = index;
            renderImageGallery();
        }

        function removeActiveImage(event) {
            event.stopPropagation(); // Mencegah klik menyebar ke background
            event.preventDefault();

            // Hapus file dari array
            productImages.splice(activeImageIndex, 1);

            // Posisikan index ke gambar sebelumnya yang aman
            if (activeImageIndex >= productImages.length) {
                activeImageIndex = productImages.length - 1;
            }
            if (activeImageIndex < 0) {
                activeImageIndex = 0;
            }

            syncFileInput();
            renderImageGallery();
        }

        // Initialize UI pertama kali
        renderVariantGroups();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\RekapsStore\resources\views/admin/product-add.blade.php ENDPATH**/ ?>