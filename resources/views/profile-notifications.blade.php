<x-client.profile-layout active="notifikasi">

    <div class="bg-white border border-neutral-100 rounded-2xl p-4 sm:p-6 flex flex-col gap-4">

        <div class="flex items-center justify-between">
            <h2 class="text-sm sm:text-base font-bold text-neutral-800">Notifikasi</h2>
            <button onclick="markAllRead()" class="text-[10px] sm:text-xs font-semibold text-primary-500 hover:underline cursor-pointer">
                Tandai semua dibaca
            </button>
        </div>

        @if($notifications->isEmpty())
        <div class="flex flex-col items-center justify-center py-16 gap-2 text-center">
            <p class="text-neutral-400 text-sm">Belum ada notifikasi.</p>
        </div>
        @else
        <div class="flex flex-col divide-y divide-neutral-50">
            @foreach($notifications as $notif)
            <div
                data-notif-id="{{ $notif->id }}"
                onclick="openNotification({{ $notif->id }}, @js($notif->title), @js($notif->message), {{ $notif->is_read ? 'true' : 'false' }}, @js($notif->product?->name), @js($notif->product && $notif->product->images->first() ? asset('storage/' . $notif->product->images->first()->image_path) : null))"
                class="p-3 sm:p-5 cursor-pointer hover:bg-primary-50 transition {{ !$notif->is_read ? 'bg-primary-50' : 'bg-white' }}">

                <div class="flex gap-3">
                    <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-lg bg-neutral-100 flex items-center justify-center shrink-0 overflow-hidden">
                        @if($notif->type === 'order' && $notif->product && $notif->product->images->first())
                            <img src="{{ asset('storage/' . $notif->product->images->first()->image_path) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-primary-500 flex items-center justify-center text-white text-xs font-bold">AR</div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-xs sm:text-sm font-semibold text-neutral-800 truncate">{{ $notif->title }}</h3>
                            <p class="text-[9px] sm:text-[10px] text-neutral-400 shrink-0">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                        <p class="text-[10px] sm:text-xs text-neutral-500 mt-1 line-clamp-2">{{ $notif->message }}</p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        @endif

    </div>

{{-- Notif Modal --}}
<div id="notifModal" class="hidden fixed inset-0 z-50 flex items-end sm:items-center justify-center">
    <div class="absolute inset-0 bg-black/30" onclick="closeNotification()"></div>
    <div class="relative z-10 w-full max-w-md bg-white rounded-t-2xl sm:rounded-2xl p-5 mx-0 sm:mx-4">
        <div class="flex gap-3 sm:gap-4 items-center">
            <div id="notifImageWrapper" class="hidden w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-neutral-100 overflow-hidden shrink-0">
                <img id="notifImage" src="" class="w-full h-full object-cover">
            </div>
            <div class="flex-1 min-w-0">
                <h3 id="notifTitle" class="text-sm sm:text-base font-bold text-neutral-800"></h3>
                <p id="notifProduct" class="text-xs text-neutral-400 mt-0.5"></p>
            </div>
        </div>
        <p id="notifMessage" class="text-xs sm:text-sm text-neutral-500 mt-3 leading-relaxed"></p>
        <div class="flex justify-end mt-4 sm:mt-6">
            <button onclick="closeNotification()" class="bg-primary-500 text-white text-xs sm:text-sm px-4 py-2 rounded-xl cursor-pointer hover:bg-primary-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>

</x-client.profile-layout>

<script>
let currentNotifId = null;
let currentIsRead = false;

function openNotification(id, title, message, isRead, productName, imageUrl) {
    currentNotifId = id;
    currentIsRead = isRead;
    document.getElementById('notifTitle').textContent = title;
    document.getElementById('notifMessage').textContent = message;
    const imageWrapper = document.getElementById('notifImageWrapper');
    const image = document.getElementById('notifImage');
    const product = document.getElementById('notifProduct');
    if (imageUrl) {
        image.src = imageUrl;
        imageWrapper.classList.remove('hidden');
        product.textContent = productName ?? '';
    } else {
        imageWrapper.classList.add('hidden');
        product.textContent = '';
    }
    document.getElementById('notifModal').classList.remove('hidden');
}

function closeNotification() {
    document.getElementById('notifModal').classList.add('hidden');
    if (currentNotifId && !currentIsRead) {
        fetch(`/notifications/${currentNotifId}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        }).then(() => {
            const item = document.querySelector(`[data-notif-id="${currentNotifId}"]`);
            if (item) { item.classList.remove('bg-primary-50'); item.classList.add('bg-white'); }
            currentIsRead = true;
        });
    }
    currentNotifId = null;
}

function markAllRead() {
    fetch('/notifications/read-all', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    }).then(() => window.location.reload());
}
</script>