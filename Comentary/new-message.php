<?php
session_start();
if (isset($_SESSION['uid'])) {
    include_once "../php/db_conn.php";
    
    $pub_id = mysqli_real_escape_string($conn, $_GET['pub_id']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    
    // Insert the comment into the database
    $insertQuery = "INSERT INTO comments (pub_id, comment) VALUES ('$pub_id', '$comment')";
    if (mysqli_query($conn, $insertQuery)) {
        // Comment inserted successfully
        // You can perform any additional actions or send a success response if needed
        echo "Comment added successfully.";
    } else {
        // Failed to insert the comment
        // You can handle the failure scenario or send an error response if needed
        echo "Failed to add comment.";
    }
} else {
    header("Location: ../Login");
}
?>
