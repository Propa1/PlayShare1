<?php
  include "../php/phpstart.php";
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Video Upload</title>
  <link rel="stylesheet" href="../css/upload_styles.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>
  <body>
    <?php
      include "../php/sidebar.php";
    ?>
    <div class="container">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="error-text"></div>
        <input type="file" name="file" id="file" accept="image/*; video/*" hidden>
        <div class="img-area" data-img="">
          <i class="ri-upload-cloud-line icon"></i>
          <h3>Upload Image/Video</h3>
        </div>
        <button class="select-image">Select Image/Video</button>
        <div class="informations">
          <label class="lb_title">Title</label>
          <input type="text" name="title" id="title" class="Title">
          <br>
          <label class="lb_descriptions">Description</label>
          <input type="text" name="descriptions" id="descriptions" class="descriptions">
        </div>
        <input type="submit" value="Upload" class="upload">
      </form>
      
    </div>
    <script src="../js/uploadtest1.js"></script>
    <script src="upload.js"></script>
    

  </body>

</html>

