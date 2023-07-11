function likePub(pub_id) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            switch (xhr.responseText) {
                case 'Error handling like':
                    notyf.error(xhr.responseText);
                    break;
                default:
                    result = JSON.parse(xhr.responseText);
                    document.querySelector('.likes.pub'+pub_id).innerHTML = '<i class="ri-thumb-up-' + (result.insert ? 'fill' : 'line') + ' like-btn" data-pub-id="' + pub_id + '"></i>' + result.likes;
                    notyf.success(result.insert ? 'Liked' : 'Removed Like');
                    break;
            }
        }
    }
    xhr.open("POST", "like.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`pub_id=${pub_id}`);
}