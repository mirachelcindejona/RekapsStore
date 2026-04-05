const sizes = document.querySelectorAll(".size");

sizes.forEach(size =>
  size.addEventListener('click', function() {
    sizes.forEach(size => size.classList.remove('active'));
    size.classList.add('active');
  })
)

const minus = document.querySelector('.minus');
const plus = document.querySelector('.plus');
const input = document.querySelector('.qty-input');

minus.addEventListener('click', () => {
  let val = parseInt(input.value) || 1;
  if (val > 1) input.value = val - 1;
});

plus.addEventListener('click', () => {
  let val = parseInt(input.value) || 1;
  input.value = val + 1;
});