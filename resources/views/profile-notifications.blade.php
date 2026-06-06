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
        <div class="flex flex-col gap-2">
            @foreach($notifications as $notif)
            <div class="flex gap-3 p-4 rounded-xl border {{ $notif->read_at ? 'bg-white border-neutral-100' : 'bg-primary-50 border-primary-100' }}">
                <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white text-xs font-bold shrink-0">
                    AR
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-bold text-neutral-800">{{ $notif->title }}</p>
                        <p class="text-[10px] text-neutral-400">{{ $notif->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-xs text-neutral-500 mt-1">{{ $notif->message }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>

</x-client.profile-layout>