<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['qty' => 1]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['qty' => 1]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex items-center gap-1">
    <button type="button" onclick="changeQty(this, -1)" class="w-6 h-6 cursor-pointer rounded-md bg-primary-500 text-neutral-50 flex items-center justify-center font-bold hover:bg-primary-600 transition leading-none">&minus;</button>
    <span class="qty-value w-5 text-center text-xs font-bold text-neutral-800"><?php echo e($qty); ?></span>
    <button type="button" onclick="changeQty(this, 1)" class="w-6 h-6 cursor-pointer rounded-md bg-primary-500 text-neutral-50 flex items-center justify-center font-bold hover:bg-primary-600 transition leading-none">&plus;</button>
</div>

<?php if (! $__env->hasRenderedOnce('cb492187-015f-4020-8d65-5bbc51f29e40')): $__env->markAsRenderedOnce('cb492187-015f-4020-8d65-5bbc51f29e40'); ?>
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
<?php endif; ?><?php /**PATH C:\Users\x395\OneDrive\Desktop\WEEBS\RekapsStore\resources\views/components/client/quantity.blade.php ENDPATH**/ ?>