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


//validate dates input

const addContractForm = document.querySelector('#add-contract-form');
const dateInputs = addContractForm.querySelectorAll('input[type="date"]');
console.log(dateInputs);

addContractForm.addEventListener('submit', (event) => {
  const startDate = new Date(dateInputs[0].value);
  const endDate = new Date(dateInputs[1].value);

  if (endDate <= startDate) {
    event.preventDefault();
    alert('End date must be after the start date.');
  }
});

//EDIT
const editContractBtns = document.querySelectorAll('.edit-contract-btn');
editContractBtns.forEach(editBtn => {
  editBtn.addEventListener('click', () => {

    alert('You are not allowed to edit contracts');
  });
});

//DELETE

const deleteForms = document.querySelectorAll('.deleteForm');
deleteForms.forEach(form => {
  form.addEventListener('submit', (event) => {

    const confirmDelete = confirm('Are you sure you want to delete this contract?');

    if (!confirmDelete) {
      event.preventDefault();
    }
  });
});