@props([
    'name' => '',
    'desc' => '',
    'off' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
    'dataDiscount' => 0,
    'dataMinPurchase' => 0,
])

<label class="voucher-label flex items-center justify-between rounded-xl px-3 py-2 cursor-pointer transition
    {{ $disabled ? 'border border-neutral-200 bg-neutral-100 opacity-60 cursor-not-allowed' : 'border border-primary-300 bg-primary-50' }}">
    <div class="flex flex-col">
        <div class="flex gap-2">
            <img src="{{ asset('assets/icons/tag.svg') }}" class="w-4 h-4 {{ $disabled ? 'grayscale' : '' }}">
            <p class="text-xs font-bold voucher-text {{ $disabled ? 'text-neutral-400' : 'text-primary-300' }}">{{ $name }}</p>
        </div>
        <div>
            <p class="text-[10px] voucher-text {{ $disabled ? 'text-neutral-400' : 'text-primary-300' }}">{{ $desc }}</p>
            <p class="text-sm font-extrabold voucher-text {{ $disabled ? 'text-neutral-400' : 'text-primary-300' }}">{{ $off }}</p>
        </div>
    </div>
    <input type="radio" name="voucher" value="{{ $value }}"
        class="w-4 h-4 accent-white cursor-pointer"
        data-discount="{{ $dataDiscount }}"
        data-min-purchase="{{ $dataMinPurchase }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        @if(!$disabled) onchange="selectVoucher(this)" @endif>
</label>

@once
<script>
function selectVoucher(radio) {
    document.querySelectorAll('.voucher-label').forEach(label => {
        label.classList.remove('bg-primary-500', 'border-primary-500');
        label.classList.add('bg-primary-50', 'border-primary-300');
        label.querySelectorAll('.voucher-text').forEach(t => {
            t.classList.remove('text-white');
            t.classList.add('text-primary-300');
        });
    });

    const label = radio.closest('.voucher-label');
    label.classList.remove('bg-primary-50', 'border-primary-300');
    label.classList.add('bg-primary-500', 'border-primary-500');
    label.querySelectorAll('.voucher-text').forEach(t => {
        t.classList.remove('text-primary-300');
        t.classList.add('text-white');
    });
}
</script>
@endonce