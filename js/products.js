/* ---- Script Logic untuk Pindah Tab ---- */
function switchTab(evt, tabId) {
  // 1. Sembunyikan semua konten tab
  let tabContents = document.getElementsByClassName("tab-content");
  for (let i = 0; i < tabContents.length; i++) {
    tabContents[i].classList.remove("active");
  }

  // 2. Hilangkan garis ungu (class active) dari semua tombol tab
  let tabButtons = document.getElementsByClassName("detail-tab");
  for (let i = 0; i < tabButtons.length; i++) {
    tabButtons[i].classList.remove("active");
  }

  // 3. Tampilkan tab yang dipilih berdasarkan tabId
  document.getElementById(tabId).classList.add("active");

  // 4. Tambahkan garis ungu (class active) pada tombol yang di-klik
  evt.currentTarget.classList.add("active");
}

/* ---- Script Logic untuk Modal Stok ---- */
function openModal(id) {
  document.getElementById(id).classList.add("active");
  document.body.style.overflow = "hidden";
}
function closeModal(id) {
  document.getElementById(id).classList.remove("active");
  document.body.style.overflow = "auto";
}

function successDelete() {
  closeModal("modalConfirmDelete");
  openModal("modalSuccessAction");

  setTimeout(function () {
    closeModal("modalSuccessAction");
  }, 2000);
}

window.onclick = function (event) {
  if (event.target.classList.contains("modal-overlay")) {
    event.target.classList.remove("active");
    document.body.style.overflow = "auto";
  }
};
