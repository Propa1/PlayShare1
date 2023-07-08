<?php 
    session_start();
    include_once "db_conn.php";

    $new_password = mysqli_real_escape_string($conn, $_POST['new-password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
    $email = $_SESSION['email'];

    // Check if all fields are filled
    if(!empty($new_password) && !empty($confirm_password)){

        // Check if new password and confirm password match
        if($new_password !== $confirm_password){
            echo "New password and confirm password do not match!";
            exit();
        }

        // Get user details from the database
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            // Update password in the database
            $new_password = md5($new_password);
            $sql2 = mysqli_query($conn, "UPDATE users SET password = '{$new_password}' WHERE email = '{$email}'");
            if($sql2){
                echo '<script>alert("Password updated successfully!"); window.location.href="../Login";</script>';
                exit();
            }else{
                echo "Something went wrong. Please try again!";
                exit();
            } 
           
        }else{
            echo "User not found!";
            exit();
        }
    }else{
        echo "All fields are required!";
        exit();
    }

?>