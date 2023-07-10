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
      <section class="form login">
        <header>PlayShare Login</header>
        <form action="logins.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="error-text"></div>
          <div class="field input">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter new password" required>
            <i class="fas fa-eye"></i>
          </div>
          <div class="forgot"><a href="../ForgotPassword">Forgot your password</a></div>
          <div class="field button">
            <input type="submit" name="submit" value="Continue to Chat">
          </div>
        </form>
        <div class="link">Not yet signed up? <a href="../Registration">Signup now</a></div>
      </section>
    </div>
    
    <script src="../js/hide.js"></script>
    <script src="login.js"></script>

  </body>
</html>