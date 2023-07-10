<?php
    session_start();
    include_once "../php/db_conn.php";

    $uid = mysqli_real_escape_string($conn, $_SESSION['uid']);

    // Retrieve the file path from the database
    $sql = "SELECT img FROM users WHERE uid = '{$uid}'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_path = "../img/" . $row['img'];

        // Check if the file exists and delete it
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                echo "File deleted successfully.";
            } else {
                echo "Error deleting file.";
            }
        } else {
            echo "File not found.";
        }

        // Delete records from 'followers' table connected to the user's UID
        $sql = "DELETE FROM user_followers WHERE follower_uid = '{$uid}' OR followed_uid = '{$uid}'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo "Error deleting data from 'followers' table.";
        }

        // Delete records from 'messages' table connected to the user's UID
        $sql = "DELETE FROM messages WHERE sender_uid = '{$uid}' OR recipient_uid = '{$uid}'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo "Error deleting data from 'messages' table.";
        }

        $sql = "DELETE FROM publications WHERE user_uid = '{$uid}'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo "Error deleting data from 'messages' table.";
        }

        // Delete the user record from the 'users' table
        $sql = "DELETE FROM users WHERE uid = '{$uid}'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            // Logout the user and redirect to the login page
            session_unset();
            session_destroy();
            header("location: ../Login");
            exit();
        } else {
            echo "Error deleting user's data from the database.";
        }
    } else {
        echo "Error fetching file path from the database.";
    }


?>
