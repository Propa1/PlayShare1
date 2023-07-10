<?php
    session_start();
    include_once "../php/db_conn.php";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid != {$_SESSION['uid']}");
    $output = "";

    if(mysqli_num_rows($sql) < 1){
        $output .= "No Publication ";
    }elseif(mysqli_num_rows($sql) >= 1){
        include "data.php";
    }
    echo $output;
?>