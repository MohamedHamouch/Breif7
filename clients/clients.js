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

const closeEditBtn = document.querySelector('#close-edit-popup');
const editClientPopup = document.querySelector('#edit-client-popup');
const editClientBtns = document.querySelectorAll('.edit-client-btn');
const submitEditBtn = document.querySelector('#submit-edit');
const editForm = document.querySelector('#edit-Form');
const inputs = editForm.querySelectorAll('input');
// console.log(editClientBtns);


editClientBtns.forEach(editBtn => {
  editBtn.addEventListener('click', () => {

    const { cname, caddress, cphone } = editBtn.dataset;

    editClientPopup.classList.toggle('flex');
    editClientPopup.classList.toggle('hidden');
    submitEditBtn.name = editBtn.name;
    submitEditBtn.value = editBtn.value;

    inputs.forEach(input => {
      if (input.name === 'name') input.value = cname;
      if (input.name === 'address') input.value = caddress;
      if (input.name === 'phone') input.value = cphone;
    });

  })
});

closeEditBtn.addEventListener('click', () => {
  editClientPopup.classList.toggle('flex');
  editClientPopup.classList.toggle('hidden');

});