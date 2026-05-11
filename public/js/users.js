const users = [
  {
    id: 1,
    nama: "Admin Rekaps",
    email: "admin@rekaps.com",
    role: "Pengurus",
    bergabung: "12 Jan 2024",
    status: "Active",
  },

  {
    id: 2,
    nama: "Fajar Nugraha",
    email: "fajar@gmail.com",
    role: "Pengurus",
    bergabung: "10 Feb 2024",
    status: "Active",
  },

  {
    id: 3,
    nama: "Andi Saputra",
    email: "andi@gmail.com",
    role: "Pembeli",
    bergabung: "22 Mar 2024",
    status: "Blocked",
  },

  {
    id: 4,
    nama: "Budi Hartono",
    email: "budi@gmail.com",
    role: "Pembeli",
    bergabung: "30 Mar 2024",
    status: "Active",
  },
];

let currentRole = "Pengurus";
let editId = null;

const tbody = document.getElementById("userTableBody");

function renderTable() {

  tbody.innerHTML = "";

  const filtered = users.filter(
    user => user.role === currentRole
  );

  filtered.forEach(user => {

    const tr = document.createElement("tr");

    tr.innerHTML = `
    
      <td>${user.nama}</td>

      <td>${user.email}</td>

      <td>
        <span class="badge ${user.role === "Pengurus"
        ? "role-pengurus"
        : "role-pembeli"
      }">
          ${user.role}
        </span>
      </td>

      <td>${user.bergabung}</td>

      <td>
        <span class="badge ${user.status === "Active"
        ? "status-active"
        : "status-blocked"
      }">
          ${user.status}
        </span>
      </td>

      <td>

        <div class="action-cell">

          ${user.role === "Pengurus"
        ? `
            
            <button
              class="btn-icon-edit"
              onclick="editUser(${user.id})">
              <svg width="20" 
              height="20" 
              viewBox="0 0 20 20" 
              fill="none" 
              xmlns="http://www.w3.org/2000/svg">
              <path
              d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
              stroke="currentColor" 
              stroke-width="2" 
              stroke-linecap="round" 
              stroke-linejoin="round" />
              </svg>

            </button>

            <button
              class="btn-icon-delete"
              onclick="deleteUser(${user.id})">
              <svg width="20" 
              height="20" 
              viewBox="0 0 20 20" 
              fill="none" 
              xmlns="http://www.w3.org/2000/svg">
              <path
              d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
              stroke="currentColor" 
              stroke-width="2" 
              stroke-linecap="round" 
              stroke-linejoin="round" />
              </svg>

            </button>

            `
        :
        `
            
            <button
              class="btn-ban"
              onclick="blockUser(${user.id})">

              <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <circle
                  cx="10"
                  cy="10"
                  r="7"
                  stroke="currentColor"
                  stroke-width="2"/>

                <path
                  d="M5 15L15 5"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"/>
              </svg>

            </button>

            `
      }

        </div>

      </td>

    `;

    tbody.appendChild(tr);

  });

}


function filterUsers(role, el) {

  currentRole = role;

  document
    .querySelectorAll(".tab-btn")
    .forEach(btn => btn.classList.remove("active"));

  el.classList.add("active");

  const addBtn = document.getElementById("addUserBtn");

  if (role === "Pembeli") {
    addBtn.style.display = "none";
  } else {
    addBtn.style.display = "block";
  }

  renderTable();

}

function openAddModal() {

  editId = null;

  document.getElementById("modalTitle").innerText =
    "Tambah Pengurus";

  document.getElementById("namaInput").value = "";
  document.getElementById("emailInput").value = "";
  document.getElementById("passwordInput").value = "";

  document.getElementById("userModal").style.display =
    "flex";

}

function closeModal() {

  document.getElementById("userModal").style.display =
    "none";

}

function submitForm() {

  const nama =
    document.getElementById("namaInput").value;

  const email =
    document.getElementById("emailInput").value;

  if (!nama || !email) {
    alert("Lengkapi data");
    return;
  }

  if (editId) {

    const user = users.find(u => u.id === editId);

    user.nama = nama;
    user.email = email;

  } else {

    users.push({
      id: Date.now(),
      nama,
      email,
      role: "Pengurus",
      bergabung: "Hari ini",
      status: "Active",
    });

  }

  closeModal();
  renderTable();

}

function editUser(id) {

  const user = users.find(u => u.id === id);

  editId = id;

  document.getElementById("modalTitle").innerText =
    "Edit Pengurus";

  document.getElementById("namaInput").value =
    user.nama;

  document.getElementById("emailInput").value =
    user.email;

  document.getElementById("passwordInput").value = "";

  document.getElementById("userModal").style.display =
    "flex";

}

function deleteUser(id) {

  document.getElementById("confirmModal").style.display =
    "flex";

  document.getElementById("confirmText").innerText =
    "Apakah Anda yakin akan menghapus akun pengurus? Jika akun di hapus maka pengurus tidak lagi mendapatkan akses apapun";

  document.getElementById("confirmBtn").onclick =
    function () {

      const index = users.findIndex(
        user => user.id === id
      );

      users.splice(index, 1);

      closeConfirmModal();
      renderTable();

    };

}

function blockUser(id) {

  document.getElementById("confirmModal").style.display =
    "flex";

  document.getElementById("confirmText").innerText =
    "Apakah Anda yakin akan memblokir akun ini? Jika Anda memblokir akun ini, maka pengguna tidak akan bisa mengakses apapun di website ini";

  document.getElementById("confirmBtn").onclick =
    function () {

      const user = users.find(
        user => user.id === id
      );

      user.status =
        user.status === "Blocked"
          ? "Active"
          : "Blocked";

      closeConfirmModal();
      renderTable();

    };

}

function closeConfirmModal() {

  document.getElementById("confirmModal").style.display =
    "none";

}

renderTable();