@php
    $notifications = auth()->check()
        ? \App\Models\Notification::where('user_id', auth()->id())
            ->latest()
            ->take(3)
            ->get()
        : collect();
@endphp

<div class="absolute right-0 top-12 w-72 bg-white border border-neutral-100 rounded-xl shadow-lg flex flex-col overflow-hidden
            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">

    {{-- Header --}}
    <div class="flex items-center justify-between px-4 py-3 border-b border-neutral-100">
        <p class="text-sm font-bold text-neutral-800">Notifikasi</p>
        <button onclick="markAllRead()" class="text-xs text-primary-500 hover:text-primary-600 font-semibold cursor-pointer transition">
            Tandai semua dibaca
        </button>
    </div>

    {{-- Notif List --}}
    <div class="flex flex-col">
        @forelse ($notifications as $notif)
        <a href="{{ $notif->link ?? '#' }}"
           class="flex items-start gap-3 px-4 py-3 hover:bg-neutral-50 transition border-b border-neutral-50 {{ $notif->is_read ? 'opacity-60' : '' }}">
            <div class="w-2 h-2 rounded-full mt-1.5 shrink-0 {{ $notif->is_read ? 'bg-neutral-300' : 'bg-primary-500' }}"></div>
            <div class="flex flex-col gap-0.5 min-w-0">
                <p class="text-xs font-semibold text-neutral-800 truncate">{{ $notif->title }}</p>
                <p class="text-xs text-neutral-400 line-clamp-2">{{ $notif->message }}</p>
                <p class="text-[10px] text-neutral-300 mt-0.5">{{ $notif->created_at->diffForHumans() }}</p>
            </div>
        </a>
        @empty
        <div class="px-4 py-6 text-center">
            <p class="text-xs text-neutral-400">Belum ada notifikasi</p>
        </div>
        @endforelse
    </div>

    {{-- Footer --}}
    <a href="/profile/notifications"
       class="flex items-center justify-center px-4 py-3 text-xs font-semibold text-primary-500 hover:bg-primary-50 transition border-t border-neutral-100">
        Lihat Selengkapnya
    </a>

</div>