<x-client.profile-layout active="akun">

    <div class="bg-white border border-neutral-100 rounded-2xl p-6 flex flex-col gap-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-neutral-800">Profil Saya</h2>
                <p class="text-xs text-neutral-400">Kelola informasi profil dan akun Anda</p>
            </div>
            <button onclick="document.getElementById('editModal').classList.remove('hidden')"
                class="flex items-center gap-2 border border-primary-300 text-primary-500 text-xs font-semibold px-4 py-2 rounded-xl hover:bg-primary-50 transition cursor-pointer">
                <img src="{{ asset('assets/icons/edit-profil.svg') }}" class="w-3.5 h-3.5">
                Edit Profil
            </button>
        </div>

        {{-- Avatar + Info --}}
        <div class="flex gap-6">
            <div class="relative shrink-0">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-32 h-32 rounded-2xl object-cover">
                @else
                    <div class="w-24 h-24 rounded-2xl bg-teal-500 flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                @endif
            </div>

            <div class="flex-1 flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/icons/mail-line.svg') }}" class="w-4 h-4">
                    </div>
                    <div>
                        <p class="text-[10px] text-neutral-400">Nama</p>
                        <p class="text-xs font-semibold text-neutral-700">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/icons/scan-user-line.svg') }}" class="w-4 h-4">
                    </div>
                    <div>
                        <p class="text-[10px] text-neutral-400">Username</p>
                        <p class="text-xs font-semibold text-neutral-700">{{ $user->username }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/icons/mail-line.svg') }}" class="w-4 h-4">
                    </div>
                    <div>
                        <p class="text-[10px] text-neutral-400">Email</p>
                        <p class="text-xs font-semibold text-neutral-700">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white border border-neutral-100 rounded-2xl p-4 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-primary-100 rounded-full -translate-y-4 translate-x-4 opacity-50"></div>
                <img src="{{ asset('assets/icons/total-pesanan.svg') }}" class="w-6 h-6 mb-3">
                <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-wide">Total Pesanan</p>
                <p class="text-2xl font-bold text-neutral-800">{{ $user->orders->count() ?? 0 }}</p>
            </div>
            <div class="bg-white border border-neutral-100 rounded-2xl p-4 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-pink-100 rounded-full -translate-y-4 translate-x-4 opacity-50"></div>
                <img src="{{ asset('assets/icons/pesanan-selesai.svg') }}" class="w-6 h-6 mb-3">
                <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-wide">Pesanan Selesai</p>
                <p class="text-2xl font-bold text-neutral-800">{{ $user->orders->where('status', 'Selesai')->count() ?? 0 }}</p>
            </div>
            <div onclick="document.getElementById('voucherModal').classList.remove('hidden')" class="bg-white border border-neutral-100 rounded-2xl p-4 relative overflow-hidden cursor-pointer">
                <div class="absolute top-0 right-0 w-16 h-16 bg-teal-100 rounded-full -translate-y-4 translate-x-4 opacity-50"></div>
                <img src="{{ asset('assets/icons/voucher.svg') }}" class="w-6 h-6 mb-3">
                <p class="text-[10px] font-bold text-neutral-400 uppercase tracking-wide">Voucher</p>
                <p class="text-2xl font-bold text-neutral-800">{{ $activeVouchers->count() }}</p>
            </div>
        </div>

    </div>

    {{-- myvouchermodal --}}
    <div id="voucherModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/30"
            onclick="document.getElementById('voucherModal').classList.add('hidden')">
        </div>
        <div class="relative z-10 w-full max-w-md bg-white rounded-2xl p-6 mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-neutral-800">
                    Voucher Aktif
                </h3>
                <button
                    class="cursor-pointer"
                    onclick="document.getElementById('voucherModal').classList.add('hidden')">
                    ✕
                </button>
            </div>
            <div class="flex flex-col gap-3 max-h-96 overflow-y-auto">
                @forelse($activeVouchers as $voucher)
                    <div class="border border-primary-100 bg-primary-50 rounded-xl p-3">
                        <p class="font-bold text-primary-500">
                            {{ $voucher->code }}
                        </p>
                        <p class="text-sm text-primary-300">
                            Diskon {{ $voucher->value }}%
                        </p>
                        <p class="text-xs text-primary-300">
                            Minimal belanja
                            Rp{{ number_format($voucher->min_purchase, 0, ',', '.') }}
                        </p>
                    </div>
                @empty
                    <p class="text-sm text-neutral-400">
                        Tidak ada voucher aktif
                    </p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/30" onclick="document.getElementById('editModal').classList.add('hidden')"></div>
        <div class="relative z-10 w-full max-w-md bg-white rounded-2xl p-6 flex flex-col gap-4 mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between">
                <p class="text-sm font-bold text-neutral-800">Edit Profil</p>
                <button onclick="document.getElementById('editModal').classList.add('hidden')"
                    class="text-neutral-400 text-xl cursor-pointer">&times;</button>
            </div>
            <form method="POST" action="/profile/update" enctype="multipart/form-data" class="flex flex-col gap-3">
                @csrf
                {{-- Photo --}}
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-neutral-100 overflow-hidden shrink-0">
                        <img
                            id="profilePreview"
                            src="{{ $user->profile_photo
                                ? asset('storage/' . $user->profile_photo)
                                : asset('assets/images/placeholder.png') }}"
                            class="w-full h-full object-cover">

                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-xs font-semibold text-neutral-600">Foto Profil</p>
                        <input type="file" name="photo" accept="image/*" onchange="previewProfilePhoto(event)" class="text-xs text-neutral-500">
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold text-neutral-600">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                        class="border border-neutral-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-primary-400 transition">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold text-neutral-600">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}"
                        class="border border-neutral-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-primary-400 transition">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold text-neutral-600">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"
                        class="border border-neutral-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-primary-400 transition">
                </div>
                <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white text-sm font-bold py-3 rounded-xl transition cursor-pointer">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

<script>
function previewProfilePhoto(event)
{
    const file = event.target.files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.onload = function(e)
    {
        document
            .getElementById('profilePreview')
            .src = e.target.result;
    }

    reader.readAsDataURL(file);
}
</script>

</x-client.profile-layout>