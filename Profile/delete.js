function confirmDelete() {
  Notify.confirm({
    title: 'Delete account',
    description: 'Are you sure you want to delete your account? This cannot be undone.',
    action: {
      text: 'Confirm',
      callback: deleteAccount
    }
  });
}

function deleteAccount() {
  // Send an AJAX request to delete the account
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "delete.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Redirect to the login page
        Notify.success({
          description: 'Account deleted'
        });
        setTimeout(() => {
          location.href = "../Login";
        }, 1000);
      } else {
        window.location.href = "../Profile";
      }
    }
  };
  xhr.send();
}
