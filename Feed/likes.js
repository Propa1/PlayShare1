function likePub(pub_id) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            switch (xhr.responseText) {
                case 'Error handling like':
                    Notify.error({
                        description: xhr.responseText
                    });
                    break;
                default:
                    result = JSON.parse(xhr.responseText);
                    document.querySelector('.likes.pub'+pub_id).innerHTML = '<i class="ri-thumb-up-' + (result.insert ? 'fill' : 'line') + ' like-btn" data-pub-id="' + pub_id + '"></i>' + result.likes;
                    Notify.success({
                        description: result.insert ? 'Publication liked' : 'Removed like from publication'
                    });
                    break;
            }
        }
    }
    xhr.open("POST", "like.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`pub_id=${pub_id}`);
}