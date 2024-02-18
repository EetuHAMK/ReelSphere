<?php

  include("connect.php");

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  include("reel-upload-file.php");

  // WHEN BUTTON IS PRESSED -
  // ALLOWS TO HEAD BACK TO ADD REEL W/OUT POSTING NULL ITEM:
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = isset($_POST["Title"]) ? htmlspecialchars(trim($_POST["Title"])) : "";
    $Rating = isset($_POST["Rating"]) ? floatval($_POST["Rating"]) : "";
    $ReleaseYear = isset($_POST["ReleaseYear"]) ? intval($_POST["ReleaseYear"]) : "";
    $Genre = isset($_POST["Genre"]) ? htmlspecialchars(trim($_POST["Genre"])) : "";
    $Director = isset($_POST["Director"]) ? htmlspecialchars(trim($_POST["Director"])) : "";
    $Details = isset($_POST["Details"]) ? htmlspecialchars(trim($_POST["Details"])) : "";
    $Poster = isset($_FILES["Poster"]["tmp_name"]) ? uploadFile("Poster", $_FILES["Poster"]["tmp_name"]) : "";
    $Background = isset($_FILES["Background"]["tmp_name"]) ? uploadFile("Background", $_FILES["Background"]["tmp_name"]) : "";

    $sql = "INSERT INTO Reels (Title, Rating, ReleaseYear, Genre, Director, Details, Poster, Background) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($yhteys, $sql);

    if (!$stmt) {
      echo "Error: " . mysqli_error($yhteys);
    } else {
      mysqli_stmt_bind_param($stmt, 'sdisssss', $Title, $Rating, $ReleaseYear, $Genre, $Director, $Details, $Poster, $Background);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      mysqli_close($yhteys);

      header("Location: ../php/reel-add.php");
      exit;
    }
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
    <link rel="stylesheet" href="../css/style-reel-add.css">

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
            <li><a href="../php/reels.php#">Edit Reels</a></li>
            <li><a href="../php/user-home.php#">User Home</a></li>
            <li><a href="../php/reviews.php#">Edit Reviews</a></li>
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
          <h1>ADMIN | ADD REEL</h1>
          <h2 class="hiddenheader">h2</h2>
        </header>
      </section>

      <!-- REEL EDIT: -->
      <section class="section-for-reel">
        <div class="reel-forms">

          <form action="../php/reel-add.php" method="post" enctype="multipart/form-data">
            <!-- TITLE: -->
            <div class="div-for-title">
              <label for="Title" class="form-label">Title</label>
              <input type="text" id="Title" name="Title" class="form-control" maxlength="255" required>
            </div>

            <!-- RATING & RELEASE YEAR: -->
            <div class="row">
              <div class="col">
                <input type="text" name="Rating" class="form-control" placeholder="Rating (0.0)" aria-label="Rating" pattern="^\d+(\.\d{1,2})?$" readonly required>
              </div>
              <div class="col">
                <input type="text" name="ReleaseYear" class="form-control" placeholder="Release Year (xxxx)" aria-label="ReleaseYear" maxlength="4" pattern="\d{4}" title="Must be a four-digit number." required>
              </div>
            </div>

            <!-- GENRE: -->
            <div class="basic-input">
              <label for="Genre" class="form-label">Genre</label>
              <input type="text" id="Genre" name="Genre" class="form-control" maxlength="100" required>
            </div>

            <!-- DIRECTOR: -->
            <div class="basic-input">
              <label for="Director" class="form-label">Director</label>
              <input type="text" id="Director" name="Director" class="form-control" maxlength="100" required>
            </div>

            <!-- DETAILS: -->
            <div class="basic-input">
              <label for="Details" class="form-label">Details</label>
              <input type="text" id="Details" name="Details" class="form-control" maxlength="255" required>
            </div>

            <!-- POSTER: -->
            <div class="row">
              <div class="col">
                <input type="file" id="Poster" name="Poster" class="form-control" accept="image/*">
              </div>

              <!-- BACKGROUND: -->
              <div class="col">
                <input type="file" id="Background" name="Background" class="form-control" accept="image/*">
              </div>
            </div>

            <!-- BUTTON: -->
            <div class="div-for-button">
              <button type="submit" class="reel-button">Add Reel</button>
            </div>
          </form>
          
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
      <!-- MENU - ICON: -->
      <script src="../js/menu-icon.js"></script>
      <!-- MENU - DROPDOWN: -->
      <script src="../js/menu-dropdown.js"></script>

  </body>
</html>