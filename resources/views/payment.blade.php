@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="Pembayaran" />
@endsection

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-7xl max-h-7xl border-neutral-200 rounded-2xl overflow-hidden p-0">

        <div class="flex flex-col md:flex-row gap-2">

            {{-- ===== KIRI: QR Code ===== --}}
            <div class="flex flex-col items-center bg-neutral-50 justify-center gap-4 p-4 lg:p-8 md:w-1/2 border-1 border-neutral-300 rounded-2xl">
                <p class="text-base lg:text-lg font-bold text-neutral-800">Scan untuk membayar</p>

                {{-- QR --}}
                <div class="relative w-full h-fit object-contain">
                    @if(isset($qrUrl) && $qrUrl)
                        <img src="{{ $qrUrl }}" alt="QR Code" class="w-full h-full object-contain">
                    @else
                        <img src="{{ asset('assets/icons/qr-dummy.svg') }}" alt="QR Code" class="w-full h-full">
                    @endif
                </div>

                {{-- Brand --}}
                <div class="flex items-center gap-2 bg-primary-500 text-white px-6 py-2.5 rounded-xl w-full justify-center">
                    <img src="{{ asset('assets/icons/rekaps-store-logo-lw.svg') }}" alt="">
                </div>
            </div>

            {{-- ===== KANAN: Langkah + Detail ===== --}}
            <div class="flex flex-col md:w-1/2 gap-2">

                {{-- Langkah --}}
                <div class="flex flex-col bg-neutral-50 gap-3 p-6 flex-1 border-1 border-neutral-300 rounded-2xl">
                    <p class="text-base lg:text-lg font-bold text-neutral-800">Langkah &nbsp;Pembayaran dengan QRIS</p>
                    <ol class="flex flex-col gap-2 text-sm lg:text-base text-neutral-500 list-decimal list-inside leading-relaxed">
                        <li>Buka aplikasi pembayaran yang mendukung QRIS</li>
                        <li>Scan QR code yang ditampilkan pada halaman ini</li>
                        <li>Pastikan nominal pembayaran sesuai dengan total tagihan</li>
                        <li>Konfirmasi pembayaran dan selesaikan transaksi di aplikasi pembayaran</li>
                        <li>Status pesanan akan diperbarui secara otomatis setelah pembayaran berhasil</li>
                    </ol>
                </div>

                {{-- Detail Bayar --}}
                <div class="bg-neutral-900 rounded-2xl p-5 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-neutral-400">Bayar sebesar:</p>
                        <p class="text-base font-extrabold text-secondary-400">Rp{{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-neutral-400">Batas waktu pembayaran:</p>
                        <p id="countdown" class="text-xs font-bold text-red-400">23:59:59</p>
                    </div>
                    <button onclick="document.getElementById('confirmModal').classList.remove('hidden')"
                        class="w-full flex items-center justify-center bg-secondary-400 hover:bg-secondary-500 active:scale-95 text-neutral-900 text-sm font-bold py-3 rounded-xl transition cursor-pointer">
                        Saya sudah bayar
                    </button>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- ===== MODAL KONFIRMASI ===== --}}
<div id="confirmModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="absolute inset-0 bg-black/30" onclick="document.getElementById('confirmModal').classList.add('hidden')"></div>
    <div class="relative z-10 w-full max-w-sm bg-white rounded-2xl p-6 flex flex-col items-center gap-4 mx-4">
        <div class="w-16 h-16 rounded-full bg-primary-50 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <div class="text-center">
            <p class="text-base font-bold text-neutral-800">Pembayaran tercatat</p>
            <p class="text-xs text-neutral-400 mt-1">Pembayaranmu akan segera kami verifikasi</p>
        </div>
        <button onclick="window.location.href='/profile/orders'"
            class="w-full bg-primary-500 hover:bg-primary-600 text-white text-sm font-bold py-2.5 rounded-xl transition">
            Oke
        </button>
    </div>
</div>

<script>
const expiredAt = new Date().getTime() + (24 * 60 * 60 * 1000);

function updateCountdown() {
    const now  = new Date().getTime();
    const diff = expiredAt - now;

    if (diff <= 0) {
        document.getElementById('countdown').textContent = 'Waktu habis';
        return;
    }

    const hours   = Math.floor(diff / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    document.getElementById('countdown').textContent =
        `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

setInterval(updateCountdown, 1000);
updateCountdown();
</script>

@endsection