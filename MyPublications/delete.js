function confirmDelete(pub_id) {
  Notify.confirm({
    title: 'Delete video',
    description: 'Are you sure you want to delete your video? This cannot be undone.',
    action: {
      text: 'Confirm',
      callback: function() {
        deleteAccount(pub_id);
      }
    }
  });
}

function deleteAccount(pub_id) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "delete.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        Notify.success({
          description: response
        });
        setTimeout(() => {
          location.href = "../MyPublications";
        }, 1000);
      } else {
        window.location.href = "../MyPublications";
      }
    }
  };
  xhr.send("pub_id=" + encodeURIComponent(pub_id));
}
