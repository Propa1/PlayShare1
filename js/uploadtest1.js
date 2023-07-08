const fileInput = document.getElementById('file');
const imgArea = document.querySelector('.img-area');
const container = document.querySelector('.container');

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
      img.onload = () => {
        imgArea.dataset.img = file.name;
        resizeMedia(img);
        resizeImgArea();
      };
      img.src = imgUrl;
      imgArea.appendChild(img);
      imgArea.classList.add('active');
    } else if (file.type.startsWith('video/')) {
      const videoUrl = reader.result;
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
  if (mediaAspectRatio > containerAspectRatio) {
    media.style.width = '100%';
    media.style.height = 'auto';
  } else {
    media.style.width = 'auto';
    media.style.height = '100%';
  }
}

function centerVideo() {
  const video = imgArea.querySelector('video');
  video.style.position = 'absolute';
  video.style.top = '50%';
  video.style.left = '50%';
  video.style.transform = 'translate(-50%, -50%)';
  imgArea.style.marginLeft = "50%";
}

function resizeImgArea() {
  const media = imgArea.querySelector('img, video');
  const mediaWidth = media.offsetWidth;
  const mediaHeight = media.offsetHeight;
  imgArea.style.width = mediaWidth + 'px';
  imgArea.style.height = mediaHeight + 'px';
}
