

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
                <input type="text" id="searchProduct" oninput="loadProducts()" placeholder="Cari nama produk..."
                    class="bg-transparent border-none outline-none text-[12px] w-full text-[#000] placeholder:text-neutral-500">
            </div>

            <div class="flex overflow-x-auto pos-scroll gap-[12px] pb-[16px] border-b border-black/10"
                id="categoryFilterContainer">
                <button onclick="filterCategory('', this)"
                    class="category-btn flex justify-center items-center px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold shrink-0">
                    Semua
                </button>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button onclick="filterCategory('<?php echo e($cat->id); ?>', this)"
                        class="category-btn flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0">
                        <?php echo e($cat->name); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pos-scroll p-[16px]">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-[16px]" id="productGrid">
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
                <span class="text-[12px] text-neutral-300" id="cartItemCounter">0 Item</span>
            </div>

            <div class="bg-neutral-950 border border-secondary-500 rounded-[10px] px-[15px] py-[10px] flex items-center">
                <input type="text" id="customerName" placeholder="Nama pembeli (opsional)"
                    class="bg-transparent border-none outline-none text-[14px] text-white w-full placeholder:text-neutral-600">
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pos-scroll py-[16px] flex flex-col gap-[12px]" id="cartContainer">
        </div>

        <div class="flex flex-col pt-[16px] gap-[16px] shrink-0">
            <div class="flex flex-col pt-[16px] gap-[8px] border-t border-[#333] shrink-0">
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Subtotal</span>
                    <span id="labelSubtotal">Rp 0</span>
                </div>
                <div class="flex justify-between items-center text-[12px] font-semibold text-neutral-300">
                    <span>Diskon</span>
                    <span id="labelDiskon">—</span>
                </div>
                <div class="flex justify-between items-center mt-[4px]">
                    <span class="text-[16px] font-extrabold text-neutral-300">Total</span>
                    <span class="text-[16px] font-extrabold text-secondary-500" id="totalTagihan">Rp 0</span>
                </div>
            </div>

            <div class="flex flex-col gap-[10px]">
                <div class="flex gap-[9px]">
                    <button type="button" id="btnTunai" onclick="switchMethod('Tunai')"
                        class="flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-[0_2px_4px_rgba(62,52,69,0.25)] transition-colors">
                        Tunai
                    </button>
                    <button type="button" id="btnQris" onclick="switchMethod('QRIS')"
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

                <button type="button"
                    class="w-full bg-secondary-500 text-black shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] py-[12px] text-[16px] font-extrabold hover:bg-[#b0eb1e] transition-colors mt-[4px] cursor-pointer"
                    onclick="openCheckoutModal()">
                    Proses Pembayaran
                </button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div id="modalCheckout" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-white w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[24px_37px] flex flex-col gap-[25px]">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-['Montserrat'] text-[18px] font-bold text-black">Konfirmasi Ringkasan</h2>
                <button class="text-primary-500 hover:opacity-70 cursor-pointer" onclick="closeModal('modalCheckout')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col gap-[12px] w-full">
                <div class="bg-neutral-100 rounded-[12px] p-[12px_16px]" id="modalCheckoutItemsReview">
                </div>
                <div class="flex flex-col gap-[8px]">
                    <span class="text-[14px] font-normal text-black uppercase">Catatan Transaksi</span>
                    <textarea id="transactionNotes" placeholder="cth: Bayar 2 kali, atau titip barang"
                        class="w-full bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] text-[14px] text-black h-[85px] focus:outline-none"></textarea>
                </div>

                <div class="flex gap-[16px] w-full mt-[10px]">
                    <button
                        class="w-[150px] h-[48px] bg-neutral-300 rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-[#868686] flex justify-center items-center hover:bg-[#c4c4c4] transition-colors cursor-pointer"
                        onclick="closeModal('modalCheckout')">
                        Batal
                    </button>
                    <button
                        class="flex-1 h-[48px] bg-secondary-500 shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-black flex justify-center items-center hover:opacity-90 transition-opacity cursor-pointer"
                        onclick="submitCheckoutForm()">
                        Konfirmasi Pembayaran
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div id="modalScanQRIS" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div class="bg-neutral-50 w-full max-w-[550px] rounded-[20px] p-[20px] flex flex-col items-center gap-[20px]">
            <h2 class="text-[24px] font-bold text-black text-center">Scan QRIS Rekaps</h2>
            <div class="w-[220px] h-[220px] bg-primary-500 rounded-[16px] flex justify-center items-center overflow-hidden"
                onclick="triggerSuccessPaymentSimulator()">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=rekaps-store-pos&color=ffffff&bgcolor=7D39EB"
                    alt="QR Code">
            </div>
            <span class="text-[14px] text-neutral-600 text-center">Klik kode QR di atas untuk Mensimulasikan Pembayaran
                QRIS Berhasil</span>
        </div>
    </div>

    <div id="modalTransaksiBerhasil" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[550px] rounded-[20px] p-[20px] flex flex-col items-center gap-[20px] max-h-[96dvh] overflow-y-auto">
            <div
                class="w-[80px] h-[80px] rounded-full border-[4px] border-secondary-500 flex justify-center items-center bg-white">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#C6FF33"
                    stroke-width="4">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <h2 class="text-[22px] font-bold text-black">Transaksi Berhasil!</h2>

            <div class="bg-neutral-100 rounded-[12px] p-[20px] w-full text-black text-[12px] font-mono"
                id="printReceiptContent">
            </div>

            <div class="flex gap-[12px] w-full mt-[10px]">
                <button
                    class="flex-1 h-[48px] bg-neutral-50 border border-primary-500 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-primary-500 flex justify-center items-center gap-[8px] hover:bg-primary-500 hover:text-white transition-colors group cursor-pointer"
                    onclick="printReceipt()">
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
                    onclick="closeModal('modalTransaksiBerhasil'); loadProducts();">
                    Selesai
                </button>
            </div>
        </div>
    </div>

    <div id="modalItemNote" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div
            class="bg-neutral-50 w-full max-w-[550px] rounded-[20px] shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-[20px] flex flex-col gap-[20px]">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-['Montserrat'] text-[18px] font-bold text-black leading-[28px]" id="noteModalTitle">
                    Masukkan catatan</h2>
                <button class="text-primary-500 hover:opacity-70 transition-opacity cursor-pointer"
                    onclick="closeModal('modalItemNote')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <input type="hidden" id="noteTargetKey">
            <textarea id="noteTextTarget" placeholder="cth: Pedesnya sedeng dikit"
                class="w-full bg-neutral-50 border border-neutral-500 rounded-[10px] p-[12px_15px] font-['Montserrat'] text-[14px] text-black placeholder-neutral-400 h-[85px] focus:outline-none focus:border-primary-500"></textarea>
            <div class="flex gap-[12px] w-full">
                <button
                    class="flex-1 h-[48px] bg-neutral-300 rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-[#868686] flex justify-center items-center hover:bg-[#c4c4c4] transition-colors cursor-pointer"
                    onclick="closeModal('modalItemNote')">Batal</button>
                <button
                    class="flex-1 h-[48px] bg-secondary-500 shadow-[0_0_8px_rgba(180,232,46,0.35)] rounded-[16px] font-['Montserrat'] text-[16px] font-bold text-black flex justify-center items-center hover:opacity-90 transition-opacity cursor-pointer"
                    onclick="saveItemNote()">Simpan Catatan</button>
            </div>
        </div>
    </div>

    <script>
        let currentMethod = 'Tunai';
        let activeCategoryId = '';
        let globalTotalTagihan = 0;
        let lastCreatedOrderData = null;
        let pinnedProducts = JSON.parse(localStorage.getItem('posPinnedProducts')) || [];

        document.addEventListener("DOMContentLoaded", function() {
            loadProducts();
        });

        function loadProducts() {
            const search = document.getElementById('searchProduct').value;
            const url = `<?php echo e(url('/admin/cashier/products')); ?>?search=${search}&category_id=${activeCategoryId}`;
            fetch(url).then(res => res.json()).then(data => {
                renderProducts(data.products);
                renderCart(data.cart);
            });
        }

        function filterCategory(catId, btn) {
            activeCategoryId = catId;
            document.querySelectorAll('.category-btn').forEach(b => {
                b.className =
                    "category-btn flex justify-center items-center px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors shrink-0";
            });
            btn.className =
                "category-btn flex justify-center items-center px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold shrink-0";
            loadProducts();
        }

        function togglePinProduct(productId, event) {
            event.stopPropagation();
            const index = pinnedProducts.indexOf(productId);
            if (index > -1) {
                pinnedProducts.splice(index, 1);
            } else {
                pinnedProducts.push(productId);
            }
            localStorage.setItem('posPinnedProducts', JSON.stringify(pinnedProducts));
            loadProducts();
        }

        function renderProducts(products) {
            const grid = document.getElementById('productGrid');
            grid.innerHTML = '';

            if (products.length === 0) {
                grid.innerHTML =
                    '<div class="text-neutral-500 col-span-full py-10 text-center text-[14px]">Tidak ada produk dengan ketersediaan Stok Bazar.</div>';
                return;
            }

            let pinnedList = products.filter(p => pinnedProducts.includes(p.id));
            let unpinnedList = products.filter(p => !pinnedProducts.includes(p.id));
            let sortedProducts = [...pinnedList, ...unpinnedList];

            sortedProducts.forEach(p => {
                let stockText = '';
                let buttonAction = '';
                const isPinned = pinnedProducts.includes(p.id);

                if (p.variants.length > 0) {
                    stockText = `Stok Bazar: ${p.variants.reduce((acc, v) => acc + parseInt(v.stock_bazar), 0)}`;
                    buttonAction = `<div class="flex flex-col gap-1 w-full">
                        <select class="w-full border border-neutral-300 rounded p-1 text-[11px] text-black focus:outline-none" id="v_select_${p.id}">
                            ${p.variants.map(v => `<option value="${v.id}" ${v.stock_bazar <= 0 ? 'disabled' : ''}>${v.variant_value} (S: ${v.stock_bazar})</option>`).join('')}
                        </select>
                        <button onclick="addProductToCart(${p.id}, true)" class="w-full bg-neutral-50 border border-primary-500 text-primary-500 rounded-[12px] py-[6px] text-[12px] font-semibold hover:bg-primary-500 hover:text-white transition-colors">Tambah</button>
                    </div>`;
                } else {
                    const stock = p.inventory ? p.inventory.bazar_stock : 0;
                    stockText = `Stok Bazar: ${stock}`;
                    buttonAction =
                        `<button onclick="addProductToCart(${p.id}, false)" class="w-full bg-neutral-50 border border-primary-500 text-primary-500 rounded-[12px] py-[8px] text-[12px] font-semibold hover:bg-primary-500 hover:text-white transition-colors">Tambah</button>`;
                }

                let imageUrl = p.images.length > 0 ? `<?php echo e(asset('storage')); ?>/${p.images[0].image_path}` :
                    `<?php echo e(asset('assets/img/products/poster-jersey.png')); ?>`;
                let pinIconHtml = `<button onclick="togglePinProduct(${p.id}, event)" class="absolute top-2 right-2 z-10 w-[28px] h-[28px] bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-sm transition-colors">
                                  <svg width="13" height="13" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="${isPinned ? 'fill-primary-500 text-primary-500' : 'fill-none text-neutral-400'}"><line x1="12" y1="17" x2="12" y2="22"></line><path d="M5 17h14v-1.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.68V6a3 3 0 0 0-3-3h0a3 3 0 0 0-3 3v4.68a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24Z"></path></svg>
                               </button>`;
                let discountBadgeHtml = p.discount > 0 ?
                    `<span class="absolute top-2 left-2 z-10 bg-red-600 text-white text-[9px] font-black px-1.5 py-0.5 rounded shadow-sm">-${p.discount}%</span>` :
                    '';

                grid.innerHTML += `
                    <div class="bg-white ${isPinned ? 'border-2 border-primary-500/70 shadow-sm' : 'border border-neutral-200'} rounded-[12px] flex flex-col overflow-hidden hover:shadow-md transition-all p-3 gap-2 relative">
                        ${pinIconHtml}
                        ${discountBadgeHtml}
                        <div class="w-full h-[120px] bg-neutral-100 relative flex justify-center items-center overflow-hidden rounded-lg">
                            <img src="${imageUrl}" class="h-[100px] object-contain group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="flex flex-col flex-1 justify-between gap-1">
                            <div>
                                <h3 class="text-[14px] font-semibold text-black leading-tight truncate">${p.name}</h3>
                                <div class="flex items-center gap-1.5 flex-wrap mt-0.5">
                                    <span class="text-[15px] font-bold text-primary-500">Rp ${parseInt(p.selling_price - (p.selling_price * p.discount / 100)).toLocaleString('id-ID')}</span>
                                    ${p.discount > 0 ? `<span class="text-[10px] text-neutral-400 line-through">Rp ${parseInt(p.selling_price).toLocaleString('id-ID')}</span>` : ''}
                                </div>
                                <span class="text-[11px] font-medium text-neutral-600 block mt-0.5">${stockText}</span>
                            </div>
                            <div class="mt-2">${buttonAction}</div>
                        </div>
                    </div>`;
            });
        }

        function addProductToCart(productId, hasVariant) {
            let variantId = null;
            if (hasVariant) {
                variantId = document.getElementById(`v_select_${productId}`).value;
                if (!variantId) return alert('Pilih varian produk terlebih dahulu.');
            }
            fetch(`<?php echo e(url('/admin/cashier/cart/add')); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    product_id: productId,
                    variant_id: variantId
                })
            }).then(res => res.json()).then(data => {
                if (data.success) loadProducts();
            });
        }

        function renderCart(cart) {
            const container = document.getElementById('cartContainer');
            container.innerHTML = '';
            let itemsKeys = Object.keys(cart);
            document.getElementById('cartItemCounter').innerText = `${itemsKeys.length} Item`;

            let accumulatedFinalTotal = 0;
            let accumulatedOriginalTotal = 0;

            if (itemsKeys.length === 0) {
                container.innerHTML =
                    '<div class="text-neutral-500 text-center text-[12px] my-auto">Keranjang kasir kosong.</div>';
                updateTotalLabels(0, 0);
                return;
            }

            itemsKeys.forEach(key => {
                let item = cart[key];
                accumulatedFinalTotal += item.subtotal;
                accumulatedOriginalTotal += (item.original_price * item.quantity);

                let priceDisplayHtml =
                    `<span class="text-[11px] font-bold text-white">Rp ${parseInt(item.price).toLocaleString('id-ID')}</span>`;
                if (item.original_price && item.original_price > item.price) {
                    let pct = Math.round(((item.original_price - item.price) / item.original_price) * 100);
                    priceDisplayHtml +=
                        `<span class="text-[9px] text-neutral-400 line-through ml-1.5">Rp ${parseInt(item.original_price).toLocaleString('id-ID')}</span>`;
                    priceDisplayHtml +=
                        `<span class="bg-red-600 text-white text-[8px] font-black px-1 rounded ml-1.5">-${pct}%</span>`;
                }

                container.innerHTML += `
                    <div class="border border-neutral-700 bg-neutral-900 rounded-[12px] p-[10px] flex flex-col gap-[8px]">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex gap-[10px] items-center min-w-0">
                                <div class="w-[40px] h-[40px] bg-white rounded-[6px] flex items-center justify-center overflow-hidden shrink-0">
                                    <img src="${item.image}" class="h-[35px] object-contain" />
                                </div>
                                <div class="flex flex-col justify-center min-w-0">
                                    <span class="text-[12px] font-semibold text-white truncate block">${item.name}</span>
                                    <div class="flex items-center mt-0.5">${priceDisplayHtml}</div>
                                    <span class="text-[10px] text-primary-400 cursor-pointer hover:underline mt-1 block" onclick="triggerOpenNoteModal('${key}', '${item.name}', '${item.notes}')">
                                        ${item.notes ? `Catatan: ${item.notes}` : '+ Tambah catatan'}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-[8px] shrink-0">
                                <button onclick="changeQty('${key}', ${item.quantity - 1})" class="w-[24px] h-[24px] border border-primary-500 rounded-[6px] text-secondary-500 flex items-center justify-center text-[14px] font-bold hover:bg-primary-500/20">-</button>
                                <span class="text-[12px] font-medium text-white w-[14px] text-center">${item.quantity}</span>
                                <button onclick="changeQty('${key}', ${item.quantity + 1})" class="w-[24px] h-[24px] border border-primary-500 rounded-[6px] text-secondary-500 flex items-center justify-center text-[14px] font-bold hover:bg-primary-500/20">+</button>
                            </div>
                        </div>
                    </div>`;
            });
            updateTotalLabels(accumulatedOriginalTotal, accumulatedFinalTotal);
        }

        function changeQty(key, newQty) {
            if (newQty <= 0) {
                fetch(`<?php echo e(url('/admin/cashier/cart/remove')); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        key: key
                    })
                }).then(() => loadProducts());
            } else {
                fetch(`<?php echo e(url('/admin/cashier/cart/update')); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        key: key,
                        quantity: newQty
                    })
                }).then(res => {
                    if (res.ok) loadProducts();
                });
            }
        }

        function triggerOpenNoteModal(key, name, currentNote) {
            document.getElementById('noteTargetKey').value = key;
            document.getElementById('noteModalTitle').innerText = `Catatan untuk ${name}`;
            document.getElementById('noteTextTarget').value = currentNote !== 'null' ? currentNote : '';
            openModal('modalItemNote');
        }

        function saveItemNote() {
            const key = document.getElementById('noteTargetKey').value;
            const noteText = document.getElementById('noteTextTarget').value;
            fetch(`<?php echo e(url('/admin/cashier/products')); ?>`).then(res => res.json()).then(data => {
                let qty = data.cart[key].quantity;
                fetch(`<?php echo e(url('/admin/cashier/cart/update')); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        key: key,
                        quantity: qty,
                        notes: noteText
                    })
                }).then(() => {
                    closeModal('modalItemNote');
                    loadProducts();
                });
            });
        }

        function updateTotalLabels(originalTotal, finalTotal) {
            globalTotalTagihan = finalTotal;
            let netDiscount = originalTotal - finalTotal;
            document.getElementById('labelSubtotal').innerText = `Rp ${originalTotal.toLocaleString('id-ID')}`;
            if (netDiscount > 0) {
                document.getElementById('labelDiskon').innerText = `-Rp ${netDiscount.toLocaleString('id-ID')}`;
                document.getElementById('labelDiskon').className = "text-red-500 font-bold";
            } else {
                document.getElementById('labelDiskon').innerText = '—';
                document.getElementById('labelDiskon').className = "text-neutral-300";
            }
            document.getElementById('totalTagihan').innerText = `Rp ${finalTotal.toLocaleString('id-ID')}`;
            hitungKembalian();
        }

        function switchMethod(method) {
            currentMethod = method;
            const areaTunai = document.getElementById('areaTunai');
            document.getElementById('btnTunai').className = method === 'Tunai' ?
                "flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-sm" :
                "flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold";
            document.getElementById('btnQris').className = method === 'QRIS' ?
                "flex-1 bg-secondary-500 text-black border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold shadow-sm" :
                "flex-1 bg-black text-secondary-700 border border-secondary-600 rounded-[12px] py-[8px] text-[12px] font-semibold";
            areaTunai.style.display = method === 'Tunai' ? 'flex' : 'none';
        }

        function setNominal(amount, btn) {
            document.getElementById('inputUang').value = amount;
            hitungKembalian();
            clearActiveNominal();
            btn.className =
                "btn-nominal px-[12px] py-[6px] bg-[#292524] border border-secondary-500 text-secondary-500 rounded-full text-[10px] font-bold shrink-0";
        }

        function hitungKembalian() {
            const inputVal = parseInt(document.getElementById('inputUang').value) || 0;
            const kembalian = inputVal - globalTotalTagihan;
            document.getElementById('teksKembalian').innerText = 'Kembalian: Rp ' + (kembalian > 0 ? kembalian
                .toLocaleString('id-ID') : 0);
        }

        function clearActiveNominal() {
            document.querySelectorAll('.btn-nominal').forEach(b => b.className =
                "btn-nominal px-[12px] py-[6px] bg-[#292524] text-[#D6D3D1] rounded-full text-[10px] font-bold shrink-0 border border-transparent"
            );
        }

        function openCheckoutModal() {
            if (globalTotalTagihan <= 0) return alert('Keranjang belanja kosong!');
            fetch(`<?php echo e(url('/admin/cashier/products')); ?>`).then(res => res.json()).then(data => {
                const container = document.getElementById('modalCheckoutItemsReview');
                container.innerHTML =
                    '<span class="text-[13px] font-bold text-black block mb-2">RINCIAN PESANAN</span>';
                let originalSum = 0;
                Object.keys(data.cart).forEach(key => {
                    let item = data.cart[key];
                    originalSum += (item.original_price * item.quantity);
                    let priceItemHtml = `Rp ${parseInt(item.price).toLocaleString('id-ID')}`;
                    if (item.original_price && item.original_price > item.price) {
                        priceItemHtml =
                            `<span class="line-through text-neutral-400 mr-1">Rp ${parseInt(item.original_price).toLocaleString('id-ID')}</span> Rp ${parseInt(item.price).toLocaleString('id-ID')}`;
                    }
                    container.innerHTML += `
                        <div class="flex flex-col w-full pb-1 border-b text-black text-[12px] mb-1">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-left">${item.name}</span>
                                <span class="text-right">${priceItemHtml} x ${item.quantity}</span>
                                <span class="font-bold min-w-[70px] text-right">Rp ${item.subtotal.toLocaleString('id-ID')}</span>
                            </div>
                            ${item.notes ? `<span class="text-[10px] text-neutral-500 italic">Catatan: ${item.notes}</span>` : ''}
                        </div>`;
                });
                let netDisc = originalSum - globalTotalTagihan;
                container.innerHTML += `
                    <div class="flex flex-col gap-1 border-t pt-2 mt-2 text-black text-[12px]">
                        <div class="flex justify-between">
                            <span>Subtotal Khas</span><span>Rp ${originalSum.toLocaleString('id-ID')}</span>
                        </div>
                        ${netDisc > 0 ? `<div class="flex justify-between text-red-500"><span>Potongan Diskon</span><span>-Rp ${netDisc.toLocaleString('id-ID')}</span></div>` : ''}
                        <div class="flex justify-between font-bold text-[14px] mt-1">
                            <span>TOTAL AKHIR</span><span class="text-primary-500">Rp ${globalTotalTagihan.toLocaleString('id-ID')}</span>
                        </div>
                    </div>`;
                openModal('modalCheckout');
            });
        }

        function submitCheckoutForm() {
            let customerName = document.getElementById('customerName').value.trim();
            if (customerName === '') customerName = 'Umum';
            const paidAmount = document.getElementById('inputUang').value;
            const txNotes = document.getElementById('transactionNotes').value;
            const payload = {
                customer_name: customerName,
                payment_method: currentMethod,
                paid_amount: paidAmount,
                transaction_notes: txNotes
            };

            fetch(`<?php echo e(url('/admin/cashier/checkout')); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify(payload)
            }).then(res => res.json()).then(data => {
                if (!data.success) {
                    alert('Error: ' + data.message);
                } else {
                    closeModal('modalCheckout');
                    lastCreatedOrderData = data.order;
                    document.getElementById('customerName').value = '';
                    document.getElementById('inputUang').value = '';
                    document.getElementById('transactionNotes').value = '';
                    if (currentMethod === 'QRIS') {
                        openModal('modalScanQRIS');
                    } else {
                        showFinalReceipt();
                    }
                }
            }).catch(err => alert('Terjadi kesalahan koneksi server.'));
        }

        function triggerSuccessPaymentSimulator() {
            closeModal('modalScanQRIS');
            showFinalReceipt();
        }

        function showFinalReceipt() {
            if (!lastCreatedOrderData) return;

            const printArea = document.getElementById('printReceiptContent');
            let itemsHtml = '';

            lastCreatedOrderData.items.forEach(item => {
                // Gunakan nama produk dari server, jika gagal (fallback) gunakan ID
                let namaProduk = item.product_name || `Item #${item.product_id}`;

                itemsHtml +=
                    `
                <div style="display:flex; justify-content:space-between; margin-bottom:4px;">
                    <span style="max-width: 65%; word-wrap: break-word;">${namaProduk} x ${item.quantity}</span>
                    <span>Rp ${parseInt(item.subtotal).toLocaleString('id-ID')}</span>
                </div>
                ${item.notes ? `<div style="font-size:10px; color:#555; margin-bottom:4px;">↳ Catatan: ${item.notes}</div>` : ''}`;
            });

            printArea.innerHTML = `
                <div class="flex flex-col items-center gap-[4px] w-full pb-[16px]">
                    <span class="font-['Carattere'] text-[32px] text-primary-500 text-center leading-[1] italic">Rekaps
                        Store</span>
                    <span class="font-['Montserrat'] text-[12px] font-normal text-neutral-500 text-center">DEPARTEMEN EKONOMI KREATIF</span>
                    <div class="flex items-center gap-[12px]">
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-neutral-500">@himarpl</span>
                        <span class="font-['Montserrat'] text-[12px] font-semibold text-neutral-500">@rekaps.store</span>
                    </div>
                </div>
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="display:flex; justify-content:space-between;">
                    <span>No. Transaksi:</span>
                    <span>${lastCreatedOrderData.order_code}</span>
                </div>
                <div style="display:flex; justify-content:space-between;">
                    <span>Pelanggan:</span>
                    <span>${lastCreatedOrderData.customer_name}</span>
                </div>
                <div style="display:flex; justify-content:space-between;">
                    <span>Metode Bayar:</span>
                    <span>${lastCreatedOrderData.payment_method}</span>
                </div>
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                ${itemsHtml}
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="display:flex; justify-content:space-between;">
                    <span>Subtotal:</span>
                    <span>Rp ${parseInt(lastCreatedOrderData.subtotal).toLocaleString('id-ID')}</span>
                </div>
                ${parseInt(lastCreatedOrderData.discount) > 0 ? `
                                    <div style="display:flex; justify-content:space-between; color:red;">
                                        <span>Diskon Produk:</span>
                                        <span>-Rp ${parseInt(lastCreatedOrderData.discount).toLocaleString('id-ID')}</span>
                                    </div>` : ''}
                <div style="display:flex; justify-content:space-between; font-weight:bold; margin-top:3px;">
                    <span>Total Akhir:</span>
                    <span>Rp ${parseInt(lastCreatedOrderData.total).toLocaleString('id-ID')}</span>
                </div>
                <div style="display:flex; justify-content:space-between;">
                    <span>Dibayar:</span>
                    <span>Rp ${parseInt(lastCreatedOrderData.paid_amount).toLocaleString('id-ID')}</span>
                </div>
                <div style="display:flex; justify-content:space-between; color: green; font-weight:bold;">
                    <span>Kembalian:</span>
                    <span>Rp ${parseInt(lastCreatedOrderData.change_amount).toLocaleString('id-ID')}</span>
                </div>
                <hr style="border-top: 1px dashed black; margin: 10px 0;">
                <div style="text-align:center; font-size:10px; color:#777; margin-top:5px;">Terima kasih telah berbelanja di Bazar Himarpl!</div>
            `;

            openModal('modalTransaksiBerhasil');
        }

        // Fungsi Cetak Struk (Mencetak langsung konten nota transaksi)
        function printReceipt() {
            const printContent = document.getElementById('printReceiptContent').innerHTML;
            const originalContent = document.body.innerHTML;
            document.body.innerHTML =
                `<div style="padding: 20px; max-width: 300px; margin: auto; font-family: monospace;">${printContent}</div>`;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload(); // Muat ulang layar setelah print agar sistem kasir bersih
        }

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout-cashier', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/cashier.blade.php ENDPATH**/ ?>