/* ---- Script Logic untuk Pindah Tab ---- */
function switchTab(evt, tabId) {
    let tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove("block");
        tabContents[i].classList.add("hidden");
    }

    let tabButtons = document.getElementsByClassName("detail-tab");
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove(
            "text-primary-500",
            "border-primary-500",
        );
        tabButtons[i].classList.add("text-neutral-400", "border-transparent");
    }

    document.getElementById(tabId).classList.remove("hidden");
    document.getElementById(tabId).classList.add("block");

    evt.currentTarget.classList.remove(
        "text-neutral-400",
        "border-transparent",
    );
    evt.currentTarget.classList.add("text-primary-500", "border-primary-500");
}

/* ---- Script Logic untuk Modal ---- */
function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.add("active");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        setTimeout(() => {
            modal.classList.remove("opacity-0");
            modal.classList.add("opacity-100");
        }, 10);
        document.body.style.overflow = "hidden";
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.remove("opacity-100");
        modal.classList.add("opacity-0");
        modal.classList.remove("active");
        setTimeout(() => {
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }, 300);
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
        closeModal(event.target.id);
    }
};
