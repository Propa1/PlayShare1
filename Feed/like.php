<?php
    session_start();
    include_once "../php/db_conn.php";

    // Get the publication ID from the AJAX request
    $pub_id = $_POST['pub_id'];

    // Insert the like into the publications_likes table
    $insertQuery = "INSERT INTO publications_likes (like_giver, publication_id) VALUES ('{$_SESSION['uid']}', '{$pub_id}')";
    // Remove the like from the publications_likes table
    $removeQuery = "DELETE FROM publications_likes WHERE publication_id = '{$pub_id}' AND like_giver = '{$_SESSION['uid']}'";

    // Check if the user has already liked the publication
    $liked = mysqli_query($conn, "SELECT * FROM publications_likes WHERE publication_id = '{$pub_id}' AND like_giver = '{$_SESSION['uid']}'");
    if (mysqli_num_rows($liked) > 0) {
        $actionQuery = $removeQuery;
    } else {
        $actionQuery = $insertQuery;
    }
    
    if (mysqli_query($conn, $actionQuery)) {
        // Get the updated likes count
        $likesCount = mysqli_query($conn, "SELECT * FROM publications_likes WHERE publication_id = '{$pub_id}'");
        $likesCount = mysqli_num_rows($likesCount);

        // Return the updated likes count and message as the response
        echo json_encode(array(
            "likes" => $likesCount,
            "message" => $actionQuery === $removeQuery ? 'Removed like' : 'Liked'
        ));
    } else {
        echo 'Error handling like';
    }
?>
