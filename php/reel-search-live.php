<?php
  session_start();
  include("connect.php");

  $searchQuery = $_GET['q'];

  $sql = "SELECT * FROM Reels WHERE LOWER(Title) LIKE LOWER(?)";
  $stmt = $yhteys->prepare($sql);
  $searchParam = '%' . $searchQuery . '%';
  $stmt->bind_param("s", $searchParam);
  $stmt->execute();
  $result = $stmt->get_result();

  if (!$result) {
      die("Error: " . $yhteys->error);
  }

  if ($result->num_rows > 0) {
    echo "<section class='reel-items'>";
    while ($row = $result->fetch_assoc()) {
      $isAdmin = isset($_SESSION["Usertype"]) && $_SESSION["Usertype"] === 'Admin';

      echo "<a href='./reel.php?ReelID={$row['ReelID']}' class='reel-link'>";
      echo "<div class='reel-item'>";
        echo "<div class='reel-item-information'>";
          echo "<p class='reel-item-info-I'>{$row['Title']}</p>";

      if (!$isAdmin) {
        echo "<p class='reel-item-info-II'>{$row['AverageRating']} | {$row['ReleaseYear']}</p>";
      }

      echo "</div>"; 

      $posterPath = $row['Poster'];
      $fullPosterURL = "/reelsphere/reels/{$posterPath}";

      echo "<img class='poster-image' src='{$fullPosterURL}' alt='{$row['Title']} Poster'>";

      if ($isAdmin) {
        echo "<div class='reel-item-options'>";
        echo "<a href='./reel-edit.php?edited={$row['ReelID']}'>Edit</a> | ";
        echo "<a href='./reel-delete.php?deleted={$row['ReelID']}'>Delete</a>";
        echo "</div>";
      }
      echo "</div>";
      echo "</a>";
    }
    echo "</section>";

  } else {
    echo 'No results found.';
  }

  $stmt->close();
  $yhteys->close();
?>
