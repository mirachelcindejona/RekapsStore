@extends('components.client.layout')

@section('navbar')
<x-client.navbar-main variant="page" title="Pembayaran" />
@endsection

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-7xl border-neutral-200 rounded-2xl overflow-hidden p-0">
        <div class="flex flex-col md:flex-row gap-2">

            {{-- KIRI: QR Code --}}
            <div class="flex flex-col items-center bg-neutral-50 justify-center gap-4 p-4 lg:p-8 md:w-1/2 border border-neutral-300 rounded-2xl">
                <p class="text-base lg:text-lg font-bold text-neutral-800">Scan untuk membayar</p>

                <div class="relative w-full h-fit object-contain">
                    @if(isset($qrUrl) && $qrUrl)
                        <img src="{{ $qrUrl }}" alt="QR Code" class="w-full h-full object-contain">
                    @else
                        <img src="{{ asset('assets/icons/qr-dummy.svg') }}" alt="QR Code" class="w-full h-full">
                    @endif
                </div>

                <div class="flex items-center gap-2 bg-primary-500 text-white px-6 py-2.5 rounded-xl w-full justify-center">
                    <img src="{{ asset('assets/icons/rekaps-store-logo-lw.svg') }}" alt="">
                </div>
            </div>

            {{-- KANAN: Langkah + Detail --}}
            <div class="flex flex-col md:w-1/2 gap-2">

                <div class="flex flex-col bg-neutral-50 gap-3 p-6 flex-1 border border-neutral-300 rounded-2xl">
                    <p class="text-base lg:text-lg font-bold text-neutral-800">Langkah Pembayaran dengan QRIS</p>
                    <ol class="flex flex-col gap-2 text-sm lg:text-base text-neutral-500 list-decimal list-inside leading-relaxed">
                        <li>Buka aplikasi pembayaran yang mendukung QRIS</li>
                        <li>Scan QR code yang ditampilkan pada halaman ini</li>
                        <li>Konfirmasi pembayaran dan selesaikan transaksi di aplikasi pembayaran</li>
                        <li>Halaman akan otomatis berpindah setelah pembayaran berhasil</li>
                    </ol>
                </div>

                <div class="bg-neutral-900 rounded-2xl p-5 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-neutral-400">Bayar sebesar:</p>
                        <p class="text-base font-extrabold text-secondary-400">Rp{{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-neutral-400">Batas waktu pembayaran:</p>
                        <p id="countdown" class="text-xs font-bold text-red-400">--:--:--</p>
                    </div>
                    {{-- Status --}}
                    <div id="paymentStatus" class="flex items-center justify-center gap-2 py-2">
                        <div class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></div>
                        <p class="text-xs text-neutral-400">Menunggu pembayaran...</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Modal expired --}}
<div id="expiredModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative z-10 w-full max-w-sm bg-white rounded-2xl p-6 flex flex-col items-center gap-4 mx-4">
        <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <div class="text-center">
            <p class="text-base font-bold text-neutral-800">Waktu Pembayaran Habis</p>
            <p class="text-xs text-neutral-400 mt-1">Pesananmu telah kedaluwarsa. Silakan buat pesanan baru.</p>
        </div>
        <button onclick="window.location.href='/profile/orders'"
            class="w-full bg-primary-500 hover:bg-primary-600 text-white text-sm font-bold py-2.5 rounded-xl transition">
            Lihat Riwayat Pesanan
        </button>
    </div>
</div>

<script>
const orderId = '{{ $orderId }}';
const expiryTime = '{{ $expiry }}';

// COUNTDOWN berdasarkan expiry dari Midtrans
const expiredAt = expiryTime ? new Date(expiryTime.replace(' ', 'T') + '+07:00').getTime() : (new Date().getTime() + 15 * 60 * 1000);

function updateCountdown() {
    const now  = new Date().getTime();
    const diff = expiredAt - now;

    if (diff <= 0) {
        document.getElementById('countdown').textContent = 'Waktu habis';
        document.getElementById('expiredModal').classList.remove('hidden');
        clearInterval(countdownInterval);
        clearInterval(pollingInterval);
        return;
    }

    const hours   = Math.floor(diff / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    document.getElementById('countdown').textContent =
        `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

const countdownInterval = setInterval(updateCountdown, 1000);
updateCountdown();

// POLLING status pembayaran setiap 5 detik
const pollingInterval = setInterval(() => {
    fetch(`/payment/check/${orderId}`)
        .then(res => res.json())
        .then(data => {
            if (data.status === 'Paid') {
                clearInterval(pollingInterval);
                clearInterval(countdownInterval);
                document.getElementById('paymentStatus').innerHTML = `
                    <div class="w-2 h-2 rounded-full bg-green-400"></div>
                    <p class="text-xs text-green-400">Pembayaran berhasil! Mengalihkan...</p>
                `;
                setTimeout(() => {
                    window.location.href = '/profile/orders';
                }, 2000);
            } else if (data.status === 'Expired' || data.status === 'Cancelled') {
                clearInterval(pollingInterval);
                clearInterval(countdownInterval);
                document.getElementById('expiredModal').classList.remove('hidden');
            }
        })
        .catch(() => {});
}, 5000);
</script>

@endsection