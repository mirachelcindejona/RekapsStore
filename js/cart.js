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

