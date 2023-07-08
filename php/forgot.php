<?php 
    session_start();
    include_once "db_conn.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    if(!empty($email)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if($sql){
                $_SESSION['email'] = $row['email'];
                echo '<script>alert("Email found!"); window.location.href="../PasswordRecover";</script>';
            }else{
                echo "Something went wrong. Please try again!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "Email field is required!";
    }
    
?>