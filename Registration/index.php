<?php
  session_start();
  if(isset($_SESSION['uid'])){
    header("location: ../Profile");
  }
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
    <div class="wrapper">
      <section class="form signup">
        <header>PlayShare Registration</header>
        <form action="regist.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="error-text"></div>
          <div class="name-details">
            <div class="field input">
              <label>First Name</label>
              <input type="text" name="fname" placeholder="First name" required>
            </div>
            <div class="field input">
              <label>Last Name</label>
              <input type="text" name="lname" placeholder="Last name" required>
            </div>
          </div>
          <div class="field input">
            <label>Bio</label>
            <input type="text" name="bio" placeholder="Write your Bio" required>
          </div>
          <div class="field input">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter new password" required>
            <i class="fas fa-eye"></i>
          </div>
          <div class="field image">
            <label>Select Image</label>
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
          </div>
          <div class="field button">
            <input type="submit" name="submit" value="Continue to Chat">
          </div>
        </form>
        <div class="link">Already signed up? <a href="../Login">Login now</a></div>
      </section>
    </div>
    
    <script src="../js/hide.js"></script>
    <script src="signup.js"></script>
  </body>
</html>
