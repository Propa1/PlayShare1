<?php


    // Get the publication ID from the AJAX request
    $pub_id = $_POST['pub_id'];

    // Make sure the user is logged in
    if (!isset($_SESSION['uid'])) {
        exit('Unauthorized');
    }

    // Check if the user has already liked the publication
    $liked = mysqli_query($conn, "SELECT * FROM publications_likes WHERE publication_id = '{$pub_id}' AND like_giver = '{$_SESSION['uid']}'");
    if (mysqli_num_rows($liked) > 0) {
        exit();
    }

    $publication_uid = mysqli_query($conn, "SELECT user_uid FROM publications")

    // Insert the like into the publications_likes table
    $insertQuery = "INSERT INTO publications_likes (like_receiver, like_giver, publication_id) VALUES ('{$publication_uid['user_uid']}', '{$_SESSION['uid']}', '{$pub_id}', )";
    if (mysqli_query($conn, $insertQuery)) {
        // Increment the like count in the publications table
        $updateQuery = "UPDATE publications SET likes = likes + 1 WHERE pub_id = '{$pub_id}'";
        mysqli_query($conn, $updateQuery);

        // Get the updated likes count
        $likesCount = mysqli_query($conn, "SELECT * FROM publications_likes WHERE publication_id = '{$pub_id}'");
        $likesCount = mysqli_num_rows($likesCount);

        // Return the updated likes count as the response
        echo $likesCount;
    } else {
        exit('Error adding like');
    }


    // Get the updated likes count
    $likesCount = mysqli_query($conn, "SELECT * FROM publications_likes WHERE publication_id = '{$pub_id}'");
    $likesCount = mysqli_num_rows($likesCount);

    // Return the updated likes count as the response
    echo $likesCount;
?>
