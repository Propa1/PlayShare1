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
    <div class="wrapper">
        <form action="../php/edit.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="img-area">
                <div class="inner-area">
                    <input class="" name="image" type="file" id="image-input" accept="image/*" onchange="previewImage(event)">
                    <label for="image-input" class="custom-file-input hide"><i class="ri-image-edit-fill"></i></label>
                    <img id="image-preview" src="../img/<?php echo $row['img']; ?>" alt="">
                </div>
            </div>
            <div class="edit">
                <a href="#" class="icon edit" style="text-decoration:none; color:#333;"><i class="ri-edit-line"></i></i></a>
            </div>
            <div class="name1"><?php echo $row['firstname'], ' '  ,$row['lastname']; ?></div>
            <div class="name2 hide">
                <label class="label_nome">nome</label>
                <input class="fn" type="text" name="name2" value="<?php echo $row['firstname']?>">
                <label class="label_lasn">last</label>
                <input class="ln" type="text" name="last2" value="<?php echo $row['lastname']?>">
            </div>
            <div class="about"><?php echo $row['bio']; ?></div>
            <div class="about1 hide">
                <label class="label_about">Biografi</label>
                <input type="text" class="about3" name="about1" value="<?php echo $row['bio']; ?>"></div>
            <div class="social-icons">
                <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
                <a href="#" class="yt"><i class="fab fa-youtube"></i></a>
            </div>
 
            <div class="buttons2 hide">
                <input type="submit" name="submit" value="Edit" class="button" id="input_edit">
                <input type="button" class="button delete" onclick="deleteAccount()" value="Delete">
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

    <script src="../js/delete.js"></script>
</body>
</html>
