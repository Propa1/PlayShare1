<?php
session_start();
include_once "../php/db_conn.php";

if(!isset($_SESSION['uid'])){
    header("location: ../Login");
    exit();
}

// Check if the form was submitted
if(isset($_POST['submit'])) {
    // Sanitize the inputs
    $name = mysqli_real_escape_string($conn, $_POST['name2']);
    $last = mysqli_real_escape_string($conn, $_POST['last2']);
    $bio = mysqli_real_escape_string($conn, $_POST['about1']);
    $uid = $_SESSION['uid'];
    
    // Check if the user uploaded a new profile image
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get the image file extension
        $image_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        // Check if the file extension is valid
        if(!in_array($image_extension, ['jpg', 'jpeg', 'png', 'JPG'])) {
            echo "Please upload a valid image file (JPG, JPEG, PNG)";
            exit();
        }
        
        // Generate a unique filename for the image
        $filename = uniqid('', true) . '.' . $image_extension;
        
        // Move the uploaded file to the images directory
        $target_path = "../img/" . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        
        // Update the user's profile image filename in the database
    }
    
    // Update the user's information in the database
    $sql = "UPDATE users SET firstname = '$name', bio = '$bio', lastname = '$last', img = '$filename'";
    
    
    $sql .= " WHERE uid = '$uid'";
    mysqli_query($conn, $sql);
    
    // Update the session variables with the new user information
    $_SESSION['firstname'] = $name;
    $_SESSION['bio'] = $bio;

    header("location: ../Profile");
    exit();
}
?>

