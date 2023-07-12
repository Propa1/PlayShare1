function handleShare(uid) {
    // Generate the share URL based on the pub_uid
    var shareUrl = "http://localhost/PlayShare/ProfileGlobal/?user_id=" + uid;
  
    // Create a temporary input element to facilitate copying
    var tempInput = document.createElement("input");
    tempInput.value = shareUrl;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
  
    Notify.success({
        description:  'Share URL copied to clipboard'

    });    
}
  