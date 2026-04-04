const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

let index = 0;

setInterval(() => {
  index++;

  if (index >= totalSlides) {
    index = 0;
  }

  slides.style.transform = `translateX(-${index * 100}%)`;
}, 3000);

const filters = document.querySelectorAll(".filter");

filters.forEach(filter =>
  filter.addEventListener('click', function() {
    filters.forEach(filter => filter.classList.remove('active'));
    filter.classList.add('active');
  })
)