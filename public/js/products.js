/* ---- Script Logic untuk Pindah Tab ---- */
function switchTab(evt, tabId) {
    // 1. Sembunyikan semua konten tab (Ganti 'block' menjadi 'hidden')
    let tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove("block");
        tabContents[i].classList.add("hidden");
    }

    // 2. Hilangkan style aktif dari semua tombol tab (kembalikan ke warna abu-abu)
    let tabButtons = document.getElementsByClassName("detail-tab");
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("text-[#7d39eb]", "border-[#7d39eb]");
        tabButtons[i].classList.add("text-neutral-400", "border-transparent");
    }

    // 3. Tampilkan tab yang dipilih (Hapus 'hidden', tambahkan 'block')
    document.getElementById(tabId).classList.remove("hidden");
    document.getElementById(tabId).classList.add("block");

    // 4. Tambahkan style aktif pada tombol yang di-klik (warna ungu)
    evt.currentTarget.classList.remove(
        "text-neutral-400",
        "border-transparent",
    );
    evt.currentTarget.classList.add("text-[#7d39eb]", "border-[#7d39eb]");
}

/* ---- Script Logic untuk Modal ---- */
function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        // Tambahkan class active untuk jaga-jaga jika ada selector [&.active]
        modal.classList.add("active");

        // Ganti display dari hidden ke flex
        modal.classList.remove("hidden");
        modal.classList.add("flex");

        // Gunakan timeout kecil agar transisi opacity Tailwind berjalan mulus
        setTimeout(() => {
            modal.classList.remove("opacity-0");
            modal.classList.add("opacity-100");
        }, 10);

        // Kunci scroll halaman
        document.body.style.overflow = "hidden";
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        // Mulai animasi fade-out
        modal.classList.remove("opacity-100");
        modal.classList.add("opacity-0");
        modal.classList.remove("active");

        // Tunggu animasi fade-out selesai (300ms) sebelum menyembunyikan elemen
        setTimeout(() => {
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }, 300);

        // Kembalikan scroll halaman
        document.body.style.overflow = "auto";
    }
}

function successDelete() {
    closeModal("modalConfirmDelete");
    openModal("modalSuccessAction");

    // Modal sukses akan tertutup otomatis dalam 2 detik
    setTimeout(function () {
        closeModal("modalSuccessAction");
    }, 2000);
}

// Menutup modal jika user klik area luar modal (overlay)
window.onclick = function (event) {
    if (event.target.classList.contains("modal")) {
        // Ambil ID dari modal yang ter-klik dan tutup
        closeModal(event.target.id);
    }
};
