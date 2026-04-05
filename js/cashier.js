function openModal(id) {
  document.getElementById(id).classList.add("active");
  document.body.style.overflow = "hidden";
}
function closeModal(id) {
  document.getElementById(id).classList.remove("active");
  document.body.style.overflow = "auto";
}

function successCheckout() {
  closeModal("modalCheckout");
  openModal("modalSuccess");
}
window.onclick = function (event) {
  if (event.target.classList.contains("modal-overlay")) {
    event.target.classList.remove("active");
    document.body.style.overflow = "auto";
  }
};
