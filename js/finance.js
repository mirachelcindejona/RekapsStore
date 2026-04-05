function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("open");
        document.getElementById("sidebarOverlay").classList.toggle("show");
    }

function closeSidebar() {
        document.getElementById("sidebar").classList.remove("open");
        document.getElementById("sidebarOverlay").classList.remove("show");
    }

const filters = document.querySelectorAll(".filter");

filters.forEach(filter =>
  filter.addEventListener('click', function() {
    filters.forEach(filter => filter.classList.remove('active'));
    filter.classList.add('active');
  })
)

function openModal() {
  document.getElementById("modal").classList.add("active");
  document.getElementById("overlay").classList.add("active");
}

function closeModal() {
  document.getElementById("modal").classList.remove("active");
  document.getElementById("overlay").classList.remove("active");
}

function saveData() {
  window.location.href = "finance.html";
}

document.getElementById("exportBtn").addEventListener("click", function () {
  let table = document.getElementById("transaksiTable");

  let html = table.outerHTML;

  let blob = new Blob([html], {
    type: "application/vnd.ms-excel"
  });

  let url = URL.createObjectURL(blob);

  let a = document.createElement("a");
  a.href = url;
  a.download = "riwayat-transaksi.xls"; // nama file
  a.click();
});