//ADD

const closeBtn = document.querySelector('#close-add-popup');
const addContractPopup = document.querySelector('#add-contract-popup');
const addContractBtn = document.querySelector('#add-contract-btn');

closeBtn.addEventListener('click', () => {
  addContractPopup.classList.toggle('flex');
  addContractPopup.classList.toggle('hidden');

});
addContractBtn.addEventListener('click', () => {
  addContractPopup.classList.toggle('flex');
  addContractPopup.classList.toggle('hidden');

});