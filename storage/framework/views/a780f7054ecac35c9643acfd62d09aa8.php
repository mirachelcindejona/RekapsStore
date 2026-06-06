

<?php $__env->startSection('title', 'Pesanan Bazar'); ?>
<?php $__env->startSection('page_title', 'Pesanan Bazar'); ?>
<?php $__env->startSection('page_breadcrumb', 'Pesanan Bazar'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $countSemua = $orders->count();
        $countProses = $orders->where('status', 'Proses')->count();
        $countSelesai = $orders->where('status', 'Selesai')->count();
    ?>

    <div class="flex flex-col gap-[20px] pb-[50px] w-full">

        <div class="flex flex-wrap gap-[12px]" id="filterTabs">
            <button onclick="changeFilter('semua', this)"
                class="tab-btn px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors">
                Semua <span id="countSemua">(<?php echo e($countSemua); ?>)</span>
            </button>
            <button onclick="changeFilter('proses', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">
                Proses <span id="countProses">(<?php echo e($countProses); ?>)</span>
            </button>
            <button onclick="changeFilter('selesai', this)"
                class="tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors">
                Selesai <span id="countSelesai">(<?php echo e($countSelesai); ?>)</span>
            </button>
        </div>

        <div id="ordersContainer" class="flex flex-wrap items-start content-start gap-[20px] w-full">

            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="order-card flex flex-col <?php echo e($order->status == 'Selesai' ? 'bg-white/70' : 'bg-white'); ?> rounded-[24px] pb-[16px] w-[310px] shrink-0 transition-all duration-300 shadow-sm"
                    data-id="<?php echo e($order->id); ?>" data-pinned="<?php echo e($order->is_pinned ? 'true' : 'false'); ?>"
                    data-completed="<?php echo e($order->status == 'Selesai' ? 'true' : 'false'); ?>"
                    data-timestamp="<?php echo e(\Carbon\Carbon::parse($order->created_at)->timestamp); ?>">

                    <div
                        class="flex justify-between items-center bg-neutral-200 px-[16px] py-[12px] rounded-t-[24px] mb-[12px]">
                        <div class="flex items-center gap-[12px]">
                            <div class="text-[36px] font-bold leading-[40px] text-black">#<?php echo e($order->id); ?></div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[16px] font-bold leading-[24px] text-black truncate max-w-[120px]"><?php echo e($order->customer_name); ?></span>
                                <span
                                    class="text-[14px] leading-[20px] text-neutral-700"><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('H:i')); ?></span>
                            </div>
                        </div>
                        <div class="bg-primary-100 rounded-full px-[8px] py-[3px]">
                            <span
                                class="text-primary-500 text-[10px] font-bold leading-[12px]"><?php echo e((int) \Carbon\Carbon::parse($order->created_at)->diffInMinutes(now())); ?>

                                Menit</span>
                        </div>
                    </div>

                    <div class="flex flex-col px-[16px] gap-[8px] flex-1">
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="flex items-start gap-[15px] border-b-[0.3px] border-black/20 pb-[8px] last:border-0 last:pb-0">
                                <span
                                    class="text-[20px] font-bold leading-[28px] text-black shrink-0"><?php echo e($item->quantity); ?>x</span>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[16px] font-bold leading-[24px] text-black"><?php echo e($item->product->name ?? 'Produk'); ?></span>
                                    <?php if($item->notes): ?>
                                        <span class="text-[12px] leading-[16px] text-neutral-600">Note:
                                            <?php echo e($item->notes); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($order->notes): ?>
                            <div
                                class="mt-[8px] p-[8px_12px] bg-yellow-50 border border-yellow-200 rounded-[10px] flex flex-col gap-0.5">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-amber-700">Catatan
                                    Transaksi:</span>
                                <span class="text-[12px] font-medium text-black leading-tight"><?php echo e($order->notes); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="flex flex-row items-center gap-[10px] px-[16px] mt-[20px] w-full">
                        <button
                            class="btn-selesai flex-1 h-[48px] <?php echo e($order->status == 'Selesai' ? 'bg-neutral-300 cursor-default' : 'bg-primary-500 shadow-[0_0_8px_rgba(114,52,214,0.35)] hover:opacity-90'); ?> rounded-[16px] flex justify-center items-center gap-[8px] transition-colors"
                            onclick="markDone(this, <?php echo e($order->id); ?>)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="<?php echo e($order->status == 'Selesai' ? '#A87AF2' : '#C6FF33'); ?>" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon-selesai">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                            <span
                                class="text-[16px] font-bold text-selesai <?php echo e($order->status == 'Selesai' ? 'text-primary-300' : 'text-white'); ?>"><?php echo e($order->status == 'Selesai' ? 'Selesai' : 'Tandai Selesai'); ?></span>
                        </button>

                        <button
                            class="btn-pin w-[48px] h-[48px] shrink-0 <?php echo e($order->is_pinned ? 'bg-secondary-500 border-transparent' : 'bg-neutral-50 border-secondary-600'); ?> shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all <?php echo e($order->status == 'Selesai' ? 'hidden' : ''); ?>"
                            onclick="togglePin(this, <?php echo e($order->id); ?>)">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7D39EB"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-pin">
                                <line x1="12" y1="17" x2="12" y2="22"></line>
                                <path
                                    d="M5 17h14v-1.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.68V6a3 3 0 0 0-3-3h0a3 3 0 0 0-3 3v4.68a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24Z">
                                </path>
                            </svg>
                        </button>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="w-full text-center py-10 text-neutral-500 text-[14px]">Belum ada data transaksi masuk.</div>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        let currentActiveFilter = 'semua';

        document.addEventListener("DOMContentLoaded", function() {
            sortCards();
        });

        /* ==== FUNGSI FILTER TABS ==== */
        function changeFilter(filterType, btnElement) {
            currentActiveFilter = filterType;

            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(btn => {
                btn.className =
                    "tab-btn px-[16px] py-[8px] bg-neutral-200 rounded-full text-neutral-700 text-[14px] font-bold hover:bg-neutral-300 transition-colors";
            });

            btnElement.className =
                "tab-btn px-[16px] py-[8px] bg-primary-500 shadow-[0_0_8px_rgba(125,57,235,0.35)] rounded-full text-white text-[14px] font-bold transition-colors";

            applyFilter();
        }

        function applyFilter() {
            const cards = document.querySelectorAll('.order-card');

            cards.forEach(card => {
                const isCompleted = card.dataset.completed === 'true';

                if (currentActiveFilter === 'semua') {
                    card.style.display = 'flex';
                } else if (currentActiveFilter === 'proses') {
                    card.style.display = isCompleted ? 'none' : 'flex';
                } else if (currentActiveFilter === 'selesai') {
                    card.style.display = isCompleted ? 'flex' : 'none';
                }
            });
        }

        /* ==== DINAMIS UPDATE JUMLAH COUNTER STATUS ==== */
        function updateCounterBadges() {
            const cards = document.querySelectorAll('.order-card');
            let totalSemua = cards.length;
            let totalProses = 0;
            let totalSelesai = 0;

            cards.forEach(card => {
                if (card.dataset.completed === 'true') {
                    totalSelesai++;
                } else {
                    totalProses++;
                }
            });

            document.getElementById('countSemua').innerText = `(${totalSemua})`;
            document.getElementById('countProses').innerText = `(${totalProses})`;
            document.getElementById('countSelesai').innerText = `(${totalSelesai})`;
        }

        /* ==== FUNGSI TOGGLE PIN (DATABASE) ==== */
        function togglePin(btn, orderId) {
            const card = btn.closest('.order-card');
            if (card.dataset.completed === 'true') return;

            fetch(`<?php echo e(url('/admin/cashier/orders/pin')); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    id: orderId
                })
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    let isPinned = card.dataset.pinned === 'true';
                    isPinned = !isPinned;
                    card.dataset.pinned = isPinned;

                    if (isPinned) {
                        btn.className =
                            "btn-pin w-[48px] h-[48px] shrink-0 bg-secondary-500 border-transparent shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all";
                    } else {
                        btn.className =
                            "btn-pin w-[48px] h-[48px] shrink-0 bg-neutral-50 border border-secondary-600 shadow-[0_2px_4px_rgba(62,52,69,0.25)] rounded-[16px] flex justify-center items-center transition-all";
                    }

                    sortCards();
                }
            });
        }

        /* ==== FUNGSI MARK AS DONE (DATABASE) ==== */
        function markDone(btn, orderId) {
            const card = btn.closest('.order-card');
            if (card.dataset.completed === 'true') return;

            fetch(`<?php echo e(url('/admin/cashier/orders/done')); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    id: orderId
                })
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    card.dataset.completed = 'true';
                    card.dataset.pinned = 'false';

                    card.className =
                        "order-card flex flex-col bg-white/70 rounded-[24px] pb-[16px] w-[310px] shrink-0 transition-all duration-300 shadow-sm";

                    const pinBtn = card.querySelector('.btn-pin');
                    if (pinBtn) pinBtn.classList.add('hidden');

                    btn.className =
                        "btn-selesai flex-1 h-[48px] bg-neutral-300 cursor-default rounded-[16px] flex justify-center items-center gap-[8px] transition-all";

                    const textSpan = btn.querySelector('.text-selesai');
                    textSpan.className = "text-primary-300 text-[16px] font-bold";
                    textSpan.innerText = 'Selesai';

                    const icon = btn.querySelector('.icon-selesai');
                    icon.setAttribute('stroke', '#A87AF2');

                    sortCards();
                    applyFilter();
                    updateCounterBadges(); // Mutasi counter secara dinamis
                }
            });
        }

        /* ==== ENGINE URUTAN KARTU SESUAI REQUEST UTUH ==== */
        function sortCards() {
            const container = document.getElementById('ordersContainer');
            const cards = Array.from(container.querySelectorAll('.order-card'));

            cards.sort((a, b) => {
                const aDone = a.dataset.completed === 'true';
                const bDone = b.dataset.completed === 'true';
                const aPinned = a.dataset.pinned === 'true';
                const bPinned = b.dataset.pinned === 'true';
                const aTime = parseInt(a.dataset.timestamp);
                const bTime = parseInt(b.dataset.timestamp);

                // Rule 1: Yang Selesai (Completed) wajib ditaruh paling bawah akhir
                if (aDone !== bDone) return aDone ? 1 : -1;

                // Rule 2: Di dalam status kelompok yang sama, cek Pin (Semat di atas)
                if (aPinned !== bPinned) return aPinned ? -1 : 1;

                // Rule 3: Jika sama-sama dipin atau sama-sama proses biasa, transaksi paling dulu (paling kecil timestamnya) melesat ke atas
                return aTime - bTime;
            });

            cards.forEach(card => container.appendChild(card));
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout-cashier', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/cashier-orders.blade.php ENDPATH**/ ?>