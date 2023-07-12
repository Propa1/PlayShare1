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
}


function close(){
  const card2 = document.querySelector(".card");

  card2.classList.toggle("hide");

}

const form = document.querySelector(".typing-area"),
sendBtn = form.querySelector(".send-button"),
inputField = form.querySelector(".chat-input");

sendBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Comentary/new-message.php", true);
  xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){ 
              inputField.value = "";
              scrollToBottom();
          }
      }
  }
  let formdata = new FormData(form);
  xhr.send(formdata);
}