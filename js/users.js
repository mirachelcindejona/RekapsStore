function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("open");
    document.getElementById("sidebarOverlay").classList.toggle("show");
}

function closeSidebar() {
    document.getElementById("sidebar").classList.remove("open");
    document.getElementById("sidebarOverlay").classList.remove("show");
}


let isEdit = false;
let editId = null;

//tambah pengguna kontrol
function openAddModal() {
  isEdit = false;

  document.getElementById("modalTitle").innerText = "Tambah Pengguna";
  document.getElementById("submitBtn").innerText = "Tambah Pengguna";

  clearForm();
  showModal();

}

function openEditModal(id) {
  isEdit = true;
  editId = id;

  const user = users.find(u => u.id === id);

  document.getElementById("modalTitle").innerText = "Edit Pengguna";
  document.getElementById("submitBtn").innerText = "Edit Pengguna";

  document.getElementById("namaInput").value = user.nama;
  document.getElementById("emailInput").value = user.email;

  showModal();
}

function showModal() {
  document.getElementById("userModal").style.display = "flex";
}

function closeModal() {
  document.getElementById("userModal").style.display = "none";
}

function clearForm() {
  document.getElementById("namaInput").value = "";
  document.getElementById("emailInput").value = "";
  document.getElementById("passwordInput").value = "";
}

// ===== submit =====
function submitForm() {
  const nama = document.getElementById("namaInput").value;
  const email = document.getElementById("emailInput").value;

  if (!nama || !email) {
    alert("Isi semua data!");
    return;
  }

  if (isEdit) {
    const user = users.find(u => u.id === editId);
    user.nama = nama;
    user.email = email;
  } else {
    users.push({
      id: Date.now(),
      nama,
      email,
      role: "Pengguna",
      status: "Ready",
      bergabung: "April 2026"
    });
  }

  saveData();
  renderUsers();
  closeModal();
}
