@props([
    'variant' => '',
    'selectClass' => 'cart-item'
])

@if ($variant == 'selectAll')
    <input type="checkbox" id="selectAll" class="w-4 h-4 accent-primary-500 rounded cursor-pointer" onchange="toggleAll(this)">
@elseif ($variant == 'select')
    <input type="checkbox" class="{{ $selectClass }} w-4 h-4 accent-primary-500 rounded cursor-pointer" onchange="syncSelectAll()">
@endif

@once
<script>
function toggleAll(source) {
    document.querySelectorAll('.cart-item').forEach(cb => cb.checked = source.checked);
    updateTotal();
}

function syncSelectAll() {
    const items = document.querySelectorAll('.cart-item');
    document.getElementById('selectAll').checked = Array.from(items).every(cb => cb.checked);
}
</script>
@endonce