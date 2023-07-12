<?php
session_start();
include_once "../php/db_conn.php";

$pub_id = mysqli_real_escape_string($conn, $_POST['pub_id']);
$user_uid = mysqli_real_escape_string($conn, $_SESSION['uid']);

// Check if the user is the owner of the publication
$checkQuery = mysqli_query($conn, "SELECT * FROM publications WHERE pub_id = '{$pub_id}' AND user_uid = '{$user_uid}'");
if (mysqli_num_rows($checkQuery) > 0) {
    // Delete the publication from the database
    $deleteQuery = mysqli_query($conn, "DELETE FROM publications WHERE pub_id = '{$pub_id}'");
    if ($deleteQuery) {
        // Deletion successful
        echo "Publication deleted successfully.";
    } else {
        // Deletion failed
        echo "Failed to delete publication.";
    }
} else {
    // User is not authorized to delete this publication
    echo "You are not authorized to delete this publication.";
}
?>
