<?php
    session_start();
    include_once "../php/db_conn.php";
    
    $pub_id = $_GET['pub_id'];

    $sql = mysqli_query($conn, "SELECT * FROM comments WHERE pub_id = {$pub_id}");
    $output = "";

    if (mysqli_num_rows($sql) < 1) {
        $output .= "No Comments ";
    } elseif (mysqli_num_rows($sql) >= 1) {
        include "../comentary/datacomments.php";
    }
    echo $output;
?>
