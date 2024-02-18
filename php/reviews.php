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
    <link rel="stylesheet" href="../css/style-reviews.css">

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
            <li><a href="../php/users.php#">Edit Users</a></li>
          </ul>
        </nav>
      </nav>
    </div>

    <!-- MAIN: -->
    <main>

      <!-- HEADER: -->
      <section class="section-for-title">

        <header class="title-header">
          <h1>ADMIN | REVIEWS</h1>
          <h2 class="hiddenheader">h2</h2>
        </header>

        <!-- SEARCH BAR: -->
        <div class="search-bar-reviews">
          <form method="get" class="search-bar" id="search-form">
            <button type="submit"><img src="../media/icons/searchToX/search.svg" alt="button"></button>
            <input type="text" name="search" id="search">
          </form>
        </div>
        
      </section>

      <!-- PHP - REVIEWS: -->
      <section class="section-for-reviews">
        <div class="scrollable-container">
          
          <!-- SEARCH BAR - RESULTS: -->
          <div class="search-text">
            <p id="search-results-reviews"></p>
          </div>

          <?php

            include("connect.php");

            $tulos = mysqli_query($yhteys, "SELECT * FROM Reviews");

            while ($rivi = mysqli_fetch_object($tulos)) {
              echo "<div class='review-item'>";

              // Check if the user is an admin:
              $isAdmin = isset($_SESSION["Usertype"]) && $_SESSION["Usertype"] === 'Admin';

              // Display Review ID only for admins:
              if ($isAdmin) {
                echo "<div class='review-item-id'>
                  <p>Review ID | {$rivi->ReviewID}</p>
                </div>";
              }

              echo "<div class='review-item-title'>
                <p>{$rivi->Title}</p>
              </div>";

              echo "<div class='review-item-info'>
                <p>Username: | <span style='color: rgba(242, 187, 5, 1);'>{$rivi->Username}</span></p>
              </div>";

              echo "<div class='review-item-info'>
                <p>Review: | <span style='color: rgba(242, 187, 5, 1);'>{$rivi->ReviewText}</span></p>
              </div>";

              // Display options for admins:
              if ($isAdmin) {
                echo "<div class='review-item-options'>
                  <a href='./review-delete.php?deleted={$rivi->ReviewID}'>Delete</a>
                </div>";
              }

              echo "</div>";
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
      <script src="../js/search-reviews-live.js"></script>
      <!-- MENU - ICON: -->
      <script src="../js/menu-icon.js"></script>
      <!-- MENU - DROPDOWN: -->
      <script src="../js/menu-dropdown.js"></script>

  </body>
</html>