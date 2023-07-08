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
      include_once "../php/db_conn.php";           
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$_SESSION['uid']}");
      if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
      }
    ?> 
    <?php
      include "../php/sidebar.php";
    ?>
    <div class="wrapper">
      <section class="users">
        <header>
           
          <div class="content">
            <img src="../img/<?php echo $row['img']; ?>" alt="">
            <div class="details">
              <span><?php echo $row['firstname'] . " " . $row['lastname']; ?></span>
              <p><?php echo $row['status']; ?></p>
            </div>
          </div>
        </header>
        <div class="search">
          <span class="text">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search...">
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
            
        </div>
      </section>
    </div>
  
    <script src="../js/users.js"></script>

  </body>
</html>