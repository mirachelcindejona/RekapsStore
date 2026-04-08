// script
function toggleSidebar() {
  document.getElementById("sidebar").classList.toggle("open");
}
function openModal() {
  document.getElementById("modal").classList.add("active");
  document.getElementById("overlay").classList.add("active");
}

function closeModal() {
  document.getElementById("modal").classList.remove("active");
  document.getElementById("overlay").classList.remove("active");
}

function openDiskon() {
  document.getElementById("diskon").classList.add("active");
  document.getElementById("overlay").classList.add("active");
}

function closeDiskon() {
  document.getElementById("diskon").classList.remove("active");
  document.getElementById("overlay").classList.remove("active");
  
}

function confirmSave() {
  const yakin = confirm("Yakin ingin menyimpan data?");

  if (yakin) {
    alert("Data berhasil disimpan");

    closeAll(); 
  }
}

function saveData() {
  window.location.href = "promo.html";
}

// function openDiskon() {
//     console.log("klik diskon");
//   document.getElementById("modalDiskon").classList.add("show");
//   document.getElementById("overlay").classList.add("show");
// }

// function openVoucher() {
//   document.getElementById("modalVoucher").classList.add("show");
//   document.getElementById("overlay").classList.add("show");
// }

function closeAll() {
  document.getElementById("diskon").classList.remove("active");
  document.getElementById("modal").classList.remove("active");
  document.getElementById("overlay").classList.remove("active");
}

let currentAction = "";

function showConfirm(type) {
  const popup = document.getElementById("confirmPopup");
  const overlay = document.getElementById("overlay");

  const title = document.getElementById("confirmTitle");
  const text = document.getElementById("confirmText");

  currentAction = type;

  if (type === "nonaktif-diskon") {
    title.innerText = "Nonaktifkan Diskon";
    text.innerText = "Apakah Anda yakin akan menonaktifkan diskon ini?";
  }

  if (type === "nonaktif-voucher") {
    title.innerText = "Nonaktifkan Voucher";
    text.innerText = "Apakah Anda yakin akan menonaktifkan voucher ini?";
  }

  popup.classList.add("active");
  overlay.classList.add("active");
}

function closeConfirm() {
  document.getElementById("confirmPopup").classList.remove("active");
  document.getElementById("overlay").classList.remove("active");
}

function confirmAction() {
  if (currentAction === "nonaktif-diskon") {
    alert("Diskon berhasil dinonaktifkan");
  }

  if (currentAction === "nonaktif-voucher") {
    alert("Voucher berhasil dinonaktifkan");
  }

  closeConfirm();
}