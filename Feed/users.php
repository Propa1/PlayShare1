<?php
    session_start();
    include_once "../php/db_conn.php";
    $outgoing_id = $_SESSION['uid'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid != {$_SESSION['uid']}");
    $output = "";

    if(mysqli_num_rows($sql) < 1){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) >= 1){
       include "data.php";
    }
    echo $output;
?>