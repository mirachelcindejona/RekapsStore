// Fungsi Helper untuk buka-tutup
function toggleModal(id, isOpen) {
    const modal = document.getElementById(id);
    const overlay = document.getElementById("overlay");

    if (isOpen) {
        // Buka: Hilangkan hidden, baru tambahkan flex agar muncul di tengah
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        overlay.classList.remove("hidden");
        // Beri jeda sedikit agar animasi scale/opacity (jika ada) berjalan
        setTimeout(() => {
            modal.classList.add("active");
            overlay.classList.add("active");
        }, 10);
    } else {
        // Tutup
        modal.classList.remove("active");
        overlay.classList.remove("active");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        overlay.classList.add("hidden");
    }
}

// Fungsi tombol yang dipanggil di HTML
function openModal() {
    toggleModal("modal", true);
}

function openDiskon() {
    toggleModal("diskon", true);
}

function closeAll() {
    toggleModal("modal", false);
    toggleModal("diskon", false);
    if(document.getElementById("confirmPopup")) {
        toggleModal("confirmPopup", false);
    }
}

function closeConfirm() {
    toggleModal("confirmPopup", false);
}

// Fungsi konfirmasi hapus/nonaktifkan
function showConfirm(type) {
    window.currentAction = type;
    const popup = document.getElementById("confirmPopup");
    if(popup) toggleModal("confirmPopup", true);
    
    // Set text (opsional)
    const title = document.getElementById("confirmTitle");
    const text = document.getElementById("confirmText");
    if (type === "nonaktif-diskon") {
        title.innerText = "Nonaktifkan Diskon";
        text.innerText = "Apakah Anda yakin?";
    }
}