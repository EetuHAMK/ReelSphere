<?php

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  $edited=isset($_GET["edited"]) ? $_GET["edited"] : "";

    if (empty($edited)){
      header("Location:./reels.php");
      exit;
    }

  include ("connect.php");

  $sql = "SELECT * FROM Reels WHERE ReelID = ?";
  $stmt = mysqli_prepare($yhteys, $sql);
  mysqli_stmt_bind_param($stmt, 'i', $edited);
  mysqli_stmt_execute($stmt);
  $tulos = mysqli_stmt_get_result($stmt);

  // Check if the review exists
  if (mysqli_num_rows($tulos) > 0) {
    $rivi = mysqli_fetch_object($tulos);
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
    <link rel="stylesheet" href="../css/style-reel-edit.css">

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
            <li><a href="../php/reel-add.php#">Add Reel</a></li>
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
          <h1>ADMIN | EDIT REEL</h1>
          <h2 class="hiddenheader">h2</h2>
        </header>
      </section>

      <!-- REEL EDIT: -->
      <section class="section-for-reel">
        <div class="reel-forms">

          <form action="../php/reel-update.php" method="post" enctype="multipart/form-data">
            
            <!-- TITLE: -->
            <div class="div-for-title">
              <label for="Title" class="form-label">Title</label>
              <input type="text" id="Title" name="Title" class="form-control" maxlength="255" required
                value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Title) : ''; ?>">
            </div>

            <!-- RATING & RELEASE YEAR: -->
            <div class="row">
              <div class="col">
                <input type="text" name="Rating" class="form-control" placeholder="Rating (1-10)" aria-label="rating"
                  minlength="3" maxlength="3" pattern="^\d+(\.\d{1,2})?$" readonly
                  required value="<?php echo isset($rivi) ? htmlspecialchars($rivi->AverageRating) : ''; ?>">
              </div>
              <div class="col">
                <input type="text" name="ReleaseYear" class="form-control" placeholder="Release Year (xxxx)"
                  aria-label="ReleaseYear" maxlength="4" pattern="\d{4}" title="Must be a four-digit number." required
                  value="<?php echo isset($rivi) ? htmlspecialchars($rivi->ReleaseYear) : ''; ?>">
              </div>
            </div>

            <!-- GENRE: -->
            <div class="basic-input">
              <label for="Genre" class="form-label">Genre</label>
              <input type="text" id="Genre" name="Genre" class="form-control" maxlength="100" required
                value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Genre) : ''; ?>">
            </div>

            <!-- DIRECTOR: -->
            <div class="basic-input">
              <label for="Director" class="form-label">Director</label>
              <input type="text" id="Director" name="Director" class="form-control" maxlength="100" required
                value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Director) : ''; ?>">
            </div>

            <!-- DETAILS: -->
            <div class="basic-input">
              <label for="Details" class="form-label">Details</label>
              <input type="text" id="Details" name="Details" class="form-control" maxlength="255" required
                value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Details) : ''; ?>">
            </div>

            <!-- POSTER: -->
            <div class="row">
              <div class="col">
                <p><?php echo isset($rivi) ? htmlspecialchars($rivi->Poster) : 'No file uploaded'; ?></p>
                <input type="file" id="Poster" name="Poster" class="form-control" accept="image/*">
              </div>

                <!-- BACKGROUND: -->
              <div class="col">
                <p><?php echo isset($rivi) ? htmlspecialchars($rivi->Background) : 'No file uploaded'; ?></p>
                <input type="file" id="Background" name="Background" class="form-control" accept="image/*">
              </div>
            </div>

            <!-- HIDDEN INPUT FOR REEL ID: -->
            <input type="hidden" name="ReelID" value="<?php echo isset($rivi) ? $rivi->ReelID : ''; ?>">

            <!-- BUTTON: -->
            <div class="div-for-button">
              <button type="submit" class="reel-button">Update Reel</button>
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

<?php
  mysqli_close($yhteys);
?>