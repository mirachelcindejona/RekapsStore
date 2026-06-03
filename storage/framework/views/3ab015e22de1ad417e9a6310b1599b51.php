<div class="flex justify-center items-center">

    <div class="w-full max-w-[1400px] flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 px-1 md:px-4 py-1 shadow-sm rounded-xl bg-neutral-50">

        
        <span class="font-bold text-neutral-800 text-[12px] lg:text-[14px] hidden md:flex whitespace-nowrap">
            Kategori
        </span>

        
        <ul class="flex gap-2 overflow-x-auto scrollbar-hide whitespace-nowrap text-neutral-500 font-bold w-full sm:w-auto">
            <li class="filter text-[12px] lg:text-[14px]  active" data-category="Semua">Semua</li>
            <li class="filter text-[12px] lg:text-[14px] " data-category="Merchandise">Merchandise</li>
            <li class="filter text-[12px] lg:text-[14px] " data-category="Aksesoris">Aksesoris</li>
            <li class="filter text-[12px] lg:text-[14px] " data-category="Makanan">Makanan</li>
            <li class="filter text-[12px] lg:text-[14px] " data-category="Jasa">Jasa</li>
            <li class="filter text-[12px] lg:text-[14px] " data-category="Produk Digital">Produk Digital</li>
        </ul>
        
    </div>
</div>

<style>
    .filter {
        padding: 8px 16px;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.2s;
        flex-shrink: 0;
    }

    .filter:hover {
        background: var(--color-primary-100);
        color: var(--color-primary-500);
    }

    .filter.active {
        background: var(--color-primary-500);
        color: var(--color-neutral-50);
    }

    /* hide-scrollbar */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const filters = document.querySelectorAll(".filter");
        const cards = document.querySelectorAll(".product-card");
        const grid = document.querySelector(".product-grid");

        // empty state element
        const emptyState = document.createElement("div");
        emptyState.id = "empty-state";
        emptyState.className = "hidden col-span-full flex flex-col items-center justify-center py-16 gap-2 text-center";
        emptyState.innerHTML = `
            <p class="text-neutral-500 text-sm font-semibold">Oops! Belum ada produk untuk kategori ini.</p>
            <p class="text-neutral-400 text-xs">Coba pilih kategori lain atau kembali lagi nanti.</p>
        `;
        grid.appendChild(emptyState);

        filters.forEach(filter => {
            filter.addEventListener("click", function () {

                // active-button
                filters.forEach(item => item.classList.remove("active"));
                this.classList.add("active");

                const category = this.dataset.category;
                let visibleCount = 0;

                // filter-products
                cards.forEach(card => {
                    const cardCategory = card.dataset.category;
                    if (category === "Semua" || cardCategory === category) {
                        card.style.display = "flex";
                        visibleCount++;
                    } else {
                        card.style.display = "none";
                    }
                });

                // show/hide empty state
                if (visibleCount === 0) {
                    emptyState.classList.remove("hidden");
                } else {
                    emptyState.classList.add("hidden");
                }

            });
        });

    });
</script><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/category-filter.blade.php ENDPATH**/ ?>