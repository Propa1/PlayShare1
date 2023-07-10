<?php
    session_start();
    include_once "../php/db_conn.php";
    
    if(!isset($_SESSION['uid'])){
        header("location: ../Profile");
        exit();
    }
    
    if (isset($_POST['follow'])) {
        $follower_uid = $_SESSION['uid'];
        $following_uid = mysqli_real_escape_string($conn, $_POST['user_id']);
    
        // Check if the user being followed exists
        $checkUserQuery = "SELECT * FROM users WHERE uid = '$following_uid'";
        $result = mysqli_query($conn, $checkUserQuery);
    
        if (mysqli_num_rows($result) > 0) {
            // The user being followed exists, insert the follower relationship
            $insertQuery = "INSERT INTO user_followers (follower_uid, followed_uid) VALUES ('$follower_uid', '$following_uid')";
            mysqli_query($conn, $insertQuery);
    
            // You can perform additional actions here if needed
    
            header("location: ../ProfileGlobal/?user_id=$following_uid");
            exit();
        } else {
            echo "User not found.";
            exit();
        }
    }
    if (isset($_POST['unfollow'])) {
        $follower_uid = $_SESSION['uid'];
        $following_uid = mysqli_real_escape_string($conn, $_POST['user_id']);
    
        // Check if the user being unfollowed exists
        $checkUserQuery = "SELECT * FROM users WHERE uid = '$following_uid'";
        $result = mysqli_query($conn, $checkUserQuery);
    
        if (mysqli_num_rows($result) > 0) {
            // The user being unfollowed exists, delete the follower relationship
            $deleteQuery = "DELETE FROM user_followers WHERE follower_uid = '$follower_uid' AND followed_uid = '$following_uid'";
            mysqli_query($conn, $deleteQuery);
    
            // You can perform additional actions here if needed
    
            header("location: ../ProfileGlobal/?user_id=$following_uid");
            exit();
        } else {
            echo "User not found.";
            exit();
        }
    }
    
?>