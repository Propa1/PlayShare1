<?php
    session_start();
    include_once "../php/db_conn.php";
    $outgoing_id = $_SESSION['uid'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT *
                            FROM users
                            WHERE uid IN (
                                SELECT followed_uid
                                FROM user_followers
                                WHERE follower_uid = {$_SESSION['uid']}
                            )
                            AND (firstname LIKE '%{$searchTerm}%' OR lastname LIKE '%{$searchTerm}%')
                            AND uid != {$_SESSION['uid']} ");
    if (mysqli_num_rows($sql) > 0) {
        include "data.php";
    }else{
        $output .= "No user found related to your search term";
    }
    echo $output;
?>