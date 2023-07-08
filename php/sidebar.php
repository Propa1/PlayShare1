

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PlayShare</title>
    <link rel="stylesheet" href="../css/sidebar.css" />
    <!-- Boxicons CSS -->
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <script src="../js/sidebar1.js" defer></script>
  </head>
  <body> 
    <?php
      if (isset($_COOKIE["sidebarLock"]) && $_COOKIE["sidebarLock"]=="false") {
        echo '<nav class="sidebar locked close">';
      } else {
        echo '<nav class="sidebar locked">';
      }
    ?>
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="../img/logo.png" alt="logo_img" />
        </span>
        <span class="logo_name">PlayShare</span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="../Feed" class="link flex">
                <i class="bx bx-home-alt"></i>
                <span>Home</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-grid-alt"></i>
                <span>My Publications</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Editor</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="../Users" class="link flex">
              <i class="ri-chat-1-line"></i>
                <span>Messages</span>
              </a>
            </li>
            <li class="item">
              <a href="../Profile" class="link flex">
                <i class="ri-user-line"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="item">
              <a href="../Upload" class="link flex">
                <i class="bx bx-cloud-upload"></i>
                <span>New Upload</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Setting</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-flag"></i>
                <span>Contact Suport</span>
              </a>
            </li>
            <li class="item">
                <a href="#" class="link flex">
                  <i class="bx bx-cog"></i>
                  <span>Settings</span>
                </a>
              </li>
            <li class="item">
              <a href="../php/logout.php?logout_id=<?php echo $row['uid']; ?>" class="link flex">
                <i class="ri-logout-box-r-line"></i>
                <span>Logout</span>
              </a>
            </li>
          
          </ul>
        </div>

        <div class="sidebar_profile flex">
          <span class="nav_image">
            <img src="../img/<?php echo $row['img']; ?>" alt="logo_img" />
          </span>
          <div class="data_text">
            <span class="name"><?php echo $row['firstname'], ' '  ,$row['lastname'];?></span>
          </div>
        </div>
      </div>
    </nav>
  </body>
</html>