<x-client.profile-layout active="notifikasi">

    <div class="bg-white border border-neutral-100 rounded-2xl p-6 flex flex-col gap-4">

        <div class="flex items-center justify-between">
            <h2 class="text-base font-bold text-neutral-800">Notifikasi</h2>
            <form method="POST" action="{{ route('notifications.read') }}">
                @csrf
                <button type="submit" class="text-xs font-semibold text-primary-500 hover:underline cursor-pointer">
                    Tandai semua dibaca
                </button>
            </form>
        </div>

        @if($notifications->isEmpty())
        <div class="flex flex-col items-center justify-center py-16 gap-2 text-center">
            <p class="text-neutral-400 text-sm">Belum ada notifikasi.</p>
        </div>
        @else
            <div class="flex flex-col">
        @foreach($notifications as $notif)
            <div 
                onclick="openNotification(
                    {{ $notif->id }},
                    @js($notif->title),
                    @js($notif->message),
                    {{ $notif->is_read ? 'true' : 'false' }},
                    @js($notif->product?->name),
                    @js(
                        $notif->product && $notif->product->images->first()
                            ? asset('storage/' . $notif->product->images->first()->image_path)
                            : null
                    )
                )"
                class="p-5 cursor-pointer hover:bg-primary-50 {{ !$notif->is_read ? 'bg-primary-50' : 'bg-white' }}"
            >
            @if($notif->type === 'order')
                <div class="flex gap-3">
                    <div class="w-12 h-12 rounded-lg bg-neutral-100 flex items-center justify-center shrink-0 overflow-hidden">
                        <img
                            src="{{ $notif->product && $notif->product->images->first()
                                ? asset('storage/' . $notif->product->images->first()->image_path)
                                : asset('assets/images/placeholder.png') }}"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-neutral-800">
                            {{ $notif->title }}
                        </h3>
                        <p class="text-[11px] text-neutral-400">
                            {{ $notif->created_at->diffForHumans() }}
                        </p>
                        <p class="text-sm text-neutral-500 mt-2">
                            {{ $notif->message }}
                        </p>
                    </div>
                </div>
            @else
                <div class="flex gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary-500 text-white font-bold flex items-center justify-center shrink-0">
                        AR
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-neutral-800">
                            {{ $notif->title }}
                        </h3>
                        <p class="text-[11px] text-neutral-400">
                            {{ $notif->created_at->diffForHumans() }}
                        </p>
                        <p class="text-sm text-neutral-500 mt-2 leading-relaxed">
                            {{ $notif->message }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
        @endforeach
    </div>
        </div>
        @endif

    </div>

<div id="notifModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center">

    <div
        class="absolute inset-0 bg-black/30"
        onclick="closeNotification()">
    </div>

    <div class="relative z-10 w-full max-w-md bg-white rounded-2xl p-6 mx-4">

        <div class="flex gap-4 items-center">

            <div id="notifImageWrapper"
                class="hidden w-20 h-20 rounded-xl bg-neutral-100 overflow-hidden shrink-0">

                <img id="notifImage"
                    src=""
                    class="w-full h-full object-cover">
            </div>

            <div>
                <h3 id="notifTitle"
                    class="text-lg font-bold text-neutral-800">
                </h3>

                <p id="notifProduct"
                    class="text-sm text-neutral-400 mt-1">
                </p>
            </div>

        </div>

        <p id="notifMessage"
            class="text-sm text-neutral-500 mt-4 leading-relaxed">
        </p>

        <div class="flex justify-end mt-6">
            <button
                onclick="closeNotification()"
                class="bg-primary-500 text-white px-4 py-2 rounded-xl cursor-pointer">
                Tutup
            </button>
        </div>

    </div>

</div>

</x-client.profile-layout>

<script>

function closeNotification() {
    document
        .getElementById('notifModal')
        .classList.add('hidden');
}

function openNotification(
    id,
    title,
    message,
    isRead,
    productName,
    imageUrl
)
{
    document.getElementById('notifTitle').textContent = title;
    document.getElementById('notifMessage').textContent = message;

    const imageWrapper =
        document.getElementById('notifImageWrapper');

    const image =
        document.getElementById('notifImage');

    const product =
        document.getElementById('notifProduct');

    if (imageUrl) {

        image.src = imageUrl;
        imageWrapper.classList.remove('hidden');

        product.textContent = productName ?? '';

    } else {

        imageWrapper.classList.add('hidden');
        product.textContent = '';

    }

    document
        .getElementById('notifModal')
        .classList.remove('hidden');

    if (!isRead) {

        fetch(`/notifications/${id}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN':
                    document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                'Accept': 'application/json'
            }
        });

    }
}

</script>