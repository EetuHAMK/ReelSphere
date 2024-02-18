<?php

  include("connect.php");

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  include("reel-upload-file.php");

  // WHEN BUTTON IS PRESSED -
  // ALLOWS TO HEAD BACK TO ADD USER W/OUT POSTING NULL ITEM:
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = isset($_POST["Title"]) ? htmlspecialchars(trim($_POST["Title"])) : "";
    $Rating = isset($_POST["Rating"]) ? floatval($_POST["Rating"]) : "";
    $ReleaseYear = isset($_POST["ReleaseYear"]) ? intval($_POST["ReleaseYear"]) : "";
    $Genre = isset($_POST["Genre"]) ? htmlspecialchars(trim($_POST["Genre"])) : "";
    $Director = isset($_POST["Director"]) ? htmlspecialchars(trim($_POST["Director"])) : "";
    $Details = isset($_POST["Details"]) ? htmlspecialchars(trim($_POST["Details"])) : "";
    $Poster = isset($_FILES["Poster"]["tmp_name"]) ? uploadFile("Poster", $_FILES["Poster"]["tmp_name"]) : "";
    $Background = isset($_FILES["Background"]["tmp_name"]) ? uploadFile("Background", $_FILES["Background"]["tmp_name"]) : "";
    $ReelID = isset($_POST["ReelID"]) ? intval($_POST["ReelID"]) : "";

    if (empty($Title) || empty($Rating) || empty($ReleaseYear) || empty($Genre) || empty($Director) || empty($Details) || empty($Poster) || empty($Background) || empty($ReelID)) {
      header("Location:../404.html");
      exit;
    }

  $sql = "UPDATE Reels SET Title=?, Rating=?, ReleaseYear=?, Genre=?, Director=?, Details=?, Poster=?, Background=? WHERE ReelID=?";

  $stmt = mysqli_prepare($yhteys, $sql);

    if (!$stmt) {
      echo "Error: " . mysqli_error($yhteys);
    }

    mysqli_stmt_bind_param($stmt, 'sdisssssi', $Title, $Rating, $ReleaseYear, $Genre, $Director, $Details, $Poster, $Background, $ReelID);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
      header("Location: ../php/reels.php");
      exit;
      
    } else {
      header("Location: ../404.html");
      exit;
    }
  }

?>
