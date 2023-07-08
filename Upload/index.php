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
      <input type="file" id="file" accept="image/*; video/*" hidden>
      <div class="img-area" data-img="">
        <i class="ri-upload-cloud-line icon"></i>
        <h3>Upload Image/Video</h3>
      </div>
      <button class="select-image">Select Image</button>
    </div>

    <script src="../js/uploadtest1.js"></script>

  </body>

</html>

