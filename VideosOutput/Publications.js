const usersList2 = document.querySelector(".contents");

function getPublications() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../VideosOutput/publications.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList2.innerHTML = data;
      }
    }
  };
  xhr.send();
}

window.addEventListener("load", getPublications);
