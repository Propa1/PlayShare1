<?php
session_start();
include_once "db_conn.php";

// Get the ID of the record to delete
$uid = mysqli_real_escape_string($conn, $_SESSION['uid']);

// Get the file path from the database
$sql = "SELECT img FROM users WHERE uid = '{$uid}'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $file_path = "../img/".$row['img'];

    // Delete the file if it exists
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo "File deleted successfully.";
        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "File not found.";
    }

    // Delete the record from the database
    $sql = "DELETE FROM users WHERE uid = '{$uid}'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // Logout the user and redirect to the login page
        session_unset();
        session_destroy();
        header("location: ../Login");
        exit();
    } else {
        // There was an error deleting the record
        echo "Error deleting user's data from the database.";
    }
} else {
    // There was an error fetching the file path from the database
    echo "Error fetching file path from the database.";
}
?>
