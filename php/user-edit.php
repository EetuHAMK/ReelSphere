<?php

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  $edited=isset($_GET["edited"]) ? $_GET["edited"] : "";

  if (empty($edited)){
    header("Location:./users.php");
    exit;
  }

  include ("connect.php");

  $sql="select * from Users where UserID=?";
  $stmt=mysqli_prepare($yhteys, $sql);
  mysqli_stmt_bind_param($stmt, 'i', $edited);
  mysqli_stmt_execute($stmt);
  $tulos=mysqli_stmt_get_result($stmt);

  if (!$rivi=mysqli_fetch_object($tulos)){
    header("Location:../404.html");
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
    <link rel="stylesheet" href="../css/style-user-edit.css">

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
            <li><a href="../php/reel-add.php#">Edit Reel</a></li>
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
          <h1>ADMIN | EDIT USER</h1>
          <h2 class="hiddenheader">h2</h2>
        </header>
      </section>

      <!-- EDIT USER: -->
      <section class="section-for-user">
        <form action="../php/user-update.php" method="post">

          <!-- USERNAME: -->
          <div class="div-for-user">
            <label for="Username" class="form-label">Username</label>
            <input type="text" id="Username" name="Username" class="form-control" pattern="[a-zA-Z]+" title="Only alphabetic characters are allowed." minlength="4" maxlength="16" required
              value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Username) : ''; ?>">
          </div>

          <!-- FIRST NAME: -->
          <div class="row">
            <div class="col">
              <input type="text" name="Firstname" class="form-control" aria-label="Firstname" pattern="[a-zA-Z]+" title="Only alphabetic characters are allowed." minlength="2" maxlength="16" required
                value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Firstname) : ''; ?>">
            </div>

            <!-- LAST NAME: -->
            <div class="col">
              <input type="text" name="Lastname" class="form-control" aria-label="Lastname" pattern="[a-zA-Z]+" title="Only alphabetic characters are allowed." minlength="2" maxlength="16" required
                value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Lastname) : ''; ?>">
            </div>
          </div>

          <!-- EMAIL: -->
          <div class="email-password">
            <label for="Email" class="form-label">Email</label>
            <input type="email" id="Email" name="Email" class="form-control" aria-describedby="emailHelp" required
              value="<?php echo isset($rivi) ? htmlspecialchars($rivi->Email) : ''; ?>">
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>

          <!-- PASSWORD: -->
          <div class="email-password">
            <label for="Password" class="form-label">New Password (leave blank to keep the current password)</label>
            <input type="password" id="Password" name="Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least:
              one number |
              one uppercase & lowercase letter |
              at least 8 or more characters!">
          </div>

          <!-- HIDDEN INPUT FOR USER ID: -->
          <input type="hidden" name="UserID" value="<?php echo isset($rivi) ? $rivi->UserID : ''; ?>">

          <!-- BUTTON: -->
          <div class="div-for-button">
            <button type="submit" class="user-button">Update User</button>
          </div>
        </form>
        
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