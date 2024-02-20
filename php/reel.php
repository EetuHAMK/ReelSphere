<?php

  session_start();

  // USER CHECK!
  if (!isset($_SESSION["UserID"])) {
    header("Location: ../pages/login.html");
    exit;
  }

  // Retrieve ReelID from the URL parameter
  $ReelID = $_GET['ReelID'];

  // Include database connection and fetch reel details logic here

  include("connect.php");

  $stmt = $yhteys->prepare("SELECT * FROM Reels WHERE ReelID = ?");
  $stmt->bind_param("i", $ReelID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stmt->close();
  } else {
    // Handle the case where the specified ReelID is not found
    header("Location: ../404.html#");
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
    <title><?php echo htmlspecialchars($row['Title']); ?> - ReelSphere</title>
    
    <!-- BOOTSTRAP: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- STYLE.CSS: -->
    <link rel="stylesheet" href="../css/style-reel.css">

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

      <!-- SECTION - LEFT: -->
      <section class="section-for-reel">
        
        <!-- BUTTON: -->
        <div class="div-for-button">
          <button class="goback-button" onclick="location.href='../php/user-home.php#'" type="button">⇽</button>
        </div>

        <!-- BACKGROUND IMAGE: -->
        <div class="background-image">
          <img src="../reelsphere/reels/<?php echo htmlspecialchars($row['Background']); ?>" alt="<?php echo htmlspecialchars($row['Title']); ?> Background" class="background-image">
        </div>

        <div class="reel-information">

          <!-- HEADER: -->
          <header>
            <h1><?php echo htmlspecialchars($row['Title']); ?></h1>
          </header>
          
          <!-- INFORMATION: -->
          <img src="../reelsphere/reels/<?php echo htmlspecialchars($row['Poster']); ?>" alt="<?php echo htmlspecialchars($row['Title']); ?> Poster" class="poster-image">
          
          <div class="reel-information-I">
            <p>Rating: <?php echo htmlspecialchars($row['AverageRating']); ?> | Release Year: <?php echo htmlspecialchars($row['ReleaseYear']); ?></p>
          </div>
          <div class="reel-information-II">
            <p>Genre: <?php echo htmlspecialchars($row['Genre']); ?> | Director: <?php echo htmlspecialchars($row['Director']); ?></p>
          </div>

        </div>
      </section>
      
      <!-- SECTION - TOP: -->
      <section class="section-for-information">
        <button id="toggleSections">Write | Read Review</button>
        <div class="reviews">

          <!-- PHP - REVIEWS: -->
          <section class="section-for-reviews">
            <div class="scrollable-container">

              <?php

                include("connect.php");

                $tulos = mysqli_query($yhteys, "SELECT * FROM Reviews WHERE ReelID = $ReelID");

                while ($rivi = mysqli_fetch_object($tulos)) {
                  echo "<div class='review-item'>";

                    // Check if the user is an admin:
                      $isAdmin = isset($_SESSION["Usertype"]) && $_SESSION["Usertype"] === 'Admin';
                      $isAuthor = isset($_SESSION["Username"]) && $_SESSION["Username"] === $rivi->Username;

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
                      <p>Rating: | <span style='color: rgba(242, 187, 5, 1)'>{$rivi->Rating}</span></p>
                    </div>";
          
                    echo "<div class='review-item-info'>
                      <p>Username: | <span style='color: rgba(242, 187, 5, 1);'>{$rivi->Username}</span></p>
                    </div>";
          
                    echo "<div class='review-item-review'>
                      <p>Review: | <span style='color: rgba(242, 187, 5, 1);'>{$rivi->ReviewText}</span></p>
                    </div>";

                    // Display options for admins:
                    if ($isAdmin || $isAuthor) {
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

          <!-- REVIEW: -->
          <section class="section-for-review">
            <div class="review-form">

              <form action="../php/review-add.php?ReelID=<?php echo $ReelID; ?>" method="post">
                <!-- TITLE: -->
                <div class="div-for-title">
                  <h2>Review</h2>
                  <label for="Title" class="form-label">Title:</label>
                  <input type="text" id="Title" name="Title" class="form-control" maxlength="32" required>
                </div>

                <div class="review-text">
                  <label for="Rating" class="form-label">Rating:</label>
                  <input type="text" id="Rating" name="Rating" class="form-control" placeholder="Rating (1-10)" aria-label="Rating" 
                    minlength="1" maxlength="3" 
                    pattern="^[1-9](\.\d{1,2})?$|10$" 
                    title="Must be a number between 1 and 10." 
                    required>
                </div>

                <!-- REVIEW: -->
                <div class="review-text">
                  <label for="ReviewText" class="form-label">Review:</label>
                  <textarea id="ReviewText" name="ReviewText" class="form-control" minlength="32" maxlength="255" required></textarea>
                </div>

                <!-- BUTTON: -->
                <div class="div-for-button">
                  <button type="submit" class="review-button">Rate</button>
                </div>
              </form>

            </div>
          </section>
        </div>
        <!-- SECTION - BOTTOM: -->
        <section class="section-for-details">
          <p>Details: <?php echo htmlspecialchars($row['Details']); ?></p>
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
    <!-- MENU - DROPDOWN: -->
    <script src="../js/toggle-review.js"></script>

  </body>
</html>
