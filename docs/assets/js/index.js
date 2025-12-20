const toggle = document.querySelector('.mobile-toc-toggle');
const toc = document.querySelector('.toc');

toggle.addEventListener('click', () => {
  toc.classList.toggle('open');
});