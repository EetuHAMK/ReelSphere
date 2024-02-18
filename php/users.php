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
    <meta name="description" content="Register & rate the movies.">
    <meta name="robots" content="noindex,nofollow">
    
    <!-- TITLE: -->
    <title>ReelSphere</title>

    <!-- BOOTSTRAP: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- STYLE.CSS: -->
    <link rel="stylesheet" href="../css/style-users.css">

    <!-- LOTTIE.JS: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>

    <!-- LIVESEARCH.JS: -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
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
          <li><a href="../php/admin-home.php#">Home</a></li>
        </ul>
      </nav>

      <!-- 2 | MAIN-MENU: -->
      <nav class="main-menu">

        <!-- 2.1 | MAIN-MENU - BUTTON : -->
        <div id="menu-icon" onclick="toggleDropdown()"></div>
        
        <!-- 2.1 | MAIN-MENU: -->
        <nav>
          <ul id="dropdown-menu">
            <li><a href="../php/reel-add.php#">Add Reel</a></li>
            <li><a href="../php/reels.php#">Edit Reels</a></li>
            <li><a href="../php/user-home.php#">User Home</a></li>
            <li><a href="../php/reviews.php#">Edit Reviews</a></li>
          </ul>
        </nav>
      </nav>
    </div>

    <!-- MAIN: -->
    <main>

      <!-- HEADER: -->
      <section class="section-for-title">

        <header class="title-header">
          <h1>ADMIN | USERS</h1>
          <h2 class="hiddenheader">h2</h2>
        </header>

        <!-- SEARCH BAR: -->
        <div class="search-bar-users">
          <form method="get" class="search-bar" id="search-form">
            <button type="submit"><img src="../media/icons/searchToX/search.svg" alt="button"></button>
            <input type="text" name="search" id="search">
          </form>
        </div>

      </section>

      <!-- PHP - USERS: -->
      <section class="section-for-users">
        <div class="scrollable-container">

          <!-- SEARCH BAR - RESULTS: -->
          <div class="search-text">
            <p id="search-results-users"></p>
          </div>

          <?php

            include("connect.php");

            // ADMIN CHECK,
            include("admin-check.php");
            // CONTAINS SESSION START!

            $tulos = mysqli_query($yhteys, "SELECT * FROM Users");

            while ($rivi = mysqli_fetch_object($tulos)){
              echo "<div class='user-item'>

                <div class='user-item-title'>
                  <p>{$rivi->Username}</p>
                </div>

                <div class='user-item-info'>
                  <p>{$rivi->Firstname} | {$rivi->Lastname} | {$rivi->Email} | {$rivi->Password}</p>
                </div>

                <div class='user-item-options'>
                  <a href='./user-edit.php?edited={$rivi->UserID}'>Edit</a> |
                  <a href='./user-delete.php?deleted={$rivi->UserID}'>Delete</a>
                </div>

              </div>";      
            }
            mysqli_close($yhteys);
          ?>

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
      <script src="../js/search-users-live.js"></script>
      <!-- MENU - ICON: -->
      <script src="../js/menu-icon.js"></script>
      <!-- MENU - DROPDOWN: -->
      <script src="../js/menu-dropdown.js"></script>

  </body>
</html>