//ADD

const closeAddBtn = document.querySelector('#close-add-popup');
const addClientPopup = document.querySelector('#add-client-popup');
const addClientBtn = document.querySelector('#add-client-btn');

addClientBtn.addEventListener('click', () => {
  addClientPopup.classList.toggle('flex');
  addClientPopup.classList.toggle('hidden');

});

closeAddBtn.addEventListener('click', () => {
  addClientPopup.classList.toggle('flex');
  addClientPopup.classList.toggle('hidden');

});

//EDIT

const closeEditBtn = document.querySelector('#close-edit-btn');
const editClientPopup = document.querySelector('#edit-client-popup');
const editClientBtns = document.querySelectorAll('.edit-client-btn');
const submitEditBtn = document.querySelector('#submit-edit');

editClientBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    
    editClientPopup.classList.toggle('flex');
    editClientPopup.classList.toggle('hidden');

    submitEditBtn.name = btn.name;
    submitEditBtn.value = btn.value;


  })
});

closeEditBtn.addEventListener('click', () => {
  editClientPopup.classList.toggle('flex');
  editClientPopup.classList.toggle('hidden');

});