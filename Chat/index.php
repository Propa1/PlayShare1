<?php
  include "../php/phpstart.php";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="website icon" type="png" href="../img/logo.png">
  <title>PlayShare</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/registration1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <?php
      include "../php/sidebar.php";
    ?>
    <?php
      include_once "../php/db_conn.php";   
      $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);      
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$user_id}");
      if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
      }
    ?>  
    <div class="wrapper">
      <section class="chat-area">
        <header>
          
          <a href="../users" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="../img/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['firstname'] . " " . $row['lastname']; ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>    
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area" autocomplete="off">
          <input type="text" name="outgoing_id" value="<?php echo $_SESSION['uid']; ?>" hidden>
          <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
          <input type="text" name="message" class="input-field" placeholder="Type a message here...">
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>
  
    <script src="chat.js"></script>

  </body>
</html>