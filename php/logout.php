<?php
    session_start();
    if(isset($_SESSION['uid'])){
        include_once "db_conn.php";
        if($_GET['logout_id']) {
            $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
            if(isset($logout_id)){
                $status = "Offline now";
                $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE uid={$_GET['logout_id']}");
                if($sql){
                    session_unset();
                    session_destroy();
                    header("location: ../Login");
                }
            }
        }else{
            header("location: ../Users");
        }
    }else{  
        header("location: ../Login");
    }
?>
