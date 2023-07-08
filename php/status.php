<?php
    session_start();
    include_once "../php/db_conn.php";

    $uid = mysqli_real_escape_string($conn, $_SESSION['uid']);

    $sql = "UPDATE users SET last_activity = now() WHERE uid = '{$uid}'";

    mysqli_query($conn, $sql);
?>