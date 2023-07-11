function lastActivity() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status !== 200) {
                console.log("Error updating user activity");
            }
        }
    };
    xhr.send();
}

function updateActivity() {
    seconds = 2000;
    setInterval(() => {
        lastActivity()
    }, seconds);
}