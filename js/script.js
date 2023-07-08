// Get the necessary elements
const editBtn = document.querySelector('.edit-btn');
const editProfileForm = document.querySelector('.edit-profile-form');
const cancelBtn = document.querySelector('.cancel-btn');

// Toggle the visibility of the edit profile form
editBtn.addEventListener('click', () => {
  editProfileForm.style.display = 'block';
});

cancelBtn.addEventListener('click', () => {
  editProfileForm.style.display = 'none';
});
