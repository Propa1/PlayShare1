const fileInput = document.getElementById('file');
const imgArea = document.querySelector('.img-area');
const container = document.querySelector('.container');

document.querySelector('.select-image').addEventListener('click', function(event) {
  event.preventDefault(); // Prevent form submission
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
      img.onload = () => {
        imgArea.dataset.img = file.name;
        resizeMedia(img);
        resizeImgArea();
      };
      img.src = imgUrl;
      imgArea.appendChild(img);
      imgArea.classList.add('active');
    } else if (file.type.startsWith('video/')) {
      const videoUrl = URL.createObjectURL(file);
      const video = document.createElement('video');
      video.onloadedmetadata = () => {
        video.setAttribute('controls', 'true');
        imgArea.dataset.img = file.name;
        resizeMedia(video);
        centerVideo();
        resizeImgArea();
      };
      video.src = videoUrl;
      imgArea.appendChild(video);
      imgArea.classList.add('active');
    }
  };
  reader.readAsDataURL(file);
});

function resizeMedia(media) {
  const containerWidth = container.offsetWidth;
  const containerHeight = container.offsetHeight;
  const mediaAspectRatio = media.width / media.height;
  const containerAspectRatio = containerWidth / containerHeight;
  const targetWidth = containerWidth * 0.6; // Adjust the desired width percentage here
  const targetHeight = targetWidth / mediaAspectRatio;
  if (targetHeight > containerHeight) {
    media.style.width = 'auto';
    media.style.height = containerHeight + 'px';
  } else {
    media.style.width = targetWidth + 'px';
    media.style.height = 'auto';
  }
}

function centerVideo() {
  const video = imgArea.querySelector('video');
  video.style.position = 'absolute';
  video.style.top = '50%';
  video.style.left = '50%';
  video.style.transform = 'translate(-50%, -50%)';
  imgArea.style.marginLeft = "15%";
}

function resizeImgArea() {
  const media = imgArea.querySelector('img, video');
  const mediaWidth = media.offsetWidth;
  const mediaHeight = media.offsetHeight;
  imgArea.style.width = mediaWidth + 'px';
  imgArea.style.height = mediaHeight + 'px';
}
