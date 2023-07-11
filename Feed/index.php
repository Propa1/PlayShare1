<?php
  include "../php/phpstart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="website icon" type="png" href="../img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayShare</title>
    <link rel="stylesheet" href="../css/feed.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        include "../php/sidebar.php";
    ?>
    <div class="box">
        <input class="text" type="text" placeholder="Search.......">
        <i class="ri-search-line"></i>
        <div class="users-list">
            
        </div>
    </div>
    <div class="output">
        <?php
            include "../VideosOutput/index.php";
        ?>
    </div>
    <script src="users.js"></script>
    <script src="likes.js"></script>
</body>
</html>