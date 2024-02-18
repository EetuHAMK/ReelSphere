<?php

  session_start();

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
    <meta name="description" content="Explore project website developed by Team 8. Discover ratings for movies and series.">
    <meta name="keywords" content="Project, Team 8, Movie Ratings, Series Ratings, Entertainment Website">

    <!-- TITLE: -->
    <title>ReelSphere</title>

    <!-- BOOTSTRAP: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- STYLE.CSS: -->
    <link rel="stylesheet" href="../css/style-user-home.css">

    <!-- LOTTIE.JS: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>

    <!-- LIVESEARCH.JS: -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  </head>

  <!-- BODY: -->
  <body>

    <!-- HIDDEN SECTION: -->
    <section>
      <header>
        <h1 class="hiddenheader">h1</h1>
        <h2 class="hiddenheader">h2</h2>
      </header>
    </section>

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

        <!-- 2.1 | MAIN-MENU - BUTTON : -->
        <div id="menu-icon" onclick="toggleDropdown()"></div>

        <!-- 2.1 | MAIN-MENU: -->
        <nav>
          <ul id="dropdown-menu">
            <li><a href="../php/user-my-account.php#">My Account</a></li>
          </ul>
        </nav>

        <!-- 2.2 | MAIN-MENU - RIGHT: -->
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

      <!-- TOP: -->
      <section class="section-for-reels">
        <div class="scrollable-container" onmouseover="enableHorizontalScroll()" onmouseout="disableHorizontalScroll()">
          <p id="search-results-reels-top"></p>
        </div>
      </section>
      
      <!-- MIDDLE: -->
      <section>

        <!-- BACKGROUND: -->
        <div class="filmroll">
          <img src="../media/images/main/reel.png" alt="filmroll">
        </div>

        <!-- SEARCH BAR: -->
        <div class="search-bar-reels">
          <form method="get" class="search-bar" id="search-form">
            <button type="submit"><img src="../media/icons/searchToX/search.svg" alt="button"></button>
            <input type="text" name="search" id="search" placeholder="search">
          </form>
        </div>
        
      </section>

      <!-- BOTTOM: -->
      <section class="section-for-reels">
        <div class="scrollable-container" onmouseover="enableHorizontalScroll()" onmouseout="disableHorizontalScroll()">
          <p id="search-results-reels-bottom"></p>
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
      <!-- LIVE SEARCH: -->
      <script src="../js/search-reels-live-combined.js"></script>
      <!-- SCROLL: -->
      <script src="../js/scroll-horizontal.js"></script>
      <!-- MENU - ICON: -->
      <script src="../js/menu-icon.js"></script>
      <!-- MENU - DROPDOWN: -->
      <script src="../js/menu-dropdown.js"></script>

  </body>
</html>