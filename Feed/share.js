function handleLikeAndShare(pub_uid) {
    // Generate the share URL based on the pub_uid
    var shareUrl = "http://localhost/PlayShare/SharedVideos/?user_id=" + pub_uid;
  
    // Create a temporary input element to facilitate copying
    var tempInput = document.createElement("input");
    tempInput.value = shareUrl;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
  
    notyf.success("Share URL copied to clipboard");
}
  