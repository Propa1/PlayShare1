<?php
  include "../php/phpstart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="website icon" type="png" href="../img/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayShare</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="../js/editprofile.js"></script>
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
        <form action="follow.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>
            <div class="img-area">
                <div class="inner-area">
                    <input class="" name="image" type="file" id="image-input" accept="image/*" onchange="previewImage(event)">
                    <label for="image-input" class="custom-file-input hide"><i class="ri-image-edit-fill"></i></label>
                    <img id="image-preview" src="../img/<?php echo $row['img']; ?>" alt="">
                </div>
            </div>
            <div class="name1"><?php echo $row['firstname'], ' '  ,$row['lastname']; ?></div>
            <div class="about"><?php echo $row['bio']; ?></div>
            <div class="social-icons">
                <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
                <a href="#" class="yt"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="buttons">
                <input type="button" name="chat" value="Message" class="follow" id="chat" onclick="location.href='../Chat/?user_id=<?php echo $row['uid'] ?>'">
                <?php
                    $follower_uid = $_SESSION['uid'];
                    
                    // Check if the user is already following the target user
                    $sql2 = mysqli_query($conn, "SELECT * FROM user_followers WHERE follower_uid = '$follower_uid' AND followed_uid = '$user_id'");                    
                    if(mysqli_num_rows($sql2) > 0) {
                        echo '<input type="submit" name="unfollow" value="Unfollow" class="Unfollow" id="input_edit">';
                    }else{
                        echo '<input type="submit" name="follow" value="Follow" class="follow" id="input_edit">';
                    }
                ?>
            </div>
            <div class="social-share">
                <div class="row">
                    <i class="far fa-heart"></i>
                    <i class="icon-2 fas fa-heart"></i>
                    <span>5k</span>
                </div>
                <div class="row">
                    <i class="far fa-comment"></i>
                    <i class="icon-2 fas fa-comment"></i>
                    <span>5k</span>
                </div>
                <div class="row">
                    <i class="fas fa-share"></i>
                    <span>5k</span>
                </div>
            </div>
            
        </form>
        
    </div>

</body>
</html>
