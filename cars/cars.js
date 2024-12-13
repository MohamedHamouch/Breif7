const closeBtn = document.querySelector('#close-add-popup');
const addCarPopup = document.querySelector('#add-car-popup');
const addCarBtn = document.querySelector('#add-car-btn');


closeBtn.addEventListener('click', () => {
  addCarPopup.classList.toggle('flex');
  addCarPopup.classList.toggle('hidden');

});
addCarBtn.addEventListener('click', () => {
  addCarPopup.classList.toggle('flex');
  addCarPopup.classList.toggle('hidden');

});