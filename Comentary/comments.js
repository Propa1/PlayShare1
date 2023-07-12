let globalPubId; // Declare the variable to store the pub_id value globally

function handlecomments(pub_id) {
  const card = document.querySelector(".chat-window");
  const card2 = document.querySelector(".card");

  card2.classList.toggle("hide");

  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../comentary/comments.php?pub_id=" + pub_id, true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data); // Log the response to the console
        card.innerHTML = data;
      } else {
        console.error("Request failed. Status:", xhr.status);
      }
    }
  };
  xhr.onerror = () => {
    console.error("Request failed. Network error.");
  };
  xhr.send();

  // Assign the pub_id value to the global variable
  globalPubId = pub_id;
}


const sendBtn = document.querySelector(".send-button");
const inputField = document.querySelector(".message-input");

sendBtn.onclick = () => {
  return () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Comentary/new-message.php?pub_id=" + globalPubId, true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          inputField.value = "";
        }
      }
    };

    let formData = new FormData();
    formData.append('comment', inputField.value);
    // Add additional fields to the formData if needed

    xhr.send(formData);
  };
};



