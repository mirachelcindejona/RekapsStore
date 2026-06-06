@props(['qty' => 1])

<div class="flex items-center gap-1">
    <button type="button" onclick="changeQty(this, -1)" class="w-6 h-6 cursor-pointer rounded-md bg-primary-500 text-neutral-50 flex items-center justify-center font-bold hover:bg-primary-600 transition leading-none">&minus;</button>
    <span class="qty-value w-5 text-center text-xs font-bold text-neutral-800">{{ $qty }}</span>
    <button type="button" onclick="changeQty(this, 1)" class="w-6 h-6 cursor-pointer rounded-md bg-primary-500 text-neutral-50 flex items-center justify-center font-bold hover:bg-primary-600 transition leading-none">&plus;</button>
</div>

@once
<script>
function changeQty(btn, delta) {
    const span = btn.closest('.flex.items-center.gap-1').querySelector('.qty-value');
    let val = parseInt(span.textContent) + delta;
    if (val < 1) val = 1;
    span.textContent = val;

    // ===== CART =====
    const cartCard = btn.closest('[data-item-id]');
    if (cartCard) {
        const itemId = cartCard.dataset.itemId;
        const checkbox = cartCard.querySelector('.cart-item');
        if (checkbox) {
            checkbox.dataset.qty = val;
            if (typeof updateTotal === 'function') updateTotal();
        }

        fetch(`/cart/update/${itemId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ quantity: val })
        });
        return;
    }

    // ===== CHECKOUT =====
    const checkoutItem = btn.closest('.checkout-item');
    if (checkoutItem) {
        checkoutItem.dataset.qty = val;
        if (typeof updateCheckoutTotal === 'function') updateCheckoutTotal();

        fetch('/checkout/update-qty', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                product_id: checkoutItem.dataset.productId,
                quantity: val
            })
        });
        return;
    }

    // ===== PRODUCT DETAIL =====
    const qtyInput = document.getElementById('selectedQty');
    if (qtyInput) qtyInput.value = val;
    const qtyInputBuy = document.getElementById('selectedQtyBuy');
    if (qtyInputBuy) qtyInputBuy.value = val;
}
</script>
@endonce