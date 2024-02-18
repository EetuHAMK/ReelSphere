<!-- SECURITY - DISALLOW USAGE OUTSIDE ADMINS -->

<!DOCTYPE html>
<html lang="en">
  <!-- HEAD: -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- AUTHOR, DESCRIPTION & KEYWORDS: -->
    <meta name="author" content="TEAM 8 | HAMK">
    <meta name="description" content="Log in & rate the movies.">
    <meta name="keywords" content="Project, Team 8, Movie Ratings, Series Ratings, Entertainment Website, Log In">
    <!-- TITLE: -->
    <title>ReelSphere</title>

    <!-- BOOTSTRAP: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- STYLE.CSS: -->
    <link rel="stylesheet" href="../css/style-admin-login.css">

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

    </div>

    <!-- MAIN: -->
    <main>

      <!-- LOG IN: -->
      <section class="section-for-login">
        <form action="../php/admin-login-II.php" method="post">

          <!-- USERNAME: -->
          <div class="div-for-username">
            <label for="Username" class="form-label">Username</label>
            <input type="username" id="Username" name="Username" class="form-control" required>
            <div class="form-text"></div>
          </div>

          <!-- PASSWORD: -->
          <div class="div-for-password">
            <label for="Password" class="form-label">Password</label>
            <input type="password" id="Password" name="Password" class="form-control" required>
          
          </div>

          <!-- BUTTON: -->
          <div class="div-for-button">
            <button type="submit" class="login-button">Log In</button>
          </div>
        </form>

      </section>

    </main>

    <!-- SCRIPTS: -->

    <!-- BOOTSTRAP: -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
      <!-- TRANSITION: -->
      <script src="../js/page-animation.js"></script>

  </body>
</html>