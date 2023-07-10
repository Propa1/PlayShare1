function deleteAccount() {
    if (confirm("Are you sure you want to delete your account? This cannot be undone.")) {
      // Send an AJAX request to delete the account
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Redirect to the login page
            alert("Account Deleted!");
            window.location.href = "../Login";
          } else {
            window.location.href = "../Profile";
          }n
        }
      };
      xhr.send();
    }
}