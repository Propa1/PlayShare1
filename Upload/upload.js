const form = document.querySelector("form");
const uploadBtn = form.querySelector("input[type='submit']");
const errorText = document.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
};

uploadBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "upload.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.responseText;
        if (data.includes("successfully")) {
          Notify.success({
            description: 'Video uploaded'
          });

          setTimeout(() => {
            location.href = "../MyPublications";
          }, 1000); // Delay of 2000 milliseconds (2 seconds)
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

