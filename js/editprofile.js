document.addEventListener('DOMContentLoaded', function() {
    // Get the elements to be hidden
    const nameElement = document.querySelector('.name1');
    const hiddens = document.querySelector('.name2');
    const hiddens2 = document.querySelector('.about1');
    const aboutElement = document.querySelector('.about');
    const socialIconsElement = document.querySelector('.social-icons');
    const socialShareElement = document.querySelector('.social-share');
    const buttons = document.querySelector('.buttons');
    const buttons2 = document.querySelector('.buttons2');
    const imgedit = document.querySelector('.custom-file-input');

    // Get the edit icon
    const editIcon = document.querySelector('.edit');
  
    // Check if the elements exist before adding event listener
    if (nameElement && hiddens && hiddens2 && aboutElement && socialIconsElement && socialShareElement && editIcon) {
      // Add click event listener to the edit icon
      editIcon.addEventListener('click', function() {
        nameElement.classList.toggle('hide');
        aboutElement.classList.toggle('hide');
        socialIconsElement.classList.toggle('hide');
        socialShareElement.classList.toggle('hide');
        hiddens.classList.toggle('hide');
        hiddens2.classList.toggle('hide');
        buttons.classList.toggle('hide');
        buttons2.classList.toggle('hide');
        imgedit.classList.toggle('hide');

      });
    } else {
      console.log('Some elements were not found');
    }
  });

function previewImage(event) {
const file = event.target.files[0];
const reader = new FileReader();

reader.onload = function() {
    const imgPreview = document.getElementById('image-preview');
    imgPreview.src = reader.result;
};

if (file) {
    reader.readAsDataURL(file);
}
}
  