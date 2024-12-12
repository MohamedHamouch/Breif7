const closeBtn = document.querySelector('#close-add-popup');
const addClientPopup = document.querySelector('#add-client-popup');
const addClientBtn = document.querySelector('#add-client-btn');


closeBtn.addEventListener('click', () => {
  addClientPopup.classList.toggle('flex');
  addClientPopup.classList.toggle('hidden');

});
addClientBtn.addEventListener('click', () => {
  addClientPopup.classList.toggle('flex');
  addClientPopup.classList.toggle('hidden');

});