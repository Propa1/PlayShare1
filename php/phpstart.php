<?php
    session_start();
    include_once "../php/db_conn.php";
    if(!isset($_SESSION['uid'])){
    header("location: ../Login");
    }

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$_SESSION['uid']}");
    if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
    }
?>