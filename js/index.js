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

const cart = document.querySelector('.cart');

cart.addEventListener('mouseenter', () => {
    cart.src = '../assets/icons/cart-hover.svg';
    cart.style.cursor = 'pointer';
});

cart.addEventListener('mouseleave', () => {
    cart.src = '../assets/icons/cart.svg';
});

const bell = document.querySelector('.bell');

bell.addEventListener('mouseenter', () => {
    bell.src = '../assets/icons/bell-index-h.svg';
    bell.style.cursor = 'pointer';
});

bell.addEventListener('mouseleave', () => {
    bell.src = '../assets/icons/bell-index.svg';
});

const history = document.querySelector('.history');

history.addEventListener('mouseenter', () => {
    history.src = '../assets/icons/history-index-h.svg';
    history.style.cursor = 'pointer';
});

history.addEventListener('mouseleave', () => {
    history.src = '../assets/icons/history-index.svg';
});