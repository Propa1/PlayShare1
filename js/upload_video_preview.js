const fileInput = document.getElementById('file');
const imgArea = document.querySelector('.img-area');

document.querySelector('.select-image').addEventListener('click', function() {
  fileInput.click();
});

fileInput.addEventListener('change', function() {
  const file = this.files[0];
  console.log(file);
  const reader = new FileReader();
  reader.onload = () => {
    const allMedia = imgArea.querySelectorAll('img, video');
    allMedia.forEach(item => item.remove());
    if (file.type.startsWith('image/')) {
      const imgUrl = reader.result;
      const img = document.createElement('img');
      img.src = imgUrl;
      imgArea.appendChild(img);
      imgArea.classList.add('active');
      imgArea.dataset.img = file.name;
    } else if (file.type.startsWith('video/')) {
      const videoUrl = reader.result;
      const video = document.createElement('video');
      video.src = videoUrl;
      video.setAttribute('controls', 'true');
      imgArea.appendChild(video);
      imgArea.classList.add('active');
      imgArea.dataset.img = file.name;
    }
  };
  reader.readAsDataURL(file);
});
