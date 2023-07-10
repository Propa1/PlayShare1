const usersList = document.querySelector(".contents");

function getPublications() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "publications.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.send();
}

window.addEventListener("load", getPublications);
