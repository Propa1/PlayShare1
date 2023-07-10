const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "regist.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if (data == "success") {
                    location.href = "../Login";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
                
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}