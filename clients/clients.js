//ADD

const closeAddBtn = document.querySelector('#close-add-popup');
const addClientPopup = document.querySelector('#add-client-popup');
const addClientBtn = document.querySelector('#add-client-btn');
const addForm = document.querySelector('#add-form');


addClientBtn.addEventListener('click', () => {
  addClientPopup.classList.toggle('flex');
  addClientPopup.classList.toggle('hidden');

});

closeAddBtn.addEventListener('click', () => {
  addClientPopup.classList.toggle('flex');
  addClientPopup.classList.toggle('hidden');

});
addForm.addEventListener('submit', function (event) {
  const nameInput = document.querySelector('#name');
  const nameValue = nameInput.value.trim();

  const namePattern = /^[A-Za-z]+(?:\s[A-Za-z]+)*$/;

  if (!namePattern.test(nameValue)) {
    event.preventDefault(); 
    alert('Name must contain only letters and spaces, with at least one letter.');
    return
  }

  const phoneInput = document.querySelector('#phone');
  const phoneValue = phoneInput.value.trim();

  const phonePattern = /^\d{10}$/;

  if (!phonePattern.test(phoneValue)) {
    event.preventDefault();
    alert('Phone number must contain 10 digits.');
    return;
  }

});

//EDIT

const closeEditBtn = document.querySelector('#close-edit-popup');
const editClientPopup = document.querySelector('#edit-client-popup');
const editClientBtns = document.querySelectorAll('.edit-client-btn');
const submitEditBtn = document.querySelector('#submit-edit');
const editForm = document.querySelector('#edit-form');
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

editForm.addEventListener('submit', function (event) {
  const nameInput = document.querySelector('#edit-name');
  const nameValue = nameInput.value.trim();

  const namePattern = /^[A-Za-z]+(?:\s[A-Za-z]+)*$/;

  if (!namePattern.test(nameValue)) {
    event.preventDefault(); 
    alert('Name must contain only letters and spaces, with at least one letter.');
    return;
  }

  const phoneInput = document.querySelector('#edit-phone');
  const phoneValue = phoneInput.value.trim();

  const phonePattern = /^\d{10}$/;

  if (!phonePattern.test(phoneValue)) {
    event.preventDefault();
    alert('Phone number must contain 10 digits.');
    return;
  }
});

//delete confirmation
const deleteForms = document.querySelectorAll('.deleteForm');
deleteForms.forEach(form => {
  form.addEventListener('submit', (event) => {

    const confirmDelete = confirm('Are you sure you want to delete this client?');

    if (!confirmDelete) {
      event.preventDefault();
    }
  });
});