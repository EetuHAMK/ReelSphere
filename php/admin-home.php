<?php

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!
  
?>


<!DOCTYPE html>
<html lang="en">
  <!-- HEAD: -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- AUTHOR, DESCRIPTION & KEYWORDS: -->
    <meta name="author" content="TEAM 8 | HAMK">
    <meta name="description" content="...">
    <meta name="robots" content="noindex,nofollow">
    <!-- TITLE: -->
    <title>ReelSphere</title>

    <!-- BOOTSTRAP: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- STYLE.CSS: -->
    <link rel="stylesheet" href="../css/style-admin-home.css">

    <!-- LOTTIE.JS: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
  </head>

  <!-- BODY: -->
  <body>

    <!-- HEADER: -->
    <header>
      <h1 class="hiddenheader">h1</h1>
      <h2 class="hiddenheader">h2</h2>
    </header>  

    <!-- BACKGROUND LOOP: -->
    <div>
      <video autoplay loop muted playsinline class="background-video">
        <source src="../media/videos/background-video.mp4" type="video/mp4">
      </video>
    </div>

    <!-- NAVIGATION: -->
    <div class="navigation">

      <!-- 1 | TOP-MENU: -->
      <nav class="top-menu">
        <ul>
          <li><a href="../php/admin-home.php#">Home</a></li>
        </ul>
      </nav>

      <!-- 2 | MAIN-MENU: -->
      <nav class="main-menu">

        <!-- 2.1 | MAIN-MENU - BUTTON: -->
        <div id="menu-icon" onclick="toggleDropdown()"></div>
        
        <!-- 2.2 | MAIN-MENU - RIGHT: -->
        <nav class="main-menu-login">
          <ul>
            <li><p>Welcome, <?php echo $_SESSION["Username"]; ?>!</p></li>
            <li><a href="../php/admin-logout.php" role="button">| Sign Out</a></li>
          </ul>
        </nav>
      </nav>
    </div>

    <!-- MAIN: -->
    <main>

      <!-- 2.1 | MAIN-MENU: -->
      <nav>
        <ul id="dropdown-menu">
          <div class="column-wrapper">
            <li><a href="../php/reel-add.php#">Add Reel</a></li>
            <li><a href="../php/reels.php#">Edit Reels</a></li>
          </div>
          <li><a href="../php/user-home.php#">User Home</a></li>
          <div class="column-wrapper">
            <li><a href="../php/users.php#">Edit Users</a></li>
            <li><a href="../php/reviews.php#">Edit Reviews</a></li>
          </div>
        </ul>
      </nav>

      <!-- TEAM 8: -->
      <section class="team-8">

        <section class="team-8-member" style="background-image: url('../media/images/team8/matias.png');">
          <p>Matias</p>
        </section>

        <section class="team-8-member" style="background-image: url('../media/images/team8/eetu.png');">
          <p>Eetu</p>
        </section>

        <section class="team-8-member" style="background-image: url('../media/images/team8/samuel.png');">
          <p>Samuel</p>
        </section>

      </section>

    </main>

    <!-- FOOTER: -->
    <footer>
      <div>
        <p>copyright © mmxxiv | all rights reserved</p>
      </div>
    </footer>

    <!-- SCRIPTS: -->
    
    <!-- BOOTSTRAP: -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      <!-- TRANSITION: -->
      <script src="../js/page-animation.js"></script>
      <!-- MENU - ICON: -->
      <script src="../js/menu-icon.js"></script>
      <!-- MENU - DROPDOWN: -->
      <script src="../js/menu-dropdown.js"></script>

  </body>
</html>