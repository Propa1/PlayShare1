const searchBar = document.querySelector(".box input");
const usersList = document.querySelector(".users-list");
const box = document.querySelector(".box");

searchBar.focus();

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchTerm !== "") {
    searchUsers(searchTerm);
    box.style.borderRadius = "15px 15px 0px 0px";
  } else {
    usersList.innerHTML = ""; // Clear the user list when search term is empty
    box.style.borderRadius = "30px 30px 30px 30px";
    usersList.classList.remove('show');

  }
};

function searchUsers(searchTerm) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        usersList.classList.add('show');
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

function getUsers() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "users.php", true);
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
