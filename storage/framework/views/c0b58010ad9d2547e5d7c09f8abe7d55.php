<section class="flex justify-center items-center mt-2">

    <div class="w-full max-w-[1400px]
                flex flex-col sm:flex-row
                sm:justify-between sm:items-center
                gap-3
                px-1 sm:px-4
                py-1
                shadow-sm
                rounded-[15px]
                bg-neutral-50
                mb-2">

        
        <span class="font-black hidden sm:flex whitespace-nowrap">
            Kategori
        </span>

        
        <ul class="flex gap-2
                   overflow-x-auto
                   scrollbar-hide
                   whitespace-nowrap
                   text-neutral-500
                   font-black
                   w-full sm:w-auto">

            <li class="filter active" data-category="Semua">
                Semua
            </li>

            <li class="filter" data-category="Merchandise">
                Merchandise
            </li>

            <li class="filter" data-category="Aksesoris">
                Aksesoris
            </li>

            <li class="filter" data-category="Makanan">
                Makanan
            </li>

            <li class="filter" data-category="Jasa">
                Jasa
            </li>

            <li class="filter" data-category="Produk Digital">
                Produk Digital
            </li>

        </ul>

    </div>

</section>

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

    /* Hide scrollbar */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    @media (max-width: 640px) {
        .filter {
            padding: 7px 14px;
            font-size: 14px;
        }
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {

    const filters = document.querySelectorAll(".filter");
    const cards = document.querySelectorAll(".product-card");

    filters.forEach(filter => {

        filter.addEventListener("click", function () {

            // ACTIVE BUTTON
            filters.forEach(item => {
                item.classList.remove("active");
            });

            this.classList.add("active");

            // CATEGORY YANG DIPILIH
            const category = this.dataset.category;

            // FILTER PRODUCT
            cards.forEach(card => {

                const cardCategory = card.dataset.category;

                if (
                    category === "Semua" ||
                    cardCategory === category
                ) {
                    card.style.display = "flex";
                } else {
                    card.style.display = "none";
                }

            });

        });

    });

});
</script><?php /**PATH C:\Users\x395\OneDrive\Desktop\RekapsStoreFinal\RekapsStore\resources\views/components/client/category-filter.blade.php ENDPATH**/ ?>