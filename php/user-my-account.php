<?php

  session_start();

  // USER CHECK!
  if (!isset($_SESSION["UserID"])) {
    header("Location: ../pages/login.html");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <!-- HEAD: -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- AUTHOR, DESCRIPTION & KEYWORDS: -->
    <meta name="author" content="TEAM 8 | HAMK">
    <meta name="description" content="Register & rate the movies.">
    <meta name="robots" content="noindex,nofollow">
    
    <!-- TITLE: -->
    <title>ReelSphere</title>

    <!-- BOOTSTRAP: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- STYLE.CSS: -->
    <link rel="stylesheet" href="../css/style-user-my-account.css">

    <!-- LOTTIE.JS: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
  </head>

  <!-- BODY: -->
  <body>

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
          <li><a href="../php/user-home.php#">Home</a></li>
        </ul>
      </nav>

      <!-- 2 | MAIN-MENU: -->
      <nav class="main-menu">
        
        <!-- 2.1 | MAIN-MENU - RIGHT: -->
        <nav class="main-menu-login">
          <ul>
            <li><p>Welcome, <?php echo $_SESSION["Username"]; ?>!</p></li>
            <li><a href="../php/user-logout.php" role="button">| Sign Out</a></li>
          </ul>
        </nav>
      </nav>
    </div>

    <!-- MAIN: -->
    <main>

      <section class="section-for-title">

        <!-- HEADER: -->
        <div class="section-for-header">
          <header class="title-header">
            <h1><?php echo isset($_SESSION["Username"]) ? $_SESSION["Username"] : 'Guest'; ?></h1>
          </header>
        </div>

        <!-- PROFILE PICTURE: -->
        <div class="section-for-profile-picture">
          <div class="profile-picture">
            <img src="<?php echo isset($_SESSION["ProfilePicture"]) ? $_SESSION["ProfilePicture"] : '../media/images/main/profile-picture.png'; ?>" alt="Profile Picture">
          </div>
        </div>
        
      </section>

      <!-- EDIT USER: -->
      <section class="section-for-user">
        <div class="div-for-user">

        </div>
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

  </body>
</html>