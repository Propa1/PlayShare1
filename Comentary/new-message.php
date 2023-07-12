<?php
  session_start();
  if (isset($_SESSION['uid'])) {
      include_once "../php/db_conn.php";
      $pub_id = mysqli_real_escape_string($conn, $_POST['pub_id']);
      $comment = mysqli_real_escape_string($conn, $_POST['comment']);
  } else {
      header("Location: ../Login");
  }

?>
